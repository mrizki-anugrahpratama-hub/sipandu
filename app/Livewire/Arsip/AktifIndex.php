<?php

namespace App\Livewire\Arsip;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ArsipAktif;
use App\Models\RecycleBin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use App\Exports\ArsipAktifExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Collection; 
use Livewire\Attributes\Url; // Pastikan ini diimpor

#[Layout('layouts.app')]
class AktifIndex extends Component
{
    use WithPagination;

    // Properti header
    public $namaBidangYangDibuka;
    public $slugBidangYangDibuka;

    // Properti filter & data
    #[Url(except: '')] // Pertahankan di URL
    public $search = '';
    #[Url(except: '')] // Pertahankan di URL
    public $filterStatus = '';
    public $tanggal_mulai = ''; // Tidak perlu di URL jika hanya digunakan untuk filtering
    public $tanggal_selesai = ''; // Tidak perlu di URL jika hanya digunakan untuk filtering
    public $selectedArsip = [];
    public $selectAll = false;
    public $confirmingDeletion = false;
    public $deletingArsipId = null;

    // Properti untuk Filter Isi Berkas
    public $filterIsiBerkas = false; 
    
    // Properti untuk kontrol jenis laporan
    public $laporanBerkas = true;
    public $laporanIsiBerkas = true;

    // Properti filter super admin
    #[Url(except: '')] // Pertahankan di URL
    public $filterBidang = '';

    // Query string sudah didefinisikan di atas menggunakan #[Url]
    protected $queryString = [
        'search' => ['except' => ''],
        'filterStatus' => ['except' => ''],
        'filterBidang' => ['except' => ''],
    ];

    // Helper untuk mendapatkan ID yang terlihat di halaman saat ini
    private function getCurrentPageIds(Collection $currentPageItems)
    {
        return $currentPageItems->pluck('id')->map(fn ($id) => (string) $id)->toArray();
    }

    public function mount()
    {
        $user = Auth::user();
    
        // 1. Tentukan slug dasar
        $effectiveSlug = $user->role; 

        // 2. Jika Super Admin atau Sekretariat, cek apakah mereka sedang memfilter bidang tertentu
        if (in_array($user->role, ['super_admin', 'sekretariat'])) {
            // Ambil dari filter URL atau dari Session "current_bidang"
            $currentBidang = request('filterBidang') ?? Session::get('current_bidang');
            
            if ($currentBidang) {
                $effectiveSlug = $currentBidang;
            }
        }

        $roleMap = [
            'pemerintahan' => 'BIDANG PEMERINTAHAN',
            'pembangunan_ekonomi' => 'BIDANG PEMBANGUNAN EKONOMI',
            'kemasyarakatan' => 'BIDANG KEMASYARAKATAN',
            'sarana_prasarana' => 'BIDANG SARANA & PRASARANA',
            'umum_kepegawaian' => 'SUB BAGIAN UMUM & KEPEGAWAIAN',
            'keuangan' => 'SUB BAGIAN KEUANGAN',
            'penyusunan_program' => 'SUB BAGIAN PENYUSUNAN PROGRAM',
            'sekretariat' => 'SEKRETARIAT',
            'super_admin' => 'ADMINISTRATOR UTAMA',
        ];

        $namaDariMap = $roleMap[$effectiveSlug] ?? 'UNIT KERJA';
        $this->namaBidangYangDibuka = Str::title(strtolower($namaDariMap));
        
        // Simpan slug untuk kebutuhan URL di Blade
        $this->slugBidangYangDibuka = ($effectiveSlug === 'super_admin') ? null : $effectiveSlug;
    }

    public function getBidangOptionsProperty()
    {
        return User::query()
            ->select('role')
            ->where('role', '!=', 'super_admin')
            ->distinct()
            ->orderBy('role')
            ->pluck('role');
    }

    public function updated($propertyName)
    {
        if (in_array($propertyName, ['search', 'filterStatus', 'tanggal_mulai', 'tanggal_selesai', 'filterBidang', 'filterIsiBerkas'])) {
            $this->resetPage();
            $this->reset(['selectedArsip', 'selectAll']);

            // PERBAIKAN UTAMA 1: Hapus redirect yang tidak perlu. Cukup update session.
            if ($propertyName === 'filterBidang' && Auth::user()->role === 'super_admin') {
                if (!empty($this->filterBidang)) {
                     Session::put('current_bidang', $this->filterBidang);
                } else {
                     Session::forget('current_bidang');
                }
                // Livewire akan re-render, dan mount() akan menangani pembaruan namaBidangYangDibuka.
            }
        }
    }
    
