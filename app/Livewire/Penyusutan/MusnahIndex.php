<?php

namespace App\Livewire\Penyusutan;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ArsipInaktif;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel; 

use App\Exports\ArsipMusnahExport; // <-- Import class Export

#[Layout('layouts.app')]
class MusnahIndex extends Component
{
    use WithPagination;

    public $searchQuery = '';
    
    // Properti Filter
    public $filterBidang = ''; // <-- Ditambahkan untuk Filter Dropdown Bidang
    public $tanggal_mulai = '';
    public $tanggal_selesai = '';
    // public $filterAkses = ''; <-- Dihapus
    
    // Penanda Tab Aktif
    public $activeTab = 'pending'; 

    public $selectedArsip = []; 
    public $selectAll = false;

    // --- Helper untuk Opsi Bidang (Sesuai Struktur Organisasi) ---
    public function getBidangsProperty()
    {
        // Daftar Bidang/Roles, sesuai struktur yang Anda berikan
        return [
            'umum_kepegawaian' => 'Sub.Bagian Umum dan Kepegawaian',
            'keuangan' => 'Sub.Bagian Keuangan',
            'penyusunan_program' => 'Sub.Bagian Penyusunan Program dan Anggaran',
            'pemerintahan' => 'Bidang Pemerintahan',
            'pembangunan_ekonomi' => 'Bidang Pembangunan Ekonomi',
            'kemasyarakatan' => 'Bidang Kemasyarakatan',
            'sarana_prasarana' => 'Bidang Sarana dan Prasarana',
        ];
    }

    // --- Header Utility (untuk Excel) ---
    private function getHeaderData()
    {
        $user = Auth::user();
        
        // Gabungkan roles user dengan daftar bidang untuk mapping yang lengkap
        $roleMap = $this->getBidangsProperty() + [
            'super_admin' => 'ADMINISTRATOR UTAMA', 
            'sekretariat' => 'SEKRETARIAT',
        ];
        
        $userRole = $user->role;
        $unitNama = $roleMap[$userRole] ?? 'UNIT TIDAK DIKENAL';
        
        $unitPengolah = $unitNama . ' BAKORWIL III MALANG'; 
        
        // Logika Periode (menggunakan tanggal filter)
        $periode = 'KESELURUHAN DATA'; 
        if ($this->tanggal_mulai && $this->tanggal_selesai) {
            $periode = Carbon::parse($this->tanggal_mulai)->isoFormat('DD MMMM YYYY') . ' - ' . Carbon::parse($this->tanggal_selesai)->isoFormat('DD MMMM YYYY');
        } elseif ($this->tanggal_mulai) {
            $periode = 'MULAI DARI ' . Carbon::parse($this->tanggal_mulai)->isoFormat('DD MMMM YYYY');
        } elseif ($this->tanggal_selesai) {
            $periode = 'SAMPAI DENGAN ' . Carbon::parse($this->tanggal_selesai)->isoFormat('DD MMMM YYYY');
        }

        return [
            'unitPengolah' => $unitPengolah,
            'periode' => strtoupper($periode),
            // Status berdasarkan tab aktif
            'status' => $this->activeTab === 'pending' ? 'SIAP MUSNAH (MENUNGGU EKSEKUSI)' : 'SUDAH DIMUSNAHKAN',
            'judulLaporan' => 'LAPORAN DAFTAR ARSIP MUSNAH',
            'activeTab' => $this->activeTab, 
            // 'filterAkses' => $this->filterAkses, <-- Dihapus
        ];
    }

    // --- Aksi Reset & Update ---

    public function updatedActiveTab() 
    {
        $this->resetPage();
        $this->reset(['selectedArsip', 'selectAll', 'tanggal_mulai', 'tanggal_selesai', 'searchQuery', 'filterBidang']); // Dihapus filterAkses
        $this->dispatch('clear-flatpickr-musnah');
    }
    
    public function updatedSearchQuery()
    {
        $this->resetPage();
    }
    
    public function updatingTanggalMulai() { $this->resetPage(); }
    public function updatingTanggalSelesai() { $this->resetPage(); }
    // public function updatingFilterAkses() { $this->resetPage(); } <-- Dihapus
    public function updatingFilterBidang() { $this->resetPage(); }
    public function updatingSearchQuery() { $this->resetPage(); }


    public function updatedSelectAll($value)
    {
        if ($value) {
            $query = $this->getQuery(false); 
            if ($this->activeTab === 'pending') {
                 $this->selectedArsip = $this->getQuery(false)->paginate(10)->pluck('id')->map(fn($id) => (string) $id)->toArray(); 
            } else {
                 $this->selectedArsip = [];
            }
        } else {
            $this->selectedArsip = [];
        }
    }

