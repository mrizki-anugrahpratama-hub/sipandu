<?php

namespace App\Livewire\Arsip;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\ArsipInaktif;
use App\Models\FileArsip;
// [BARU] Import Model Pergub untuk Auto Fill
use App\Models\Pergub26;
use App\Models\Pergub30;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

#[Layout('layouts.app')]
class InaktifCreate extends Component
{
    use WithFileUploads;

    // === PROPERTI HEADER ===
    public $namaBidangYangDibuka;
    public $slugBidangYangDibuka;

    // === PROPERTI AUTOFILL & LOGIC [BARU] ===
    public $klasifikasiList = []; // Menampung list klasifikasi dari Pergub

    // === PROPERTI FORM DATA ===
    public $selectedPergub = ''; // Pemicu logic ganti Pergub
    public $kode_klasifikasi = '';
    public $uraian = '';
    public $nomor_box = '';
    public $nomor_berkas = '';
    public $index = '';

    public $masa_retensi_inaktif = 0;
    public $status_akhir = ''; // Pastikan data di Pergub cocok (Musnah/Permanen)
    public $kurun_waktu = '';
    public $tanggal_dibuat = '';
    public $jumlah = 1;
    public $tingkat_perkembangan = '';
    public $klasifikasi_keamanan = '';
    public $klasifikasi_akses = '';
    public $keterangan = '';

    // Properti File
    public $files = [];

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

        if ($effectiveSlug === 'super_admin') {
            $this->slugBidangYangDibuka = null;
        } else {
            $this->slugBidangYangDibuka = $effectiveSlug;
        }

