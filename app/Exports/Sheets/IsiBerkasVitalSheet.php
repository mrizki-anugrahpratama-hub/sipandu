<?php

namespace App\Exports\Sheets;

use App\Models\ArsipVital;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
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

// Kelas ini mencetak Daftar ISI BERKAS VITAL (Detail Item)
class IsiBerkasVitalSheet implements FromCollection, WithTitle, WithHeadings, WithMapping, WithEvents, WithColumnWidths
{
    // Properties yang diterima dari ArsipVitalExport
    protected $headerData;
    protected $search;
    protected $filterKlasifikasiKeamanan;
    protected $tanggal_mulai;
    protected $tanggal_selesai;
    protected $user;
    protected $currentBidang;
    protected $selectedArsip;

    // Properti statis untuk melacak item count dan kriteria grouping
    private static $globalIndex = 0;
    private static $itemIndex = 0;
    private static $currentBerkasIndukId = null; 
    private static $lastBerkasIndukIdPrinted = null;

    public function __construct(
        $query, // Menerima null/query dari ArsipVitalExport wrapper
        array $headerData,
        ?string $search,
        ?string $filterKlasifikasiKeamanan,
        ?string $tanggal_mulai,
        ?string $tanggal_selesai,
        User $user,
        ?string $currentBidang,
        $selectedArsip // array atau Collection
    ) {
        $this->headerData = $headerData; 
        
        // Simpan semua filter yang dibutuhkan untuk membangun query
        $this->search = $search;
        $this->filterKlasifikasiKeamanan = $filterKlasifikasiKeamanan;
        $this->tanggal_mulai = $tanggal_mulai;
        $this->tanggal_selesai = $tanggal_selesai;
        $this->user = $user;
        $this->currentBidang = $currentBidang;
        $this->selectedArsip = $selectedArsip; 
        
        // Reset properti statis saat sheet baru dibuat
        $this->__destruct();
    }
    
    // Dipanggil sebelum diekspor
    public function __destruct() {
        self::$globalIndex = 0;
        self::$itemIndex = 0;
        self::$currentBerkasIndukId = null;
        self::$lastBerkasIndukIdPrinted = null;
    }


