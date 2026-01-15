<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Berkas Inaktif</title>
    <style>
        body { 
            font-family: 'Helvetica', sans-serif; 
            font-size: 9px; /* Ukuran font sedikit lebih kecil */
            line-height: 1.3;
        }
        table { 
            width: 100%; 
            border-collapse: collapse; 
        }
        th, td { 
            border: 1px solid #777; 
            padding: 5px; /* Padding lebih kecil */
            text-align: left; 
            vertical-align: top;
            word-wrap: break-word; /* Membantu memecah teks */
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
        <h2>LAPORAN DAFTAR BERKAS ARSIP INAKTIF</h2>
        <h3>UNIT PENGOLAH: {{ $unitPengolah }}</h3>
        <h4>PERIODE: {{ $periode }}</h4>
    </div>

    <table>
        <thead>
            <tr>
                <th class="text-center" style="width: 25px;">No</th>
                <th>Nomor Box</th>
                <th>Nomor Berkas</th>
                <th>Kode Klasifikasi</th>
                <th style="width: 40px;">Index</th>
                <th style="width: 150px;">Uraian</th> <th class="text-center">Bulan/Tahun</th>
                <th class="text-center">Jml Satuan</th>
                <th class="text-center">Kls. Keamanan</th>
                <th class="text-center">Kls. Akses</th>
                <th class="text-center">Tkt. Perkmbgn</th>
                <th class="text-center">Nasib Akhir</th>
            </tr>
        </thead>
        <tbody>
            @forelse($arsip as $index => $item)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $item->nomor_box }}</td>
                    <td>{{ $item->nomor_berkas }}</td>
                    <td>{{ $item->kode_klasifikasi }}</td>
                    <td>{{ $item->index }}</td>
                    <td class="text-wrap">{{ $item->uraian }}</td>
                    <td class="text-center">{{ $item->bulan_tahun }}</td>
                    <td class="text-center">{{ $item->jumlah_satuan }}</td>
                    <td class="text-center">{{ $item->klasifikasi_keamanan }}</td>
                    <td class="text-center">{{ $item->klasifikasi_akses }}</td>
                    <td class="text-center">{{ $item->tingkat_perkembangan }}</td>
                    <td class="text-center">{{ $item->nasib_akhir }}</td>
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