        // Set default tanggal hari ini agar UX lebih cepat
        if (empty($this->tanggal_dibuat)) {
            $this->tanggal_dibuat = now()->format('Y-m-d');
        }
    }

    // === LOGIC AUTO FILL (ADAPTASI DARI AKTIF CREATE) ===

    public function updatedSelectedPergub($value)
    {
        if ($value == 'pergub26') {
            $this->klasifikasiList = Pergub26::orderBy('kode_klasifikasi', 'asc')
                ->get(['id', 'kode_klasifikasi', 'index']);
        } elseif ($value == 'pergub30') {
            $this->klasifikasiList = Pergub30::orderBy('kode_klasifikasi', 'asc')
                ->select('id', 'kode_klasifikasi', 'index as nama_klasifikasi') // Alias agar seragam di view
                ->get();
        } else {
            $this->klasifikasiList = [];
        }

        // Reset form saat ganti Pergub
        $this->resetFormSelection();
    }

    public function updatedKodeKlasifikasi($value)
    {
        // Reset field autofill dasar
        $this->index = '';
        // Note: status_akhir tidak di-reset null total karena ada validation required,
        // tapi akan tertimpa jika data pergub ditemukan.

        if (!empty($value)) {
            $record = null;
            if ($this->selectedPergub == 'pergub26') {
                $record = Pergub26::where('kode_klasifikasi', $value)->first();
            } elseif ($this->selectedPergub == 'pergub30') {
                $record = Pergub30::where('kode_klasifikasi', $value)->first();
            }

            if ($record) {
                // Auto Fill Index
                $this->index = $record->index;

                // Auto Fill Retensi Inaktif
                // Pastikan kolom di DB Pergub bernama 'retensi_inaktif'
                $this->masa_retensi_inaktif = (int) $record->retensi_inaktif;

                // Auto Fill Status Akhir
                // Pastikan value di DB Pergub ('Musnah'/'Permanen') sesuai dengan values di validation rules
                $this->status_akhir = $record->status_akhir;
            }
        }

        // Hitung nomor berkas otomatis setiap klasifikasi berubah
        $this->calculateNomorBerkas();
    }

    public function updatedKurunWaktu($value)
    {
        // Hitung nomor berkas otomatis setiap tahun berubah
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

        // Logic penentuan bidang untuk Super Admin
        if ($user->role === 'super_admin') {
            $bidang = Session::get('current_bidang', $user->role);
        }

        // Query ke tabel ArsipInaktif (bukan ArsipAktif)
        $count = ArsipInaktif::where('kode_klasifikasi', $this->kode_klasifikasi)
            ->where('kurun_waktu', $this->kurun_waktu)
            ->where('bidang', $bidang)
            ->count();

        $this->nomor_berkas = (string)($count + 1);
    }

    private function resetFormSelection()
    {
        $this->kode_klasifikasi = '';
        $this->nomor_berkas = '';
        $this->masa_retensi_inaktif = 0;
        $this->index = '';
        $this->status_akhir = '';
    }

    // === VALIDASI & SAVE ===

    protected $rules = [
        'selectedPergub' => 'nullable|string',
        'kode_klasifikasi' => 'required|string|max:50',
        'uraian' => 'required|string|max:500',
        'nomor_box' => 'nullable|string|max:50',
        'nomor_berkas' => 'required|string|max:50',
        'index' => 'nullable|string|max:255',
        'masa_retensi_inaktif' => 'required|integer|min:0',
        'status_akhir' => 'required|in:Musnah,Permanen',
        'kurun_waktu' => 'required|string|max:20',
        'tanggal_dibuat' => 'required|date',
        'jumlah' => 'required|integer|min:1',
        'tingkat_perkembangan' => 'required|in:Asli,Fotokopi',
        'klasifikasi_keamanan' => 'required|in:Terbuka,Terbatas,Rahasia,Sangat rahasia',
        'klasifikasi_akses' => 'required|in:internal dan eksternal,Eselon II,Eselon III,Eselon IV',
        'keterangan' => 'nullable|string',
        'files.*' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
        'files' => 'max:5',
    ];

    public function save()
    {
        $this->validate();

        $user = Auth::user();
        $currentBidang = Session::get('current_bidang');
        $bidang = ($user->role === 'super_admin' && $currentBidang) ? $currentBidang : $user->role;

        // === LOGIKA TANGGAL & RETENSI ===
        // Menggunakan tanggal_dibuat sebagai patokan awal retensi (sesuaikan dengan aturan instansi)
        // Jika patokan retensi adalah akhir tahun fiskal (31 Des), logika bisa disesuaikan
        $baseDate = Carbon::parse($this->tanggal_dibuat);
        $retensiTahun = (int) $this->masa_retensi_inaktif;
        $tglBerakhir = $baseDate->copy()->addYears($retensiTahun);
        // ==========================================================

        try {
            $arsip = ArsipInaktif::create([
                'kode_klasifikasi' => $this->kode_klasifikasi,
                'uraian' => $this->uraian,
                'nomor_box' => $this->nomor_box,
                'nomor_berkas' => $this->nomor_berkas,
                'index' => $this->index,
                'masa_retensi_inaktif' => $this->masa_retensi_inaktif,
                'status_akhir' => $this->status_akhir,
                'kurun_waktu' => $this->kurun_waktu,
                'tanggal_dibuat' => $this->tanggal_dibuat,
                'jumlah' => $this->jumlah,
                'tingkat_perkembangan' => $this->tingkat_perkembangan,
                'klasifikasi_keamanan' => $this->klasifikasi_keamanan,
                'klasifikasi_akses' => $this->klasifikasi_akses,
                'keterangan' => $this->keterangan,
                'bidang' => $bidang,
                'user_id' => $user->id,

                // === DATA PENTING INAKTIF ===
                'status_pengolahan' => 'inaktif',
                'tgl_retensi_berakhir' => $tglBerakhir,
                'tanggal_dipindah' => now(),
            ]);

            // --- LOGIKA UPLOAD FILE ---
            if (!empty($this->files)) {
                foreach ($this->files as $file) {
                    $path = $file->store('arsip/inaktif/' . $arsip->id, 'public');

                    FileArsip::create([
                        'arsip_inaktif_id' => $arsip->id,
                        'arsip_aktif_id' => null,
                        'nama_file_asli' => $file->getClientOriginalName(),
                        'path_file' => $path,
                        'tipe_file' => $file->getMimeType(),
                        'ukuran_file' => $file->getSize(),
                        'uraian' => $this->uraian,
                        'tanggal_file' => $this->tanggal_dibuat,
                        'jumlah' => 1,
                        'tingkat_perkembangan' => $this->tingkat_perkembangan,
                    ]);
                }
            }
            // --- AKHIR LOGIKA UPLOAD FILE ---

            session()->flash('success', 'Arsip Inaktif berhasil ditambahkan.');
            return $this->redirect(route('arsip.inaktif.index'), navigate: true);

        } catch (\Exception $e) {
            // Error handling jika ada duplikasi atau error database lainnya
            Log::error('Gagal simpan inaktif: ' . $e->getMessage());
            session()->flash('error', 'Gagal menyimpan data. Pastikan Nomor Berkas/Tahun tidak duplikat.');
        }
    }

    public function render()
    {
        return view('livewire.arsip.inaktif-create');
    }
}