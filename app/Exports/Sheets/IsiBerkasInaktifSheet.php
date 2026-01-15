<?php

namespace App\Exports\Sheets;

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

// Kelas ini mencetak Daftar ISI BERKAS INAKTIF (Detail Item)
class IsiBerkasInaktifSheet implements FromCollection, WithTitle, WithHeadings, WithMapping, WithEvents, WithColumnWidths
{
    private $query;
    private $headerData;

    public function __construct(Builder $query, array $headerData)
    {
        $this->query = $query;
        $this->headerData = $headerData;
    }

    public function collection()
    {
        // PENTING: eager load relasi 'files'
        $arsipInaktif = $this->query->with('files')->get();

        $combinedFiles = collect();
        foreach ($arsipInaktif as $arsip) {
            
            // --- Logika Filter Isi File berdasarkan search global ---
            $filteredFiles = $arsip->files;
            
            $search = $this->headerData['search'];
            if ($search) {
                 $filteredFiles = $arsip->files->filter(function ($file) use ($search) {
                     // Menggunakan kolom 'uraian' atau kolom lain untuk pencarian di level file
                     return Str::contains(strtolower($file->uraian ?? ''), strtolower($search));
                 });
            }
            // --- Akhir Logika Filter Isi File ---

            // Jika ada isi file yang lolos filter atau relasi 'files' ada, tambahkan
            if ($filteredFiles->isNotEmpty()) {
                $filteredFiles->each(function ($file) use ($arsip, $combinedFiles) {
                    // Tambahkan ID ARSIP INDUK (Primary Key) untuk kriteria reset penomoran item
                    $file->arsip_inaktif_id_induk = $arsip->id; // <-- Kunci Unik Baru
                    
                    // Tambahkan semua informasi Induk yang diperlukan ke objek detail file
                    $file->nomor_box_induk = $arsip->nomor_box; 
                    $file->nomor_berkas_induk = $arsip->nomor_berkas;
                    $file->kode_klasifikasi_induk = $arsip->kode_klasifikasi;
                    $file->index_induk = $arsip->index;
                    $file->kurun_waktu_induk = $arsip->kurun_waktu;
                    $file->klasifikasi_akses_induk = $arsip->klasifikasi_akses;
                    $file->status_akhir_induk = $arsip->status_akhir;
                    $file->tgl_retensi_berakhir_induk = $arsip->tgl_retensi_berakhir;
                    $file->status_pengolahan_induk = $arsip->status_pengolahan;
                    
                    $combinedFiles->push($file);
                });
            }
        }
        
        // Urutkan berdasarkan ID ARSIP INDUK, lalu tanggal file. Ini menjamin item berkumpul per berkas induk.
        return $combinedFiles->sortBy(function ($file) {
            // Urutan: ID Induk (kunci unik) -> Tanggal File
            // Menggunakan property_exists untuk menghindari error jika kolom 'tanggal_file' tidak ada
            $tanggal = property_exists($file, 'tanggal_file') && $file->tanggal_file ? $file->tanggal_file : '9999-12-31';
            return $file->arsip_inaktif_id_induk . '-' . $tanggal;
        });
    }

    public function title(): string
    {
        return 'Daftar Isi Berkas Inaktif';
    }

    public function headings(): array
    {
        return [
            'No.', // A
            'No. Box Induk', // B
            'No. Berkas Induk', // C
            'No. Item Arsip (Isi)', // D
            'Kode Klasifikasi Induk', // E
            'Index Induk', // F
            'Uraian Informasi Arsip', // G (Level Isi)
            'Tanggal File (Isi)', // H 
            'Jumlah Fisik (Isi)', // I 
            'Tingkat Perkembangan (Isi)', // J 
            'Klasifikasi Akses Induk', // K
            'Kurun Waktu Induk', // L
            'Status Akhir Induk', // M
            'Tgl Retensi Berakhir Induk', // N 
            'Status Pengolahan Induk', // O 
        ];
    }

    // Properti statis untuk melacak item count
    private static $globalIndex = 0;
    private static $itemIndex = 0;
    // Kriteria untuk reset penomoran item
    private static $currentBerkasIndukId = null; 
    // Kriteria untuk menahan pencetakan data induk di kolom
    private static $lastBerkasIndukIdPrinted = null; 

    
    // Dipanggil sebelum diekspor
    public function __destruct() {
        self::$globalIndex = 0;
        self::$itemIndex = 0;
        self::$currentBerkasIndukId = null;
        self::$lastBerkasIndukIdPrinted = null;
    }

