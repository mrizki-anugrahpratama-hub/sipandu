<?php

namespace App\Livewire\Arsip;

use Livewire\Component;
use App\Models\ArsipAktif;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Illuminate\Support\Str;

#[Layout('layouts.app')]
class AktifEdit extends Component
{
    // Properti untuk header
    public $namaBidangYangDibuka;
    public $slugBidangYangDibuka;

    // Properti dari kode Anda
    public $arsipId;
    public $kode_klasifikasi;
    public $nomor_berkas;
    public $uraian;
    public $kurun_waktu;
    public $jumlah;
    public $status_akhir;

    // [PERBAIKAN 1] Properti disamakan dengan migrasi (nama & kolom baru)
    public $masa_retensi_aktif;
    public $masa_retensi_inaktif;
    public $tanggal_dibuat;
    
    // Properti untuk kolom tambahan
    public $index;
    public $klasifikasi_keamanan;
    public $klasifikasi_akses;
    public $tingkat_perkembangan;

    
    public function mount($id)
    {
        $arsip = ArsipAktif::findOrFail($id);
        $user = Auth::user();
        $currentBidang = Session::get('current_bidang');
        
        // VALIDASI PERMISSION (dari kode Anda, sudah benar)
        if ($user->role !== 'super_admin') {
            if ($arsip->bidang !== $user->role) {
                abort(403, 'Anda tidak memiliki akses untuk mengedit arsip ini.');
            }
        } else {
            if ($currentBidang && $arsip->bidang !== $currentBidang) {
                abort(403, 'Anda tidak memiliki akses untuk mengedit arsip ini.');
            }
        }

        // [PERBAIKAN 2] Load data dari kolom yang benar ke properti yang benar
        $this->arsipId = $arsip->id;
        $this->kode_klasifikasi = $arsip->kode_klasifikasi;
        $this->nomor_berkas = $arsip->nomor_berkas;
        $this->uraian = $arsip->uraian; 
        $this->kurun_waktu = $arsip->kurun_waktu;
        $this->jumlah = $arsip->jumlah; 
        
        // Mengisi properti baru dari database
        $this->masa_retensi_aktif = $arsip->masa_retensi_aktif;
        $this->masa_retensi_inaktif = $arsip->masa_retensi_inaktif;
        $this->status_akhir = $arsip->status_akhir;
        $this->tanggal_dibuat = $arsip->tanggal_dibuat->format('Y-m-d'); // Format untuk input date

        $this->index = $arsip->index;
        $this->klasifikasi_keamanan = $arsip->klasifikasi_keamanan;
        $this->klasifikasi_akses = $arsip->klasifikasi_akses;
        $this->tingkat_perkembangan = $arsip->tingkat_perkembangan;

        // Logika untuk Header/Breadcrumb (dari kode Anda, sudah benar)
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

    // [PERBAIKAN 3] Validasi rules disamakan dengan migrasi & AktifCreate
    protected function rules()
    {
        return [
            'kode_klasifikasi' => 'required|string|max:255',
            'nomor_berkas' => 'required|string|max:255',
            'uraian' => 'required|string|max:255',
            'kurun_waktu' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
            
            // Menggunakan nama properti & tipe data yang benar
            'masa_retensi_aktif' => 'required|integer|min:1',
            'masa_retensi_inaktif' => 'required|integer|min:1',
            'status_akhir' => 'required|in:Musnah,Permanen',
            'tanggal_dibuat' => 'required|date', // <-- Validasi yang hilang

            'index'                 => 'nullable|string|max:100',
            'klasifikasi_keamanan'  => 'nullable|string|in:Terbuka,Terbatas,Rahasia,Sangat rahasia',
            'klasifikasi_akses'     => 'nullable|string|in:internal dan eksternal,Eselon II,Eselon III,Eselon IV',
            'tingkat_perkembangan'  => 'nullable|string|max:100',
        ];
    }

    protected $messages = [
        'kode_klasifikasi.required' => 'Kode Klasifikasi wajib diisi.',
        'nomor_berkas.required' => 'Nomor Berkas wajib diisi.',
        'tanggal_dibuat.required' => 'Tanggal dibuat wajib diisi.',
    ];

    public function update()
    {
        // Validasi semua properti
        $this->validate($this->rules());

        $arsip = ArsipAktif::findOrFail($this->arsipId);
        
        try {
            // [PERBAIKAN 4] Update kolom di database dengan nama yang benar
            $arsip->update([
                'kode_klasifikasi' => $this->kode_klasifikasi,
                'nomor_berkas' => $this->nomor_berkas,
                'uraian' => $this->uraian,
                'kurun_waktu' => $this->kurun_waktu,
                'jumlah' => $this->jumlah,
                
                // Menyimpan data kolom baru
                'masa_retensi_aktif' => $this->masa_retensi_aktif,
                'masa_retensi_inaktif' => $this->masa_retensi_inaktif,
                'status_akhir' => $this->status_akhir,
                'tanggal_dibuat' => $this->tanggal_dibuat, // <-- Menyimpan tanggal

                'index'                 => $this->index,
                'klasifikasi_keamanan'  => $this->klasifikasi_keamanan,
                'klasifikasi_akses'     => $this->klasifikasi_akses,
                'tingkat_perkembangan'  => $this->tingkat_perkembangan,
            ]);

            session()->flash('success', 'Arsip Aktif berhasil diperbarui!');
            return redirect()->route('arsip.aktif.index');

        } catch (\Exception $e) {
            if (str_contains($e->getMessage(), 'arsip_unik_constraint')) {
                session()->flash('error', 'Gagal: Arsip dengan Kode, Tahun, dan Nomor Berkas ini sudah ada.');
            } else {
                Log::error('Gagal memperbarui arsip: ' . $e->getMessage());
                session()->flash('error', 'Terjadi kesalahan saat memperbarui arsip.');
            }
        }
    }
    
    public function render()
    {
        return view('livewire.arsip.aktif-edit', [
            'namaBidangYangDibuka' => $this->namaBidangYangDibuka,
            'slugBidangYangDibuka' => $this->slugBidangYangDibuka,
        ]);
    }
}