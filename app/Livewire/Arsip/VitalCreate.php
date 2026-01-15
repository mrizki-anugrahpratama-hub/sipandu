<?php

namespace App\Livewire\Arsip;

use Livewire\Component;
use App\Models\ArsipVital;
use App\Models\Pergub26; // [BARU] Import Model Pergub
use App\Models\Pergub30; // [BARU] Import Model Pergub
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

#[Layout('layouts.app')]
class VitalCreate extends Component
{
    // === PROPERTI HEADER ===
    public $namaBidangYangDibuka;
    public $slugBidangYangDibuka;

    // === PROPERTI AUTO FILL & LOGIC [BARU] ===
    public $selectedPergub = ''; // Untuk dropdown pilihan Pergub
    public $klasifikasiList = []; // Untuk datalist kode klasifikasi

    // === PROPERTI FORM INPUT ===
    public $asal_arsip;
    public $nomor_berkas = ''; // Default string kosong
    public $kode_klasifikasi = '';
    public $jenis_series_arsip = '';
    public $isi_berkas = '';
    public $bulan_tahun = '';
    public $jumlah_satuan = 1;
    public $klasifikasi_keamanan = '';
    public $keterangan = '';
    public $retensi_arsip_vital = '';
    public $lokasi_simpan = '';
    public $metode_perlindungan = '';
    public $keterangan_tambahan = '';
    public $kondisi_arsip = ''; 

    // === MOUNT ===
    public function mount()
    {
        $user = Auth::user();
        
        $effectiveSlug = $user->role; 
        if ($user->role === 'super_admin') {
            $currentBidangOnSession = Session::get('current_bidang');
            if ($currentBidangOnSession) {
                $effectiveSlug = $currentBidangOnSession;
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
        
        $this->slugBidangYangDibuka = ($effectiveSlug === 'super_admin') ? null : $effectiveSlug;

        // Set default Tahun ini untuk memudahkan
        $this->bulan_tahun = date('Y');
    }

    // === LOGIC AUTO FILL (BARU) ===

    public function updatedSelectedPergub($value)
    {
        // Reset list saat pergub berubah
        if ($value == 'pergub26') {
            $this->klasifikasiList = Pergub26::orderBy('kode_klasifikasi', 'asc')
                ->get(['id', 'kode_klasifikasi', 'index']);
        } elseif ($value == 'pergub30') {
            $this->klasifikasiList = Pergub30::orderBy('kode_klasifikasi', 'asc')
                ->select('id', 'kode_klasifikasi', 'index as nama_klasifikasi')
                ->get();
        } else {
            $this->klasifikasiList = [];
        }

        // Reset field terkait
        $this->kode_klasifikasi = '';
        $this->jenis_series_arsip = '';
        $this->retensi_arsip_vital = '';
        $this->nomor_berkas = '';
    }

    public function updatedKodeKlasifikasi($value)
    {
        if (!empty($value)) {
            $record = null;
            if ($this->selectedPergub == 'pergub26') {
                $record = Pergub26::where('kode_klasifikasi', $value)->first();
            } elseif ($this->selectedPergub == 'pergub30') {
                $record = Pergub30::where('kode_klasifikasi', $value)->first();
            }

            if ($record) {
                // Auto Fill: Jenis Series Arsip diambil dari Index/Nama Klasifikasi
                $this->jenis_series_arsip = $record->index ?? $record->nama_klasifikasi;
                
                // Auto Fill: Retensi Vital (Mengambil status akhir 'Permanen'/'Musnah' sebagai default)
                // Arsip Vital biasanya Permanen, tapi kita ambil dari DB sebagai saran awal
                $this->retensi_arsip_vital = $record->status_akhir;

                // Auto Fill: Keamanan (Default ke 'Sangat Rahasia' atau 'Rahasia' untuk arsip Vital)
                $this->klasifikasi_keamanan = 'Sangat Rahasia'; 
            }
        }

        $this->calculateNomorBerkas();
    }

    public function updatedBulanTahun($value)
    {
        // Hitung ulang nomor berkas jika tahun/bulan berubah
        $this->calculateNomorBerkas();
    }

    private function calculateNomorBerkas()
    {
        if (empty($this->kode_klasifikasi) || empty($this->bulan_tahun)) {
            $this->nomor_berkas = '';
            return;
        }

        $user = Auth::user();
        $bidang = $user->role;
        if ($user->role === 'super_admin') {
            $bidang = Session::get('current_bidang', $user->role);
        }

        // Logic Auto Numbering: Cek jumlah data dengan Kode & Tahun & Bidang yang sama
        $count = ArsipVital::where('kode_klasifikasi', $this->kode_klasifikasi)
            ->where('bulan_tahun', $this->bulan_tahun)
            ->where('bidang', $bidang)
            ->count();

        // Format Nomor Berkas: [Urutan]/[Kode]/[Tahun] (Contoh: 001/005.1/2024)
        // Atau format sederhana angka saja, sesuai kebutuhan. Di sini saya buat urutan saja.
        $this->nomor_berkas = (string)($count + 1);
    }

    // === VALIDASI & SAVE ===

    protected $rules = [
        'selectedPergub' => 'nullable|string', // Validasi dropdown pergub
        'asal_arsip' => 'required|string|max:255',
        'nomor_berkas' => 'required|string|max:255',
        'kode_klasifikasi' => 'required|string|max:255',
        'jenis_series_arsip' => 'required|string|max:255',
        'isi_berkas' => 'required|string',
        'bulan_tahun' => 'required|string|max:255',
        'jumlah_satuan' => 'required|integer|min:1',
        'klasifikasi_keamanan' => 'required|in:Sangat Rahasia,Rahasia,Terbatas,Biasa',
        'keterangan' => 'nullable|string',
        'retensi_arsip_vital' => 'required|string|max:255',
        'lokasi_simpan' => 'required|string|max:255',
        'metode_perlindungan' => 'required|string|max:255',
        'keterangan_tambahan' => 'nullable|string',
        'kondisi_arsip' => 'required|string|max:255', 
    ];

    public function save()
    {
        $this->validate();

        $user = Auth::user();
        $currentBidang = Session::get('current_bidang');
        
        $bidang = ($user->role === 'super_admin' && $currentBidang)
            ? $currentBidang
            : $user->role;

        try {
            ArsipVital::create([
                'asal_arsip' => $this->asal_arsip,
                'nomor_berkas' => $this->nomor_berkas,
                'kode_klasifikasi' => $this->kode_klasifikasi,
                'jenis_series_arsip' => $this->jenis_series_arsip,
                'isi_berkas' => $this->isi_berkas,
                'bulan_tahun' => $this->bulan_tahun,
                'jumlah_satuan' => $this->jumlah_satuan,
                'klasifikasi_keamanan' => $this->klasifikasi_keamanan,
                'keterangan' => $this->keterangan,
                'retensi_arsip_vital' => $this->retensi_arsip_vital,
                'lokasi_simpan' => $this->lokasi_simpan,
                'metode_perlindungan' => $this->metode_perlindungan,
                'keterangan_tambahan' => $this->keterangan_tambahan,
                'kondisi_arsip' => $this->kondisi_arsip,
                'user_id' => Auth::id(),
                'bidang' => $bidang,
            ]);

            session()->flash('success', 'Arsip Vital berhasil ditambahkan!');
            return redirect()->route('arsip.vital.index');
            
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal menyimpan arsip: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.arsip.vital-create', [
            'namaBidangYangDibuka' => $this->namaBidangYangDibuka,
            'slugBidangYangDibuka' => $this->slugBidangYangDibuka,
        ]);
    }
}