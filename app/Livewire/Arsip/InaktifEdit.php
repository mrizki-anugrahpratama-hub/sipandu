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

    // [DIUBAH] mount() sekarang juga mengatur header
    public function mount($id)
    {
        $arsip = ArsipInaktif::findOrFail($id);
        $user = Auth::user();
        $currentBidang = Session::get('current_bidang');
        
        // VALIDASI PERMISSION
        if ($user->role !== 'super_admin') {
            if ($arsip->bidang !== $user->role) {
                abort(403, 'Anda tidak memiliki akses untuk mengedit arsip ini.');
            }
        } else {
            if ($currentBidang && $arsip->bidang !== $currentBidang) {
                abort(403, 'Anda tidak memiliki akses untuk mengedit arsip ini.');
            }
        }

        // Load data form
        $this->arsipId = $arsip->id;
        $this->nomor_box = $arsip->nomor_box;
        $this->nomor_berkas = $arsip->nomor_berkas;
        $this->kode_klasifikasi = $arsip->kode_klasifikasi;
        $this->index = $arsip->index;
        $this->uraian = $arsip->uraian;
        
        // [PERBAIKAN 4] Load data dari kolom yang benar
        $this->kurun_waktu = $arsip->kurun_waktu;
        $this->jumlah = $arsip->jumlah;
        
        $this->klasifikasi_keamanan = $arsip->klasifikasi_keamanan;
        $this->klasifikasi_akses = $arsip->klasifikasi_akses;
        $this->tingkat_perkembangan = $arsip->tingkat_perkembangan;
        
        // [PERBAIKAN 5] Load data dari kolom yang benar
        $this->status_akhir = $arsip->status_akhir;

        // [BARU] Logika untuk Header/Breadcrumb
        $effectiveSlug = $user->role; 
        if ($user->role === 'super_admin') {
            if ($currentBidang) {
                $effectiveSlug = $currentBidang;
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
        return redirect()->route('arsip.inaktif.index');
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