    public function resetFilters()
    {
        $this->reset(['searchQuery', 'tanggal_mulai', 'tanggal_selesai', 'filterBidang']); // Dihapus filterAkses
        $this->resetPage();
        $this->dispatch('clear-flatpickr-musnah');
    }
    
    // --- Logika Query ---

    /**
     * Mendapatkan query Eloquent.
     * @param bool $applySelection Apakah query harus difilter berdasarkan $selectedArsip (default: true)
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getQuery($applySelection = true)
    {
        $user = Auth::user();
        
        $query = ArsipInaktif::query(); 

        // --- LOGIKA TAB ---
        if ($this->activeTab === 'pending') {
            $query->where('status_pengolahan', 'penyusutan')
                  ->where('status_akhir', 'Musnah');
        } else {
            $query->where('status_pengolahan', 'musnah');
        }

        // [LOGIKA RBAC DAN FILTER BIDANG]
        $bidangRoles = array_keys($this->getBidangsProperty());
        $isCentralAdmin = $user->role === 'super_admin' || $user->role === 'sekretariat';

        // Terapkan filter berdasarkan Role (RBAC)
        if (in_array($user->role, $bidangRoles)) {
             // Admin Bidang: Hanya lihat data bidangnya.
             $query->where('bidang', $user->role); 
        } elseif ($isCentralAdmin) {
             // Admin Pusat: Terapkan filter dropdown jika diisi.
            if (!empty($this->filterBidang)) {
                $query->where('bidang', $this->filterBidang); 
            }
        }
        
        // --- Filter Lainnya ---
        
        // Filter Klasifikasi Akses <-- DIHAPUS
        /*
        if (!empty($this->filterAkses)) {
            $query->where('klasifikasi_akses', $this->filterAkses); 
        }
        */
        
        // Filter Pencarian (Search Query)
        if ($this->searchQuery) {
            $search = $this->searchQuery; 
            $query->where(function($q) use ($search) {
                $q->where('uraian', 'like', '%' . $search . '%')
                  ->orWhere('nomor_berkas', 'like', '%' . $search . '%')
                  ->orWhere('nomor_box', 'like', '%' . $search . '%')
                  ->orWhere('kode_klasifikasi', 'like', '%' . $search . '%');
            });
        }
        
        // Filter Tanggal
        if ($this->tanggal_mulai && $this->tanggal_selesai) {
            $tglMulai = Carbon::parse($this->tanggal_mulai)->startOfDay();
            $tglSelesai = Carbon::parse($this->tanggal_selesai)->endOfDay();

            if ($this->activeTab === 'selesai') {
                 // Filter tab 'Selesai' berdasarkan tanggal eksekusi pemusnahan
                $query->whereBetween('tanggal_eksekusi', [$tglMulai, $tglSelesai]);
            } else {
                 // Filter tab 'Pending' berdasarkan tanggal retensi berakhir
                $query->whereBetween('tgl_retensi_berakhir', [$tglMulai, $tglSelesai]);
            }
        }
        
        // Filter berdasarkan item yang dipilih (untuk aksi massal atau ekspor spesifik)
        if ($applySelection && !empty($this->selectedArsip)) {
            $query->whereIn('id', $this->selectedArsip);
        }

