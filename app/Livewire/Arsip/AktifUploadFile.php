<?php

namespace App\Livewire\Arsip;

use Livewire\Component;
use App\Models\ArsipAktif;
// use App\Models\FileArsip;
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
    public $satuan = 'Lembar'; // Nilai default

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
            'jumlah' => 'required|integer|min:1',
            'satuan' => 'required|string',
            'tingkat_perkembangan' => 'required',
            'file_arsip' => 'nullable|file|max:10240',
        ];
    }

    // public function save()
    // {
    //     $this->validate();

    //     try {
    //         $file = $this->file_arsip;
            
    //         // 1. MEMBUAT NAMA FILE BARU
    //         // Ini menjawab pertanyaan Anda: Nama file memang sengaja diubah 
    //         // mengikuti inputan 'Uraian' agar rapi dan unik.
    //         $namaFileUnik = Str::slug($this->uraian) . '-' . time() . '.' . $file->extension();
            
    //         // 2. MENYIMPAN FILE (PERBAIKAN UTAMA DI SINI)
    //         // [FIX] Menambahkan parameter 'public' agar file masuk ke storage/app/public
    //         // [FIX] Mengubah 'arsip-files' jadi 'arsip_files' (biar konsisten dengan folder Anda)
    //         $path = $file->storeAs('arsip_files', $namaFileUnik, 'public');

    //         // Simpan Data ke Database
    //         $this->arsip->files()->create([
    //             'uraian' => $this->uraian,
    //             'tanggal_file' => $this->tanggal_file,
    //             'jumlah' => $this->jumlah,
    //             'tingkat_perkembangan' => $this->tingkat_perkembangan,

    //             // Nama file asli tetap kita simpan di database untuk referensi
    //             'nama_file_asli' => $file->getClientOriginalName(),
                
    //             // Path inilah yang nanti dipanggil oleh browser
    //             'path_file' => $path, 
                
    //             'tipe_file' => $file->getMimeType(),
    //             'ukuran_file' => $file->getSize(),
    //         ]);

    //         // Update 'jumlah' di arsip induk
    //         $totalJumlahItem = $this->arsip->files()->sum('jumlah');
    //         $this->arsip->update(['jumlah' => $totalJumlahItem]);

    //         session()->flash('success', 'File arsip baru berhasil di-upload!');
    //         return $this->redirectRoute('arsip.aktif.show', ['id' => $this->arsip->id]);
    //     } catch (\Exception $e) {
    //         session()->flash('error', 'Gagal meng-upload file: ' . $e->getMessage());
    //     }
    // }

    public function save()
    {
        $this->validate();
    
        try {
            $path = null;
            $namaAsli = null;
            $tipe = null;
            $ukuran = null;
        
            // Logika upload jika file dipilih
            if ($this->file_arsip) {
                // Nama file dibuat rapi berdasarkan uraian + timestamp
                $namaFileUnik = Str::slug($this->uraian) . '-' . time() . '.' . $this->file_arsip->extension();
                $path = $this->file_arsip->storeAs('arsip_files', $namaFileUnik, 'public');
                
                $namaAsli = $this->file_arsip->getClientOriginalName();
                $tipe = $this->file_arsip->getMimeType();
                $ukuran = $this->file_arsip->getSize();
            }
        
            // Simpan menggunakan relasi files()
            // Otomatis mengisi arsip_aktif_id, nomor_item, dan kode_klasifikasi dari induk
            $this->arsip->files()->create([
                'nomor_item'           => $this->arsip->nomor_berkas, // Otomatis ambil dari induk
                'kode_klasifikasi'     => $this->arsip->kode_klasifikasi, // Otomatis ambil dari induk
                'uraian'               => $this->uraian,
                'tanggal_file'         => $this->tanggal_file,
                'jumlah'               => $this->jumlah,
                'satuan'               => $this->satuan, // 'Lembar', 'Berkas', dll
                'tingkat_perkembangan' => $this->tingkat_perkembangan,
                'status_keaslian'      => $this->tingkat_perkembangan, // Menyesuaikan kolom di model FileArsip
                'nama_file_asli'       => $namaAsli,
                'path_file'            => $path, 
                'tipe_file'            => $tipe,
                'ukuran_file'          => $ukuran,
            ]);
        
            // Hitung ulang total jumlah item fisik di Berkas Induk
            $this->arsip->update([
                'jumlah' => $this->arsip->files()->sum('jumlah')
            ]);
        
            session()->flash('success', 'Item arsip berhasil disimpan ke dalam berkas.');
            return redirect()->route('arsip.aktif.show', $this->arsip->id);
        
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi kesalahan sistem: ' . $e->getMessage());
        }
    }

    public function render()
    {
        $data = [
            'slugBidangYangDibuka' => $this->arsip->bidang ?? 'default',
            'namaBidangYangDibuka' => Str::title($this->arsip->bidang ?? 'Bidang')
        ];

        return view('livewire.arsip.aktif-upload-file', $data)->layout('layouts.app');
    }
}