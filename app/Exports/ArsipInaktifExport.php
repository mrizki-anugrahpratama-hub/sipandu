<?php

namespace App\Exports;

use App\Exports\Sheets\ArsipInaktifSheet;
use App\Exports\Sheets\IsiBerkasInaktifSheet;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ArsipInaktifExport implements WithMultipleSheets
{
    use Exportable;
    
    // Properties yang dikirim dari Livewire/Controller
    protected $query;
    protected $search;
    protected $filterStatusAkhir;
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
        Builder $query, // Query Builder yang sudah difilter
        bool $laporanBerkas, // TRUE jika ingin mencetak Daftar Berkas
        bool $laporanIsiBerkas, // TRUE jika ingin mencetak Daftar Isi Berkas
        ?string $search,
        ?string $filterStatusAkhir,
        ?string $tanggal_mulai,
        ?string $tanggal_selesai,
        User $user,
        ?string $currentBidang,
        Collection $selectedArsip,
        string $unitPengolah,
        string $periode
    ) {
        $this->query = $query;
        $this->laporanBerkas = $laporanBerkas;
        $this->laporanIsiBerkas = $laporanIsiBerkas;
        
        // Data filter lainnya
        $this->search = $search;
        $this->filterStatusAkhir = $filterStatusAkhir;
        $this->tanggal_mulai = $tanggal_mulai;
        $this->tanggal_selesai = $tanggal_selesai;
        $this->user = $user;
        $this->currentBidang = $currentBidang;
        $this->selectedArsip = $selectedArsip;
        $this->unitPengolah = $unitPengolah;
        $this->periode = $periode;
    }

    /**
     * Menentukan sheet mana saja yang akan dimasukkan dalam file Excel
     * berdasarkan flag $laporanBerkas dan $laporanIsiBerkas.
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [];
        
        // Data Header yang diperlukan oleh kedua Sheet
        $headerData = [
            'unitPengolah' => $this->unitPengolah,
            'periode' => $this->periode,
            // Mengambil status filter. Jika kosong, gunakan 'SEMUA STATUS'.
            'status' => strtoupper($this->filterStatusAkhir) ?: 'SEMUA STATUS', 
            // Kirimkan search query ke sheet isi berkas untuk filtering di level file.
            'search' => $this->search,
        ];

        // OPSI 1 & 3: Daftar Berkas (Sheet 1)
        if ($this->laporanBerkas) {
            // Menggunakan ArsipInaktifSheet untuk mencetak Daftar Berkas (Induk)
            // Clone query agar tidak mengganggu query sheet Isi Berkas
            $sheets[] = new ArsipInaktifSheet(clone $this->query, $headerData); 
        }

        // OPSI 2 & 3: Daftar Isi Berkas (Sheet 2)
        if ($this->laporanIsiBerkas) {
            // Menggunakan IsiBerkasInaktifSheet untuk mencetak Detail Item (Anak)
            $sheets[] = new IsiBerkasInaktifSheet( 
                clone $this->query, 
                $headerData
            );
        }

        return $sheets;
    }
}