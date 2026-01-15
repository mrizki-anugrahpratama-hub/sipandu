<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ArsipInaktif;
use Illuminate\Support\Facades\Log;

class AutoTransitionToAppraisal extends Command
{
    // Nama command di terminal jadi lebih teknis
    protected $signature = 'arsip:transition-to-appraisal';

    protected $description = 'Memindahkan arsip Inaktif yang expired ke tahap Appraisal (Penyusutan)';

    public function handle()
    {
        $this->info(' 🔍 Memindai arsip inaktif yang sudah waktunya disusutkan...');

        // Hitung dulu jumlahnya
        // ASUMSI: Model ArsipInaktif memiliki local scope `siapPenyusutan()`
        $count = ArsipInaktif::siapPenyusutan()->count();

        if ($count === 0) {
            $this->info(' ✅ Tidak ada arsip yang perlu diproses hari ini.');
            return;
        }

        $this->info(" 📦 Ditemukan {$count} arsip. Memulai proses transisi...");

        // Progress Bar (Biar kelihatan canggih di terminal)
        $bar = $this->output->createProgressBar($count);
        $bar->start();

        /**
         * [OPTIMASI PERFORMANCE]
         * Menggunakan chunkById(100)
         * Ini aman memproses 1.000.000 data sekalipun tanpa bikin server crash (RAM hemat).
         */
        ArsipInaktif::siapPenyusutan()->chunkById(100, function ($archives) use ($bar) {
            foreach ($archives as $archive) {
                // Perubahan status dilakukan dalam loop chunk
                $archive->update([
                    'status_pengolahan' => 'penyusutan'
                ]);
                
                // Majukan progress bar
                $bar->advance();
            }
        });

        $bar->finish();
        $this->newLine(2); // Spasi setelah progress bar
        
        $this->info(" 🎉 SUKSES! {$count} arsip telah dipindahkan ke menu Penyusutan.");
        Log::info("Scheduler [Appraisal]: Berhasil memindahkan {$count} arsip.");
    }
}