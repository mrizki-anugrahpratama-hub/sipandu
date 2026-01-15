<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Arsip Aktif</title>
    <style>
        body { font-family: 'Helvetica', sans-serif; font-size: 10px; line-height: 1.4; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 10px; }
        th, td { border: 1px solid #777; padding: 6px; text-align: left; vertical-align: top; }
        th { 
            background-color: #D0E0FF; /* Warna biru muda */
            font-weight: bold; 
            text-align: center; 
            vertical-align: middle; 
        }
        .text-center { text-align: center; }
        .text-wrap { word-wrap: break-word; }
        .report-header { text-align: center; margin-bottom: 25px; line-height: 1.5; }
        .report-header h2 { margin: 0; font-size: 14px; text-transform: uppercase; font-weight: bold; }
        .report-header h3 { margin: 3px 0; font-size: 13px; text-transform: uppercase; font-weight: bold; }
        .report-header h4 { margin: 0; font-size: 12px; text-transform: uppercase; font-weight: normal; }
        
        /* Menghapus style untuk sub-tabel */
    </style>
</head>
<body>
    
    <div class="report-header">
        <h2>LAPORAN DAFTAR BERKAS ARSIP AKTIF</h2>
        <h3>UNIT PENGOLAH: {{ $unitPengolah }}</h3>
        <h4>PERIODE: {{ $periode }}</h4>
    </div>

    <table>
        <thead>
            <tr>
                <th class="text-center" style="width: 30px;">No</th>
                {{-- [BARU] Kolom Bidang hanya untuk Super Admin --}}
                @if(Str::contains($unitPengolah, 'ADMINISTRATOR UTAMA'))
                    <th>Unit/Bidang</th>
                @endif
                <th>Kode Klasifikasi</th>
                <th>Nomor Berkas</th>
                <th>Nama Berkas (Uraian)</th>
                <th>Tanggal Buat</th>
                <th class="text-center">Kurun Waktu</th>
                <th class="text-center">Jml Item</th>
                <th class="text-center">Retensi Aktif</th>
                <th class="text-center">Retensi Inaktif</th>
                <th class="text-center">Status Akhir</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @php 
                $isSuperAdmin = Str::contains($unitPengolah, 'ADMINISTRATOR UTAMA'); 
                // Hitung jumlah kolom total untuk colspan
                $colspanCount = $isSuperAdmin ? 12 : 11;
                // Penomoran dikembalikan ke fungsi standar
            @endphp
            
            @forelse($arsip as $index => $item)
                
                {{-- Baris Arsip Induk (SELALU DICETAK) --}}
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    @if($isSuperAdmin)
                        <td>{{ Str::title(str_replace('_', ' ', $item->bidang)) }}</td>
                    @endif
                    <td>{{ $item->kode_klasifikasi }}</td>
                    <td>{{ $item->nomor_berkas }}</td>
                    <td class="text-wrap">{{ $item->uraian ?? '-' }}</td>
                    {{-- Perbaikan Nullsafe tetap dipertahankan --}}
                    <td>{{ $item->tanggal_dibuat?->format('d/m/Y') }}</td>
                    <td class="text-center">{{ $item->kurun_waktu ?? '-' }}</td>
                    <td class="text-center">{{ $item->jumlah ?? 0 }}</td>
                    <td class="text-center">{{ $item->masa_retensi_aktif ?? '-' }}</td>
                    <td class="text-center">{{ $item->masa_retensi_inaktif ?? '-' }}</td>
                    <td class="text-center">{{ $item->status_akhir ?? '-' }}</td>
                    <td class="text-wrap">{{ $item->keterangan ?? '-' }}</td>
                </tr>

                {{-- LOGIKA BARIS DETAIL (SUB-TABEL) DIHAPUS --}}
                
            @empty
                <tr>
                    <td colspan="{{ $colspanCount }}" class="text-center">Data tidak ditemukan.</td>
                </tr>
            @endforelse
            
        </tbody>
    </table>
</body>
</html>