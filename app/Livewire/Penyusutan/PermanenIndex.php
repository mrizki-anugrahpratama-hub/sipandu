<?php

namespace App\Livewire\Penyusutan;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ArsipInaktif;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Maatwebsite\Excel\Facades\Excel;
// Hapus Imports PDF
// use Illuminate\Support\Facades\App; 
// use Barryvdh\DomPDF\Facade\Pdf; 
use Carbon\Carbon;

use App\Exports\PermanenArsipExport;

#[Layout('layouts.app')]
class PermanenIndex extends Component
{
    use WithPagination;

    // Filter Properties
    public $searchQuery = '';
    public $filterBidang = '';
    public $filterTahun = '';

    // Date Filters
    public $tanggal_mulai = '';
    public $tanggal_selesai = '';
    public $filterAkses = '';

    // Mass Action Properties
    public $selectedArsip = [];
    public $selectAll = false;
    public $confirmingPermanent = false; 

    // Penanda Tab Aktif
    public $activeTab = 'pending';

    // Helper untuk daftar bidang (samakan dengan MusnahIndex)
    public function getBidangsProperty()
    {
        return [
            'umum_kepegawaian' => 'Sub.Bagian Umum dan Kepegawaian',
            'keuangan' => 'Sub.Bagian Keuangan',
            'penyusunan_program' => 'Sub.Bagian Penyusunan Program dan Laporan',
            'pemerintahan' => 'Bidang Pemerintahan',
            'pembangunan_ekonomi' => 'Bidang Pembangunan Ekonomi',
            'kemasyarakatan' => 'Bidang Kemasyarakatan',
            'sarana_prasarana' => 'Bidang Sarana dan Prasarana',
            'sekretariat' => 'Sekretariat',
        ];
    }

