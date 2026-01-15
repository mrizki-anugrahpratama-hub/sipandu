<?php

namespace App\Exports\Sheets;

use App\Models\ArsipInaktif;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

// Note: Kelas ini hanya mencetak Daftar BERKAS INAKTIF (Induk)
class ArsipInaktifSheet implements FromQuery, WithTitle, WithHeadings, WithMapping, WithEvents, WithColumnWidths
{
    private $query;
    private $headerData;
    
    public function __construct(Builder $query, array $headerData)
    {
        $this->query = $query;
        $this->headerData = $headerData;
    }
    
    public function title(): string
    {
        return 'Daftar Berkas Inaktif';
    }

    /**
     * Fungsi Query untuk mengambil data ArsipInaktif
     * Query sudah di-clone dan difilter di ArsipInaktifExport.
     */
    public function query()
    {
        // Hanya perlu select kolom yang relevan
        return $this->query->select([
            'nomor_box', 'nomor_berkas', 'kode_klasifikasi', 'index', 'uraian', 
            'kurun_waktu', 'jumlah', 'klasifikasi_keamanan', 'klasifikasi_akses', 
            'tingkat_perkembangan', 'status_akhir'
        ])->orderBy('created_at', 'desc');
    }

    /**
     * Menentukan header kolom
     */
    public function headings(): array
    {
        return [
            'No', // A
            'Nomor Box', // B
            'Nomor Berkas', // C
            'Kode Klasifikasi', // D
            'Index', // E
            'Nama Berkas', // F (Uraian)
            'Kurun Waktu', // G
            'Jumlah Item', // H (Jumlah)
            'Klasifikasi Keamanan', // I
            'Klasifikasi Akses', // J
            'Tingkat Perkembangan', // K
            'Status Akhir', // L
        ];
    }

    /**
     * Memetakan data arsip ke kolom Excel.
     */
    public function map($arsip): array
    {
        static $index = 0;
        $index++;
        
        return [
            $index,
            $arsip->nomor_box ?? '-',
            $arsip->nomor_berkas ?? '-',
            $arsip->kode_klasifikasi ?? '-',
            $arsip->index ?? '-',
            $arsip->uraian ?? '-', // Nama Berkas (Uraian)
            $arsip->kurun_waktu ?? '-',
            $arsip->jumlah ?? '-', // Jumlah Item
            $arsip->klasifikasi_keamanan ?? '-', 
            $arsip->klasifikasi_akses ?? '-',
            $arsip->tingkat_perkembangan ?? '-',
            $arsip->status_akhir ?? '-',
        ];
    }

    /**
     * Menentukan lebar kolom secara manual.
     */
    public function columnWidths(): array
    {
        return [
            'A' => 5,    // No
            'B' => 18,   // Nomor Box
            'C' => 18,   // Nomor Berkas
            'D' => 35,   // Kode Klasifikasi
            'E' => 40,   // Index
            'F' => 45,   // Nama Berkas (Uraian)
            'G' => 12,   // Kurun Waktu
            'H' => 10,   // Jumlah Item
            'I' => 18,   // Klasifikasi Keamanan
            'J' => 18,   // Klasifikasi Akses
            'K' => 20,   // Tingkat Perkembangan
            'L' => 18,   // Status Akhir
        ];
    }

    /**
     * Event untuk styling, judul, dan metadata
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                
                $sheet = $event->sheet;
                $lastColumn = 'L'; // 12 kolom
                $headerRow = 6; 
                $dataStartRow = 7; 

                // 1. Sisipkan 5 baris untuk Judul dan Metadata
                $sheet->insertNewRowBefore(1, 5); 
                $sheet->setCellValue('A1', 'LAPORAN DAFTAR BERKAS ARSIP INAKTIF');
                $sheet->setCellValue('A2', 'UNIT PENGOLAH: ' . $this->headerData['unitPengolah']);
                $sheet->setCellValue('A3', 'PERIODE: ' . $this->headerData['periode']);
                
                $sheet->setCellValue('A4', 'STATUS: ' . $this->headerData['status']);

                // Merge Cell dan Styling Judul/Metadata
                $sheet->mergeCells("A1:{$lastColumn}1");
                $sheet->mergeCells("A2:{$lastColumn}2");
                $sheet->mergeCells("A3:{$lastColumn}3");
                $sheet->mergeCells("A4:{$lastColumn}4");

                $sheet->getStyle('A1')->applyFromArray([
                    'font' => ['bold' => true, 'size' => 14],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
                ]);
                $sheet->getStyle('A2:A4')->applyFromArray([
                    'font' => ['bold' => true],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
                ]);


                // 2. Styling Header (Baris 6)
                $lastDataRow = $sheet->getHighestRow();
                $headerRange = "A{$headerRow}:{$lastColumn}{$headerRow}";
                $tableRange = "A{$headerRow}:{$lastColumn}" . $lastDataRow;

                // Garis tabel
                if ($lastDataRow >= $headerRow) {
                    $sheet->getStyle($tableRange)->applyFromArray([
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => Border::BORDER_THIN,
                                'color' => ['argb' => 'FF000000'], 
                            ],
                        ],
                    ]);
                }

                // Latar Header Biru
                $sheet->getStyle($headerRange)->applyFromArray([
                    'font' => ['bold' => true, 'color' => ['argb' => 'FFFFFFFF']], 
                    'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['argb' => 'FF4F81BD']], 
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                        'vertical' => Alignment::VERTICAL_CENTER,
                        'wrapText' => true
                    ],
                ]);
                
                
                // 3. Styling Data (Mulai baris 7)
                if ($lastDataRow >= $dataStartRow) { 
                    $styleCenterWrap = [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                        'vertical'    => Alignment::VERTICAL_TOP, 
                        'wrapText'    => true
                    ];
                    $styleLeftWrap = [
                        'horizontal' => Alignment::HORIZONTAL_LEFT,
                        'vertical'    => Alignment::VERTICAL_TOP, 
                        'wrapText'    => true
                    ];

                    // Terapkan default (rata tengah, top wrap)
                    $sheet->getStyle("A{$dataStartRow}:{$lastColumn}" . $lastDataRow)->getAlignment()->applyFromArray($styleCenterWrap);

                    // Pengecualian: Kolom Kode Klasifikasi (D), Index (E), dan Nama Berkas (F) rata kiri.
                    $sheet->getStyle("D{$dataStartRow}:F" . $lastDataRow)->getAlignment()->applyFromArray($styleLeftWrap);
                }
            },
        ];
    }
}