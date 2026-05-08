<?php

namespace App\Livewire\Arsip;

use App\Models\ArsipInaktif;
use App\Models\FileArsip;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\ModelNotFoundException;
// use Livewire\Attributes\Layout; // [PERUBAHAN 1] Baris ini tidak dipakai lagi
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Attributes\Url;

// [PERUBAHAN 1] Hapus atau komentari atribut Layout di sini
// #[Layout('layouts.app')] 
class InaktifShow extends Component
{
    use WithFileUploads;

    // Parameter Route harus berupa $id jika tidak menggunakan Route Model Binding eksplisit
    public $arsip;
    public $arsipId; // Digunakan untuk menangkap ID dari rute

    // Properti untuk breadcrumb
    public $namaBidangYangDibuka;
    public $slugBidangYangDibuka;

    public $uploadedFiles = [];

    // Properti untuk Modal Konfirmasi Hapus
    public $confirmingFileDeletion = false;
    public $deletingFileId = null;

    #[Url] // [TAMBAHKAN INI] agar context ?from=inaktif tetap ada di URL

    public $from;
    /**
     * Mount component, load data arsip berdasarkan ID.
     */
    public function mount($id)
    {
        // Cari arsip dan muat relasi 'files'
        $this->arsip = ArsipInaktif::with('files')->findOrFail($id);

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

    /**
     * Mengisi info bidang/unit kerja untuk breadcrumb
     */
    private function muatInfoBidang()
    {
        $namaBidangFinal = 'Nama Bidang';
        $slugBidangFinal = null;

        if (isset($this->arsip->bidang)) {
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
            
            $namaDariMap = $roleMap[$this->arsip->bidang] ?? 'Unit Kerja Tidak Dikenal';
            $namaBidangFinal = Str::title(strtolower($namaDariMap));
            $slugBidangFinal = $this->arsip->bidang;
        } 

        $this->namaBidangYangDibuka = $namaBidangFinal;
        $this->slugBidangYangDibuka = $slugBidangFinal;
    }

    // Fungsi untuk membuka modal konfirmasi
    public function confirmFileDelete($id)
    {
        $this->deletingFileId = $id;
        $this->confirmingFileDeletion = true;
    }

    // Fungsi untuk menutup modal
    public function cancelDelete()
    {
        $this->confirmingFileDeletion = false;
        $this->deletingFileId = null;
    }

    /**
     * Method untuk menghapus file
     */
    public function deleteFile()
    {
        if (!$this->deletingFileId) { return; }

        try {
            // Menggunakan Model FileArsip
            $file = FileArsip::findOrFail($this->deletingFileId); 

            if ($file->arsip_inaktif_id !== $this->arsip->id) {
                session()->flash('error', 'Aksi tidak diizinkan.');
                $this->cancelDelete(); 
                return;
            }

            // Cek fisik file di storage
            if (Storage::disk('public')->exists($file->path_file)) { 
                Storage::disk('public')->delete($file->path_file);
            }
            $file->delete();

            $this->arsip->load('files'); 
            session()->flash('success', 'File berhasil dihapus.');

        } catch (\Exception $e) {
            Log::error('Gagal hapus file inaktif: ' . $e->getMessage());
            session()->flash('error', 'Gagal menghapus file.');
        } finally {
            $this->cancelDelete();
        }
    }

    /**
     * Render view
     * [PERUBAHAN 2]: Menggunakan method chain ->layout() untuk mengirim data ke Layout Utama
     */
    public function render()
    {
        return view('livewire.arsip.inaktif-show', [
            'arsip' => $this->arsip,
        ])
        ->layout('layouts.app', [
            'title' => 'Detail Arsip',
            // [PENTING] Kita kirim variabel $arsip ke Layout agar Sidebar bisa membacanya
            'arsip' => $this->arsip,
            'from' => $this->from // Kirim juga parameter 'from' agar bisa digunakan di Layout
        ]);
    }
}