<?php

namespace App\Http\Controllers;

use App\Models\ArsipAktif;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage; // [PENTING] Tambahkan ini

class ArsipAktifController extends Controller
{
    // ... method Anda yang lain (index, create, store, etc) ...

    /**
     * Menampilkan halaman detail arsip beserta file-filenya.
     */
    public function show(ArsipAktif $arsip)
    {
        // [DIUBAH] 'items' menjadi 'files' sesuai relasi di model Anda
        $arsip->load('files');

        // [CONTOH] Ambil data slug bidang (sesuaikan dengan logika Anda)
        $slugBidangYangDibuka = $arsip->bidang ?? 'default-slug'; 
        $namaBidangYangDibuka = Str::title($arsip->bidang ?? 'Default Bidang');

        return view('arsip.aktif.show', compact(
            'arsip', 
            'slugBidangYangDibuka', 
            'namaBidangYangDibuka'
        ));
    }

    /**
     * [DIUBAH] Menampilkan halaman form untuk meng-upload file baru.
     */
    public function createFile(ArsipAktif $arsip)
    {
        // [CONTOH] Ambil data slug bidang (sesuaikan dengan logika Anda)
        $slugBidangYangDibuka = $arsip->bidang ?? 'default-slug'; 
        $namaBidangYangDibuka = Str::title($arsip->bidang ?? 'Default Bidang');
        
        // [DIUBAH] Sesuaikan nama view jika perlu
        return view('arsip.aktif.create-file', compact(
            'arsip',
            'slugBidangYangDibuka',
            'namaBidangYangDibuka'
        ));
    }

    /**
     * [DIUBAH] Menyimpan file arsip baru yang di-upload.
     */
    public function storeFile(Request $request, ArsipAktif $arsip)
    {
        // 1. Validasi Input
        $request->validate([
            'uraian' => 'required|string|max:255',
            'tanggal_file' => 'required|date',
            'file_arsip' => 'required|file|mimes:pdf,jpg,jpeg,png,docx,xlsx|max:10240', // Max 10MB
        ]);

        // 2. Simpan File
        try {
            $file = $request->file('file_arsip');
            $namaFile = Str::slug($request->uraian) . '-' . time() . '.' . $file->getClientOriginalExtension();
            
            // Simpan file ke 'storage/app/public/arsip-files'
            $path = $file->storeAs('public/arsip-files', $namaFile);

            // 3. Simpan Data ke Database
            // [DIUBAH] Menggunakan relasi 'files()'
            $arsip->files()->create([
                'uraian' => $request->uraian,
                'tanggal_file' => $request->tanggal_file,
                'nama_file' => $file->getClientOriginalName(), // Nama file asli
                'file_path' => $path, // Path penyimpanan
                'jumlah' => 1, // Asumsi 1 file = 1 item
            ]);

            // 4. Update jumlah di arsip induk
            // [DIUBAH] Menggunakan kolom 'jumlah'
            $arsip->increment('jumlah');
            // Jika Anda ingin 'jumlah' = total file, gunakan:
            // $arsip->update(['jumlah' => $arsip->files()->count()]);

            // 5. Redirect kembali ke halaman detail
            return redirect()
                    ->route('arsip.aktif.show', $arsip->id)
                    ->with('success', 'File arsip baru berhasil di-upload!');

        } catch (\Exception $e) {
            // Tangani jika ada error (misal disk penuh, dll)
            return redirect()
                    ->back()
                    ->with('error', 'Gagal meng-upload file: ' . $e->getMessage())
                    ->withInput();
        }
    }
}