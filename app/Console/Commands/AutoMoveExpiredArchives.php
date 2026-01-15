<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ArsipAktif;
use App\Models\ArsipInaktif;
use App\Models\FileArsip;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AutoMoveExpiredArchives extends Command
{
    // Menggunakan signature yang Anda definisikan
    protected $signature = 'arsip:auto-move-expired';
    protected $description = 'Memindahkan arsip Aktif (Expired) ke Gudang Inaktif dan memutakhirkan status file terkait.';

    public function handle()
    {
        $this->info(' 🔍 Memindai arsip aktif yang sudah kadaluarsa...');

        // Query cari arsip aktif yang masa retensinya sudah habis
        $query = ArsipAktif::whereRaw('DATE_ADD(tanggal_dibuat, INTERVAL masa_retensi_aktif YEAR) <= CURDATE()')
                            ->where('status', 'Aktif'); // Pastikan hanya memproses yang statusnya Aktif
        
        $count = $query->count();

        if ($count === 0) {
            $this->info(' ✅ Tidak ada arsip aktif yang perlu dipindahkan.');
            return 0;
        }

        $this->info(" 🚚 Memindahkan {$count} arsip ke Inaktif...");
        
        $bar = $this->output->createProgressBar($count);
        $bar->start();

        // Menggunakan chunkById untuk efisiensi memori
        $query->chunkById(50, function ($arsipCollection) use ($bar) {
            
            // Menggunakan DB::transaction untuk memastikan semua operasi berhasil atau gagal bersamaan
            DB::transaction(function () use ($arsipCollection, $bar) {
                foreach ($arsipCollection as $arsip) {
                    
                    try {
                        // === [LOGIKA PERPINDAHAN] ===
                        $tglMasuk = now(); 

                        // 1. Hitung total masa retensi (Aktif + Inaktif)
                        $totalMasaRetensi = (int)$arsip->masa_retensi_aktif + (int)$arsip->masa_retensi_inaktif;

                        // 2. Hitung tanggal berakhir retensi total (kunci untuk penyusutan selanjutnya)
                        $tglRetensiBerakhir = Carbon::parse($arsip->tanggal_dibuat)->addYears($totalMasaRetensi);

                        // 3. Persiapkan data untuk Arsip Inaktif (menggunakan array to Array)
                        $inaktifData = $arsip->toArray();
                        
                        // Hapus ID lama, tambahkan kolom unik Inaktif
                        unset($inaktifData['id']); 
                        unset($inaktifData['masa_retensi_aktif']); // Kolom ini tidak ada di tabel Inaktif
                        // Asumsi 'tanggal_dibuat' (arsip asli) ada di ArsipInaktif
                        
                        // Tambahkan/Timpa data baru untuk ArsipInaktif
                        $inaktifData['arsip_aktif_id'] = $arsip->id; // Kunci relasi, jika model ArsipInaktif memilikinya
                        $inaktifData['tanggal_dipindah'] = $tglMasuk;
                        $inaktifData['tgl_retensi_berakhir'] = $tglRetensiBerakhir;
                        $inaktifData['status_pengolahan'] = 'inaktif'; 
                        
                        // Pastikan ArsipInaktif memiliki kolom 'arsip_aktif_id'
                        // Jika ArsipInaktif tidak memiliki arsip_aktif_id, Anda mungkin perlu mengubah primary key-nya.
                        
                        // 4. Buat Arsip Inaktif
                        $baru = ArsipInaktif::create($inaktifData);

                        // 5. Pindah Relasi File (Memutakhirkan FileArsip)
                        FileArsip::where('arsip_aktif_id', $arsip->id)
                            ->update(['arsip_inaktif_id' => $baru->id, 'arsip_aktif_id' => null]);
                            
                        // 6. Hapus Arsip Lama
                        $arsip->delete();

                        $bar->advance();

                    } catch (\Exception $e) {
                        DB::rollBack();
                        Log::error("Gagal memproses/memindahkan arsip ID {$arsip->id} ke Inaktif: " . $e->getMessage());
                        $this->error(" \n [Gagal] Arsip ID {$arsip->id} gagal dipindahkan. Cek log.");
                    }
                }
            });
        });

        $bar->finish();
        $this->newLine(2);
        
        $this->info(" 🎉 SUKSES! {$count} arsip berhasil dipindahkan ke gudang Inaktif.");
        Log::info("Scheduler [MoveExpired]: Berhasil memindahkan {$count} arsip.");
        
        return Command::SUCCESS;
    }
}