        // Sorting: 
        return $this->activeTab === 'pending' 
             ? $query->latest('tgl_retensi_berakhir') 
             : $query->latest('tanggal_eksekusi');
    }

    // --- Export Excel Logic ---

    public function exportExcel()
    {
        try {
            
            $applySelectionForQuery = true;
            
            // Jika SelectAll TRUE ATAU jika tidak ada arsip yang dipilih, ekspor semua yang difilter.
            if ($this->selectAll || empty($this->selectedArsip)) {
                $applySelectionForQuery = false; 
            }
            
            $query = $this->getQuery($applySelectionForQuery);
            
            if ($query->count() === 0) {
                 session()->flash('error', 'Tidak ada data untuk diekspor sesuai filter/seleksi saat ini.');
                 return;
            }

            // EKSEKUSI QUERY untuk mendapatkan Koleksi
            $dataToExport = $query->get(); 

            $headerData = $this->getHeaderData();
            $fileName = 'arsip_musnah_' . $this->activeTab . '_' . now()->format('Ymd_His') . '.xlsx';
            
            // Menggunakan pola download sinkronus
            return Excel::download(
                new ArsipMusnahExport($dataToExport, $headerData), 
                $fileName
            );

        } catch (\Exception $e) {
            session()->flash('error', 'Gagal mengekspor data ke Excel. Error: ' . $e->getMessage());
        }
    }
    
    // --- Export PDF Logic (Placeholder) ---
    public function exportPdf()
    {
         session()->flash('info', 'Fungsi Ekspor PDF telah dinonaktifkan.');
         return;
    }

    // --- Aksi Pemusnahan ---

    public function prosesPemusnahanMassal()
    {
        if (count($this->selectedArsip) > 0) {
            $arsipToMusnah = ArsipInaktif::whereIn('id', $this->selectedArsip)
                ->where('status_pengolahan', 'penyusutan')
                ->where('status_akhir', 'Musnah')
                ->update([
                    'status_pengolahan' => 'musnah',
                    'tanggal_eksekusi'  => now()
                ]);
            
            session()->flash('success', $arsipToMusnah . ' Arsip berhasil dimusnahkan. Cek Tab "Sudah Dimusnahkan".');
            $this->reset(['selectedArsip', 'selectAll']);
            $this->activeTab = 'selesai'; 
        }
    }

    public function prosesPemusnahanSatuan($arsipId)
    {
        $arsip = ArsipInaktif::find($arsipId);
        if ($arsip) {
            $arsip->update([
                'status_pengolahan' => 'musnah',
                'tanggal_eksekusi'  => now()
            ]);
            session()->flash('success', 'Arsip berhasil dimusnahkan. Cek Tab "Sudah Dimusnahkan".');
            $this->activeTab = 'selesai'; 
        }
    }

    // --- Render ---

    public function render()
    {
        $user = Auth::user();
        $isCentralAdmin = in_array($user->role, ['super_admin', 'sekretariat']);

        // --- 1. LOGIKA QUERY DASAR ---
        // $query = ArsipInaktif::query();
        $query = $this->getQuery(false); 

        // Hitung total untuk tab (Tetap menggunakan RBAC)
        $countPendingQuery = ArsipInaktif::where('status_pengolahan', 'penyusutan')->where('status_akhir', 'Musnah');
        $countSelesaiQuery = ArsipInaktif::where('status_pengolahan', 'musnah');

        // Filter Tab (Pending vs Selesai)
        if ($this->activeTab === 'pending') {
            $query->where('status_pengolahan', 'penyusutan')->where('status_akhir', 'Musnah');
        } else {
            $query->where('status_pengolahan', 'musnah');
        }

        // --- 2. LOGIKA RBAC (Hak Akses) ---
        // Jika bukan Admin Pusat, kunci hanya untuk bidangnya sendiri
        // if (!$isCentralAdmin) {
        //     $query->where('bidang', $user->role);
        // } 
        if (!$isCentralAdmin) {
            $countPendingQuery->where('bidang', $user->role);
            $countSelesaiQuery->where('bidang', $user->role);
        }
        // Jika Admin Pusat DAN ada filter bidang yang dipilih
        elseif ($this->filterBidang) {
            $query->where('bidang', $this->filterBidang);
        }

        // --- 3. FILTER PENCARIAN & TANGGAL ---
        if ($this->searchQuery) {
            $query->where(function($q) {
                $q->where('uraian', 'like', '%' . $this->searchQuery . '%')
                ->orWhere('nomor_berkas', 'like', '%' . $this->searchQuery . '%')
                ->orWhere('kode_klasifikasi', 'like', '%' . $this->searchQuery . '%');
            });
        }

        if ($this->tanggal_mulai) {
            $query->whereDate('created_at', '>=', $this->tanggal_mulai);
        }
        if ($this->tanggal_selesai) {
            $query->whereDate('created_at', '<=', $this->tanggal_selesai);
        }

        // --- 4. HITUNG TOTAL UNTUK TAB (Dinamis sesuai Hak Akses) ---
        $countPendingQuery = ArsipInaktif::where('status_pengolahan', 'penyusutan')->where('status_akhir', 'Musnah');
        $countSelesaiQuery = ArsipInaktif::where('status_pengolahan', 'musnah');

        if (!$isCentralAdmin) {
            $countPendingQuery->where('bidang', $user->role);
            $countSelesaiQuery->where('bidang', $user->role);
        }

        return view('livewire.penyusutan.musnah-index', [
            'arsips' => $query->latest()->paginate(10),
            'countPending' => $countPendingQuery->count(),
            'countSelesai' => $countSelesaiQuery->count(),
            'bidangs' => $this->getBidangsProperty()
        ]);
    }
}