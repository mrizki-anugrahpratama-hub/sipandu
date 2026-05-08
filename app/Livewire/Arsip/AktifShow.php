<?php

namespace App\Livewire\Arsip;

use App\Models\ArsipAktif;
use App\Models\FileArsip;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
// [DIHAPUS] WithFileUploads tidak diperlukan di halaman ini
// use Livewire\WithFileUploads; 
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

#[Layout('layouts.app')]
class AktifShow extends Component
{
    // [DIHAPUS] Properti upload file tidak diperlukan di sini
    // use WithFileUploads;
    // public $uploadedFiles = [];

    public ArsipAktif $arsip;

    // Properti untuk header (dari kode Anda)
    public $namaBidangYangDibuka;
    public $slugBidangYangDibuka;

    // [BARU] Properti untuk modal hapus file (dari kode saya)
    public $confirmingFileDeletion = false;
    public $fileIdToDelete = null;

    /**
     * Method mount() dipanggil saat komponen pertama kali dimuat.
     * (Logika header dari kode Anda sudah digabung)
     */
    public function mount($id)
    {
        // Cari arsip dan muat relasi 'files'
        $this->arsip = ArsipAktif::with('files')->findOrFail($id);

        // Logika untuk Header/Breadcrumb (dari kode Anda)
        $namaBidangFinal = 'Nama Bidang'; // Default
        $slugBidangFinal = null;

        if (isset($this->arsip->bidang)) {
            // Kita gunakan data dari arsip yang sedang dibuka
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
            $namaDariMap = $roleMap[$this->arsip->bidang] ?? 'UNIT TIDAK DIKENAL';
            $namaBidangFinal = Str::title(strtolower($namaDariMap));
            $slugBidangFinal = $this->arsip->bidang;
        }
        
        // Simpan ke properti publik
        $this->namaBidangYangDibuka = $namaBidangFinal;
        $this->slugBidangYangDibuka = $slugBidangFinal;
    }

    // [DIHAPUS] Method uploadFiles() dihapus karena kita pakai Pilihan A

    /**
     * [BARU] Method untuk menampilkan modal konfirmasi hapus.
     */
    public function confirmFileDelete($fileId)
    {
        $this->fileIdToDelete = $fileId;
        $this->confirmingFileDeletion = true;
    }

    /**
     * [BARU] Method untuk membatalkan penghapusan.
     */
    public function cancelDelete()
    {
        $this->fileIdToDelete = null;
        $this->confirmingFileDeletion = false;
    }

    /**
     * [DIGABUNG & DIPERBAIKI] Method untuk menghapus file.
     * Menggunakan logika modal konfirmasi saya + logika hapus Anda.
     */
    // File: app/Livewire/Arsip/AktifShow.php

    public function deleteFile()
    {
        if (!$this->fileIdToDelete) {
            return;
        }

        try {
            $file = FileArsip::findOrFail($this->fileIdToDelete);

            // [PERBAIKAN] Cek string path_file sebelum cek ke storage
            if ($file->path_file && Storage::disk('public')->exists($file->path_file)) {
                Storage::disk('public')->delete($file->path_file);
            }
            
            $namaFileAsli = $file->nama_file_asli;
            $file->delete();

            // Update total jumlah di induk
            $this->arsip->update([
                'jumlah' => $this->arsip->files()->sum('jumlah')
            ]);

            $this->arsip = $this->arsip->fresh('files');
            session()->flash('success', 'Data berhasil dihapus.');

        } catch (\Exception $e) {
            Log::error('Gagal hapus file: ' . $e->getMessage());
            session()->flash('error', 'Gagal menghapus data.');
        } finally {
            $this->cancelDelete();
        }
    }


    /**
     * Render komponen (menampilkan view)
     */
    public function render()
    {
        // Kirim variabel ke view agar bisa dibaca oleh <x-slot name="header">
        return view('livewire.arsip.aktif-show', [
            'namaBidangYangDibuka' => $this->namaBidangYangDibuka,
            'slugBidangYangDibuka' => $this->slugBidangYangDibuka,
        ]);
    }
}