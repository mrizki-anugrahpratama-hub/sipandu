<?php

namespace App\Exports\Sheets;

use App\Models\ArsipAktif;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class ArsipAktifSheet implements FromQuery, WithTitle, WithHeadings, WithMapping, WithEvents, WithColumnWidths
{
    private $query;
    private $headerData;

    public function __construct(Builder $query, array $headerData)
    {
        $this->query = $query;
        $this->headerData = $headerData;
    }

    public function query()
    {
        // Query sudah difilter di Livewire, hanya perlu diurutkan
        return $this->query->select([
            'nomor_berkas', 'kode_klasifikasi', 'index', 'uraian', 'kurun_waktu', 
            'jumlah', 'masa_retensi_aktif', 'masa_retensi_inaktif', 
            'klasifikasi_keamanan', 'klasifikasi_akses', 'tingkat_perkembangan', 'status_akhir'
        ])->withCasts(['created_at' => 'datetime']);
    }

    public function title(): string
    {
        return 'Daftar Berkas';
    }

    public function headings(): array
    {
        return [
            'No', 
            'Nomor Berkas', 
            'Kode Klasifikasi', 
            'Index',             // Kolom D (Teks Panjang)
            'Nama Berkas',       // Kolom E (Teks Panjang)
            'Kurun Waktu',
            'Jumlah Item',
            'Retensi Aktif',
            'Retensi Inaktif',
            'Klasifikasi Keamanan',
            'Klasifikasi Akses',
            'Tingkat Perkembangan',
            'Status Akhir',
        ];
    }

    public function map($arsip): array
    {
        static $index = 0;
        $index++;

        return [
            $index, 
            $arsip->nomor_berkas ?? '-', 
            $arsip->kode_klasifikasi ?? '-', 
            $arsip->index ?? '-', 
            $arsip->uraian ?? '-', // Nama Berkas (Kolom E)
            $arsip->kurun_waktu ?? '-',
            $arsip->jumlah ?? '-', 
            $arsip->masa_retensi_aktif ?? '-', 
            $arsip->masa_retensi_inaktif ?? '-', 
            $arsip->klasifikasi_keamanan ?? '-',
            $arsip->klasifikasi_akses ?? '-',
            $arsip->tingkat_perkembangan ?? '-',
            $arsip->status_akhir ?? '-',
        ];
    }

    public function columnWidths(): array
    {
        // Menyesuaikan lebar kolom Index (D) dan Nama Berkas (E)
        return [
            'A' => 5, 
            'B' => 18, 
            'C' => 18, 
            'D' => 40, // Index 
            'E' => 45, // Nama Berkas
            'F' => 12, // Kurun Waktu
            'G' => 10, // Jumlah Item
            'H' => 12, 
            'I' => 12, 
            'J' => 18, 
            'K' => 18, 
            'L' => 18, 
            'M' => 12, 
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet;
                $lastColumn = $sheet->getHighestColumn();
                $sheet->insertNewRowBefore(1, 5);
                
                // Header data dari Livewire
                $sheet->setCellValue('A1', 'LAPORAN DAFTAR BERKAS ARSIP AKTIF');
                $sheet->setCellValue('A2', 'UNIT PENGOLAH: ' . $this->headerData['unitPengolah']);
                $sheet->setCellValue('A3', 'PERIODE: ' . $this->headerData['periode']);
                $sheet->setCellValue('A4', 'STATUS: ' . $this->headerData['status']);

                $sheet->mergeCells("A1:{$lastColumn}1");
                $sheet->mergeCells("A2:{$lastColumn}2");
                $sheet->mergeCells("A3:{$lastColumn}3");
                $sheet->mergeCells("A4:{$lastColumn}4");

                // Styling Judul
                $sheet->getStyle('A1:A4')->applyFromArray([
                    'font' => ['bold' => true, 'size' => 14],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
                ]);

                // Styling Header Tabel
                $lastRow = $sheet->getHighestRow();
                if ($lastRow >= 6) { 
                    $tableRange = "A6:{$lastColumn}" . $lastRow;
                    $headerRange = "A6:{$lastColumn}6";

                    $sheet->getStyle($tableRange)->applyFromArray([
                        'borders' => ['allBorders' => ['borderStyle' => Border::BORDER_THIN, 'color' => ['argb' => 'FF000000']]],
                    ]);
                    $sheet->getStyle($headerRange)->applyFromArray([
                        'font' => ['bold' => true, 'color' => ['argb' => 'FFFFFFFF']],
                        'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['argb' => 'FF4F81BD']],
                        'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER, 'wrapText' => true],
                    ]);
                }
                
                // Styling Data Detail
                if ($lastRow >= 7) { 
                    $sheet->getStyle('A7:M' . $lastRow)->getAlignment()->applyFromArray([
                        'vertical' => Alignment::VERTICAL_CENTER, // Rata tengah vertikal untuk semua baris
                        'wrapText' => true,
                        // Secara default, rata tengah horizontal diterapkan di sini.
                        'horizontal' => Alignment::HORIZONTAL_CENTER 
                    ]);
                    
                    // PENGEcualian: Kolom Index (D) dan Nama Berkas (E) harus rata kiri.
                    // Kolom-kolom lain akan tetap rata tengah.
                    $sheet->getStyle('D7:E' . $lastRow)->getAlignment()->applyFromArray(['horizontal' => Alignment::HORIZONTAL_LEFT]);
                }
            },
        ];
    }
}