<?php

namespace App\Livewire\Arsip;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ArsipInaktif;
use App\Models\RecycleBin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Illuminate\Support\Str;
use App\Exports\ArsipInaktifExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Livewire\Attributes\Url;

#[Layout('layouts.app')]
class InaktifIndex extends Component
{
    use WithPagination;

    // === Properti Header & Breadcrumb ===
    public $namaBidangYangDibuka;
    public $slugBidangYangDibuka;

    // === Properti Filter & Data ===
    #[Url(except: '')]
    public $search = '';
    #[Url(except: '')]
    public $filterStatusAkhir = ''; 
    public $tanggal_mulai = '';
    public $tanggal_selesai = '';
    
    // === Properti EXPORT BARU untuk Berkas, Isi Berkas, dan Keduanya ===
    public $laporanBerkas = false; 
    public $laporanIsiBerkas = false;

    // === Properti Bulk Action & Delete ===
    public $confirmingDeletion = false;
    public $deletingArsipId = null; 
    public $selectedArsip = [];
    public $selectAll = false;
    
    // Properti filter super admin
    #[Url(except: '')]
    public $filterBidang = '';

    protected $queryString = [
        'search' => ['except' => ''],
        'filterStatusAkhir' => ['except' => ''],
        'filterBidang' => ['except' => ''],
    ];

    private function getCurrentPageIds(Collection $currentPageItems)
    {
        return $currentPageItems->pluck('id')->map(fn ($id) => (string) $id)->toArray();
    }

