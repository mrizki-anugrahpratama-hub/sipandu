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

    public $arsip;

    public function mount($id)
    {
        $this->arsip = ArsipAktif::findOrFail($id);
        $user = auth()->user();

        // Logika Otoritas (Sudah Benar)
        $lingkupSekretariat = ['umum_kepegawaian', 'keuangan', 'penyusunan_program', 'sekretariat'];
        $isSuperAdmin = ($user->role === 'super_admin');
        $isPemilikArsip = ($user->role === $this->arsip->bidang);
        $isSekretariatManager = ($user->role === 'sekretariat' && in_array($this->arsip->bidang, $lingkupSekretariat));

        if (!$isSuperAdmin && !$isPemilikArsip && !$isSekretariatManager) {
            abort(403, 'ANDA TIDAK MEMILIKI AKSES UNTUK MENGEDIT ARSIP INI.');
        }

        // [PERBAIKAN KRUSIAL] Gunakan $this->arsip, bukan $arsip
        $this->arsipId = $this->arsip->id;
        $this->kode_klasifikasi = $this->arsip->kode_klasifikasi;
        $this->nomor_berkas = $this->arsip->nomor_berkas;
        $this->uraian = $this->arsip->uraian; 
        $this->kurun_waktu = $this->arsip->kurun_waktu;
        $this->jumlah = $this->arsip->jumlah; 
        
        $this->masa_retensi_aktif = $this->arsip->masa_retensi_aktif;
        $this->masa_retensi_inaktif = $this->arsip->masa_retensi_inaktif;
        $this->status_akhir = $this->arsip->status_akhir;
        
        // Pastikan kolom tanggal_dibuat adalah instance Carbon di Model agar bisa di-format
        $this->tanggal_dibuat = $this->arsip->tanggal_dibuat ? $this->arsip->tanggal_dibuat->format('Y-m-d') : null;

        $this->index = $this->arsip->index;
        $this->klasifikasi_keamanan = $this->arsip->klasifikasi_keamanan;
        $this->klasifikasi_akses = $this->arsip->klasifikasi_akses;
        $this->tingkat_perkembangan = $this->arsip->tingkat_perkembangan;

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
            return redirect()->route('arsip.aktif.index', ['filterBidang' => $this->slugBidangYangDibuka]);

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