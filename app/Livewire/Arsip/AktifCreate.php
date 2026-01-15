<?php

namespace App\Livewire\Arsip;

use Livewire\Component;
use App\Models\ArsipAktif;
use App\Models\User;
use App\Models\Pergub26;
use App\Models\Pergub30;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class AktifCreate extends Component
{
    // === PROPERTI HEADER ===
    public $namaBidangYangDibuka;
    public $slugBidangYangDibuka;

    // === PROPERTI AUTOFILL & LOGIC ===
    public $selectedPergub = '';
    public $klasifikasiList = [];

    // === PROPERTI FORM INPUT (SESUAI DATABASE ANDA) ===
    public $kode_klasifikasi = '';
    public $nomor_berkas = '';
    public $uraian = '';
    public $kurun_waktu = '';
    public $jumlah = '';
    public $masa_retensi_aktif = '';
    public $masa_retensi_inaktif = '';
    public $status_akhir = null; // Diubah menjadi null
    public $tanggal_dibuat = '';

    // [PERBAIKAN] Properti keterangan ditambahkan
    public $keterangan = '';

    // [BARU] Properti untuk kolom otomasi
    public $status = 'Aktif'; // Default

    // Properti Tambahan
    public $index = '';
    public $klasifikasi_keamanan = '';
    public $klasifikasi_akses = '';
    public $tingkat_perkembangan = '';

    // === VALIDASI ===
    protected $rules = [
        'selectedPergub' => 'nullable',
        'kode_klasifikasi' => 'required|string|max:100',
        'nomor_berkas' => 'required|string|max:50',
        'uraian' => 'required|string|max:255',
        'kurun_waktu' => 'required|string|max:20',
        'jumlah' => 'required|integer|min:1',
        
        // Retensi tetap REQUIRED
        'masa_retensi_aktif' => 'required|integer|min:0',
        'masa_retensi_inaktif' => 'required|integer|min:0',
        
        // Status Akhir diubah menjadi NULLABLE
        'status_akhir' => 'nullable|string', 

        // Validasi keterangan
        'keterangan' => 'nullable|string',

        'index' => 'nullable|string|max:255',
        'klasifikasi_keamanan' => 'nullable|string',
        'klasifikasi_akses' => 'nullable|string',
        'tingkat_perkembangan' => 'nullable|string|max:100',
        'tanggal_dibuat' => 'nullable|date',
    ];

    public function mount()
    {
        $user = Auth::user();
        $effectiveSlug = $user->role;
        $currentBidangOnSession = Session::get('current_bidang');

        if ($user->role === 'super_admin' && $currentBidangOnSession) {
            $effectiveSlug = $currentBidangOnSession;
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
        $this->slugBidangYangDibuka = ($effectiveSlug === 'super_admin') ? null : $effectiveSlug;

        // Set default tanggal dibuat hari ini
        $this->tanggal_dibuat = now()->format('Y-m-d');
    }

    // === UPDATE LOGIC ===

    public function updatedSelectedPergub($value)
    {
        if ($value == 'pergub26') {
            // BARIS BARU: menggunakan nama kolom yang benar ('index')
            $this->klasifikasiList = Pergub26::orderBy('kode_klasifikasi', 'asc')
                ->get(['id', 'kode_klasifikasi', 'index']);
        } elseif ($value == 'pergub30') {
            $this->klasifikasiList = Pergub30::orderBy('kode_klasifikasi', 'asc')
                ->select('id', 'kode_klasifikasi', 'index as nama_klasifikasi')
                ->get();
        } else {
            $this->klasifikasiList = [];
        }

        // Ketika Pergub diganti, semua form harus di-reset total.
        $this->resetFormSelection();
    }

    public function updatedKodeKlasifikasi($value)
    {
        // Hanya mereset field yang PASTI terkait dengan Kode Klasifikasi (index dan status_akhir)
        $this->resetAutofillOnly(); 

        if (!empty($value)) {
            $record = null;
            if ($this->selectedPergub == 'pergub26') {
                $record = Pergub26::where('kode_klasifikasi', $value)->first();
            } elseif ($this->selectedPergub == 'pergub30') {
                $record = Pergub30::where('kode_klasifikasi', $value)->first();
            }

            if ($record) {
                $this->index = $record->index;
                // Retensi diisi otomatis, TAPI pengguna BISA mengubahnya di form
                $this->masa_retensi_aktif = (int) $record->retensi_aktif; 
                $this->masa_retensi_inaktif = (int) $record->retensi_inaktif; 
                $this->status_akhir = $record->status_akhir;
            }
        }

        $this->calculateNomorBerkas();
    }

    public function updatedKurunWaktu($value)
    {
        $this->calculateNomorBerkas();
    }

    // === HELPER FUNCTIONS ===

    private function calculateNomorBerkas()
    {
        if (empty($this->kode_klasifikasi) || empty($this->kurun_waktu)) {
            $this->nomor_berkas = '';
            return;
        }

        $user = Auth::user();
        $bidang = $user->role;
        if ($user->role === 'super_admin') {
            $bidang = Session::get('current_bidang', $user->role);
        }

        $count = ArsipAktif::where('kode_klasifikasi', $this->kode_klasifikasi)
            ->where('kurun_waktu', $this->kurun_waktu)
            ->where('bidang', $bidang)
            ->count();

        $this->nomor_berkas = (string)($count + 1);
    }

    private function resetAutofillOnly()
    {
        // Hanya mereset Index dan Status Akhir (yang diizinkan null)
        $this->index = '';
        $this->status_akhir = null;
        // Masa Retensi dibiarkan. Jika sudah terisi dari autofill sebelumnya,
        // pengguna bisa mengeditnya. Jika kosong, akan diisi dari autofill baru.
    }

    private function resetFormSelection()
    {
        // Reset total saat ganti Pergub.
        $this->kode_klasifikasi = '';
        $this->nomor_berkas = '';
        $this->masa_retensi_aktif = '';
        $this->masa_retensi_inaktif = '';
        $this->resetAutofillOnly(); 
    }

    // === SAVE FUNCTION ===

    public function save()
    {
        $this->validate();

        $user = Auth::user();
        $bidang = $user->role;

        if ($user->role === 'super_admin') {
            $bidang = Session::get('current_bidang', $user->role);
        }

        try {
            $finalTanggalDibuat = $this->tanggal_dibuat;
            if (!empty($this->kurun_waktu) && preg_match('/^\d{4}$/', $this->kurun_waktu)) {
                $tahunInput = (int) $this->kurun_waktu;
                $tahunSekarang = (int) date('Y');
                if ($tahunInput < $tahunSekarang) {
                    // Jika kurun waktu tahun lalu, set tanggal ke 1 Jan tahun tersebut
                    $finalTanggalDibuat = $this->kurun_waktu . '-01-01';
                }
            }

            ArsipAktif::create([
                'kode_klasifikasi' => $this->kode_klasifikasi,
                'nomor_berkas' => $this->nomor_berkas,
                'uraian' => $this->uraian,
                'kurun_waktu' => $this->kurun_waktu,
                'jumlah' => $this->jumlah,
                'masa_retensi_aktif' => $this->masa_retensi_aktif,
                'masa_retensi_inaktif' => $this->masa_retensi_inaktif,
                'status_akhir' => $this->status_akhir,
                'keterangan' => $this->keterangan,
                'tanggal_dibuat' => $finalTanggalDibuat,
                'user_id' => $user->id,
                'bidang' => $bidang,
                'index' => $this->index,
                'klasifikasi_keamanan' => $this->klasifikasi_keamanan,
                'klasifikasi_akses' => $this->klasifikasi_akses,
                'tingkat_perkembangan' => $this->tingkat_perkembangan,

                // Untuk sistem otomasi
                'status' => 'Aktif',
                // 'moved_date' dibiarkan null
            ]);

            session()->flash('success', 'Arsip aktif berhasil dibuat.');
            return $this->redirect(route('arsip.aktif.index'), navigate: true);
        } catch (\Exception $e) {
            if (str_contains($e->getMessage(), 'arsip_unik_constraint') || str_contains($e->getMessage(), 'Duplicate entry')) {
                session()->flash('error', 'Gagal: Arsip dengan Kode, Tahun, dan Nomor Berkas ini sudah ada.');
            } else {
                Log::error('Gagal menyimpan arsip baru: ' . $e->getMessage());
                session()->flash('error', 'Terjadi kesalahan saat menyimpan arsip: ' . $e->getMessage());
            }
        }
    }

    public function render()
    {
        return view('livewire.arsip.aktif-create');
    }
}