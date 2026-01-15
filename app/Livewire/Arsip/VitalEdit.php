<?php

namespace App\Livewire\Arsip;

use Livewire\Component;
use App\Models\ArsipVital;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Illuminate\Support\Str;

#[Layout('layouts.app')]
class VitalEdit extends Component
{
    // Properti untuk header
    public $namaBidangYangDibuka;
    public $slugBidangYangDibuka;

    // Properti form
    public $arsipId;
    public $asal_arsip;
    public $nomor_berkas;
    public $kode_klasifikasi;
    public $jenis_series_arsip;
    public $isi_berkas;
    public $bulan_tahun;
    public $jumlah_satuan;
    public $klasifikasi_keamanan;
    public $keterangan;
    public $retensi_arsip_vital;
    public $lokasi_simpan;
    public $metode_perlindungan;
    public $keterangan_tambahan;
    public $kondisi_arsip; // [TAMBAHAN] Properti untuk kolom BARU

    // [DIUBAH] mount() sekarang juga mengatur header
    public function mount($id)
    {
        $arsip = ArsipVital::findOrFail($id);
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
        $this->asal_arsip = $arsip->asal_arsip;
        $this->nomor_berkas = $arsip->nomor_berkas;
        $this->kode_klasifikasi = $arsip->kode_klasifikasi;
        $this->jenis_series_arsip = $arsip->jenis_series_arsip;
        $this->isi_berkas = $arsip->isi_berkas;
        $this->bulan_tahun = $arsip->bulan_tahun;
        $this->jumlah_satuan = $arsip->jumlah_satuan;
        $this->klasifikasi_keamanan = $arsip->klasifikasi_keamanan;
        $this->keterangan = $arsip->keterangan;
        $this->retensi_arsip_vital = $arsip->retensi_arsip_vital;
        $this->lokasi_simpan = $arsip->lokasi_simpan;
        $this->metode_perlindungan = $arsip->metode_perlindungan;
        $this->keterangan_tambahan = $arsip->keterangan_tambahan;
        $this->kondisi_arsip = $arsip->kondisi_arsip; // [TAMBAHAN] Muat data kondisi arsip

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

    protected $rules = [
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
        'kondisi_arsip' => 'required|string|max:255', // [TAMBAHAN] Validasi kondisi arsip
    ];

    public function update()
    {
        $this->validate();

        $arsip = ArsipVital::findOrFail($this->arsipId);
        
        $arsip->update([
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
            'kondisi_arsip' => $this->kondisi_arsip, // [TAMBAHAN] Perbarui kondisi arsip
        ]);

        session()->flash('success', 'Arsip Vital berhasil diperbarui!');
        return redirect()->route('arsip.vital.index');
    }

    // [DIUBAH] render() sekarang mengirim data header
    public function render()
    {
        return view('livewire.arsip.vital-edit', [
            'namaBidangYangDibuka' => $this->namaBidangYangDibuka,
            'slugBidangYangDibuka' => $this->slugBidangYangDibuka,
        ]);
    }
}