<?php

namespace App\Exports\Sheets;

use App\Models\ArsipVital;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
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

class ArsipVitalSheet implements FromQuery, WithTitle, WithHeadings, WithMapping, WithEvents, WithColumnWidths
{
    // Semua properti filter dari konstruktor VitalExport yang asli
    protected $search;
    protected $filterKlasifikasiKeamanan;
    protected $tanggal_mulai;
    protected $tanggal_selesai;
    protected $user;
    protected $currentBidang;
    protected $selectedArsip;
    // Header data (unitPengolah, periode)
    protected $headerData;

    public function __construct(
        $query, // Query Builder yang sudah difilter (tidak digunakan di sini, tapi diterima)
        array $headerData,
        ?string $search,
        ?string $filterKlasifikasiKeamanan,
        ?string $tanggal_mulai,
        ?string $tanggal_selesai,
        User $user,
        ?string $currentBidang,
        $selectedArsip
    ) {
        // Menggunakan $headerData untuk unitPengolah dan periode
        $this->headerData = $headerData; 
        
        // Simpan semua filter yang dibutuhkan untuk membangun query
        $this->search = $search;
        $this->filterKlasifikasiKeamanan = $filterKlasifikasiKeamanan;
        $this->tanggal_mulai = $tanggal_mulai;
        $this->tanggal_selesai = $tanggal_selesai;
        $this->user = $user;
        $this->currentBidang = $currentBidang;
        // Konversi ke array jika bukan array (sesuai kebutuhan query)
        $this->selectedArsip = is_array($selectedArsip) ? $selectedArsip : $selectedArsip->toArray(); 
    }
    
    public function title(): string
    {
        return 'Daftar Berkas Vital';
    }

    public function query()
    {
        $query = ArsipVital::query();

        // Logika hak akses (diulang dari kode asli)
        if ($this->user->role === 'super_admin') {
            if ($this->currentBidang) {
                $query->where('bidang', $this->currentBidang);
            }
        } else {
            $query->where('bidang', $this->user->role);
        }

        // Filter berdasarkan ID terpilih
        if (!empty($this->selectedArsip)) {
            $query->whereIn('id', $this->selectedArsip);
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

        return $query->orderBy('created_at', 'desc');
    }

    public function headings(): array
    {
        return [
            'No', // A
            'Asal Arsip / Unit Kerja', // B
            'Nomor Berkas', // C
            'Kode Klasifikasi', // D
            'Jenis / Series Arsip', // E
            'Isi Berkas', // F
            'Bulan / Tahun', // G
            'Jumlah Satuan', // H
            'Klasifikasi Keamanan', // I
            'Keterangan', // J
            'Retensi Arsip Vital', // K
            'Lokasi Simpan', // L
            'Metode Perlindungan', // M
        ];
    }

    public function map($arsip): array
    {
        static $index = 0;
        $index++;
        
        return [
            $index,
            $arsip->asal_arsip,
            $arsip->nomor_berkas,
            $arsip->kode_klasifikasi,
            $arsip->jenis_series_arsip,
            $arsip->isi_berkas,
            $arsip->bulan_tahun,
            $arsip->jumlah_satuan,
            $arsip->klasifikasi_keamanan,
            $arsip->keterangan ?? '-',
            $arsip->retensi_arsip_vital,
            $arsip->lokasi_simpan,
            $arsip->metode_perlindungan,
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 5,   
            'B' => 20, 
            'C' => 15, 
            'D' => 15, 
            'E' => 20, 
            'F' => 40, 
            'G' => 12, 
            'H' => 10, 
            'I' => 15, 
            'J' => 40, 
            'K' => 15, 
            'L' => 20, 
            'M' => 20, 
        ];
    }

    // Mengganti styles() dengan registerEvents() untuk konsistensi header
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet;
                $lastColumn = 'M';
                $headerRow = 7;
                $dataStartRow = 8;
                
                $sheet->insertNewRowBefore(1, 6); 

                // Header Metadata
                $sheet->mergeCells("A1:{$lastColumn}1");
                $sheet->setCellValue('A1', 'LAPORAN DAFTAR BERKAS ARSIP VITAL');
                $sheet->mergeCells("A2:{$lastColumn}2");
                $sheet->setCellValue('A2', 'UNIT PENGOLAH: ' . $this->headerData['unitPengolah']);
                $sheet->mergeCells("A3:{$lastColumn}3");
                $sheet->setCellValue('A3', 'PERIODE: ' . $this->headerData['periode']);

                // Styling Judul
                $sheet->getStyle('A1:A3')->applyFromArray([
                    'font' => ['bold' => true, 'size' => 14],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
                ]);
                
                // Styling Tabel
                $lastDataRow = $sheet->getHighestRow();
                $tableRange = "A{$headerRow}:{$lastColumn}" . $lastDataRow;
                $headerRange = "A{$headerRow}:{$lastColumn}{$headerRow}";

                $sheet->getStyle($tableRange)->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['argb' => 'FF000000'],
                        ],
                    ],
                    'alignment' => ['vertical' => Alignment::VERTICAL_TOP, 'wrapText' => true],
                ]);

                $sheet->getStyle($headerRange)->applyFromArray([
                    'font' => ['bold' => true, 'color' => ['argb' => 'FF000000']],
                    'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['argb' => 'FFF0F0F0']],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER, 'wrapText' => true],
                ]);
                
                // Alignment Khusus
                if ($lastDataRow >= $dataStartRow) {
                    $sheet->getStyle("A{$dataStartRow}:A" . $lastDataRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                    $sheet->getStyle("G{$dataStartRow}:I" . $lastDataRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                    $sheet->getStyle("K{$dataStartRow}:K" . $lastDataRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                }
            },
        ];
    }
}