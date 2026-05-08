<?php

namespace App\Livewire\Log;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use App\Models\ArsipAktif;
use App\Models\ArsipInaktif;
use App\Models\ArsipVital;
use App\Models\AktivitasSistem;
use App\Models\User;

#[Layout('layouts.app')]
class AktivitasIndex extends Component
{
    use WithPagination;

    public $namaBidangYangDibuka;
    public $slugBidangYangDibuka;

    public $search = '';
    public $filterJenis = '';

    #[Url]
    public $filterBidang = '';

    #[Url]
    public $filterDataBidang = ''; // [BARU] Filter Bidang Arsip (Data)

    #[Url]
    public $filterAksi = '';

    public $tanggal_mulai = '';
    public $tanggal_selesai = '';

    public $isLockedMode = false;
    public $isFromDashboard = false;

    public function mount()
    {
        $user = Auth::user();

        // [PERBAIKAN] Tangkap filter dari dashboard ke properti Data Bidang (Target), bukan Pelaku
        if (request()->has('filterBidang')) {
            $this->isFromDashboard = true; // Tandai bahwa user datang dari dashboard
            $val = request('filterBidang');
            
            // Normalisasi 'sistem' atau 'super_admin' untuk Super Admin
            if (in_array($val, ['sistem', 'super_admin', ''])) {
                $this->filterDataBidang = '';
            } else {
                $this->filterDataBidang = $val;
                
                // // Kunci filter jika bukan Super Admin/Sekretariat (RBAC)
                // if ($user->role !== 'super_admin' && $user->role !== 'sekretariat') {
                //     $this->filterDataBidang = $user->role;
                //     $this->isLockedMode = true;
                // }
            }
            $this->filterBidang = '';
            $this->filterAksi='';
        }

        $this->setHeaderAttributes();
    }

    private function setHeaderAttributes()
    {
        $user = Auth::user();
        $role = $user->role;

        // Mapping Judul
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

        // Logic Judul Header
        if ($role === 'super_admin') {
            if ($this->filterBidang) {
                $targetSlug = $this->filterBidang;
            } else {
                $this->namaBidangYangDibuka = 'RIWAYAT UNGGAHAN (SEMUA UNIT)';
                return;
            }
        } elseif ($role === 'sekretariat') {
            // Jika Sekretariat filter kosong, judulnya Lingkup Sekretariat
            if (empty($this->filterBidang)) {
                $this->namaBidangYangDibuka = 'RIWAYAT UNGGAHAN (LINGKUP SEKRETARIAT)';
                return;
            } else {
                $targetSlug = $this->filterBidang;
            }
        } else {
            $targetSlug = $role;
        }

        $namaDariMap = $roleMap[$targetSlug] ?? str_replace('_', ' ', strtoupper($targetSlug));
        $this->namaBidangYangDibuka = Str::title(strtolower($namaDariMap));
    }

    public function updated($propertyName)
    {
        $filters = ['search', 'filterJenis', 'tanggal_mulai', 'tanggal_selesai', 'filterBidang'];
        if (in_array($propertyName, $filters)) {
            $this->resetPage();
        }
    }

    public function resetFilters()
    {
        $user = Auth::user();

        // Super Admin & Sekretariat bisa reset filter bidang
        if ($user->role === 'super_admin' || $user->role === 'sekretariat') {
            $this->reset(['search', 'filterJenis', 'filterBidang', 'tanggal_mulai', 'tanggal_selesai']);
        } else {
            $this->reset(['search', 'filterJenis', 'tanggal_mulai', 'tanggal_selesai']);
        }

        $this->resetPage();
        $this->dispatch('clear-flatpickr-log');
    }

    private function applyFilters($query, $kolomPencarian)
    {
        $user = Auth::user();
        $role = $user->role;

        // [PERBAIKAN LOGIKA FILTER BERDASARKAN ROLE]

        // 1. SUPER ADMIN: Bisa lihat semua, atau filter spesifik
        if ($role === 'super_admin') {
            if (!empty($this->filterBidang)) {
                $query->where('bidang', $this->filterBidang);
            }
        } 
        // 2. SEKRETARIAT: Hanya bisa lihat 3 sub-bagian
        elseif ($role === 'sekretariat') {
            $lingkupSekretariat = ['umum_kepegawaian', 'keuangan', 'penyusunan_program'];

            if (!empty($this->filterBidang)) {
                // Jika memilih filter, pastikan yang dipilih valid (milik sekretariat)
                if (in_array($this->filterBidang, $lingkupSekretariat)) {
                    $query->where('bidang', $this->filterBidang);
                } else {
                    // Jika mencoba hack filter, kembalikan gabungan lingkup sekretariat
                    $query->whereIn('bidang', $lingkupSekretariat);
                }
            } else {
                // Jika filter kosong, tampilkan gabungan ke-3 nya
                $query->whereIn('bidang', $lingkupSekretariat);
            }
        } 
        // 3. ADMIN BIDANG: Terkunci di bidangnya sendiri
        else {
            $query->where('bidang', $role);
        }

        // Filter Search
        if ($this->search) {
            $query->where($kolomPencarian, 'like', '%' . $this->search . '%');
        }

        // Filter Tanggal
        if ($this->tanggal_mulai) {
            $query->whereDate('created_at', '>=', $this->tanggal_mulai);
        }
        if ($this->tanggal_selesai) {
            $query->whereDate('created_at', '<=', $this->tanggal_selesai);
        }

        return $query;
    }

