<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ArsipVital extends Model
{
    use HasFactory;

    // Pastikan nama tabel sesuai dengan Migration (arsip_vitals jamak)
    protected $table = 'arsip_vitals';

    protected $fillable = [
        'asal_arsip',
        'nomor_berkas',
        'kode_klasifikasi',
        'jenis_series_arsip',
        'isi_berkas',
        'bulan_tahun',
        'jumlah_satuan',
        'klasifikasi_keamanan',
        'keterangan',
        'retensi_arsip_vital',
        'lokasi_simpan',
        'metode_perlindungan',
        'keterangan_tambahan',
        'user_id',
        
        // Kolom Baru
        'bidang', 
        'kondisi_arsip',
    ];
    
    // Relasi One-to-Many ke FileArsip
    public function files(): HasMany
    {
        // 'arsip_vital_id' adalah foreign key yang ditambahkan via migrasi gabungan
        return $this->hasMany(FileArsip::class, 'arsip_vital_id'); 
    }

    // Relasi ke User pembuat
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}