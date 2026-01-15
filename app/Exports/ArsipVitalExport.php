<?php

namespace App\Exports;

use App\Exports\Sheets\ArsipVitalSheet;
use App\Exports\Sheets\IsiBerkasVitalSheet;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithStyles;

class ArsipVitalExport implements WithMultipleSheets
{
    use Exportable;
    
    // Properties sama seperti Arsip Vital yang lama, ditambah flag
    protected $search;
    protected $filterKlasifikasiKeamanan;
    protected $tanggal_mulai;
    protected $tanggal_selesai;
    protected $user;
    protected $currentBidang;
    protected $selectedArsip;
    protected $unitPengolah;
    protected $periode;
    
    // FLAGS untuk menentukan jenis laporan yang dicetak
    protected $laporanBerkas;
    protected $laporanIsiBerkas;

    public function __construct(
        bool $laporanBerkas,
        bool $laporanIsiBerkas,
        ?string $search,
        ?string $filterKlasifikasiKeamanan,
        ?string $tanggal_mulai, 
        ?string $tanggal_selesai, 
        User $user,
        ?string $currentBidang,
        $selectedArsip, // Bisa Collection atau array
        string $unitPengolah, 
        string $periode 
    ) {
        $this->laporanBerkas = $laporanBerkas;
        $this->laporanIsiBerkas = $laporanIsiBerkas;
        
        // Data filter
        $this->search = $search;
        $this->filterKlasifikasiKeamanan = $filterKlasifikasiKeamanan;
        $this->tanggal_mulai = $tanggal_mulai;
        $this->tanggal_selesai = $tanggal_selesai;
        $this->user = $user;
        $this->currentBidang = $currentBidang;
        $this->selectedArsip = $selectedArsip;
        $this->unitPengolah = $unitPengolah; 
        $this->periode = $periode; 
    }

    /**
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [];
        
        // Data Header yang sama untuk kedua sheet
        $headerData = [
            'unitPengolah' => $this->unitPengolah,
            'periode' => $this->periode,
        ];

        // 1. Sheet Daftar Berkas (Vital Induk)
        if ($this->laporanBerkas) {
            $sheets[] = new ArsipVitalSheet(
                null, // Query builder tidak diperlukan di sini karena query dibangun di dalam Sheet
                $headerData,
                $this->search,
                $this->filterKlasifikasiKeamanan,
                $this->tanggal_mulai,
                $this->tanggal_selesai,
                $this->user,
                $this->currentBidang,
                $this->selectedArsip
            );
        }

        // 2. Sheet Daftar Isi Berkas (Detail Item)
        if ($this->laporanIsiBerkas) {
            $sheets[] = new IsiBerkasVitalSheet(
                null, // Query builder tidak diperlukan di sini karena query dibangun di dalam Sheet
                $headerData,
                $this->search,
                $this->filterKlasifikasiKeamanan,
                $this->tanggal_mulai,
                $this->tanggal_selesai,
                $this->user,
                $this->currentBidang,
                $this->selectedArsip
            );
        }

        return $sheets;
    }
}