<?php

namespace App\Livewire\Arsip;

use Livewire\Component;
use App\Models\FileArsip;
use App\Models\ArsipAktif;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class AktifEditFile extends Component
{
    use WithFileUploads;

    public FileArsip $fileArsip;
    public ArsipAktif $arsip;

    // Properti Form
    public $uraian;
    public $tanggal_file;
    public $jumlah;
    public $satuan;
    public $tingkat_perkembangan;
    public $file_baru; // Untuk menampung file pengganti

    public function mount($id)
    {
        // Ambil data file berdasarkan ID dari parameter route
        $this->fileArsip = FileArsip::findOrFail($id);
        
        // Ambil data induknya untuk keperluan redirect kembali ke halaman detail
        $this->arsip = $this->fileArsip->arsipAktif;

        // Load data lama ke dalam properti form
        $this->uraian = $this->fileArsip->uraian;
        $this->tanggal_file = $this->fileArsip->tanggal_file ? $this->fileArsip->tanggal_file->format('Y-m-d') : null;
        $this->jumlah = $this->fileArsip->jumlah;
        $this->satuan = $this->fileArsip->satuan ?? 'Lembar';
        $this->tingkat_perkembangan = $this->fileArsip->tingkat_perkembangan;
    }

    public function save()
    {
        $this->validate([
            'uraian' => 'required|string|max:255',
            'tanggal_file' => 'required|date',
            'jumlah' => 'required|integer|min:1',
            'satuan' => 'required|string',
            'tingkat_perkembangan' => 'required',
            'file_baru' => 'nullable|file|max:10240', // Maks 10MB
        ]);

        try {
            $dataUpdate = [
                'uraian' => $this->uraian,
                'tanggal_file' => $this->tanggal_file,
                'jumlah' => $this->jumlah,
                'satuan' => $this->satuan,
                'tingkat_perkembangan' => $this->tingkat_perkembangan,
            ];

            // Jika user mengunggah file baru (mengganti yang lama atau mengisi yang kosong)
            if ($this->file_baru) {
                // 1. Hapus file lama dari storage (Disk Public) jika ada
                if ($this->fileArsip->path_file && Storage::disk('public')->exists($this->fileArsip->path_file)) {
                    Storage::disk('public')->delete($this->fileArsip->path_file);
                }

                // 2. Simpan file baru dengan nama unik berdasarkan uraian
                $namaFileUnik = Str::slug($this->uraian) . '-' . time() . '.' . $this->file_baru->extension();
                $path = $this->file_baru->storeAs('arsip_files', $namaFileUnik, 'public');

                $dataUpdate['path_file'] = $path;
                $dataUpdate['nama_file_asli'] = $this->file_baru->getClientOriginalName();
                $dataUpdate['tipe_file'] = $this->file_baru->getMimeType();
                $dataUpdate['ukuran_file'] = $this->file_baru->getSize();
            }

            // Eksekusi update ke database
            $this->fileArsip->update($dataUpdate);

            // Sinkronisasi total jumlah item fisik di Berkas Induk (ArsipAktif)
            $this->arsip->update([
                'jumlah' => $this->arsip->files()->sum('jumlah')
            ]);

            session()->flash('success', 'Data item arsip berhasil diperbarui.');
            return redirect()->route('arsip.aktif.show', $this->arsip->id);

        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.arsip.aktif-edit-file');
    }
}