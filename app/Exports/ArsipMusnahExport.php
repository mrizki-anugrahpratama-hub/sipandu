<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection; // Menggunakan FromCollection untuk keandalan
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\Exportable;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ArsipMusnahExport implements FromCollection, WithHeadings, WithMapping, WithTitle, ShouldAutoSize, WithEvents
{
    use Exportable;
    
    protected $data; // Menggunakan Collection
    protected $headerData;
    private $rowNumber = 0;
    private $columnCount = 11; // Jumlah kolom data yang diekspor

    /**
     * @param Collection $data Koleksi ArsipInaktif yang sudah dieksekusi dari Livewire
     * @param array $headerData Data header laporan (Unit Pengolah, Periode, Status, dll.)
     */
    public function __construct(Collection $data, array $headerData)
    {
        $this->data = $data;
        $this->headerData = $headerData;
    }

    public function collection()
    {
        return $this->data; // Mengembalikan koleksi
    }

    public function title(): string
    {
        return 'Daftar Arsip Musnah';
    }
    
    public function headings(): array
    {
        // Menentukan status berdasarkan tab aktif
        $status = $this->headerData['status'];
        
        // Asumsi jika ada filter Akses
        $akses = isset($this->headerData['filterAkses']) && $this->headerData['filterAkses'] ? ' / ' . $this->headerData['filterAkses'] : '';

        // Header laporan (Baris 1-4)
        $headings = [
            // R1: Judul Laporan (Akan di merge)
            [$this->headerData['judulLaporan']], 
            // R2: Unit Pengolah
            ['UNIT PENGOLAH: ' . strtoupper($this->headerData['unitPengolah'])],
            // R3: Periode
            ['PERIODE: ' . strtoupper($this->headerData['periode'])], 
            // R4: Status
            ['STATUS: ' . strtoupper($status) . $akses], 
            // R5: Baris kosong sebagai pemisah visual
            [''], 
        ];

        // R6: Header Kolom Tabel (11 Kolom)
        $columnHeaders = [
            'No.',
            'Nomor Box',
            'Nomor Berkas',
            'Kode Klasifikasi & Index',
            'Uraian',
            'Kurun Waktu',
            'Jumlah',
            // Tanggal ini bergantung pada tab aktif
            'Tanggal ' . ($this->headerData['activeTab'] === 'selesai' ? 'Musnah' : 'Retensi Akhir'),
            'Klasifikasi Keamanan',
            'Klasifikasi Akses',
            'Tingkat Perkembangan',
        ];

        return array_merge($headings, [$columnHeaders]);
    }

    public function map($arsip): array
    {
        $this->rowNumber++;

        // Tentukan tanggal yang akan ditampilkan
        $tanggalTerakhir = $this->headerData['activeTab'] === 'selesai'
            ? ($arsip->tanggal_eksekusi ? Carbon::parse($arsip->tanggal_eksekusi)->format('d M Y H:i') : '-')
            : ($arsip->tgl_retensi_berakhir ? Carbon::parse($arsip->tgl_retensi_berakhir)->format('d M Y H:i') : '-');

        return [
            $this->rowNumber, // Kolom A
            $arsip->nomor_box ?? '-', // Kolom B
            $arsip->nomor_berkas ?? '-', // Kolom C
            $arsip->kode_klasifikasi . ($arsip->index ? '.' . $arsip->index : ''), // Kolom D
            $arsip->uraian ?? '-', // Kolom E
            $arsip->kurun_waktu ?? '-', // Kolom F
            $arsip->jumlah ?? 0, // Kolom G
            $tanggalTerakhir, // Kolom H
            $arsip->klasifikasi_keamanan ?? '-', // Kolom I
            $arsip->klasifikasi_akses ?? '-', // Kolom J
            $arsip->tingkat_perkembangan ?? '-', // Kolom K
        ];
    }
    
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                $lastColumn = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($this->columnCount);
                
                // --- 1. STYLING HEADER LAPORAN (Baris 1 s.d. 4) ---
                
                // Judul Laporan (R1) - Merge dan tebalkan
                $sheet->mergeCells('A1:' . $lastColumn . '1');
                $sheet->getStyle('A1')->applyFromArray([
                    'font' => ['bold' => true, 'size' => 14],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
                ]);
                
                // Metadata (R2-R4) - Rata Kiri
                $sheet->getStyle('A2:' . $lastColumn . '4')->applyFromArray([
                    'font' => ['bold' => true, 'size' => 11],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_LEFT],
                ]);
                
                // Merge Cell untuk Metadata
                for ($i = 2; $i <= 4; $i++) {
                    $sheet->mergeCells('A' . $i . ':' . $lastColumn . $i);
                }

                // --- 2. STYLING HEADER KOLOM TABEL (Baris 6) ---
                $headerRow = 6;
                $headerRange = 'A' . $headerRow . ':' . $lastColumn . $headerRow;

                $sheet->getStyle($headerRange)->applyFromArray([
                    'font' => ['bold' => true, 'size' => 10, 'color' => ['argb' => 'FFFFFFFF']], // Warna teks putih
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                        'vertical' => Alignment::VERTICAL_CENTER,
                        'wrapText' => true,
                    ],
                    'borders' => ['allBorders' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]],
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => ['argb' => 'FF1D4ED8'], // Warna biru tua (#1d4ed8)
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

                // Set alignment spesifik untuk kolom sentral
                $lastDataRow = $sheet->getHighestRow();
                $centerAlignColumns = ['A', 'B', 'C', 'F', 'G', 'H', 'I', 'J', 'K'];
                foreach ($centerAlignColumns as $col) {
                    $sheet->getStyle($col . '7:' . $col . $lastDataRow)
                          ->getAlignment()
                          ->setHorizontal(Alignment::HORIZONTAL_CENTER);
                }
                
                // Kolom uraian (E) dan Kode Klasifikasi (D) rata kiri/tengah
                $sheet->getStyle('E7:E' . $lastDataRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
                $sheet->getStyle('D7:D' . $lastDataRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            },
        ];
    }
}