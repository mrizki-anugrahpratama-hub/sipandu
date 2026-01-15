<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Arsip Vital</title>
    <style>
        body { 
            font-family: 'Helvetica', sans-serif; 
            font-size: 9px; 
            line-height: 1.3;
        }
        table { 
            width: 100%; 
            border-collapse: collapse; 
        }
        th, td { 
            border: 1px solid #777; 
            padding: 5px; 
            text-align: left; 
            vertical-align: top;
            word-wrap: break-word;
        }
        th { 
            background-color: #f0f0f0; 
            font-weight: bold;
            text-align: center;
            vertical-align: middle;
        }
        .text-center { text-align: center; }
        .text-wrap { word-wrap: break-word; }
        
        .report-header {
            text-align: center;
            margin-bottom: 25px;
            line-height: 1.5;
        }
        .report-header h2 {
            margin: 0;
            font-size: 14px;
            text-transform: uppercase;
            font-weight: bold;
        }
        .report-header h3 {
            margin: 3px 0;
            font-size: 13px;
            text-transform: uppercase;
            font-weight: bold;
        }
        .report-header h4 {
            margin: 0;
            font-size: 12px;
            text-transform: uppercase;
            font-weight: normal;
        }
    </style>
</head>
<body>
    
    <div class="report-header">
        <h2>LAPORAN DAFTAR BERKAS ARSIP VITAL</h2>
        <h3>UNIT PENGOLAH: {{ $unitPengolah }}</h3>
        <h4>PERIODE: {{ $periode }}</h4>
    </div>

    <table>
        <thead>
            <tr>
                <th class"text-center" style="width: 25px;">No</th>
                <th>Asal Arsip</th>
                <th>Nomor Berkas</th>
                <th>Kode Klasifikasi</th>
                <th style="width: 130px;">Isi Berkas</th>
                <th class="text-center">Bulan/Tahun</th>
                <th class="text-center">Jml Satuan</th>
                <th class="text-center">Kls. Keamanan</th>
                <th style="width: 130px;">Keterangan</th>
                <th class="text-center">Retensi Vital</th>
                <th>Lokasi Simpan</th>
                <th>Metode Perlindungan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($arsip as $index => $item)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $item->asal_arsip }}</td>
                    <td>{{ $item->nomor_berkas }}</td>
                    <td>{{ $item->kode_klasifikasi }}</td>
                    <td class="text-wrap">{{ $item->isi_berkas }}</td>
                    <td class="text-center">{{ $item->bulan_tahun }}</td>
                    <td class="text-center">{{ $item->jumlah_satuan }}</td>
                    <td class="text-center">{{ $item->klasifikasi_keamanan }}</td>
                    <td class="text-wrap">{{ $item->keterangan ?? '-' }}</td>
                    <td class="text-center">{{ $item->retensi_arsip_vital }}</td>
                    <td>{{ $item->lokasi_simpan }}</td>
                    <td>{{ $item->metode_perlindungan }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="12" class="text-center">Data tidak ditemukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>