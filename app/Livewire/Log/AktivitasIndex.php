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

    public $tanggal_mulai = '';
    public $tanggal_selesai = '';

    public $isLockedMode = false;

    public function mount()
    {
        $user = Auth::user();

        // 1. Cek parameter URL
        if (request()->has('filterBidang') && !empty(request('filterBidang'))) {
            $val = request('filterBidang');

            // Normalisasi 'sistem' -> 'super_admin' (jika dari Home)
            if ($val === 'sistem') {
                $val = 'super_admin';
            }

            // Jika dari Home (kosong/sistem/super_admin), reset filter jadi kosong
            if ($val === 'super_admin' || $val === '') {
                $this->filterBidang = '';
                $this->isLockedMode = false; // Buka kunci
            } else {
                // Jika filter spesifik
                $this->filterBidang = $val;
                
                // [PERBAIKAN LOGIKA KUNCI]
                // Kunci mode HANYA jika user BUKAN super_admin DAN BUKAN sekretariat
                // Sekretariat boleh ganti-ganti filter (tapi terbatas opsinya nanti di View)
                if ($user->role !== 'super_admin' && $user->role !== 'sekretariat') {
                    $this->isLockedMode = true;
                    $this->filterBidang = $user->role;
                }
            }
        } else {
            // Jika tidak ada parameter URL
            // User biasa (selain Super & Sekretariat) langsung terkunci
            if ($user->role !== 'super_admin' && $user->role !== 'sekretariat') {
                $this->isLockedMode = true;
                $this->filterBidang = $user->role;
            }
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
        $query = $this->buildAktivitasQuery();
        $aktivitas = $query->paginate(15);

        $userIds = $aktivitas->pluck('user_id')->unique()->filter();
        $users = User::whereIn('id', $userIds)->get()->keyBy('id');

        $aktivitas->getCollection()->transform(function ($item) use ($users) {
            $item->user = $users->get($item->user_id);
            // $item->route_name tidak lagi diperlukan
            return $item;
        });

        return view('livewire.log.aktivitas-index', [
            'aktivitas' => $aktivitas,
        ]);
    }
}