<style>
    /* 🎨 VARIABLES UNTUK DUA MODE (LIGHT/DARK) */
    .dashboard-scope {
        /* FONT UTAMA */
        font-family: 'Inter', 'Poppins', 'Helvetica Neue', Arial, sans-serif; 
        
        /* LIGHT MODE (DEFAULT) */
        --bg-page: #f8f9fe; 
        --bg-card: #ffffff; 
        --bg-subtle: #f0f3f9; 
        --text-main: #2d3748; 
        --text-sub: #a0aec0; 
        --border-color: #f0f3f9; 
        --primary: #4fd1c5; /* Teal */
        --primary-soft: rgba(79, 209, 197, 0.1); 
        --shadow-soft-out: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        --color-green: #48bb78; 
        --color-yellow: #f6e05e; 
        --color-red: #fc8181; 
        --color-grey: #a0aec0;

        --chart-line: var(--primary); 
        --chart-grid: #e2e8f0; 
        --chart-fill: var(--primary-soft); 
    }

    /* DARK MODE */
    .dark .dashboard-scope, [class*="dark"] .dashboard-scope {
        --bg-page: #1a202c; 
        --bg-card: #2d3748; 
        --bg-subtle: #4a5568; 
        --text-main: #ffffff; 
        --text-sub: #a0aec0; 
        --border-color: #4a5568; 
        --primary: #4fd1c5; /* Teal */
        --primary-soft: rgba(79, 209, 197, 0.1);
        --shadow-soft-out: 0 4px 6px -1px rgba(0, 0, 0, 0.3), 0 2px 4px -1px rgba(0, 0, 0, 0.1); 
        --color-green: #68d391;
        --color-yellow: #f6e05e;
        --color-red: #fc8181;
        --color-grey: #a0aec0;

        --chart-grid: #4a5568;
        --chart-line: var(--primary);
        --chart-fill: var(--primary-soft); 
    }
    
    /* 1. CONTAINER UTAMA */
    .dashboard-container {
        height: 100%;
        display: flex; 
        flex-direction: column;
        background: transparent !important; 
        /* ---- PERBAIKAN SCROLLBAR UTAMA ---- */
        overflow-y: auto; 
        scrollbar-width: none; /* Firefox */
    }
    /* WebKit (Chrome, Safari, Edge) Scrollbar Hide */
    .dashboard-container::-webkit-scrollbar {
        display: none; 
        width: 0; 
    }
    /* ------------------------------------ */
    .content-wrapper { 
        padding: 1rem 3rem 2rem 3rem; /* padding-top: 1rem */
        flex: 1; 
        background: transparent !important; 
    }

    /* KARTU UMUM */
    .d-card {
        background-color: var(--bg-card);
        border: 1px solid var(--border-color);
        color: var(--text-main);
        box-shadow: var(--shadow-soft-out); 
        border-radius: 1.5rem; 
        transition: all 0.3s ease; 
        padding: 2rem; 
        display: flex; 
        flex-direction: column;
        height: 100%; 
    }
    .d-card:hover {
        transform: none; 
        box-shadow: var(--shadow-soft-out); 
        border-color: var(--border-color);
    }
    
    /* Header Dashboard */
    .dashboard-header h2 {
        font-size: 1.8rem; 
        font-weight: 700; 
        color: var(--text-main);
    }
    .dashboard-header p {
        font-size: 1rem; 
        color: var(--text-sub);
        font-weight: 400; 
    }

    /* Style untuk Kotak Statistik Atas */
    .stat-card-top {
        padding: 1.5rem; 
        border-radius: 1.25rem; 
        border: 1px solid var(--border-color); 
        background-color: var(--bg-card);
        color: var(--text-main);
        transition: all 0.2s ease-out;
        text-decoration: none;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05), 0 4px 6px -2px rgba(0, 0, 0, 0.02); 
        display: flex; 
        flex-direction: column; 
        justify-content: space-between; 
        border-left: none !important;
    }
    
    .stat-card-top:hover {
        transform: translateY(-2px); 
        box-shadow: 0 15px 20px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.05); 
        border-color: var(--primary); 
    }

    /* Gaya Isi Statistik */
    .stat-content {
        display: flex; 
        justify-content: space-between; 
        align-items: flex-start; 
        flex-grow: 1;
        margin-bottom: 0.5rem;
    }
    .stat-text-group {
        display: flex;
        flex-direction: column;
    }
    .stat-icon-title {
        font-size: 0.8rem; 
        font-weight: 700; 
        display: flex; align-items: center; gap: 8px; 
        text-transform: uppercase; 
        letter-spacing: 0.1em; 
        color: var(--text-sub);
        margin-bottom: 5px;
    }
    .stat-value {
        font-size: 2.5rem; 
        font-weight: 800; 
        line-height: 1.2; 
        color: var(--text-main);
        margin-top: 0; 
    }
    .stat-desc {
        font-size: 0.9rem; 
        color: var(--text-sub);
        font-weight: 400; 
        margin-top: 5px;
    }

    /* Icon Wrapper di Card Stat */
    .stat-icon-wrapper-circle {
        font-size: 1.5rem;
        width: 3.5rem;
        height: 3.5rem;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        color: var(--bg-card); 
    }
    .stat-card-yellow .stat-icon-wrapper-circle { color: var(--text-main); } 

    /* STYLE KHUSUS ITEM ARSIP */
    .arsip-list-container {
        display: flex; 
        flex-direction: column; 
        gap: 0.5rem; 
        flex-grow: 1; 
        /* ---- PERBAIKAN SCROLLBAR ARSIP ---- */
        overflow-y: auto; 
        scrollbar-width: none; /* Firefox */
    }
    .arsip-list-container::-webkit-scrollbar {
        display: none; 
        width: 0; 
    }
    /* ------------------------------------ */
    .arsip-list-item {
        display: flex; align-items: center; gap: 1rem; 
        padding: 1rem 1rem; 
        background: var(--bg-card); 
        border: 1px solid var(--border-color); 
        border-radius: 0.75rem; 
        text-decoration: none; color: var(--text-main); 
        transition: all 0.2s ease; 
        box-shadow: none; 
    }
    .arsip-list-item:hover { 
        background: var(--bg-subtle); 
        border-color: var(--primary);
        box-shadow: 0 0 0 1px var(--primary); 
        transform: translateY(-1px); 
    }
    .arsip-icon-wrapper {
        font-size: 1.2rem; 
        color: var(--primary); 
        width: 3rem; 
        height: 3rem; 
        display: flex; align-items: center; justify-content: center; flex-shrink: 0;
        background: var(--bg-subtle); 
        border-radius: 0.75rem; 
        border: none;
        box-shadow: none;
    }
    .arsip-title-line {
        font-weight: 700; 
        font-size: 1rem; 
        color: var(--text-main); 
        margin-bottom: 0.1rem; 
    }
    .arsip-sub-line {
        font-size: 0.8rem; 
        color: var(--text-sub);
        font-weight: 400; 
    }
    .arsip-badge {
        font-size: 0.7rem; 
        padding: 0.2rem 0.6rem; 
        border-radius: 0.5rem; 
        font-weight: 700; 
        text-transform: uppercase;
        border: 1px solid transparent; 
    }
    .arsip-time {
        font-size: 0.8rem; 
        color: var(--text-sub);
        font-weight: 400; 
    }

    /* Chart SVG Styles */
    .chart-svg { overflow: visible; }
    .chart-grid-line { stroke: var(--chart-grid); stroke-width: 1; stroke-dasharray: 4 4; } 
    .chart-grid-base { stroke-width: 2 !important; stroke-dasharray: none !important; } 
    .chart-area { fill: url(#chartGradient); stroke: none; opacity: 0.8; }
    .chart-polyline { fill: none; stroke: var(--chart-line); stroke-width: 3; stroke-linecap: round; stroke-linejoin: round; } 
    .chart-dot { fill: var(--bg-card); stroke: var(--chart-line); stroke-width: 3; transition: r 0.2s; r: 4; } 
    .chart-dot.is-zero { r: 3; stroke-width: 1.5; fill: var(--bg-card); stroke: var(--chart-grid); } 
    .chart-dot:hover { r: 6; fill: var(--chart-line); cursor: pointer; }
    
    /* Chart Text/Labels */
    .d-card text {
        font-family: 'Inter', 'Poppins', 'Helvetica Neue', Arial, sans-serif !important;
        font-weight: 600; 
    }

    /* Layout Grids */
    .grid-stats-responsive-3 { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5rem; } 
    .grid-stats-responsive-4 { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.5rem; } 
    .grid-content-responsive { display: grid; grid-template-columns: 2fr 1fr; gap: 1.5rem; align-items: stretch; } 

    /* Responsive */
    @media (max-width: 1024px) {
        .grid-content-responsive { grid-template-columns: 1fr; align-items: start; gap: 1.5rem; } 
        .grid-stats-responsive-3, .grid-stats-responsive-4 { grid-template-columns: repeat(2, 1fr); gap: 1.5rem; }
        .content-wrapper { padding: 1.5rem 2rem 2rem 2rem; } 
        .dashboard-header h2 { font-size: 1.8rem; }
    }
    @media (max-width: 640px) {
        .grid-stats-responsive-3, .grid-stats-responsive-4 { grid-template-columns: 1fr; gap: 1rem; }
        .stat-card-top, .d-card { padding: 1rem; }
        .content-wrapper { padding: 1rem; } 
        .dashboard-header h2 { font-size: 1.5rem; }
    }
    
    /* FIX: CLASS KONSISTENSI */
    .text-main-color { color: var(--text-main); }
    .text-sub-color { color: var(--text-sub); }

    /* FIX TAMBAHAN UNTUK BACKGROUND FOOTER */
    .dashboard-footer {
        background: transparent !important; 
        margin-top: 2rem;
        padding: 1.5rem 3rem;
        border-top: 1px solid var(--border-color); 
    }
</style>

<div class="dashboard-container dashboard-scope">
@php
    // LOGIKA PHP UNTUK MENENTUKAN JUDUL DAN DATA DITEMPATKAN DI SINI.
    $bidangSlug = 'penyusunan_program'; /* <-- DIUBAH MENJADI PENYUSUNAN PROGRAM */
    $currentBidangTitle = 'Sub. Penyusunan Program'; /* <-- DIUBAH MENJADI PENYUSUNAN PROGRAM */
    $userRole = Auth::user()->role ?? 'super_admin'; 

    if(isset(Auth::user()->role) && Auth::user()->role !== 'super_admin') {
        $currentBidangTitle = ucwords(str_replace('_', ' ', Auth::user()->role));
    }

    // Penanganan Nilai Statistik (Fallback/Dummy)
    $arsipAktifCount = $arsipAktifCount ?? 1;
    $arsipInaktifCount = $arsipInaktifCount ?? 0;
    $arsipVitalCount = $arsipVitalCount ?? 0;
    $arsipDihapusCount = $arsipDihapusCount ?? 0;
    
    // Data Chart (Gunakan data yang dikirim, jika tidak ada, pakai fallback)
    $chartData = $chartData ?? [
        'dataPoints' => [
            ['x' => 0, 'y' => 280, 'count' => 0, 'label' => 'Jum'],
            ['x' => 166, 'y' => 280, 'count' => 0, 'label' => 'Sab'],
            ['x' => 333, 'y' => 280, 'count' => 0, 'label' => 'Min'],
            ['x' => 500, 'y' => 280, 'count' => 0, 'label' => 'Sen'],
            ['x' => 666, 'y' => 280, 'count' => 0, 'label' => 'Sel'],
            ['x' => 833, 'y' => 280, 'count' => 1, 'label' => 'Rab'],
            ['x' => 1000, 'y' => 50, 'count' => 3, 'label' => 'Kam'],
        ],
        // MENGGUNAKAN DATA Y ASLI DARI ARRAY (BUKAN HASIL SCALE)
        'svgPoints' => '0 280, 166 280, 333 280, 500 280, 666 280, 833 280, 1000 50' 
    ];

    // Logika Scaling Ulang (Diambil dari kode sebelumnya yang dinamis, untuk memastikan variabel grid level tersedia)
    $counts = array_column($chartData['dataPoints'], 'count');
    $maxCount = max(max($counts), 5); 
    $paddingY = 20; 
    $chartHeight = 280; // Disesuaikan menjadi 280 agar proporsional dengan y2 grid

    $scaleY = function (int $count, int $maxCount, int $chartHeight, int $paddingY): int {
        if ($count === 0) return $chartHeight;
        $scaledY = $chartHeight - (($count / $maxCount) * ($chartHeight - $paddingY));
        return (int) $scaledY;
    };
    
    $gridYLevel1 = $scaleY(round($maxCount * 0.75), $maxCount, $chartHeight, $paddingY);
    $gridYLevel2 = $scaleY(round($maxCount * 0.50), $maxCount, $chartHeight, $paddingY);
    $gridYLevel3 = $scaleY(round($maxCount * 0.25), $maxCount, $chartHeight, $paddingY);
    
    // Data Arsip Terbaru (Dummy/Fallback)
    $recentArsip = $recentArsip ?? [
        (object)['nama_tampilan' => 'Draft Rencana Kerja (RENJA) 2025', 'bidang' => $bidangSlug, 'user' => (object)['name' => 'Staf Program'], 'jenis_arsip_label' => 'AKTIF', 'jenis_arsip' => 'aktif', 'created_at' => now()->subHour(), 'edit_route' => '#'],
        (object)['nama_tampilan' => 'Laporan Kinerja Instansi Pemerintah (LAKIP)', 'bidang' => $bidangSlug, 'user' => (object)['name' => 'Kasubag Program'], 'jenis_arsip_label' => 'VITAL', 'jenis_arsip' => 'vital', 'created_at' => now()->subDay(), 'edit_route' => '#'],
        (object)['nama_tampilan' => 'Usulan Hasil Musrenbang Kecamatan', 'bidang' => $bidangSlug, 'user' => (object)['name' => 'Admin Perencanaan'], 'jenis_arsip_label' => 'INAKTIF', 'jenis_arsip' => 'inaktif', 'created_at' => now()->subDays(2), 'edit_route' => '#'],
    ];

@endphp

    {{-- Wrapper Utama Konten Dashboard --}}
    <div class="content-wrapper"> 
        
        {{-- 1. Statistik Atas --}}
        <div style="margin-bottom: 2rem;"> 
            <div class="dashboard-header" style="margin-bottom: 1.5rem;"> 
                <h2 class="text-main-color">Manajemen Arsip {{ $currentBidangTitle }}</h2> 
                <p class="text-sub-color">Ikhtisar total arsip dan aktivitas terbaru.</p> 
            </div>

            <section class="@if($userRole === 'super_admin') grid-stats-responsive-3 @else grid-stats-responsive-4 @endif">
                
                {{-- KONTEN STATISTIK AKTIF --}}
                <a href="{{ route('arsip.aktif.index', ['filterBidang' => $bidangSlug]) }}" class="stat-card-top stat-card-green" wire:navigate>
                    <div class="stat-content">
                        <div class="stat-text-group">
                            <div class="stat-icon-title"> ARSIP AKTIF</div>
                            <strong class="stat-value @if($arsipAktifCount === 0) is-zero @endif">{{ $arsipAktifCount }}</strong>
                        </div>
                        <div class="stat-icon-wrapper-circle" style="background-color: var(--color-green);"><i class="bi bi-file-earmark-check"></i></div>
                    </div>
                    <span class="stat-desc">Arsip penggunaan</span>
                </a>
                
                {{-- KONTEN STATISTIK INAKTIF --}}
                <a href="{{ route('arsip.inaktif.index', ['filterBidang' => $bidangSlug]) }}" class="stat-card-top stat-card-yellow" wire:navigate>
                    <div class="stat-content">
                        <div class="stat-text-group">
                            <div class="stat-icon-title"> ARSIP INAKTIF</div>
                            <strong class="stat-value @if($arsipInaktifCount === 0) is-zero @endif">{{ $arsipInaktifCount }}</strong>
                        </div>
                        <div class="stat-icon-wrapper-circle" style="background-color: var(--color-yellow);"><i class="bi bi-archive"></i></div>
                    </div>
                    <span class="stat-desc">Arsip simpanan</span>
                </a>
                
                {{-- KONTEN STATISTIK VITAL --}}
                <a href="{{ route('arsip.vital.index', ['filterBidang' => $bidangSlug]) }}" class="stat-card-top stat-card-red" wire:navigate>
                    <div class="stat-content">
                        <div class="stat-text-group">
                            <div class="stat-icon-title"> ARSIP VITAL</div>
                            <strong class="stat-value @if($arsipVitalCount === 0) is-zero @endif">{{ $arsipVitalCount }}</strong>
                        </div>
                        <div class="stat-icon-wrapper-circle" style="background-color: var(--color-red);"><i class="bi bi-file-earmark-lock"></i></div>
                    </div>
                    <span class="stat-desc">Arsip permanen</span>
                </a>
                
                @if($userRole !== 'super_admin')
                {{-- KONTEN STATISTIK RECYCLE BIN --}}
                <a href="{{ route('recycle-bin.index') }}" class="stat-card-top stat-card-grey" wire:navigate>
                    <div class="stat-content">
                        <div class="stat-text-group">
                            <div class="stat-icon-title"> RECYCLE BIN</div>
                            <strong class="stat-value @if($arsipDihapusCount === 0) is-zero @endif">{{ $arsipDihapusCount }}</strong>
                        </div>
                        <div class="stat-icon-wrapper-circle" style="background-color: var(--color-grey);"><i class="bi bi-trash"></i></div>
                    </div>
                    <span class="stat-desc">Arsip yang dihapus</span>
                </a>
                @endif
            </section>
        </div>

        {{-- 2. Grid Konten (Chart & List) --}}
        <div class="grid-content-responsive"> 
            
            {{-- 2.1. CHART (SVG) --}}
            <div class="d-card"> 
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                    <h2 style="font-size: 1.25rem; font-weight: 700; color: var(--text-main);">Tren Aktivitas (7 Hari)</h2> 
                    <span style="font-size: 0.75rem; padding: 4px 10px; background: var(--bg-subtle); border-radius: 1rem; color: var(--text-sub); font-weight: 700;">AKTIF</span> 
                </div>
                
                <div style="height: 300px; width: 100%; display: flex; align-items: center; justify-content: center;"> 
                    @if(isset($chartData) && !empty($chartData['dataPoints']))
                        <div style="width: 100%; height: 100%; position: relative; padding: 10px 20px 30px 20px;">
                            {{-- MENGGUNAKAN VIEWBOX ASLI 0 0 1000 300 --}}
                            <svg class="chart-svg" viewBox="0 0 1000 300" preserveAspectRatio="none">
                                <defs>
                                    <linearGradient id="chartGradient" x1="0%" y1="0%" x2="0%" y2="100%">
                                        <stop offset="0%" style="stop-color:var(--chart-line); stop-opacity:0.3"/>
                                        <stop offset="100%" style="stop-color:var(--chart-line); stop-opacity:0"/>
                                    </linearGradient>
                                </defs>

                                {{-- Grid Lines Vertikal --}}
                                @foreach($chartData['dataPoints'] as $point)
                                    <line x1="{{ $point['x'] }}" y1="0" x2="{{ $point['x'] }}" y2="{{ $chartHeight }}" class="chart-grid-line" />
                                @endforeach
                                {{-- Grid Lines Horizontal (Dinamis) --}}
                                <line x1="0" y1="{{ $gridYLevel1 }}" x2="1000" y2="{{ $gridYLevel1 }}" class="chart-grid-line" />
                                <line x1="0" y1="{{ $gridYLevel2 }}" x2="1000" y2="{{ $gridYLevel2 }}" class="chart-grid-line" />
                                <line x1="0" y1="{{ $gridYLevel3 }}" x2="1000" y2="{{ $gridYLevel3 }}" class="chart-grid-line" />
                                <line x1="0" y1="{{ $chartHeight }}" x2="1000" y2="{{ $chartHeight }}" class="chart-grid-line chart-grid-base" />
                                
                                {{-- Area Fill --}}
                                <polyline points="0 {{ $chartHeight }}, {{ $chartData['svgPoints'] }}, 1000 {{ $chartHeight }}" class="chart-area"/>

                                {{-- Polyline --}}
                                <polyline points="{{ $chartData['svgPoints'] }}" class="chart-polyline" />
                                
                                {{-- Dots and Labels --}}
                                @foreach($chartData['dataPoints'] as $point)
                                    @php
                                        // Menggunakan Y posisi dari data points ($point['y'])
                                        $isZero = $point['count'] === 0;
                                        $dotClass = 'chart-dot' . ($isZero ? ' is-zero' : '');
                                        $textFill = $isZero ? 'var(--text-sub)' : 'var(--text-main)';
                                    @endphp
                                    <circle cx="{{ $point['x'] }}" cy="{{ $point['y'] }}" class="charts-dot {{ $dotClass }}" />
                                    <text x="{{ $point['x'] }}" y="{{ $point['y'] - 15 }}" style="font-size: 14px; font-weight: 700; fill: {{ $textFill }}; opacity: {{ $isZero ? 0.7 : 1 }}; text-anchor: middle;">{{ $point['count'] }}</text> 
                                    <text x="{{ $point['x'] }}" y="300" style="font-size: 12px; fill: var(--text-sub); text-anchor: middle;">{{ $point['label'] }}</text>
                                @endforeach
                            </svg>
                        </div>
                    @else
                        <div style="text-align: center; color: var(--text-sub); padding: 3rem;">
                            <i class="bi bi-bar-chart-line" style="font-size: 3rem; display: block; margin-bottom: 0.5rem; opacity: 0.5;"></i> 
                            <p style="font-weight: 600;">Belum ada data aktivitas.</p>
                        </div>
                    @endif
                </div>
            </div>

            {{-- 2.2. RECENT ARSIP LIST --}}
            <div class="d-card"> 
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                    <h2 style="font-size: 1.25rem; font-weight: 700; color: var(--text-main);">Arsip Masuk Terbaru</h2>
                    <a href="{{ route('log.aktivitas', ['filterBidang' => $bidangSlug]) }}" style="font-size: 0.9rem; color: var(--primary); text-decoration: none; font-weight: 600;" wire:navigate>Lihat Semua &rarr;</a> 
                </div>
                
                <div class="arsip-list-container">
                    @forelse($recentArsip as $arsip)
                        {{-- MODIFIKASI: Menggunakan div, menghapus href, tapi mempertahankan class arsip-list-item --}}
                        <div class="arsip-list-item">
                            <div class="arsip-icon-wrapper"><i class="bi bi-file-earmark-text"></i></div>
                            <div style="flex: 1; min-width: 0;">
                                <div class="arsip-title-line">{{ $arsip->nama_tampilan }}</div>
                                <div class="arsip-sub-line">
                                    {{ ucwords(str_replace('_', ' ', $arsip->bidang)) }} • {{ $arsip->user->name ?? 'User' }}
                                </div>
                            </div>
                            <div class="arsip-right-info">
                                <span class="arsip-badge" 
                                    @if(isset($arsip->jenis_arsip) && $arsip->jenis_arsip == 'inaktif') 
                                            style="background: var(--color-yellow); color: var(--text-main); border-color: var(--color-yellow);"
                                    @elseif(isset($arsip->jenis_arsip) && $arsip->jenis_arsip == 'vital')
                                            style="background: var(--color-red); color: var(--bg-card); border-color: var(--color-red);"
                                    @else
                                            style="background: var(--color-green); color: var(--bg-card); border-color: var(--color-green);"
                                    @endif
                                >
                                    {{ $arsip->jenis_arsip_label }}
                                </span>
                                <div class="arsip-time">{{ $arsip->created_at->diffForHumans() }}</div>
                            </div>
                        </div>
                    @empty
                        <div style="text-align: center; padding: 3rem; color: var(--text-sub); flex: 1; display: flex; flex-direction: column; justify-content: center;"> 
                            <i class="bi bi-inbox" style="font-size: 3rem; display: block; margin-bottom: 1rem; opacity: 0.4; color: var(--color-grey);"></i> 
                            <p style="font-weight: 600;">Belum ada arsip terbaru.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    
    {{-- FOOTER --}}
    <footer class="text-sub-color dashboard-footer" style="border-top: 1px solid var(--border-color); text-align: center; font-size: 0.8rem;"> 
        &copy; {{ date('Y') }} SIPANDU. Hak Cipta Dilindungi.
    </footer>
</div>