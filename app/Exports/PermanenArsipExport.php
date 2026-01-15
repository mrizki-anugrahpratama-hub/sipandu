<?php

namespace App\Exports;

use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\Exportable;
use Carbon\Carbon;

// Kelas ini sekarang mengimplementasikan semua interface yang dibutuhkan 
// untuk menghasilkan satu sheet Excel yang rapi (Unified Export).
class PermanenArsipExport implements FromQuery, WithHeadings, WithMapping, WithTitle, ShouldAutoSize, WithEvents
{
    use Exportable;
    
    protected $query;
    protected $headerData;
    private $rowNumber = 0;

    /**
     * Data yang dibutuhkan sekarang dilewatkan langsung ke constructor.
     * $headerData kini menjadi parameter tunggal yang membawa semua metadata.
     */
    public function __construct(Builder $query, array $headerData)
    {
        $this->query = $query;
        $this->headerData = $headerData;
    }

    public function query()
    {
        // Menggunakan query yang sudah difilter dari Livewire
        return $this->query;
    }

    public function title(): string
    {
        return 'Daftar Arsip Permanen';
    }
    
    public function headings(): array
    {
        // --- Baris Header Laporan (Mirip dengan format yang Anda berikan) ---
        
        // Menyiapkan string periode
        $periode = $this->headerData['tanggal_mulai'] && $this->headerData['tanggal_selesai']
                 ? $this->headerData['tanggal_mulai'] . ' s.d. ' . $this->headerData['tanggal_selesai']
                 : $this->headerData['periode'];

        // Menentukan status (karena ini Arsip Permanen, status default adalah PERMANEN)
        $status = 'PERMANEN';
        // Asumsi jika ada filter Akses di Livewire, bisa digunakan sebagai keterangan tambahan
        $akses = isset($this->headerData['filterAkses']) && $this->headerData['filterAkses'] ? ' / ' . $this->headerData['filterAkses'] : '';


        $headings = [
            // R1: Judul Laporan (Akan di merge)
            [$this->headerData['judulLaporan']], 
            // R2: Unit Pengolah
            ['UNIT PENGOLAH: ' . strtoupper($this->headerData['unitPengolah'])],
            // R3: Periode
            ['PERIODE: ' . strtoupper($periode)], 
            // R4: Status
            ['STATUS: ' . strtoupper($status) . $akses], 
            // R5: Baris kosong sebagai pemisah visual
            [''], 
        ];

        // R6: Header Kolom Tabel
        $columnHeaders = [
            'No.',
            'Nomor Box',
            'Nomor Berkas',
            'Kode Klasifikasi',
            'Uraian',
            'Kurun Waktu',
            'Jumlah',
            'Klasifikasi Akses',
            'Tanggal Permanen',
            'Keterangan',
        ];

        return array_merge($headings, [$columnHeaders]);
    }

    public function map($arsip): array
    {
        $this->rowNumber++;
        return [
            $this->rowNumber,
            $arsip->nomor_box ?? '-',
            $arsip->nomor_berkas ?? '-',
            $arsip->kode_klasifikasi ?? '-',
            $arsip->uraian ?? '-',
            $arsip->kurun_waktu ?? '-',
            $arsip->jumlah ?? 0,
            $arsip->klasifikasi_akses ?? '-',
            // Menggunakan tanggal_permanen sesuai dengan model Livewire
            $arsip->tanggal_permanen ? Carbon::parse($arsip->tanggal_permanen)->format('Y-m-d H:i') : 'Menunggu',
            $arsip->keterangan ?? '-',
        ];
    }
    
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                $lastColumn = $sheet->getHighestColumn();
                
                // --- 1. STYLING HEADER LAPORAN (Baris 1 s.d. 4) ---
                
                // Judul Laporan (R1) - Merge dan tebalkan
                $sheet->mergeCells('A1:' . $lastColumn . '1');
                $sheet->getStyle('A1')->applyFromArray([
                    'font' => ['bold' => true, 'size' => 14],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
                ]);
                
                // Metadata (R2-R4) - Tebalkan dan Rata Kiri
                $sheet->getStyle('A2:A4')->applyFromArray([
                    'font' => ['bold' => true],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_LEFT],
                ]);

                // --- 2. STYLING HEADER KOLOM TABEL (Baris 6) ---
                $headerRange = 'A6:' . $lastColumn . '6';

                $sheet->getStyle($headerRange)->applyFromArray([
                    'font' => ['bold' => true, 'size' => 10],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                        'vertical' => Alignment::VERTICAL_CENTER,
                        'wrapText' => true,
                    ],
                    'borders' => ['allBorders' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]],
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => ['argb' => 'FFEBEBEB'], // Warna abu-abu muda
                    ],
                ]);
                
                // --- 3. STYLING ISI TABEL (Baris 7 dan seterusnya) ---
                $dataRange = 'A7:' . $lastColumn . $sheet->getHighestRow();
                $sheet->getStyle($dataRange)->applyFromArray([
                    'borders' => ['allBorders' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]],
                    'alignment' => [
                        'vertical' => Alignment::VERTICAL_TOP,
                        'wrapText' => true,
                    ]
                ]);
            },
        ];
    }
}