    public function map($file): array
    {
        self::$globalIndex++; 

        $currentBerkasId = $file->arsip_inaktif_id_induk;

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
        // Kolom yang HANYA dicetak pada BARIS PERTAMA kelompok (seperti No. Berkas, Kode Klasifikasi, Index)
        $shouldPrintInduk = self::$lastBerkasIndukIdPrinted !== $currentBerkasId;
        
        // Perbarui tracker hanya jika grup baru
        if ($shouldPrintInduk) {
            self::$lastBerkasIndukIdPrinted = $currentBerkasId;
        }

        // Helper function untuk menentukan nilai yang dicetak (data Induk atau string kosong)
        $printGroupValue = fn($value) => $shouldPrintInduk ? ($value ?? '-') : '';
        
        // Helper function untuk MENAMPILKAN nilai Induk di SETIAP BARIS
        $printAlwaysValue = fn($value) => $value ?? '-';

        // --- C. FORMATTING DETAIL (Tanggal) ---
        $rawTanggalFile = $file->tanggal_file ?? null; 
        
        $tanggalFile = $rawTanggalFile ? 
                       (Carbon::parse($rawTanggalFile)->isoFormat('DD MMMM YYYY') ?? '-') : 
                       '-';
        
        $tglRetensiInduk = $file->tgl_retensi_berakhir_induk;
        $formattedTglRetensi = $tglRetensiInduk ? 
                               (Carbon::parse($tglRetensiInduk)->isoFormat('DD MMMM YYYY') ?? '-') : 
                               '-';
        // -----------------------------------

        return [
            self::$globalIndex,                                     // A: No. (Global Index)
            $printGroupValue($file->nomor_box_induk),               // B: No. Box Induk (Hanya dicetak di baris pertama)
            $printGroupValue($file->nomor_berkas_induk),            // C: No. Berkas Induk (Hanya dicetak di baris pertama)
            self::$itemIndex,                                       // D: No. Item Arsip (TETAP DICETAK)
            $printGroupValue($file->kode_klasifikasi_induk),        // E: Kode Klasifikasi Induk (Hanya dicetak di baris pertama)
            $printGroupValue($file->index_induk),                   // F: Index Induk (Hanya dicetak di baris pertama)
            $file->uraian ?? '-',                                   // G: Uraian Informasi Arsip (TETAP DICETAK)
            $tanggalFile,                                           // H: Tanggal File (TETAP DICETAK)
            $file->jumlah ?? '-',                                   // I: Jumlah Fisik (TETAP DICETAK)
            $file->tingkat_perkembangan ?? '-',                     // J: Tingkat Perkembangan (TETAP DICETAK)
            // KOLOM-KOLOM BERIKUT SELALU DICETAK
            $printAlwaysValue($file->klasifikasi_akses_induk),      // K: Klasifikasi Akses Induk 
            $printAlwaysValue($file->kurun_waktu_induk),            // L: Kurun Waktu Induk
            $printAlwaysValue($file->status_akhir_induk),           // M: Status Akhir Induk
            $printAlwaysValue($formattedTglRetensi),                // N: Tgl Retensi Berakhir Induk
            $printAlwaysValue($file->status_pengolahan_induk),      // O: Status Pengolahan Induk
        ];
    }

    public function columnWidths(): array
    {
        // Diperbarui hingga kolom O
        return [
            'A' => 5, 
            'B' => 15, 
            'C' => 15, 
            'D' => 10, 
            'E' => 20, 
            'F' => 35, 
            'G' => 45, 
            'H' => 15, // Tanggal File
            'I' => 10, 
            'J' => 15, 
            'K' => 18, 
            'L' => 12, 
            'M' => 12, 
            'N' => 20, // Tgl Retensi Berakhir Induk
            'O' => 20, // Status Pengolahan Induk
        ];
    }
    
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                
                $sheet = $event->sheet;
                $lastColumn = 'O'; // Kolom terakhir di Sheet ini adalah O (15 kolom)
                $headerRow = 6; 
                $dataStartRow = 7; 

                $sheet->insertNewRowBefore(1, 5);
                
                // --- Logika Header Laporan ---
                $sheet->setCellValue('A1', 'LAPORAN DAFTAR ISI BERKAS ARSIP INAKTIF');
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
                $tableRange = "A{$headerRow}:{$lastColumn}" . $lastDataRow;

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
                    
                    // Kolom teks yang harus rata kiri: Kode Klasifikasi Induk (E), Index Induk (F), Uraian (G)
                    // Hati-hati: Klasifikasi Akses Induk (K), Kurun Waktu Induk (L), Status Akhir Induk (M), Tgl Retensi Berakhir Induk (N), Status Pengolahan Induk (O) 
                    // harus tetap rata tengah karena sudah diputuskan untuk selalu dicetak.
                    $sheet->getStyle("E{$dataStartRow}:G" . $lastDataRow)->getAlignment()->applyFromArray($styleLeftWrap);
                }
            },
        ];
    }
}