    public function updatedSelectAll($value)
    {
        $query = $this->buildArsipQuery();
        $arsipAktif = $query->orderBy('created_at', 'asc')->paginate(10);
        
        if ($value) {
            $this->selectedArsip = $this->getCurrentPageIds($arsipAktif->getCollection());
        } else {
            $this->reset('selectedArsip');
        }
    }

    /**
     * Logika inti query filter dan pencarian.
     * Search kini mencakup: kode, nomor, uraian, index, dan kurun_waktu.
     */
    public function buildArsipQuery()
    {
        $query = ArsipAktif::query(); 
        $user = Auth::user();
        
        // Gunakan $this->filterBidang yang sudah disinkronkan dari URL/Session di mount()
        if ($user->role === 'super_admin' || $user->role === 'sekretariat') {
            if ($this->filterBidang) {
                $query->where('bidang', $this->filterBidang);
            }
        } else {
            $query->where('bidang', $user->role);
        }

        // Filter Pencarian Umum (Memastikan OR Grouping yang benar)
        $query->when($this->search, function ($q) {
            $search = $this->search;
            $q->where(function($sq) use ($search) {
                $sq->where('kode_klasifikasi', 'like', '%' . $search . '%')
                    ->orWhere('nomor_berkas', 'like', '%' . $search . '%')
                    ->orWhere('uraian', 'like', '%' . $search . '%')
                    ->orWhere('index', 'like', '%' . $search . '%')
                    ->orWhere('kurun_waktu', 'like', '%' . $search . '%');
                    
                // Filter Isi Berkas (Hanya berlaku jika checkbox dicentang)
                if ($this->filterIsiBerkas) {
                    $sq->orWhereHas('files', function ($subQuery) use ($search) {
                        $subQuery->where('uraian_informasi', 'like', '%' . $search . '%');
                    });
                }
            });
        });

        // Filter Status Nasib Akhir
        $query->when($this->filterStatus, function ($q) {
            $q->whereRaw('LOWER(status_akhir) = ?', [strtolower($this->filterStatus)]);
        });

        // Filter Rentang Tanggal Dibuat (Perbaikan Akurasi Tanggal)
        $query->when($this->tanggal_mulai, function ($q) {
            $q->where('created_at', '>=', Carbon::parse($this->tanggal_mulai)->startOfDay());
        });
        
        $query->when($this->tanggal_selesai, function ($q) {
            $q->where('created_at', '<=', Carbon::parse($this->tanggal_selesai)->endOfDay());
        });
        
        return $query;
    }

    public function resetFilters()
    {
        // PERBAIKAN UTAMA 2: Hapus $filterBidang dari reset list agar tetap di URL/QueryString.
        // Jika Super Admin ingin reset filter Bidang, mereka harus memilih "Semua Unit" di dropdown.
        $this->reset([
            'search', 
            'filterStatus', 
            'tanggal_mulai', 
            'tanggal_selesai', 
            'selectedArsip', 
            'selectAll', 
            'filterIsiBerkas', 
            'laporanBerkas', 
            'laporanIsiBerkas'
        ]);
        
        $this->resetPage();
        // PERBAIKAN 3: Ganti event name
        $this->dispatch('clear-litepicker'); 

        if (Auth::user()->role === 'super_admin') {
            // Karena kita tidak mereset $this->filterBidang di atas, 
            // kita hanya perlu mengosongkan session jika $filterBidang saat ini kosong (yaitu mode Semua Unit)
            if (empty($this->filterBidang)) {
                 Session::forget('current_bidang');
            }
            // Hapus redirect, karena reset filter akan menangani URL update (jika filterBidang ada di $queryString)
        }
    }

    public function render()
    {
        // Panggil mount untuk memastikan properti breadcrumb diperbarui sebelum render
        $this->mount();
        
        $query = $this->buildArsipQuery();
        $arsipAktif = $query->orderBy('created_at', 'asc')->paginate(10);
        
        if ($arsipAktif->count() > 0) {
            $currentPageIds = $this->getCurrentPageIds($arsipAktif->getCollection());
            $this->selectAll = Collection::make($currentPageIds)->every(fn ($id) => Collection::make($this->selectedArsip)->contains($id));
        } else {
            $this->selectAll = false;
        }

        return view('livewire.arsip.aktif-index', [
            'arsipAktif' => $arsipAktif,
            'namaBidangYangDibuka' => $this->namaBidangYangDibuka,
            'slugBidangYangDibuka' => $this->slugBidangYangDibuka,
        ]);
    }