    /**
     * Membangun Query ArsipVital dan memproses relasi 'files'
     */
    public function collection()
    {
        $query = ArsipVital::query()->with('files');

        // Logika hak akses (diulang dari ArsipVitalSheet)
        if ($this->user->role === 'super_admin') {
            if ($this->currentBidang) {
                $query->where('bidang', $this->currentBidang);
            }
        } else {
            $query->where('bidang', $this->user->role);
        }

        // Filter berdasarkan ID terpilih
        $selectedArsip = is_array($this->selectedArsip) ? $this->selectedArsip : $this->selectedArsip->toArray();
        if (!empty($selectedArsip)) {
            $query->whereIn('id', $selectedArsip);
        } 
        // Atau filter berdasarkan pencarian/filter
        else {
            $query->when($this->search, function ($q) {
                $q->where(function($sq) {
                    $sq->where('nomor_berkas', 'like', '%' . $this->search . '%')
                        ->orWhere('asal_arsip', 'like', '%' . $this->search . '%')
                        ->orWhere('kode_klasifikasi', 'like', '%' . $this->search . '%')
                        ->orWhere('jenis_series_arsip', 'like', '%' . $this->search . '%');
                });
            });

            $query->when($this->filterKlasifikasiKeamanan, function ($q) {
                $q->whereRaw('LOWER(klasifikasi_keamanan) = ?', [strtolower($this->filterKlasifikasiKeamanan)]);
            });

            $query->when($this->tanggal_mulai, function ($q) {
                $q->whereDate('created_at', '>=', $this->tanggal_mulai);
            });
            $query->when($this->tanggal_selesai, function ($q) {
                $q->whereDate('created_at', '<=', $this->tanggal_selesai);
            });
        }
        
        $arsipVital = $query->get();
        $combinedFiles = collect();

        foreach ($arsipVital as $arsip) {
            $filteredFiles = $arsip->files;
            
            // Filter Isi File berdasarkan search global (untuk kolom uraian file)
            $search = $this->search;
            if ($search) {
                 $filteredFiles = $arsip->files->filter(function ($file) use ($search) {
                     return Str::contains(strtolower($file->uraian ?? ''), strtolower($search));
                 });
            }

            if ($filteredFiles->isNotEmpty()) {
                $filteredFiles->each(function ($file) use ($arsip, $combinedFiles) {
                    // Tambahkan ID ARSIP INDUK (Primary Key) untuk kriteria reset penomoran item
                    $file->arsip_vital_id_induk = $arsip->id; 
                    
                    // Tambahkan semua informasi Induk yang diperlukan ke objek detail file
                    $file->asal_arsip_induk = $arsip->asal_arsip; 
                    $file->nomor_berkas_induk = $arsip->nomor_berkas;
                    $file->kode_klasifikasi_induk = $arsip->kode_klasifikasi;
                    $file->jenis_series_arsip_induk = $arsip->jenis_series_arsip;
                    $file->isi_berkas_induk = $arsip->isi_berkas;
                    $file->bulan_tahun_induk = $arsip->bulan_tahun;
                    $file->jumlah_satuan_induk = $arsip->jumlah_satuan;
                    $file->klasifikasi_keamanan_induk = $arsip->klasifikasi_keamanan;
                    $file->keterangan_induk = $arsip->keterangan;
                    $file->retensi_arsip_vital_induk = $arsip->retensi_arsip_vital;
                    $file->lokasi_simpan_induk = $arsip->lokasi_simpan;
                    $file->metode_perlindungan_induk = $arsip->metode_perlindungan;
                    
                    $combinedFiles->push($file);
                });
            }
        }
        
        // PENGURUTAN: Berdasarkan ID ARSIP INDUK (kunci unik) lalu tanggal file.
        return $combinedFiles->sortBy(function ($file) {
            $tanggal = property_exists($file, 'tanggal_file') && $file->tanggal_file ? $file->tanggal_file : '9999-12-31';
            return $file->arsip_vital_id_induk . '-' . $tanggal; 
        });
    }

    public function title(): string
    {
        return 'Daftar Isi Berkas Vital';
    }

    public function headings(): array
    {
        // Heading disesuaikan dengan kolom-kolom vital
        return [
            'No.', // A
            'Asal Arsip Induk', // B
            'Nomor Berkas Induk', // C
            'Kode Klasifikasi Induk', // D
            'No. Item Arsip (Isi)', // E <-- ITEM NUMBER
            'Uraian Informasi Arsip', // F (Level Isi)
            'Tanggal File (Isi)', // G 
            'Jumlah Fisik (Isi)', // H
            'Jenis / Series Arsip Induk', // I
            'Klasifikasi Keamanan Induk', // J
            'Retensi Arsip Vital Induk', // K
            'Lokasi Simpan Induk', // L
            'Metode Perlindungan Induk', // M
            // Kolom N/O/P... tidak digunakan, jadi M adalah kolom terakhir
        ];
    }


