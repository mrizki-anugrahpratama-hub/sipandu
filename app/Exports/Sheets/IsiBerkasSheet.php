<?php

namespace App\Exports\Sheets;

use App\Models\ArsipAktif;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Carbon\Carbon;
use Illuminate\Support\Str;

// Ganti nama kelas menjadi IsiBerkasAktifSheet
class IsiBerkasSheet implements FromCollection, WithTitle, WithHeadings, WithMapping, WithEvents, WithColumnWidths
{
    private $query;
    private $headerData;
    private $search;
    private $filterIsiBerkasStatus; 

    // Properti statis untuk melacak item count dan kriteria grouping
    private static $globalIndex = 0;
    private static $itemIndex = 0;
    private static $currentBerkasIndukId = null; 
    private static $lastBerkasIndukIdPrinted = null;

    public function __construct(Builder $query, array $headerData, ?string $search, bool $filterIsiBerkasStatus)
    {
        $this->query = $query;
        $this->headerData = $headerData;
        $this->search = $search;
        $this->filterIsiBerkasStatus = $filterIsiBerkasStatus; 
        
        // Panggil destruct di constructor untuk memastikan reset saat sheet baru dibuat
        $this->__destruct();
    }

    public function collection()
    {
        // Pastikan relasi 'files' dimuat secara eager loading
        $arsipAktif = $this->query->with('files')->get();

        $combinedFiles = collect();
        foreach ($arsipAktif as $arsip) {
            $filteredFiles = $arsip->files;
            
            // Filter Isi File hanya jika ada kata kunci pencarian DAN checkbox filter dicentang
            if ($this->search && $this->filterIsiBerkasStatus) {
                $search = strtolower($this->search);
                $filteredFiles = $arsip->files->filter(function ($file) use ($search) {
                    // Menggunakan kolom 'uraian' untuk pencarian
                    return Str::contains(strtolower($file->uraian ?? ''), $search);
                });
            }
            
            // Jika ada isi file yang lolos filter atau relasi 'files' ada, tambahkan
            if ($filteredFiles->isNotEmpty()) {
                $filteredFiles->each(function ($file) use ($arsip, $combinedFiles) {
                    // Tambahkan ID ARSIP INDUK (Primary Key) untuk kriteria reset penomoran item
                    $file->arsip_aktif_id_induk = $arsip->id; // Menggunakan ID unik Arsip Aktif
                    
                    // Tambahkan semua informasi Induk yang diperlukan ke objek detail file
                    $file->nomor_berkas_induk = $arsip->nomor_berkas;
                    $file->kode_klasifikasi_induk = $arsip->kode_klasifikasi;
                    $file->index_induk = $arsip->index;
                    $file->kurun_waktu_induk = $arsip->kurun_waktu;
                    $file->klasifikasi_akses_induk = $arsip->klasifikasi_akses;
                    $file->status_akhir_induk = $arsip->status_akhir;
                    // Asumsi: Arsip Aktif juga memiliki kolom retensi
                    $file->masa_retensi_aktif_induk = $arsip->masa_retensi_aktif ?? '-';
                    $file->masa_retensi_inaktif_induk = $arsip->masa_retensi_inaktif ?? '-';
                    
                    $combinedFiles->push($file);
                });
            }
        }
        
        // PENGURUTAN BARU: Berdasarkan ID ARSIP INDUK (kunci unik) lalu tanggal file.
        return $combinedFiles->sortBy(function ($file) {
            $tanggal = property_exists($file, 'tanggal_file') && $file->tanggal_file ? $file->tanggal_file : '9999-12-31';
            // Perhatikan pengurutan sekarang menggunakan ID unik Arsip Aktif
            return $file->arsip_aktif_id_induk . '-' . $tanggal; 
        });
    }

    public function title(): string
    {
        return 'Daftar Isi Berkas Aktif';
    }

