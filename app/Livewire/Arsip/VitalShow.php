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

        $namaDariMap = $roleMap[$effectiveSlug] ?? 'UNIT TIDAK DIKENAL';
        $this->namaBidangFinal = Str::title(strtolower($namaDariMap));
        
        if ($user->role === 'super_admin' && !$currentBidangOnSession) {
            $this->slugBidangFinal = null;
        } else {
            $this->slugBidangFinal = $effectiveSlug;
        }
    }

    // === LOGIKA MODAL ===
    public function openModal()
    {
        $this->reset(['uraian', 'file_upload']);
        $this->tanggal_file = date('Y-m-d');
        $this->jumlah = 1;
        $this->tingkat_perkembangan = 'Asli';
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
            'tingkat_perkembangan' => 'required|string',
            'file_upload' => 'required|file|max:10240', // Max 10MB
        ]);

        try {
            // 1. Upload File ke Storage
            // Folder: public/arsip-vital/{id_arsip}/
            $path = $this->file_upload->store('arsip-vital/' . $this->arsip->id, 'public');

            // 2. Simpan ke Database via Relasi
            // [PERBAIKAN] Menambahkan 'nama_file_asli'
            $this->arsip->files()->create([
                'uraian' => $this->uraian,
                'tanggal_file' => $this->tanggal_file,
                'jumlah' => $this->jumlah,
                'tingkat_perkembangan' => $this->tingkat_perkembangan,
                'path_file' => $path,
                // Mengambil nama asli file (misal: "laporan.pdf")
                'nama_file_asli' => $this->file_upload->getClientOriginalName(), 
            ]);

            $this->closeModal();
            $this->arsip->refresh(); // Refresh data agar tabel update
            session()->flash('success', 'File berhasil ditambahkan!');

        } catch (\Exception $e) {
            session()->flash('error', 'Gagal upload file: ' . $e->getMessage());
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