    public function map($file): array
    {
        self::$globalIndex++; 

        $currentBerkasId = $file->arsip_vital_id_induk;

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
        // Kolom yang HANYA dicetak pada BARIS PERTAMA kelompok (seperti No. Berkas, Kode Klasifikasi)
        $shouldPrintInduk = self::$lastBerkasIndukIdPrinted !== $currentBerkasId;
        
        if ($shouldPrintInduk) {
            self::$lastBerkasIndukIdPrinted = $currentBerkasId;
        }

        // Helper function untuk menampilkan nilai Induk di baris pertama saja
        $printGroupValue = fn($value) => $shouldPrintInduk ? ($value ?? '-') : '';
        
        // Helper function untuk MENAMPILKAN nilai Induk di SETIAP BARIS
        $printAlwaysValue = fn($value) => $value ?? '-';

        // --- C. FORMATTING DETAIL (Tanggal) ---
        $rawTanggalFile = $file->tanggal_file ?? null; 
        
        $tanggalFile = $rawTanggalFile ? 
                       (Carbon::parse($rawTanggalFile)->isoFormat('DD MMMM YYYY') ?? '-') : 
                       '-';
        // -----------------------------------
        
        return [
            self::$globalIndex,                                         // A: No. (Global Index)
            $printGroupValue($file->asal_arsip_induk),                  // B: Asal Arsip Induk (Grouped)
            $printGroupValue($file->nomor_berkas_induk),                // C: No. Berkas Induk (Grouped)
            $printGroupValue($file->kode_klasifikasi_induk),            // D: Kode Klasifikasi Induk (Grouped)
            self::$itemIndex,                                           // E: No. Item Arsip (TETAP DICETAK)
            $file->uraian ?? '-',                                       // F: Uraian Informasi Arsip (Level Isi)
            $tanggalFile,                                               // G: Tanggal File (Isi)
            $file->jumlah ?? '-',                                       // H: Jumlah Fisik (Isi)
            // KOLOM YANG SELALU DICETAK:
            $printAlwaysValue($file->jenis_series_arsip_induk),         // I: Jenis / Series Arsip Induk
            $printAlwaysValue($file->klasifikasi_keamanan_induk),       // J: Klasifikasi Keamanan Induk
            $printAlwaysValue($file->retensi_arsip_vital_induk),        // K: Retensi Arsip Vital Induk
            $printAlwaysValue($file->lokasi_simpan_induk),              // L: Lokasi Simpan Induk
            $printAlwaysValue($file->metode_perlindungan_induk),        // M: Metode Perlindungan Induk
        ];
    }

    public function columnWidths(): array
    {
        // Disesuaikan hingga kolom M (total 13 kolom)
        return [
            'A' => 5,   // No
            'B' => 20,  // Asal Arsip
            'C' => 15,  // Nomor Berkas
            'D' => 15,  // Kode Klasifikasi
            'E' => 10,  // No. Item Arsip
            'F' => 45,  // Uraian Informasi Arsip (Isi)
            'G' => 15,  // Tanggal File
            'H' => 10,  // Jumlah Fisik
            'I' => 20,  // Jenis / Series Arsip
            'J' => 15,  // Klasifikasi Keamanan
            'K' => 15,  // Retensi Arsip Vital
            'L' => 20,  // Lokasi Simpan
            'M' => 20,  // Metode Perlindungan
        ];
    }
    
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                
                $sheet = $event->sheet;
                $lastColumn = 'M'; // Kolom terakhir di Sheet ini adalah M (13 kolom)
                $headerRow = 7; // Header dimulai dari baris 7 setelah 6 baris metadata
                $dataStartRow = 8; 

                // Sisipkan 6 baris untuk Judul dan Metadata
                $sheet->insertNewRowBefore(1, 6); 
                
                // --- Logika Header Laporan ---
                $sheet->mergeCells("A1:{$lastColumn}1");
                $sheet->setCellValue('A1', 'LAPORAN DAFTAR ISI BERKAS ARSIP VITAL');
                $sheet->mergeCells("A2:{$lastColumn}2");
                $sheet->setCellValue('A2', 'UNIT PENGOLAH: ' . $this->headerData['unitPengolah']);
                $sheet->mergeCells("A3:{$lastColumn}3");
                $sheet->setCellValue('A3', 'PERIODE: ' . $this->headerData['periode']);
                // Baris 4 dan 5 dibiarkan kosong
                
                // Styling Judul
                $sheet->getStyle('A1:A3')->applyFromArray([
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
                    
                    // Kolom teks yang harus rata kiri (Asal Arsip, Uraian Isi, dll.)
                    // B: Asal Arsip Induk, F: Uraian Informasi Arsip (Isi)
                    $sheet->getStyle("B{$dataStartRow}:C" . $lastDataRow)->getAlignment()->applyFromArray($styleLeftWrap);
                    $sheet->getStyle("F{$dataStartRow}:F" . $lastDataRow)->getAlignment()->applyFromArray($styleLeftWrap);
                }
            },
        ];
    }
}