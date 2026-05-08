<?php

namespace App\Traits;

use App\Models\AktivitasSistem;
use Illuminate\Support\Facades\Auth;

trait LogsActivity {
    protected static function bootLogsActivity() {
        static::created(fn($model) => static::logAction($model, 'Tambah'));
        static::updated(fn($model) => static::logAction($model, 'Ubah'));
        static::deleted(fn($model) => static::logAction($model, 'Hapus'));
    }

    protected static function logAction($model, $aksi) {
        if (!Auth::check()) return;

        $user = Auth::user();
        $className = class_basename($model);
        
        // [PERBAIKAN 1] Abaikan pencatatan jika model adalah User
        // Ini akan menghentikan pencatatan remember_token atau update profil admin
        if ($className === 'User') {
            return;
        }

        // Ambil data yang berubah
        $dirty = $model->getDirty();
        
        // Jangan catat jika tidak ada perubahan data nyata (untuk aksi Ubah)
        if ($aksi === 'Ubah' && empty($dirty)) {
            return;
        }

        // [PERBAIKAN 2] Ambil Uraian Arsip secara dinamis sesuai jenis model
        $uraian = $model->uraian ?? $model->isi_berkas ?? $model->nama_berkas ?? 'Data Sistem';
        $dataBidang = $model->bidang ?? 'sistem';

        AktivitasSistem::create([
            'user_id'   => $user->id,
            'bidang'    => $user->role,
            'data_bidang' => $dataBidang, // [BARU] Asal data 
            'aksi'      => $aksi,
            'modul'     => str_replace('Arsip', 'Arsip ', $className), // Contoh: ArsipAktif -> Arsip Aktif
            'deskripsi' => $uraian, 
            'perubahan' => $aksi === 'Ubah' ? [
                'lama' => array_intersect_key($model->getOriginal(), $dirty),
                'baru' => $dirty
            ] : null,
            'ip_address'=> request()->ip(),
        ]);
    }
}