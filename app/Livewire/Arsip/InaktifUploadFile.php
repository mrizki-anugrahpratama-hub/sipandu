<?php

namespace App\Livewire\Arsip;

use Livewire\Component;
use App\Models\ArsipInaktif; // Pastikan model ini diimpor
use App\Models\File; // Pastikan model file diimpor
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class InaktifUploadFile extends Component
{
    public $id;
    public $arsipInaktif;
    public $filesList; // Daftar file yang sudah terunggah

    public function mount($id)
    {
        $this->id = $id;
        // Ambil data arsip berdasarkan ID dan load relasi files
        $this->arsipInaktif = ArsipInaktif::with('files')->findOrFail($id);
        
        // Simpan daftar file yang sudah ada
        $this->filesList = $this->arsipInaktif->files;
    }
    
    public function render()
    {
        return view('livewire.arsip.inaktif-upload-file');
    }
}