<?php

namespace App\Livewire\Arsip;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ArsipVital;
use App\Models\RecycleBin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Illuminate\Support\Str;
// [TAMBAHAN] Import yang diperlukan
use App\Exports\ArsipVitalExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder; // Pastikan Builder di-import

#[Layout('layouts.app')]
class VitalIndex extends Component
{
    use WithPagination;

    // [BARU] Properti untuk header dan breadcrumb
    public $namaBidangYangDibuka;
    public $slugBidangYangDibuka;

    // Properti yang sudah ada
    public $search = '';
    public $confirmingDeletion = false;
    public $deletingArsipId = null; 

    // [BARU] Properti untuk filter, seleksi, dan export (dari AktifIndex)
    public $filterKeamanan = ''; // Sesuai blade: filterKeamanan
    public $tanggal_mulai = '';
    public $tanggal_selesai = '';
    public $selectedArsip = [];
    public $selectAll = false;
    
    // [BARU] Properti EXPORT untuk Berkas, Isi Berkas, dan Keduanya
    public $laporanBerkas = false; 
    public $laporanIsiBerkas = false;

    // [BARU] Method mount() untuk mengisi data header
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

        // 2. PETA NAMA (konsisten dengan komponen lain)
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

        // 3. Tetapkan properti
        $namaDariMap = $roleMap[$effectiveSlug] ?? 'UNIT KERJA';
        $this->namaBidangYangDibuka = Str::title(strtolower($namaDariMap));
        