    // --- Header Utility (for Excel/PDF) ---
    private function getHeaderData()
    {
        $user = Auth::user();
        
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
        $unitNama = $roleMap[$userRole] ?? 'UNIT TIDAK DIKENAL';
        
        // [PERBAIKAN] Menggunakan unitNama yang sudah dikonversi
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
            'status' => 'PERMANEN', 
            'filterAkses' => $this->filterAkses,
            'tanggal_mulai' => $this->tanggal_mulai, 
            'tanggal_selesai' => $this->tanggal_selesai, 
            'judulLaporan' => 'LAPORAN DAFTAR ARSIP PERMANEN',
        ];
    }
    
    // --- Reset Pagination when filter changes ---
    public function updatingSearchQuery() { $this->resetPage(); }
    public function updatingFilterBidang() { $this->resetPage(); }
    public function updatingFilterTahun() { $this->resetPage(); }
    public function updatingTanggalMulai() { $this->resetPage(); }
    public function updatingTanggalSelesai() { $this->resetPage(); }
    public function updatingFilterAkses() { $this->resetPage(); }

    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selectedArsip = $this->getQuery()->pluck('id')->map(fn($id) => (string) $id)->toArray();
        } else {
            $this->selectedArsip = [];
        }
    }

    public function resetFilters()
    {
        $this->reset(['searchQuery', 'filterBidang', 'filterTahun', 'tanggal_mulai', 'tanggal_selesai', 'filterAkses']);
        $this->dispatch('clear-datepicker');
    }

    /**
     * Returns the base query for the archives ready for permanent processing,
     * with all filters applied.
     */
    public function getQuery()
    {
        $user = Auth::user();

        $query = ArsipInaktif::where('status_pengolahan', 'penyusutan')
                             ->where('status_akhir', 'Permanen');

        // Filter Bidang (Role Based Access Control or manual filter)
        if ($user->role !== 'super_admin' && $user->role !== 'sekretariat') {
            $query->where('bidang', $user->role);
        } elseif (!empty($this->filterBidang)) {
            $query->where('bidang', $this->filterBidang);
        }

        // Filter Year Range
        if (!empty($this->filterTahun)) {
            $query->where('kurun_waktu', 'like', '%' . $this->filterTahun . '%');
        }

        // Filter Access Classification
        if (!empty($this->filterAkses)) {
            $query->where('klasifikasi_akses', $this->filterAkses);
        }

        // Filter Permanent Date Range (based on created_at)
        if (!empty($this->tanggal_mulai) && !empty($this->tanggal_selesai)) {
            $tglMulai = Carbon::parse($this->tanggal_mulai)->startOfDay();
            $tglSelesai = Carbon::parse($this->tanggal_selesai)->endOfDay();
            
            $query->whereBetween('created_at', [$tglMulai, $tglSelesai]);
        }

        // Search Filter
        if (!empty($this->searchQuery)) {
            $query->where(function($q) {
                $q->where('uraian', 'like', '%' . $this->searchQuery . '%')
                  ->orWhere('nomor_berkas', 'like', '%' . $this->searchQuery . '%')
                  ->orWhere('kode_klasifikasi', 'like', '%' . $this->searchQuery . '%')
                  ->orWhere('nomor_box', 'like', '%' . $this->searchQuery . '%');
            });
        }

        return $query->latest('tgl_retensi_berakhir');
    }
    
    // --- Export Excel Logic ---
    public function exportExcel()
    {
        try {
            $query = $this->getQuery();
            $headerData = $this->getHeaderData();
            
            return Excel::download(new PermanenArsipExport($query, $headerData), 'arsip_permanen_' . now()->format('Ymd_His') . '.xlsx');
            
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal mengekspor data ke Excel. Error: ' . $e->getMessage());
        }
    }
    
    // --- Export PDF Logic ---
    public function exportPdf()
    {
        // Ganti dengan placeholder
        session()->flash('info', 'Fungsi Ekspor PDF telah dinonaktifkan.');
        return;
    }
    
    // --- Mass Permanent Processing Logic ---
    public function prosesPermanenMassal()
    {
        if (count($this->selectedArsip) > 0) {
            
            ArsipInaktif::whereIn('id', $this->selectedArsip)->update([
                'status_pengolahan' => 'permanen', 
                'tanggal_permanen'  => now(),
            ]);

            session()->flash('success', count($this->selectedArsip) . ' Arsip berhasil diverifikasi sebagai arsip statis (permanen).');
            
            $this->selectedArsip = [];
            $this->selectAll = false;
        }
    }

    // --- Single Permanent Confirmation Logic ---
    public function confirmPermanent($arsipId)
    {
        $this->confirmingPermanent = $arsipId;
    }

    public function makePermanent()
    {
        if ($this->confirmingPermanent) {
            ArsipInaktif::where('id', $this->confirmingPermanent)->update([
                'status_pengolahan' => 'permanen', 
                'tanggal_permanen'  => now(),
            ]);

            session()->flash('success', 'Arsip berhasil ditetapkan sebagai permanen.');
            
            $this->confirmingPermanent = false;
        }
    }

    public function render()
    {
        $user = Auth::user();
        $isCentralAdmin = in_array($user->role, ['super_admin', 'sekretariat']);

        // --- 1. LOGIKA QUERY DASAR UNTUK TABEL ---
        $query = ArsipInaktif::query();

        if ($this->activeTab === 'pending') {
            // Gunakan 'Permanen' (P Besar) agar sesuai dengan dashboard/model
            $query->where('status_pengolahan', 'penyusutan')->where('status_akhir', 'Permanen');
        } else {
            $query->where('status_pengolahan', 'permanen');
        }

        // --- 2. LOGIKA FILTER BIDANG (Untuk Tabel) ---
        if (!$isCentralAdmin) {
            $query->where('bidang', $user->role);
        } 
        elseif ($this->filterBidang) {
            $query->where('bidang', $this->filterBidang);
        }

        // --- 3. FILTER PENCARIAN & TANGGAL (Tetap Sama) ---
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

        // --- 4. HITUNG TOTAL UNTUK TAB (Dibuat Sinkron dengan Filter) ---
        $countPendingQuery = ArsipInaktif::where('status_pengolahan', 'penyusutan')->where('status_akhir', 'Permanen');
        $countSelesaiQuery = ArsipInaktif::where('status_pengolahan', 'permanen');

        // [PENTING] Filter Bidang juga harus diterapkan ke angka di TAB agar sinkron
        if (!$isCentralAdmin) {
            $countPendingQuery->where('bidang', $user->role);
            $countSelesaiQuery->where('bidang', $user->role);
        } elseif ($this->filterBidang) {
            $countPendingQuery->where('bidang', $this->filterBidang);
            $countSelesaiQuery->where('bidang', $this->filterBidang);
        }

        return view('livewire.penyusutan.permanen-index', [
            'arsips' => $query->latest()->paginate(10),
            'pendingPermanen' => $countPendingQuery->count(), // Variabel disamakan dengan dashboard
            'totalPermanen' => $countSelesaiQuery->count(),   // Variabel disamakan dengan dashboard
            'bidangs' => $this->getBidangsProperty()
        ]);
    }
}