    public function headings(): array
    {
        // Menambahkan kolom retensi dan menyesuaikan kolom
        return [
            'No.', // A
            'No. Berkas Induk', // B
            'No. Item Arsip (Isi)', // C
            'Kode Klasifikasi Induk', // D
            'Index Induk', // E
            'Uraian Informasi Arsip', // F (Level Isi)
            'Tanggal File (Isi)', // G
            'Jumlah Fisik (Isi)', // H 
            'Tingkat Perkembangan (Isi)', // I
            'Klasifikasi Akses Induk', // J
            'Kurun Waktu Induk', // K
            'Status Akhir Induk', // L
            'Retensi Aktif Induk', // M <-- BARU
            'Retensi Inaktif Induk', // N <-- BARU
        ];
    }


    public function map($file): array
    {
        self::$globalIndex++; 

        // Kriteria reset item count dan grouping menggunakan ID unik Induk
        $currentBerkasId = $file->arsip_aktif_id_induk;

        // --- A. LOGIKA PENOMORAN ITEM ---
        $shouldResetItemIndex = self::$currentBerkasIndukId !== $currentBerkasId;
        if ($shouldResetItemIndex) {
            self::$itemIndex = 1; // Reset penomoran item ke 1
            self::$currentBerkasIndukId = $currentBerkasId;
            // Saat item direset, kita pastikan kolom induk juga dicetak (hanya baris pertama)
            self::$lastBerkasIndukIdPrinted = null; 
        } else {
            self::$itemIndex++; // Lanjutkan item count
        }
        // ------------------------------------------

        // --- B. LOGIKA PENAMPILAN DATA INDUK (Grouping Illusion) ---
        $shouldPrintInduk = self::$lastBerkasIndukIdPrinted !== $currentBerkasId;
        
        // Perbarui tracker hanya jika grup baru
        if ($shouldPrintInduk) {
            self::$lastBerkasIndukIdPrinted = $currentBerkasId;
        }

        // Helper function untuk menentukan nilai yang dicetak (data Induk atau string kosong)
        // Diterapkan pada kolom B, D, E
        $printGroupValue = fn($value) => $shouldPrintInduk ? ($value ?? '-') : '';
        
        // Helper function untuk MENAMPILKAN nilai Induk di SETIAP BARIS
        // Diterapkan pada kolom J, K, L, M, N (Sesuai permintaan Anda)
        $printAlwaysValue = fn($value) => $value ?? '-';

        // --- C. FORMATTING DETAIL (Tanggal) ---
        $rawTanggalFile = $file->tanggal_file ?? null; 
        
        $tanggalFile = $rawTanggalFile ? 
                       (Carbon::parse($rawTanggalFile)->isoFormat('DD MMMM YYYY') ?? '-') : 
                       '-';
        // -----------------------------------
        
        return [
            self::$globalIndex,                                     // A: No. (Global Index)
            $printGroupValue($file->nomor_berkas_induk),            // B: No. Berkas Induk (Hanya baris pertama)
            self::$itemIndex,                                       // C: No. Item Arsip (TETAP DICETAK)
            $printGroupValue($file->kode_klasifikasi_induk),        // D: Kode Klasifikasi Induk (Hanya baris pertama)
            $printGroupValue($file->index_induk),                   // E: Index Induk (Hanya baris pertama)
            $file->uraian ?? '-',                                   // F: Uraian Informasi Arsip (TETAP DICETAK)
            $tanggalFile,                                           // G: Tanggal File (TETAP DICETAK)
            $file->jumlah ?? '-',                                   // H: Jumlah Fisik (TETAP DICETAK)
            $file->tingkat_perkembangan ?? '-',                     // I: Tingkat Perkembangan (TETAP DICETAK)
            // KOLOM-KOLOM BERIKUT SELALU DICETAK (Sesuai permintaan Anda)
            $printAlwaysValue($file->klasifikasi_akses_induk),      // J: Klasifikasi Akses Induk 
            $printAlwaysValue($file->kurun_waktu_induk),            // K: Kurun Waktu Induk
            $printAlwaysValue($file->status_akhir_induk),           // L: Status Akhir Induk
            $printAlwaysValue($file->masa_retensi_aktif_induk),     // M: Retensi Aktif Induk
            $printAlwaysValue($file->masa_retensi_inaktif_induk),   // N: Retensi Inaktif Induk
        ];
    }

