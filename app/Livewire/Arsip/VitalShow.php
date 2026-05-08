<?php

namespace App\Livewire\Arsip;

use Livewire\Component;
use Livewire\WithFileUploads; // [WAJIB] Untuk upload file
use App\Models\ArsipVital;
use App\Models\FileArsip;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class VitalShow extends Component
{
    use WithFileUploads; // [WAJIB] Aktifkan fitur upload

    public $arsip;
    public $namaBidangYangDibuka;
    public $slugBidangYangDibuka;
    
    // Properti Header
    public $namaBidangFinal;
    public $slugBidangFinal;

    // === PROPERTI FORM UPLOAD ===
    public $isModalOpen = false; // Kontrol modal
    public $uraian;
    public $tanggal_file;
    public $jumlah = 1;
    public $tingkat_perkembangan = 'Asli'; // Default
    public $file_upload; // Temporary file

    public $isEditMode = false;
    public $fileIdToEdit = null;
    public $file_baru; // Untuk upload file baru di modal
    public $previewUrl = null;
    public $fileType = null;
    public $showFull = false;
    public $satuan = 'Lembar';

    public function mount($id)
    {
        $this->arsip = ArsipVital::with('files')->findOrFail($id);
        
        // Default tanggal hari ini
        $this->tanggal_file = date('Y-m-d');

        // Logika Header (Sama seperti sebelumnya)
        $user = Auth::user();
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

        $effectiveSlug = $user->role; 
        if ($user->role === 'super_admin') {
            $currentBidangOnSession = Session::get('current_bidang');
            if ($currentBidangOnSession) {
                $effectiveSlug = $currentBidangOnSession;
            }
        }

        $namaDariMap = $roleMap[$effectiveSlug] ?? 'UNIT KERJA';
        // 3. Set variabel untuk digunakan di Blade
        $namaDariMap = $roleMap[$effectiveSlug] ?? 'UNIT KERJA';
        $this->namaBidangYangDibuka = Str::title(strtolower($namaDariMap));
        $this->slugBidangYangDibuka = $effectiveSlug;
    }

    // === LOGIKA MODAL ===
    public function openModal($fileId = null)
    {
        $this->reset(['uraian', 'file_baru', 'previewUrl', 'fileType', 'showFull']);
        
        if ($fileId) {
            $this->isEditMode = true;
            $this->fileIdToEdit = $fileId;
            $file = FileArsip::findOrFail($fileId);
            $this->uraian = $file->uraian;
            $this->tanggal_file = $file->tanggal_file ? $file->tanggal_file->format('Y-m-d') : date('Y-m-d');
            $this->jumlah = $file->jumlah;
            $this->satuan = $file->satuan ?? 'Lembar';
            $this->tingkat_perkembangan = $file->tingkat_perkembangan;
            $this->previewUrl = $file->path_file ? Storage::url($file->path_file) : null;
            $this->fileType = $file->tipe_file;
        } else {
            $this->isEditMode = false;
            $this->tanggal_file = date('Y-m-d');
            $this->jumlah = 1;
            $this->satuan = 'Lembar';
            $this->tingkat_perkembangan = 'Asli';
        }
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    // === LOGIKA SIMPAN FILE ===
    public function saveFile()
    {
        $this->validate([
            'uraian' => 'required|string|max:255',
            'tanggal_file' => 'required|date',
            'jumlah' => 'required|integer|min:1',
            'satuan' => 'required',
            'tingkat_perkembangan' => 'required|string',
            'file_upload' => 'required|file|max:10240', // Max 10MB
        ]);

        try {
            $data = [
                'uraian' => $this->uraian,
                'tanggal_file' => $this->tanggal_file,
                'jumlah' => $this->jumlah,
                'satuan' => $this->satuan,
                'tingkat_perkembangan' => $this->tingkat_perkembangan,
            ];
    
            if ($this->file_baru) {
                $namaFileUnik = Str::slug($this->uraian) . '-' . time() . '.' . $this->file_baru->extension();
                $path = $this->file_baru->storeAs('arsip_vitals', $namaFileUnik, 'public');
                
                $data['path_file'] = $path;
                $data['nama_file_asli'] = $this->file_baru->getClientOriginalName();
                $data['tipe_file'] = $this->file_baru->getMimeType();
                $data['ukuran_file'] = $this->file_baru->getSize();
            }
    
            if ($this->isEditMode) {
                $fileOld = FileArsip::findOrFail($this->fileIdToEdit);
                if ($this->file_baru && $fileOld->path_file && Storage::disk('public')->exists($fileOld->path_file)) {
                    Storage::disk('public')->delete($fileOld->path_file);
                }
                $fileOld->update($data);
            } else {
                $this->arsip->files()->create($data);
            }
    
            $this->closeModal();
            $this->arsip->refresh();
            session()->flash('success', 'Item berkas vital berhasil disimpan.');
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal menyimpan: ' . $e->getMessage());
        }
    }

    // === LOGIKA HAPUS FILE ===
    public function deleteFile($fileId)
    {
        try {
            $file = FileArsip::findOrFail($fileId);

            // 1. Hapus Fisik File
            if ($file->path_file && Storage::disk('public')->exists($file->path_file)) {
                Storage::disk('public')->delete($file->path_file);
            }

            // 2. Hapus Record DB
            $file->delete();

            $this->arsip->refresh();
            session()->flash('success', 'File berhasil dihapus!');
            
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal menghapus file.');
        }
    }

    public function render()
    {
        return view('livewire.arsip.vital-show');
    }
}