    public function exportExcel()
    {
        if (!$this->laporanBerkas && !$this->laporanIsiBerkas) {
             session()->flash('error', 'Pilih minimal satu jenis laporan (Daftar Berkas atau Daftar Isi Berkas).');
             return;
        }

        $fileName = 'arsip_aktif_' . date('Y-m-d-His') . '.xlsx';
        
        $user = Auth::user();
        $currentBidang = Session::get('current_bidang'); 
        $userRole = $user->role;
        
        $roleMap = [
            'pemerintahan' => 'BIDANG PEMERINTAHAN',
            'pembangunan_ekonomi' => 'BIDANG PEMBANGUNAN EKONOMI',
            'kemasyarakatan' => 'BIDANG KEMASYARAKATAN',
            'sarana_prasarana' => 'BIDANG SARANA & PRASARANA',
            'umum_kepegawaian' => 'SUB BAGIAN UMUM & KEPEGAWAIAN',
            'keuangan' => 'SUB BAGIAN KEUANGAN',
            'penyusunan_program' => 'SUB BAGIAN PENYUSUNAN PROGRAM',
            'sekretariat' => 'SEKRETARIAT',
            'super_admin' => 'ADMINISTRATOR UTAMA',
        ];
        
        $effectiveRole = $userRole;
        // Gunakan $this->filterBidang (prop Livewire) untuk penentuan Unit Pengolah
        if ($userRole === 'super_admin' && !empty($this->filterBidang)) {
            $effectiveRole = $this->filterBidang;
        }
        
        $unitNama = $roleMap[$effectiveRole] ?? 'SEMUA UNIT';
        if ($userRole === 'super_admin' && empty($this->filterBidang)) {
            $unitPengolah = 'SEMUA UNIT PENGOLAH';
        } else {
            $unitPengolah = $unitNama . ' BAKORWIL III MALANG';
        }
        
        $periode = 'KESELURUHAN DATA'; 
        if ($this->tanggal_mulai && $this->tanggal_selesai) { $periode = Carbon::parse($this->tanggal_mulai)->isoFormat('DD MMMM YYYY') . ' - ' . Carbon::parse($this->tanggal_selesai)->isoFormat('DD MMMM YYYY'); }
        elseif ($this->tanggal_mulai) { $periode = 'MULAI DARI ' . Carbon::parse($this->tanggal_mulai)->isoFormat('DD MMMM YYYY'); }
        elseif ($this->tanggal_selesai) { $periode = 'SAMPAI DENGAN ' . Carbon::parse($this->tanggal_selesai)->isoFormat('DD MMMM YYYY'); }

        $query = $this->buildArsipQuery();
        
        $export = new ArsipAktifExport(
            $query, 
            $this->filterIsiBerkas,
            $this->laporanBerkas,
            $this->laporanIsiBerkas,
            $this->search, 
            $this->filterStatus,
            $this->tanggal_mulai,
            $this->tanggal_selesai,
            $user, 
            $this->selectedArsip, 
            $currentBidang, 
            strtoupper($unitPengolah),
            strtoupper($periode)
        );
        return Excel::download($export, $fileName);
    }

