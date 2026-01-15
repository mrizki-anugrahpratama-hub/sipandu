<?php

namespace App\Livewire\Arsip;

use Livewire\Component;
use App\Models\ArsipAktif;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class AktifUploadFile extends Component
{
    use WithFileUploads;

    public ArsipAktif $arsip;

    // Properti untuk di-binding
    public $uraian;
    public $tanggal_file;
    public $file_arsip;
    public $jumlah;
    public $tingkat_perkembangan;

    public function mount($id)
    {
        $this->arsip = ArsipAktif::findOrFail($id);

        // Set default
        $this->tanggal_file = now()->format('Y-m-d');
        $this->jumlah = 1; 
        $this->tingkat_perkembangan = 'Asli';
    }

    protected function rules()
    {
        return [
            'uraian' => 'required|string|max:255',
            'tanggal_file' => 'required|date',
            'file_arsip' => 'required|file|mimes:pdf,jpg,jpeg,png,docx,xlsx|max:10240',
            'jumlah' => 'required|integer|min:1',
            'tingkat_perkembangan' => 'required|string',
        ];
    }

    public function save()
    {
        $this->validate();

        try {
            $file = $this->file_arsip;
            
            // 1. MEMBUAT NAMA FILE BARU
            // Ini menjawab pertanyaan Anda: Nama file memang sengaja diubah 
            // mengikuti inputan 'Uraian' agar rapi dan unik.
            $namaFileUnik = Str::slug($this->uraian) . '-' . time() . '.' . $file->extension();
            
            // 2. MENYIMPAN FILE (PERBAIKAN UTAMA DI SINI)
            // [FIX] Menambahkan parameter 'public' agar file masuk ke storage/app/public
            // [FIX] Mengubah 'arsip-files' jadi 'arsip_files' (biar konsisten dengan folder Anda)
            $path = $file->storeAs('arsip_files', $namaFileUnik, 'public');

            // Simpan Data ke Database
            $this->arsip->files()->create([
                'uraian' => $this->uraian,
                'tanggal_file' => $this->tanggal_file,
                'jumlah' => $this->jumlah,
                'tingkat_perkembangan' => $this->tingkat_perkembangan,

                // Nama file asli tetap kita simpan di database untuk referensi
                'nama_file_asli' => $file->getClientOriginalName(),
                
                // Path inilah yang nanti dipanggil oleh browser
                'path_file' => $path, 
                
                'tipe_file' => $file->getMimeType(),
                'ukuran_file' => $file->getSize(),
            ]);

            // Update 'jumlah' di arsip induk
            $totalJumlahItem = $this->arsip->files()->sum('jumlah');
            $this->arsip->update(['jumlah' => $totalJumlahItem]);

            session()->flash('success', 'File arsip baru berhasil di-upload!');
            return $this->redirectRoute('arsip.aktif.show', ['id' => $this->arsip->id]);
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal meng-upload file: ' . $e->getMessage());
        }
    }

    public function render()
    {
        $data = [
            'slugBidangYangDibuka' => $this->arsip->bidang ?? 'default-slug',
            'namaBidangYangDibuka' => Str::title($this->arsip->bidang ?? 'Default Bidang')
        ];

        return view('livewire.arsip.aktif-upload-file', $data)
            ->layout('layouts.app', $data);
    }
}