    private function buildAktivitasQuery()
    {
        // Menghapus 'route_name' dari select statement karena kolom Aksi dihapus
        $queryAktif = ArsipAktif::select('id', 'uraian as nama_tampilan', 'created_at', 'bidang', 'user_id', DB::raw("'Aktif' as jenis_arsip_label"));
        $this->applyFilters($queryAktif, 'uraian');

        $queryInaktif = ArsipInaktif::select('id', 'uraian as nama_tampilan', 'created_at', 'bidang', 'user_id', DB::raw("'Inaktif' as jenis_arsip_label"));
        $this->applyFilters($queryInaktif, 'uraian');

        $kolomVital = 'isi_berkas'; 
        $queryVital = ArsipVital::select('id', "$kolomVital as nama_tampilan", 'created_at', 'bidang', 'user_id', DB::raw("'Vital' as jenis_arsip_label"));
        $this->applyFilters($queryVital, $kolomVital);

        $queries = [];
        // Perbaikan: Menghapus karakter spasi non-breaking yang menyebabkan syntax error
        if (empty($this->filterJenis) || $this->filterJenis === 'Aktif') $queries[] = $queryAktif;
        if (empty($this->filterJenis) || $this->filterJenis === 'Inaktif') $queries[] = $queryInaktif;
        if (empty($this->filterJenis) || $this->filterJenis === 'Vital') $queries[] = $queryVital;

        $finalQuery = array_shift($queries);
        if (!$finalQuery) return ArsipAktif::whereRaw('1 = 0');

        foreach ($queries as $q) { $finalQuery->union($q); }

        return $finalQuery->orderBy('created_at', 'desc');
    }

    public function render()
    {
        $user = Auth::user();
        $query = AktivitasSistem::with('user')->latest();

        // =========================================================
        // 1. LOGIKA KEAMANAN DATA (RBAC) BERDASARKAN BIDANG ARSIP
        // =========================================================
        if ($user->role === 'super_admin') {
            // Super Admin bisa melihat semua, filter data_bidang bersifat opsional
            if (!empty($this->filterDataBidang)) {
                $query->where('data_bidang', $this->filterDataBidang);
            }

            if ($this->filterAksi) {
                $query->where('aksi', $this->filterAksi);
            }
        } 
        elseif ($user->role === 'sekretariat') {
            // Sekretariat melihat lingkupnya sendiri berdasarkan pemilik data
            $lingkupSekre = ['sekretariat', 'umum_kepegawaian', 'keuangan', 'penyusunan_program'];
            
            if (!empty($this->filterDataBidang) && in_array($this->filterDataBidang, $lingkupSekre)) {
                $query->where('data_bidang', $this->filterDataBidang);
            } else {
                $query->whereIn('data_bidang', $lingkupSekre);
            }
        } 
        else {
            // $query->where('aksi', 'Tambah');
            // Admin Bidang (Sarpras, dll) HANYA bisa melihat data milik bidangnya
            // Meskipun pelakunya Super Admin, datanya tetap muncul untuk admin bidang terkait
            $query->where('data_bidang', $user->role);
        }

        // =========================================================
        // 2. FILTER TAMBAHAN (Pencarian, Aksi, & Unit Pengolah)
        // =========================================================
        if ($this->filterBidang && $user->role === 'super_admin') { // Filter berdasarkan siapa yang melakukan (Unit Pengolah)
            $query->where('bidang', $this->filterBidang);
        }

        if ($this->filterAksi) {
            $query->where('aksi', $this->filterAksi);
        }

        if ($this->search) {
            $query->where(function($q) {
                $q->where('deskripsi', 'like', '%' . $this->search . '%')
                  ->orWhereHas('user', fn($sub) => $sub->where('name', 'like', '%' . $this->search . '%'));
            });
        }

        // Filter Jenis Arsip (Modul)
        if ($this->filterJenis) {
            $query->where('modul', 'Arsip '. $this->filterJenis);
        }

        // 2. [TAMBAHKAN INI] Filter Tanggal
        if ($this->tanggal_mulai) {
            $query->whereDate('created_at', '>=', $this->tanggal_mulai);
        }
        if ($this->tanggal_selesai) {
            $query->whereDate('created_at', '<=', $this->tanggal_selesai);
    }

        return view('livewire.log.aktivitas-index', [
            'aktivitas' => $query->paginate(10)
        ])->title('Log Aktivitas Sistem');
    }
}