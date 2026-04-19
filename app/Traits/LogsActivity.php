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
        
        // [PERBAIKAN] Mengambil data uraian asli dari model arsip
        // Mendukung berbagai kolom seperti 'uraian', 'nama_berkas', atau 'isi_berkas'
        $uraianAsli = $model->uraian ?? $model->nama_berkas ?? $model->isi_berkas ?? 'Data Sistem';

        AktivitasSistem::create([
            'user_id'   => $user->id,
            'bidang'    => $user->role,
            'aksi'      => $aksi,
            'modul'     => str_replace('Arsip', 'Arsip ', class_basename($model)),
            'deskripsi' => $uraianAsli, // Data uraian disimpan di sini
            'perubahan' => $aksi === 'Ubah' ? [
                'lama' => array_intersect_key($model->getOriginal(), $model->getDirty()),
                'baru' => $model->getDirty()
            ] : null,
            'ip_address'=> request()->ip(),
        ]);
    }
}