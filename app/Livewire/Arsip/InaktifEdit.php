<?php

namespace App\Livewire\Arsip;

use Livewire\Component;
use App\Models\ArsipInaktif;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Illuminate\Support\Str; // [DITAMBAHKAN]

#[Layout('layouts.app')]
class InaktifEdit extends Component
{
    // [BARU] Properti untuk header
    public $namaBidangYangDibuka;
    public $slugBidangYangDibuka;
    
    // Properti form
    public $arsipId;
    public $nomor_box;
    public $nomor_berkas;
    public $kode_klasifikasi;
    public $index;
    public $uraian;
    
    // [PERBAIKAN 1] Properti disesuaikan dengan Model & Migrasi
    public $kurun_waktu;
    public $jumlah;
    
    // [PERBAIKAN 2] Nilai default disesuaikan dengan enum migrasi
    public $klasifikasi_keamanan = 'Terbuka'; // Diubah dari 'Biasa'
    public $klasifikasi_akses = '';
    public $tingkat_perkembangan;
    
    // [PERBAIKAN 3] Properti disesuaikan dengan Model & Migrasi
    public $status_akhir;
    public $arsip;

    // [DIUBAH] mount() sekarang juga mengatur header
    public function mount($id)
    {
        $this->arsip = ArsipInaktif::findOrFail($id);
        $user = auth()->user();

        // Logika Otoritas (Sudah Benar)
        $lingkupSekretariat = ['umum_kepegawaian', 'keuangan', 'penyusunan_program', 'sekretariat'];
        $isSuperAdmin = ($user->role === 'super_admin');
        $isPemilikArsip = ($user->role === $this->arsip->bidang);
        $isSekretariatManager = ($user->role === 'sekretariat' && in_array($this->arsip->bidang, $lingkupSekretariat));

        if (!$isSuperAdmin && !$isPemilikArsip && !$isSekretariatManager) {
            abort(403, 'ANDA TIDAK MEMILIKI AKSES UNTUK MENGEDIT ARSIP INI.');
        }

        // Load data form
        $this->arsipId = $this->arsip->id;
        $this->nomor_box = $this->arsip->nomor_box;
        $this->nomor_berkas = $this->arsip->nomor_berkas;
        $this->kode_klasifikasi = $this->arsip->kode_klasifikasi;
        $this->index = $this->arsip->index;
        $this->uraian = $this->arsip->uraian;
        
        // [PERBAIKAN 4] Load data dari kolom yang benar
        $this->kurun_waktu = $this->arsip->kurun_waktu;
        $this->jumlah = $this->arsip->jumlah;
        
        $this->klasifikasi_keamanan = $this->arsip->klasifikasi_keamanan;
        $this->klasifikasi_akses = $this->arsip->klasifikasi_akses;
        $this->tingkat_perkembangan = $this->arsip->tingkat_perkembangan;
        
        // [PERBAIKAN 5] Load data dari kolom yang benar
        $this->status_akhir = $this->arsip->status_akhir;

        // [PERBAIKAN BREADCRUMBS]
        // Gunakan session atau bidang dari arsip itu sendiri agar tidak undefined
        $effectiveSlug = $this->arsip->bidang;

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
        $namaDariMap = $roleMap[$effectiveSlug] ?? 'UNIT KERJA';
        $this->namaBidangYangDibuka = Str::title(strtolower($namaDariMap));
        $this->slugBidangYangDibuka = $effectiveSlug;
    }

    // [PERBAIKAN 6] Rules disesuaikan dengan Model & Migrasi
    protected $rules = [
        'nomor_box' => 'required|string|max:255',
        'nomor_berkas' => 'required|string|max:255',
        'kode_klasifikasi' => 'required|string|max:255',
        'index' => 'required|string|max:255',
        'uraian' => 'required|string',
        
        'kurun_waktu' => 'required|string|max:255',
        'jumlah' => 'required|integer|min:1',
        
        // Enum disesuaikan dengan migrasi
        'klasifikasi_keamanan' => 'required|in:Terbuka,Terbatas,Rahasia,Sangat rahasia',
        'klasifikasi_akses' => 'required|in:internal dan eksternal,Eselon II,Eselon III,Eselon IV',
        'tingkat_perkembangan' => 'required|in:Asli,Fotokopi',
        
        'status_akhir' => 'required|in:Musnah,Permanen',
    ];

    public function update()
    {
        $this->validate();

        $arsip = ArsipInaktif::findOrFail($this->arsipId);
        
        // Update kolom (ini sudah benar)
        $arsip->update([
            'nomor_box' => $this->nomor_box,
            'nomor_berkas' => $this->nomor_berkas,
            'kode_klasifikasi' => $this->kode_klasifikasi,
            'index' => $this->index,
            'uraian' => $this->uraian,
            'kurun_waktu' => $this->kurun_waktu,
            'jumlah' => $this->jumlah,
            'klasifikasi_keamanan' => $this->klasifikasi_keamanan,
            'klasifikasi_akses' => $this->klasifikasi_akses,
            'tingkat_perkembangan' => $this->tingkat_perkembangan,
            'status_akhir' => $this->status_akhir,
        ]);

        session()->flash('success', 'Arsip Inaktif berhasil diperbarui!');
        return redirect()->route('arsip.inaktif.index', ['filterBidang' => $this->slugBidangYangDibuka]);
    }

    // [DIUBAH] render() sekarang mengirim data header
    public function render()
    {
        return view('livewire.arsip.inaktif-edit', [
            'namaBidangYangDibuka' => $this->namaBidangYangDibuka,
            'slugBidangYangDibuka' => $this->slugBidangYangDibuka,
        ]);
    }
}