    public function columnWidths(): array
    {
        // Disesuaikan hingga kolom N
        return [
            'A' => 5, 
            'B' => 15, // No. Berkas Induk
            'C' => 10, // No. Item Arsip
            'D' => 20, // Kode Klasifikasi Induk
            'E' => 35, // Index Induk
            'F' => 45, // Uraian Informasi Arsip
            'G' => 15, // Tanggal File
            'H' => 10, // Jumlah Fisik
            'I' => 15, // Tingkat Perkembangan
            'J' => 18, // Klasifikasi Akses Induk
            'K' => 12, // Kurun Waktu Induk
            'L' => 12, // Status Akhir Induk
            'M' => 15, // Retensi Aktif Induk
            'N' => 15, // Retensi Inaktif Induk
        ];
    }
    
    // Reset properti statis saat export dimulai 
    public function __destruct() {
        self::$globalIndex = 0;
        self::$itemIndex = 0;
        self::$currentBerkasIndukId = null;
        self::$lastBerkasIndukIdPrinted = null;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                
                $sheet = $event->sheet;
                $lastColumn = 'N'; // Kolom terakhir di Sheet ini adalah N (14 kolom)
                $headerRow = 6; 
                $dataStartRow = 7; 

                $sheet->insertNewRowBefore(1, 5);
                
                // --- Logika Header Laporan ---
                $sheet->setCellValue('A1', 'LAPORAN DAFTAR ISI BERKAS ARSIP AKTIF');
                $sheet->setCellValue('A2', 'UNIT PENGOLAH: ' . $this->headerData['unitPengolah']);
                $sheet->setCellValue('A3', 'PERIODE: ' . $this->headerData['periode']);
                $sheet->setCellValue('A4', 'STATUS: ' . $this->headerData['status']);

                // Gabungkan Sel Header
                $sheet->mergeCells("A1:{$lastColumn}1");
                $sheet->mergeCells("A2:{$lastColumn}2");
                $sheet->mergeCells("A3:{$lastColumn}3");
                $sheet->mergeCells("A4:{$lastColumn}4");

                // Styling Judul
                $sheet->getStyle('A1:A4')->applyFromArray([
                    'font' => ['bold' => true, 'size' => 14],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
                ]);

                // --- Styling Tabel ---

                $lastDataRow = $sheet->getHighestRow();
                $headerRange = "A{$headerRow}:{$lastColumn}{$headerRow}";
                
                // Styling Header Tabel (Warna Biru dan Kotak)
                $sheet->getStyle($headerRange)->applyFromArray([
                    'font' => ['bold' => true, 'color' => ['argb' => 'FFFFFFFF']],
                    'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['argb' => 'FF4F81BD']], 
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER, 'wrapText' => true],
                    'borders' => ['allBorders' => ['borderStyle' => Border::BORDER_THIN, 'color' => ['argb' => 'FF000000']]],
                ]);
                
                // Styling Garis Seluruh Tabel & Data Alignment
                if ($lastDataRow >= $dataStartRow) { 
                    $tableDataRange = "A{$dataStartRow}:{$lastColumn}" . $lastDataRow;
                    
                    // Garis seluruh tabel (termasuk data)
                    $sheet->getStyle($tableDataRange)->applyFromArray([
                        'borders' => ['allBorders' => ['borderStyle' => Border::BORDER_THIN, 'color' => ['argb' => 'FF000000']]],
                    ]);
                    
                    // Styling Data Detail
                    $styleCenterWrap = [
                        'vertical'    => Alignment::VERTICAL_TOP, 
                        'wrapText'    => true, 
                        'horizontal'  => Alignment::HORIZONTAL_CENTER
                    ];
                    $styleLeftWrap = [
                        'vertical'    => Alignment::VERTICAL_TOP, 
                        'wrapText'    => true, 
                        'horizontal'  => Alignment::HORIZONTAL_LEFT
                    ];
                    
                    $sheet->getStyle($tableDataRange)->getAlignment()->applyFromArray($styleCenterWrap);
                    
                    // Kolom teks yang harus rata kiri: Kode Klasifikasi Induk (D), Index Induk (E), Uraian (F)
                    // Disesuaikan dengan kolom yang di-group: D (Kode Klasifikasi), E (Index), F (Uraian)
                    $sheet->getStyle("D{$dataStartRow}:F" . $lastDataRow)->getAlignment()->applyFromArray($styleLeftWrap);
                }
            },
        ];
    }
}