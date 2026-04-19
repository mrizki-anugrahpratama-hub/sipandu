<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FileArsip extends Model
{
    use HasFactory;

    /**
     * Nama tabel untuk model ini.
     */
    protected $table = 'file_arsips';
    
    /**
     * Kolom yang dapat diisi (mass assignable).
     */
    protected $fillable = [
        'arsip_aktif_id',   // Foreign key ke Arsip Aktif
        'arsip_inaktif_id', // Foreign key ke Arsip Inaktif
        'arsip_vital_id',   // ✅ Foreign key ke Arsip Vital
        'nomor_item',       // Sesuai dengan kolom "No Item Arsip" 
        'kode_klasifikasi', // Sesuai dengan kolom "Kode Klasifikasi" 
        'uraian',           // Uraian informasi
        'tanggal_file',     // Tanggal file/surat
        'jumlah',           // Jumlah fisik
        'satuan',           // Satuan jumlah fisik (misal: Lembar, Eksemplar, dll)
        'klasifikasi_akses',// Klasifikasi dan akses arsip
        'status_keaslian',  // Asli/salinan
        
        // Tambahan kolom file:
        'tingkat_perkembangan', 
        'nama_file_asli',
        'path_file',
        'tipe_file',
        'ukuran_file',
    ];

    /**
     * Tipe data kolom yang akan di-cast otomatis.
     */
    protected $casts = [
        'tanggal_file' => 'date',
    ];

    // --- Definisi Relasi ---

    /**
     * Relasi ke ArsipVital (Induk Vital).
     * Memungkinkan pemanggilan $fileArsip->arsipVital.
     */
    public function arsipVital(): BelongsTo
    {
        // Menggunakan foreign key 'arsip_vital_id'
        return $this->belongsTo(ArsipVital::class, 'arsip_vital_id');
    }

    /**
     * Relasi ke ArsipAktif (Induk Aktif).
     */
    public function arsipAktif(): BelongsTo
    {
        return $this->belongsTo(ArsipAktif::class, 'arsip_aktif_id');
    }
    
    /**
     * Relasi ke ArsipInaktif (Induk Inaktif).
     */
    public function arsipInaktif(): BelongsTo
    {
        return $this->belongsTo(ArsipInaktif::class, 'arsip_inaktif_id');
    }
}