        // Simpan slug untuk kebutuhan URL di Blade
        $this->slugBidangYangDibuka = ($effectiveSlug === 'super_admin') ? null : $effectiveSlug;
    }

    // [MODIFIKASI] Mengganti updatingSearch menjadi hook 'updated' yang lebih umum
    public function updated($propertyName)
    {
        // Jika salah satu filter berubah, reset paginasi dan seleksi
        if (in_array($propertyName, ['search', 'filterKeamanan', 'tanggal_mulai', 'tanggal_selesai'])) {
            $this->resetPage();
            $this->reset(['selectedArsip', 'selectAll']);
        }
        
        // Reset pilihan ekspor jika filter diubah
        if (in_array($propertyName, ['search', 'filterKeamanan', 'tanggal_mulai', 'tanggal_selesai'])) {
             $this->reset(['laporanBerkas', 'laporanIsiBerkas']);
        }
    }

    // [BARU] Logika untuk checkbox "Pilih Semua"
    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selectedArsip = $this->buildArsipQuery()->paginate(10)->pluck('id')->map(fn ($id) => (string) $id);
        } else {
            $this->reset('selectedArsip');
        }
    }

    // [BARU] Memisahkan query builder agar bisa dipakai ulang
    private function buildArsipQuery(): Builder // Tambahkan type hint Builder
    {
        $user = Auth::user();
        $currentBidang = Session::get('current_bidang');
        
        $query = ArsipVital::query()->with('user');

        if ($user->role === 'super_admin' || $user->role === 'sekretariat') {
            if ($currentBidang) {
                $query->where('bidang', $currentBidang);
            }
        } else {
            $query->where('bidang', $user->role);
        }

        $query->when($this->search, function ($q) {
            $q->where(function($sq) {
                $sq->where('nomor_berkas', 'like', '%' . $this->search . '%')
                    ->orWhere('asal_arsip', 'like', '%' . $this->search . '%')
                    ->orWhere('kode_klasifikasi', 'like', '%' . $this->search . '%')
                    ->orWhere('jenis_series_arsip', 'like', '%' . $this->search . '%');
            });
        });

        // [BARU] Menambahkan filter yang ada di blade
        $query->when($this->filterKeamanan, function ($q) {
            $q->whereRaw('LOWER(klasifikasi_keamanan) = ?', [strtolower($this->filterKeamanan)]);
        });

        $query->when($this->tanggal_mulai, function ($q) {
            // Asumsi filter tanggal berdasarkan 'created_at'. Ganti jika ada kolom tanggal lain.
            $q->whereDate('created_at', '>=', $this->tanggal_mulai);
        });
        $query->when($this->tanggal_selesai, function ($q) {
            $q->whereDate('created_at', '<=', $this->tanggal_selesai);
        });
        
        // Filter Bulk Action
        if (!empty($this->selectedArsip)) { 
             $query->whereIn('id', $this->selectedArsip);
        }
        
        return $query;
    }

    // [BARU] Method untuk mereset semua filter
    public function resetFilters()
    {
        $this->reset(['search', 'filterKeamanan', 'tanggal_mulai', 'tanggal_selesai', 'selectedArsip', 'selectAll']);
        $this->resetPage();
        // Memberi sinyal ke Flatpickr di blade untuk clear
        $this->dispatch('clear-flatpickr');
    }

    // [MODIFIKASI] Menggunakan $deletingArsipId
    public function confirmDelete($id)
    {
        $this->deletingArsipId = $id;
        $this->confirmingDeletion = true;
    }

    // [MODIFIKASI] Menggunakan $deletingArsipId
    public function delete()
    {
        try {
            $arsip = ArsipVital::findOrFail($this->deletingArsipId);
            $user = Auth::user();
            $currentBidang = Session::get('current_bidang');
            
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
                'jenis_arsip' => 'vital',
                'data_arsip' => $arsip->toArray(),
                'deleted_at_date' => now(),
                'user_id' => Auth::id()
            ]);
            
            $arsip->delete();
            
            session()->flash('success', 'Arsip Vital berhasil dipindahkan ke Recycle Bin!');
            
            $this->confirmingDeletion = false;
            $this->deletingArsipId = null;
            
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal menghapus arsip: ' . $e->getMessage());
            $this->confirmingDeletion = false;
        }
    }

    // [BARU] Method Export Excel
    public function exportExcel()
    {
        // 1. Cek apakah pengguna memilih opsi ekspor
        if (!$this->laporanBerkas && !$this->laporanIsiBerkas) {
            session()->flash('error', 'Pilih minimal satu jenis laporan (Daftar Berkas atau Daftar Isi Berkas) untuk diekspor.');
            return;
        }
        
        $fileName = 'arsip_vital_' . date('Y-m-d') . '.xlsx';
        
        // Logika header unit pengolah
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
        
        $periode = 'KESELURUHAN DATA'; 
        if ($this->tanggal_mulai && $this->tanggal_selesai) {
            $periode = Carbon::parse($this->tanggal_mulai)->isoFormat('DD MMMM YYYY') . ' - ' . Carbon::parse($this->tanggal_selesai)->isoFormat('DD MMMM YYYY');
        } elseif ($this->tanggal_mulai) {
            $periode = 'MULAI DARI ' . Carbon::parse($this->tanggal_mulai)->isoFormat('DD MMMM YYYY');
        } elseif ($this->tanggal_selesai) {
            $periode = 'SAMPAI DENGAN ' . Carbon::parse($this->tanggal_selesai)->isoFormat('DD MMMM YYYY');
        }

        // Ambil Query Builder yang sudah difilter
        // PENTING: Untuk ArsipVitalExport, kita tidak mengirim Query Builder,
        // tetapi mengirim semua parameter filter karena query dibangun di dalam Sheet.
        // Kita hanya mengirim parameter filter saja.

        // Urutan: bool, bool, string, string, string, string, User, string, Collection, string, string
        $export = new ArsipVitalExport(
            $this->laporanBerkas,
            $this->laporanIsiBerkas,
            $this->search,
            $this->filterKeamanan, 
            $this->tanggal_mulai,
            $this->tanggal_selesai,
            $user, // App\Models\User
            $currentBidang,
            collect($this->selectedArsip), // Collection
            $unitPengolah,
            strtoupper($periode)
        );
        
        return Excel::download($export, $fileName);
    }

    // [BARU] Method Export PDF
    public function exportPdf()
    {
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
        
        $periode = 'KESELURUHAN DATA'; 
        if ($this->tanggal_mulai && $this->tanggal_selesai) {
            $periode = Carbon::parse($this->tanggal_mulai)->isoFormat('DD MMMM YYYY') . ' - ' . Carbon::parse($this->tanggal_selesai)->isoFormat('DD MMMM YYYY');
        } elseif ($this->tanggal_mulai) {
            $periode = 'MULAI DARI ' . Carbon::parse($this->tanggal_mulai)->isoFormat('DD MMMM YYYY');
        } elseif ($this->tanggal_selesai) {
            $periode = 'SAMPAI DENGAN ' . Carbon::parse($this->tanggal_selesai)->isoFormat('DD MMMM YYYY');
        }

        $fileName = 'arsip_vital_' . date('Y-m-d') . '.pdf';
        $query = $this->buildArsipQuery();
        
        $arsip = $query->orderBy('created_at', 'desc')->get(); 
        
        $data = [
            'arsip' => $arsip,
            'unitPengolah' => $unitPengolah,
            'periode' => strtoupper($periode)
        ];
        
        // Anda perlu membuat file view 'livewire.arsip.vital-pdf.blade.php'
        $pdf = Pdf::loadView('livewire.arsip.vital-pdf', $data)
                    ->setPaper('a4', 'landscape'); 
                    
        return response()->streamDownload(
            fn () => print($pdf->output()),
            $fileName
        );
    }

    // [MODIFIKASI] render() sekarang menggunakan buildArsipQuery
    public function render()
    {
        $query = $this->buildArsipQuery();
        $arsipVital = $query->orderBy('created_at', 'desc')->paginate(10);

        // [BARU] Logika untuk sinkronisasi checkbox "Pilih Semua"
        if ($arsipVital->count() > 0) {
            $currentPageIds = $arsipVital->pluck('id')->map(fn ($id) => (string) $id);
            $this->selectAll = $currentPageIds->every(fn ($id) => collect($this->selectedArsip)->contains($id));
        } else {
            $this->selectAll = false;
        }

        // [PERBAIKAN] Kirim data header ke view
        return view('livewire.arsip.vital-index', [
            'arsipVital' => $arsipVital,
            'namaBidangYangDibuka' => $this->namaBidangYangDibuka,
            'slugBidangYangDibuka' => $this->slugBidangYangDibuka,
        ]);
    }
}