    public function mount()
    {
        $user = Auth::user();
        
        $effectiveSlug = $user->role; 
        
        if ($user->role === 'super_admin') {
            // Prioritas: URL/QueryString Filter ($this->filterBidang) > Session
            if (!empty($this->filterBidang)) {
                $effectiveSlug = $this->filterBidang;
                Session::put('current_bidang', $this->filterBidang);
            } else {
                $currentBidangOnSession = Session::get('current_bidang');
                if ($currentBidangOnSession) {
                    $effectiveSlug = $currentBidangOnSession;
                    $this->filterBidang = $currentBidangOnSession; // Sinkronkan dari Session
                } else {
                    $effectiveSlug = 'super_admin';
                }
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

        $namaDariMap = $roleMap[$effectiveSlug] ?? 'UNIT TIDAK DIKENAL';
        $this->namaBidangYangDibuka = Str::title(strtolower($namaDariMap));
        
        if ($effectiveSlug === 'super_admin') {
            $this->slugBidangYangDibuka = null;
        } else {
            $this->slugBidangYangDibuka = $effectiveSlug;
        }
    }

    public function updated($propertyName)
    {
        if (in_array($propertyName, ['search', 'filterStatusAkhir', 'tanggal_mulai', 'tanggal_selesai', 'filterBidang'])) {
            $this->resetPage();
            $this->reset(['selectedArsip', 'selectAll']);

            if ($propertyName === 'filterBidang' && Auth::user()->role === 'super_admin') {
                if (!empty($this->filterBidang)) {
                     Session::put('current_bidang', $this->filterBidang);
                } else {
                     Session::forget('current_bidang');
                }
            }
        }
    }

    public function updatedSelectAll($value)
    {
        // Perbaikan: Pastikan query yang digunakan sama dengan yang ditampilkan
        $arsipInaktif = $this->buildArsipQuery()->paginate(10)->getCollection();
        
        if ($value) {
            $this->selectedArsip = $this->getCurrentPageIds($arsipInaktif);
        } else {
            $this->reset('selectedArsip');
        }
    }

    /**
     * QUERY UTAMA (CORE LOGIC)
     * Memfilter data yang akan ditampilkan di tabel, PDF, dan Excel.
     */
    private function buildArsipQuery(): Builder
    {
        $user = Auth::user();
        
        // EAGER LOADING UNTUK FILE COUNT DAN PATH FILE PERTAMA
        $query = ArsipInaktif::query()
                             ->withCount('files') 
                             // [PERBAIKAN UTAMA DISINI]
                             // Mengubah 'path' menjadi 'path_file' agar sesuai tabel file_arsips
                             ->with(['files' => fn($q) => $q->select('arsip_inaktif_id', 'path_file')->limit(1)])
                             ->with('user')
                             ->where('status_pengolahan', 'inaktif');

        // --- Filter Bidang (Menggunakan $this->filterBidang dari URL/Mount) ---
        if ($user->role === 'super_admin') {
            if ($this->filterBidang) {
                $query->where('bidang', $this->filterBidang);
            }
        } else {
            $query->where('bidang', $user->role);
        }

        // --- Filter Search ---
        $query->when($this->search, function ($q) {
            $q->where(function($sq) {
                $sq->where('nomor_berkas', 'like', '%' . $this->search . '%')
                    ->orWhere('nomor_box', 'like', '%' . $this->search . '%')
                    ->orWhere('kode_klasifikasi', 'like', '%' . $this->search . '%')
                    ->orWhere('uraian', 'like', '%' . $this->search . '%')
                    ->orWhere('index', 'like', '%' . $this->search . '%')
                    ->orWhere('kurun_waktu', 'like', '%' . $this->search . '%');
            });
        });

        // --- Filter Status Akhir ---
        $query->when($this->filterStatusAkhir, function ($q) {
            $q->whereRaw('LOWER(status_akhir) = ?', [strtolower($this->filterStatusAkhir)]);
        });

        // --- Filter Rentang Tanggal Dibuat (Menggunakan Carbon untuk akurasi) ---
        $query->when($this->tanggal_mulai, function ($q) {
            $q->where('tanggal_dibuat', '>=', Carbon::parse($this->tanggal_mulai)->startOfDay());
        });
        
        $query->when($this->tanggal_selesai, function ($q) {
            $q->where('tanggal_dibuat', '<=', Carbon::parse($this->tanggal_selesai)->endOfDay());
        });
        
        // --- Filter Bulk Action ---
        if (!empty($this->selectedArsip) && request()->routeIs('arsip.inaktif.index')) { 
             $query->whereIn('id', $this->selectedArsip);
        }
        
        return $query;
    }

    public function resetFilters()
    {
        $this->reset([
            'search', 
            'filterStatusAkhir', 
            'tanggal_mulai', 
            'tanggal_selesai', 
            'selectedArsip', 
            'selectAll', 
            'laporanBerkas',
            'laporanIsiBerkas'
        ]);
        
        $this->resetPage();
        $this->dispatch('clear-litepicker'); 

        if (Auth::user()->role === 'super_admin') {
            if (empty($this->filterBidang)) {
                 Session::forget('current_bidang');
            }
        }
    }

    public function confirmDelete($id)
    {
        $this->deletingArsipId = $id;
        $this->confirmingDeletion = true;
    }

    public function delete()
    {
        try {
            $arsip = ArsipInaktif::findOrFail($this->deletingArsipId);
            $user = Auth::user();
            
            $currentBidang = Session::get('current_bidang'); 
            
            // Validasi Akses Hapus
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
            
            // Pindahkan ke Recycle Bin
            RecycleBin::create([
                'jenis_arsip' => 'inaktif',
                'data_arsip' => $arsip->toArray(),
                'deleted_at_date' => now(),
                'user_id' => Auth::id()
            ]);
            
            $arsip->delete();
            
            session()->flash('success', 'Arsip Inaktif berhasil dipindahkan ke Recycle Bin!');
            
            $this->confirmingDeletion = false;
            $this->deletingArsipId = null;
            
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal menghapus arsip: ' . $e->getMessage());
            $this->confirmingDeletion = false;
        }
    }

    public function exportExcel()
    {
        if (!$this->laporanBerkas && !$this->laporanIsiBerkas) {
            session()->flash('error', 'Pilih minimal satu jenis laporan (Daftar Berkas atau Daftar Isi Berkas) untuk diekspor.');
            return;
        }
        
        $fileName = 'arsip_inaktif_' . date('Y-m-d') . '.xlsx';
        
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
        if ($userRole === 'super_admin' && $currentBidang) {
            $userRole = $currentBidang;
        }
        $unitNama = $roleMap[$userRole] ?? 'UNIT TIDAK DIKENAL';
        $unitPengolah = $unitNama . ' BAKORWIL III MALANG';
        
        // Logika teks periode
        $periode = 'KESELURUHAN DATA'; 
        if ($this->tanggal_mulai && $this->tanggal_selesai) {
            $periode = Carbon::parse($this->tanggal_mulai)->isoFormat('DD MMMM YYYY') . ' - ' . Carbon::parse($this->tanggal_selesai)->isoFormat('DD MMMM YYYY');
        } elseif ($this->tanggal_mulai) {
            $periode = 'MULAI DARI ' . Carbon::parse($this->tanggal_mulai)->isoFormat('DD MMMM YYYY');
        } elseif ($this->tanggal_selesai) {
            $periode = 'SAMPAI DENGAN ' . Carbon::parse($this->tanggal_selesai)->isoFormat('DD MMMM YYYY');
        }

        // Ambil Query Builder yang sudah difilter
        $arsipQuery = $this->buildArsipQuery();
        
        // PERBAIKAN: Jika ada arsip terpilih, tambahkan filter WHERE IN ID ke query sebelum diekspor
        if (!empty($this->selectedArsip)) {
            $arsipQuery->whereIn('id', $this->selectedArsip);
        }

        $export = new ArsipInaktifExport(
            $arsipQuery,
            $this->laporanBerkas,
            $this->laporanIsiBerkas,
            $this->search,
            $this->filterStatusAkhir, 
            $this->tanggal_mulai,
            $this->tanggal_selesai, 
            $user, 
            $currentBidang, 
            collect($this->selectedArsip), 
            $unitPengolah, 
            strtoupper($periode)
        );
        
        return Excel::download($export, $fileName);
    }

    public function exportPdf()
    {
        // 1. Cek apakah pengguna memilih opsi ekspor
        if (!$this->laporanBerkas && !$this->laporanIsiBerkas) {
            session()->flash('error', 'Pilih minimal satu jenis laporan (Daftar Berkas atau Daftar Isi Berkas) untuk diekspor.');
            return;
        }

        $user = Auth::user();
        $currentBidang = Session::get('current_bidang');
        
        // Mapping Role
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
        if ($userRole === 'super_admin' && $currentBidang) {
            $userRole = $currentBidang;
        }
        $unitNama = $roleMap[$userRole] ?? 'UNIT TIDAK DIKENAL';
        $unitPengolah = $unitNama . ' BAKORWIL III MALANG';
        
        // Logika Periode
        $periode = 'KESELURUHAN DATA'; 
        if ($this->tanggal_mulai && $this->tanggal_selesai) {
            $periode = Carbon::parse($this->tanggal_mulai)->isoFormat('DD MMMM YYYY') . ' - ' . Carbon::parse($this->tanggal_selesai)->isoFormat('DD MMMM YYYY');
        } elseif ($this->tanggal_mulai) {
            $periode = 'MULAI DARI ' . Carbon::parse($this->tanggal_mulai)->isoFormat('DD MMMM YYYY');
        } elseif ($this->tanggal_selesai) {
            $periode = 'SAMPAI DENGAN ' . Carbon::parse($this->tanggal_selesai)->isoFormat('DD MMMM YYYY');
        }

        $fileName = 'arsip_inaktif_' . date('Y-m-d') . '.pdf';
        $query = $this->buildArsipQuery();
        
        // PERBAIKAN: Jika ada arsip terpilih, tambahkan filter WHERE IN ID ke query sebelum diekspor
        if (!empty($this->selectedArsip)) {
            $query->whereIn('id', $this->selectedArsip);
            $fileName = 'arsip_terpilih_' . date('Y-m-d') . '.pdf';
        }
        
        // PENTING: Muat relasi files jika laporan isi berkas dicentang
        $arsip = $query->orderBy('created_at', 'desc')
                        ->when($this->laporanIsiBerkas, fn($q) => $q->with('files')) 
                        ->get(); 
        
        $status = 'SEMUA STATUS';
        if ($this->filterStatusAkhir) {
            $status = strtoupper($this->filterStatusAkhir);
        }
        
        $data = [
            'arsip' => $arsip,
            'unitPengolah' => $unitPengolah,
            'periode' => strtoupper($periode),
            'status' => $status,
            'cetakIsiBerkas' => $this->laporanIsiBerkas // Meneruskan kontrol cetak ke view PDF
        ];
        
        $pdf = Pdf::loadView('livewire.arsip.inaktif-pdf', $data)
                    ->setPaper('a4', 'landscape'); 
                    
        return response()->streamDownload(
            fn () => print($pdf->output()),
            $fileName
        );
    }

    public function render()
    {
        // Panggil mount untuk memastikan properti breadcrumb diperbarui sebelum render
        $this->mount();

        $query = $this->buildArsipQuery();
        // Hapus filter selectedArsip dari query utama sebelum pagination
        $arsipInaktif = $query->when(!empty($this->selectedArsip) && request()->routeIs('arsip.inaktif.index'), function ($q) {
                                return $q->whereIn('id', $this->selectedArsip);
                             })
                             ->orderBy('created_at', 'desc')->paginate(10);
                             
        // Perbaikan: Hanya mengambil ID arsip yang ditampilkan di halaman saat ini untuk cek selectAll
        $currentPageItems = $arsipInaktif->getCollection();

        if ($currentPageItems->count() > 0) {
            $currentPageIds = $this->getCurrentPageIds($currentPageItems);
            // Periksa apakah semua ID di halaman saat ini ada di selectedArsip
            $this->selectAll = Collection::make($currentPageIds)->every(fn ($id) => Collection::make($this->selectedArsip)->contains($id));
        } else {
            $this->selectAll = false;
        }

        return view('livewire.arsip.inaktif-index', [
            'arsipInaktif' => $arsipInaktif,
            'namaBidangYangDibuka' => $this->namaBidangYangDibuka,
            'slugBidangYangDibuka' => $this->slugBidangYangDibuka,
        ]);
    }
}