    public function exportPdf()
    {
        // Pengecekan wajib: minimal satu opsi laporan dipilih
        if (!$this->laporanBerkas && !$this->laporanIsiBerkas) {
             session()->flash('error', 'Pilih minimal satu jenis laporan (Daftar Berkas atau Daftar Isi Berkas).');
             return;
        }

        $user = Auth::user();
        $currentBidang = Session::get('current_bidang');
        
        $roleMap = [
            'pemerintahan' => 'BIDANG PEMERINTAHAN',
            'pembangunan_ekonomi' => 'BIDANG PEMBANGUNAN EKONOMI',
            'kemasyarakatan' => 'BIDANG KEMASYARAKATAN',
            'sarana_prasarana' => 'BIDANG SARANA & PRASARANA',
            'umum_kepegawaian' => 'SUB BAGIAN UMUM & KEPEGAWAIAN',
            'keuangan' => 'SUB BAGIAN KEUANGAN',
            'penyusunan_program' => 'SUB BAGIAN PENYUSUNAN PROGRAM',
            'sekretariat' => 'SEKRETARIAT',
            'super_admin' => 'ADMINISTRATOR UTAMA',
        ];
        
        $userRole = $user->role;
        $effectiveRole = $userRole;
        // Gunakan $this->filterBidang (prop Livewire) untuk penentuan Unit Pengolah
        if ($userRole === 'super_admin' && !empty($this->filterBidang)) {
            $effectiveRole = $this->filterBidang;
        }
        
        $unitNama = $roleMap[$effectiveRole] ?? 'SEMUA UNIT';
        if ($userRole === 'super_admin' && empty($this->filterBidang)) {
            $unitPengolah = 'SEMUA UNIT PENGOLAH';
        } else {
            $unitPengolah = $unitNama . ' BAKORWIL III MALANG';
        }
        
        $periode = 'KESELURUHAN DATA'; 
        if ($this->tanggal_mulai && $this->tanggal_selesai) {
            $periode = Carbon::parse($this->tanggal_mulai)->isoFormat('DD MMMM YYYY') . ' - ' . Carbon::parse($this->tanggal_selesai)->isoFormat('DD MMMM YYYY');
        } elseif ($this->tanggal_mulai) {
            $periode = 'MULAI DARI ' . Carbon::parse($this->tanggal_mulai)->isoFormat('DD MMMM YYYY');
        } elseif ($this->tanggal_selesai) {
            $periode = 'SAMPAI DENGAN ' . Carbon::parse($this->tanggal_selesai)->isoFormat('DD MMMM YYYY');
        }

        $fileName = 'arsip_aktif_' . date('Y-m-d') . '.pdf';
        
        $query = $this->buildArsipQuery();
        
        if (!empty($this->selectedArsip)) {
            $query->whereIn('id', $this->selectedArsip);
            $fileName = 'arsip_terpilih_' . date('Y-m-d') . '.pdf';
        }
        
        // PENTING: Jika ingin menyertakan detail isi berkas, kita harus memuat (load) relasi 'files'
        $arsip = $query->orderBy('created_at', 'desc')
                        ->when($this->laporanIsiBerkas, fn($q) => $q->with('files')) 
                        ->get(); 
        
        $status = 'SEMUA STATUS';
        if ($this->filterStatus) {
            $status = strtoupper($this->filterStatus);
        }
        
        $data = [
            'arsip' => $arsip,
            'unitPengolah' => $unitPengolah,
            'periode' => strtoupper($periode), 
            'status' => $status,
            // TERBARU: Meneruskan variabel kontrol ke PDF (sesuai dengan $laporanIsiBerkas dari filter)
            'cetakIsiBerkas' => $this->laporanIsiBerkas 
        ];
        
        $pdf = Pdf::loadView('livewire.arsip.aktif-pdf', $data)
            ->setPaper('f4', 'landscape'); 
            
        return response()->streamDownload(
            fn () => print($pdf->output()),
            $fileName
        );
    }
    
    public function confirmDelete($id)
    {
        $this->deletingArsipId = $id;
        $this->confirmingDeletion = true;
    }

    public function delete()
    {
        try {
            $arsip = ArsipAktif::findOrFail($this->deletingArsipId);
            $user = Auth::user();
            
            // Gunakan $this->filterBidang yang tersimpan (prop Livewire) untuk otorisasi, 
            // karena ini konsisten dengan apa yang dilihat user
            $currentBidang = $this->filterBidang;
            
            if ($user->role !== 'super_admin') {
                if ($arsip->bidang !== $user->role) {
                    session()->flash('error', 'Anda tidak memiliki akses untuk menghapus arsip ini.');
                    $this->confirmingDeletion = false;
                    return;
                }
            } else {
                if ($currentBidang && $arsip->bidang !== $currentBidang) {
                    session()->flash('error', 'Anda tidak memiliki akses untuk menghapus arsip ini.');
                    $this->confirmingDeletion = false;
                    return;
                }
            }

            $arsip->load('files');
            
            RecycleBin::create([
                'jenis_arsip' => 'aktif',
                'data_arsip' => $arsip->toArray(),
                'deleted_at_date' => now(),
                'user_id' => Auth::id()
            ]);
            
            $arsip->delete();
            
            session()->flash('success', 'Arsip berhasil dipindahkan ke Recycle Bin!');
            
            $this->confirmingDeletion = false;
            $this->deletingArsipId = null;
            
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal menghapus arsip: ' . $e->getMessage());
            $this->confirmingDeletion = false;
        }
    }
}