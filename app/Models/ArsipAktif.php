<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Traits\LogsActivity;

class ArsipAktif extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $table = 'arsip_aktif';

    /**
     * Kolom yang dapat diisi (mass assignable).
     */
    protected $fillable = [
        'kode_klasifikasi',
        'nomor_berkas',
        'uraian',
        'kurun_waktu',
        'jumlah',
        
        'masa_retensi_aktif',
        'masa_retensi_inaktif',
        
        'status_akhir',
        'user_id',
        'bidang',
        'index',
        'klasifikasi_keamanan',
        'klasifikasi_akses',
        'tingkat_perkembangan',
        
        'status',
        'tanggal_dibuat',
        'moved_date',
    ];

    /**
     * Tipe data kolom yang akan di-cast otomatis.
     */
    protected $casts = [
        'tanggal_dibuat' => 'date',
        'moved_date' => 'datetime',
    ];

    /**
     * Relasi ke model User (pembuat arsip).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Menentukan apakah masa retensi aktif telah kedaluwarsa.
     */
    public function isRetensiAktifExpired()
    {
        if (!$this->tanggal_dibuat || !$this->masa_retensi_aktif) {
            return false;
        }

        $years = (int) $this->masa_retensi_aktif;

        $expiryDate = $this->tanggal_dibuat->addYears($years);
        return Carbon::now()->greaterThanOrEqualTo($expiryDate);
    }

    /**
     * Mengambil tanggal kedaluwarsa masa retensi aktif.
     */
    public function getRetensiAktifExpiryDate()
    {
        if (!$this->tanggal_dibuat || !$this->masa_retensi_aktif) {
            return null;
        }

        $years = (int) $this->masa_retensi_aktif;

        return $this->tanggal_dibuat->copy()->addYears($years);
    }
    
    /**
     * Relasi ke model FileArsip (isi berkas).
     * Ini adalah kunci agar data detail isi berkas muncul di laporan Excel.
     */
    public function files(): HasMany
    {
        // Model ArsipAktif memiliki banyak (HasMany) FileArsip
        // dengan foreign key 'arsip_aktif_id' di tabel FileArsip.
        return $this->hasMany(FileArsip::class, 'arsip_aktif_id');
    }
}