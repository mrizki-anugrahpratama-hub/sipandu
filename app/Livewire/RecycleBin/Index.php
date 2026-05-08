<?php

namespace App\Livewire\RecycleBin;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use App\Models\RecycleBin;
use App\Models\ArsipAktif;
use App\Models\ArsipInaktif;
use App\Models\ArsipVital;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

#[Layout('layouts.app')]
class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $filterJenis = 'semua'; // semua, aktif, inaktif, vital
    public $selectedItems = [];
    public $selectAll = false;

    // Properti untuk breadcrumb
    public $namaBidangYangDibuka;
    public $slugBidangYangDibuka;

    protected $queryString = ['search', 'filterJenis'];

    public function mount()
    {
        $user = Auth::user();
        
        // 1. Tentukan slug/role efektif
        $effectiveSlug = $user->role; 
        if ($user->role === 'super_admin') {
            $currentBidangOnSession = Session::get('current_bidang');
            if ($currentBidangOnSession) {
                $effectiveSlug = $currentBidangOnSession;
            }
        }

        // 2. PETA NAMA
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
        $namaDariMap = $roleMap[$effectiveSlug] ?? 'UNIT TIDAK DIKENAL';
        $this->namaBidangYangDibuka = Str::title(strtolower($namaDariMap));
        
        if ($effectiveSlug === 'super_admin') {
            $this->slugBidangYangDibuka = null;
        } else {
            $this->slugBidangYangDibuka = $effectiveSlug;
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingFilterJenis()
    {
        $this->resetPage();
    }

    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selectedItems = $this->getFilteredRecycleBin()->pluck('id')->toArray();
        } else {
            $this->selectedItems = [];
        }
    }

    private function getFilteredRecycleBin()
    {
        $query = RecycleBin::with('user');

        if ($this->search) {
            $query->where(function($q) {
                $q->whereJsonContains('data_arsip->nama_berkas', $this->search)
                  ->orWhereJsonContains('data_arsip->kode_klasifikasi_nomor_berkas', $this->search)
                  ->orWhereJsonContains('data_arsip->nomor_berkas', $this->search);
            });
        }
        
        if ($this->filterJenis !== 'semua') {
            $query->where('jenis_arsip', $this->filterJenis);
        }

        if (Auth::user()->role !== 'super_admin') {
            $query->where('user_id', Auth::id());
        }

        return $query->latest();
    }

    // =========================================================================
    // PERBAIKAN DI SINI: Nama function diubah menjadi 'restoreSingle'
    // =========================================================================
    public function restoreSingle($id)
    {
        try {
            $item = RecycleBin::findOrFail($id);
            $data = $item->data_arsip;

            // 1. Tentukan Model Induk
            $modelClass = match ($item->jenis_arsip) {
                'aktif' => \App\Models\ArsipAktif::class,
                'inaktif' => \App\Models\ArsipInaktif::class,
                'vital' => \App\Models\ArsipVital::class,
                default => null,
            };

            if (!$modelClass) return;

            // 2. [FIX TANGGAL] Paksa format tanggal agar tidak mundur
            if (isset($data['tanggal_dibuat'])) {
                $data['tanggal_dibuat'] = \Carbon\Carbon::parse($data['tanggal_dibuat'])
                    ->setTimezone(config('app.timezone'))
                    ->format('Y-m-d');
            }

            // Pastikan juga tanggal di bagian file (jika ada) tidak mundur
            if (isset($data['files'])) {
                foreach ($data['files'] as $key => $file) {
                    if (isset($file['tanggal_file'])) {
                        $data['files'][$key]['tanggal_file'] = \Carbon\Carbon::parse($file['tanggal_file'])
                            ->setTimezone(config('app.timezone'))
                            ->format('Y-m-d');
                    }
                }
            }

            // 3. [FIX BERKAS] Pisahkan data file sebelum create arsip induk
            $files = $data['files'] ?? [];
            unset($data['files']); // Hapus dari array agar tidak error mass-assignment

            // 4. Restore Arsip Induk
            $newArsip = $modelClass::create($data);

            // 5. Restore Relasi File (Jika ada)
            foreach ($files as $fileData) {
                // Sesuaikan ID induk yang baru (penting jika ID berubah)
                $foreignKey = ($item->jenis_arsip === 'aktif') ? 'arsip_aktif_id' : 'arsip_inaktif_id';
                $fileData[$foreignKey] = $newArsip->id;
                
                \App\Models\FileArsip::create($fileData);
            }

            $item->delete();
            session()->flash('success', 'Arsip dan berkas berhasil dipulihkan!');

        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error("Restore Error: " . $e->getMessage());
            session()->flash('error', 'Gagal restore: ' . $e->getMessage());
        }
    }

    public function restoreSelected()
    {
        if (empty($this->selectedItems)) {
            session()->flash('error', 'Pilih arsip yang ingin direstore.');
            return;
        }

        $restored = 0;
        $failed = 0;

        foreach ($this->selectedItems as $id) {
            try {
                // Memanggil method yang sudah direname
                $this->restoreSingle($id);
                $restored++;
            } catch (\Exception $e) {
                $failed++;
            }
        }

        $this->selectedItems = [];
        $this->selectAll = false;
        session()->flash('success', "Berhasil restore {$restored} arsip." . ($failed > 0 ? " Gagal: {$failed}" : ""));
    }

    // =========================================================================
    // PERBAIKAN DI SINI: Nama function diubah menjadi 'permanentDeleteSingle'
    // =========================================================================
    public function permanentDeleteSingle($id)
    {
        $recycleBinItem = RecycleBin::findOrFail($id);

        if (Auth::user()->role !== 'super_admin' && $recycleBinItem->user_id !== Auth::id()) {
            session()->flash('error', 'Anda tidak memiliki akses untuk menghapus arsip ini.');
            return;
        }

        $recycleBinItem->delete();
        session()->flash('success', 'Arsip berhasil dihapus permanen!');
    }

    public function deleteSelected()
    {
        if (empty($this->selectedItems)) {
            session()->flash('error', 'Pilih arsip yang ingin dihapus.');
            return;
        }

        $deleted = 0;
        foreach ($this->selectedItems as $id) {
            try {
                // Memanggil method yang sudah direname
                $this->permanentDeleteSingle($id);
                $deleted++;
            } catch (\Exception $e) {
                // Skip if error
            }
        }

        $this->selectedItems = [];
        $this->selectAll = false;
        session()->flash('success', "Berhasil menghapus {$deleted} arsip secara permanen.");
    }

    public function emptyRecycleBin()
    {
        $query = RecycleBin::query();

        if (Auth::user()->role !== 'super_admin') {
            $query->where('user_id', Auth::id());
        }

        $count = $query->count();
        $query->delete();

        session()->flash('success', "Recycle Bin dikosongkan! {$count} arsip dihapus permanen.");
    }

    public function render()
    {
        $recycleBin = $this->getFilteredRecycleBin()->paginate(10);

        // Hitung statistik
        $statsQuery = RecycleBin::query();
        if (Auth::user()->role !== 'super_admin') {
            $statsQuery->where('user_id', Auth::id());
        }
        
        $stats = [
            'total' => (clone $statsQuery)->count(),
            'aktif' => (clone $statsQuery)->where('jenis_arsip', 'aktif')->count(),
            'inaktif' => (clone $statsQuery)->where('jenis_arsip', 'inaktif')->count(),
            'vital' => (clone $statsQuery)->where('jenis_arsip', 'vital')->count(),
        ];

        return view('livewire.recycle-bin.index', [
            'recycleBin' => $recycleBin,
            'stats' => $stats,
            'namaBidangYangDibuka' => $this->namaBidangYangDibuka,
            'slugBidangYangDibuka' => $this->slugBidangYangDibuka,
        ]);
    }
}