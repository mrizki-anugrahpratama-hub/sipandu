<style>
    /* 🎨 VARIABLES UNTUK DUA MODE (LIGHT/DARK) - Menggunakan Scope yang sama */
    .dashboard-scope {
        font-family: 'Inter', 'Poppins', 'Helvetica Neue', Arial, sans-serif; 
        --bg-page: #f8f9fe; 
        --bg-card: #ffffff; 
        --bg-subtle: #f0f3f9; 
        --text-main: #2d3748; 
        --text-sub: #a0aec0; 
        --border-color: #f0f3f9; 
        --primary: #4fd1c5; 
        --primary-soft: rgba(79, 209, 197, 0.1); 
        --shadow-soft-out: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        --color-green: #48bb78; 
        --color-yellow: #f6e05e; 
        --color-red: #fc8181; 
        --color-grey: #a0aec0;
        --chart-line: var(--primary); 
        --chart-grid: #e2e8f0; 
        --chart-fill: var(--primary-soft);
        --hero-bg: var(--bg-card); --hero-border: var(--border-color); --hero-text-title: var(--text-sub); --hero-text-number: var(--text-main); --hero-icon-bg: var(--bg-subtle); --hero-icon-color: var(--primary); --hero-badge-bg: var(--bg-subtle); --hero-badge-text: var(--text-sub); --hero-badge-border: var(--border-color);
    }

    /* DARK MODE */
    .dark .dashboard-scope, [class*="dark"] .dashboard-scope {
        --bg-page: #1a202c; --bg-card: #2d3748; --bg-subtle: #4a5568; --text-main: #ffffff; --text-sub: #a0aec0; --border-color: #4a5568; --primary: #4fd1c5; --primary-soft: rgba(79, 209, 197, 0.1); --shadow-soft-out: 0 4px 6px -1px rgba(0, 0, 0, 0.3), 0 2px 4px -1px rgba(0, 0, 0, 0.1); 
        --color-green: #68d391; --color-yellow: #f6e05e; --color-red: #fc8181; --color-grey: #a0aec0;
        --chart-line: var(--primary); --chart-grid: #4a5568; --chart-fill: var(--primary-soft); 
        --hero-bg: var(--bg-card); --hero-border: var(--border-color); --hero-text-title: var(--text-sub); --hero-text-number: var(--text-main); --hero-icon-bg: var(--bg-subtle); --hero-icon-color: var(--primary); --hero-badge-bg: var(--bg-subtle); --hero-badge-text: var(--text-sub); --hero-badge-border: var(--border-color);
    }
    
    /* 1. CONTAINER UTAMA */
    .dashboard-container { 
        height: 100%; 
        display: flex; 
        flex-direction: column; 
        background: transparent !important; 
        /* MODIFIKASI: Sembunyikan scrollbar utama, tapi pertahankan fungsi scroll */
        overflow-y: auto; 
        scrollbar-width: none; /* Firefox */
    }
    .dashboard-container::-webkit-scrollbar {
        display: none; /* Chrome, Safari, Edge */
        width: 0; 
    }

    .content-wrapper { padding: 0rem 3rem 2rem 3rem; flex: 1; background: transparent !important; }

    /* KARTU UMUM & CHART CARD */
    .d-card {
        background-color: var(--bg-card); border: 1px solid var(--border-color); color: var(--text-main);
        box-shadow: var(--shadow-soft-out); border-radius: 1.5rem; padding: 2rem; 
        display: flex; flex-direction: column; height: 100%; overflow: hidden;
    }
    .hero-card {
        background: var(--hero-bg); border: 1px solid var(--hero-border); border-radius: 1.5rem;
        box-shadow: var(--shadow-soft-out); backdrop-filter: none; -webkit-backdrop-filter: none;
    }

    /* STATISTIK KANAN */
    .stat-right-card {
        padding: 1.25rem; border-radius: 1.5rem; box-shadow: var(--shadow-soft-out);
        background-color: var(--bg-card); display: flex; align-items: center; justify-content: space-between;
    }
    .stat-right-card > div:first-child { flex-grow: 1; padding-right: 1rem; }
    .stat-right-title { font-size: 0.8rem; font-weight: 700; color: var(--text-sub); text-transform: uppercase; margin-bottom: 5px; }
    .stat-right-value { font-size: 1.8rem; font-weight: 800; color: var(--text-main); }
    .stat-right-icon { font-size: 2.2rem; flex-shrink: 0; }

    /* SVG CHART STYLES */
    .chart-svg { width: 100%; height: 100%; overflow: visible; }
    .chart-grid-line { stroke: var(--chart-grid); stroke-width: 1; stroke-dasharray: 4 4; }
    .chart-polyline {
        fill: none;
        stroke: var(--chart-line);
        stroke-width: 3;
        filter: none;
    }
    .chart-area {
        fill: url(#chartGradientSekretariat); 
        stroke: none;
        opacity: 0.8;
    }
    .chart-dot { fill: var(--bg-card); stroke: var(--chart-line); stroke-width: 3; r: 4; }
    .chart-dot:hover { r: 6; fill: var(--chart-line); cursor: pointer; }
    .chart-label { font-size: 12px; fill: var(--text-sub); text-anchor: middle; font-family: 'Inter', sans-serif; font-weight: 600; }
    .chart-label-value { font-size: 14px; font-weight: 700; fill: var(--text-main); }
    
    /* STYLE KHUSUS ITEM ARSIP */
    .arsip-list-container {
        display: flex; flex-direction: column; gap: 0.5rem; flex-grow: 1; 
        /* Scroll fungsional tanpa scrollbar visual */
        overflow-y: auto; 
        margin-top: 1rem;
        scrollbar-width: none; /* Firefox */
    }
    /* WebKit (Chrome, Safari, Edge) Scrollbar Hide */
    .arsip-list-container::-webkit-scrollbar {
        display: none; 
        width: 0;
    }

    .recent-list-item {
        display: flex; align-items: center; gap: 1rem; padding: 1rem; border-radius: 0.75rem; background: var(--bg-card); border: 1px solid var(--border-color); box-shadow: none; 
    }
    .recent-icon-wrapper {
        font-size: 1.2rem; color: var(--primary); width: 3rem; height: 3rem; display: flex; align-items: center; justify-content: center; flex-shrink: 0; background: var(--bg-subtle); border-radius: 0.75rem; box-shadow: none;
    }

    /* Layout Grids */
    .grid-content-responsive { 
        display: grid; grid-template-columns: 2fr 1fr; gap: 1.5rem; align-items: stretch; height: 100%; 
    } 
    .left-column-layout { display: flex; flex-direction: column; gap: 1.5rem; height: 100%; }
    .chart-wrapper { flex: 1.5; min-height: 280px; }
    .recent-list-wrapper { flex: 1; min-height: 200px; overflow: hidden; }

    /* Responsive */
    @media (max-width: 1024px) {
        .grid-content-responsive { grid-template-columns: 1fr; align-items: start; gap: 1.5rem; height: auto; } 
        .content-wrapper { padding: 1.5rem 2rem 2rem 2rem; } 
    }
    @media (max-width: 640px) {
        .content-wrapper { padding: 1rem; } 
        .chart-wrapper, .recent-list-wrapper { min-height: unset; flex: unset; }
    }
    
    /* FIX FOOTER */
    .dashboard-footer { background: transparent !important; margin-top: 2rem; padding: 1.5rem 3rem; border-top: 1px solid var(--border-color); }
</style>

<div class="dashboard-container dashboard-scope">
@php
    // DATA DUMMY/FALLBACK UNTUK SEKRETARIAT (Ganti dengan data dari Controller nanti)
    // Di Controller, filter data berdasarkan 'bidang' IN ('umum_kepegawaian', 'keuangan', 'penyusunan_program')
    
    $sekretariatTitle = 'Dashboard Sekretariat';
    
    // Statistik Sekretariat (Total dari 3 sub-bagian)
    $arsipAktifCount = $arsipAktifCount ?? 45; 
    $arsipInaktifCount = $arsipInaktifCount ?? 30; 
    $arsipVitalCount = $arsipVitalCount ?? 10; 
    $totalArsipCount = $arsipAktifCount + $arsipInaktifCount + $arsipVitalCount;
    
    // Data Chart (Dummy - Grafik aktivitas sekretariat)
    $chartData = $chartData ?? [
        'dataPoints' => [
            ['x' => 0, 'y' => 280, 'count' => 2, 'label' => 'Jum'],
            ['x' => 166, 'y' => 260, 'count' => 4, 'label' => 'Sab'],
            ['x' => 333, 'y' => 290, 'count' => 1, 'label' => 'Min'],
            ['x' => 500, 'y' => 200, 'count' => 10, 'label' => 'Sen'],
            ['x' => 666, 'y' => 150, 'count' => 15, 'label' => 'Sel'],
            ['x' => 833, 'y' => 220, 'count' => 8, 'label' => 'Rab'],
            ['x' => 1000, 'y' => 250, 'count' => 5, 'label' => 'Kam'],
        ],
        'svgPoints' => '0 280, 166 260, 333 290, 500 200, 666 150, 833 220, 1000 250' 
    ];

    // Logika Scaling Ulang Chart
    $chartHeight = 300;
    $paddingY = 20;
    $counts = array_column($chartData['dataPoints'], 'count');
    $maxCount = max(max($counts), 5); 

    $scaleY = function (int $count, int $maxCount, int $chartHeight, int $paddingY): int {
        if ($count === 0) return $chartHeight;
        $scaledY = $chartHeight - (($count / $maxCount) * ($chartHeight - $paddingY));
        return (int) $scaledY;
    };
    
    $gridYLevel1 = $scaleY(round($maxCount * 0.75), $maxCount, $chartHeight, $paddingY);
    $gridYLevel2 = $scaleY(round($maxCount * 0.50), $maxCount, $chartHeight, $paddingY);
    $gridYLevel3 = $scaleY(round($maxCount * 0.25), $maxCount, $chartHeight, $paddingY);
    
    // Data Arsip Terbaru (Lingkup Sekretariat)
    $recentArsip = $recentArsip ?? [
        (object)['nama_tampilan' => 'Laporan Keuangan Bulanan', 'bidang' => 'keuangan', 'user' => (object)['name' => 'Bendahara'], 'jenis_arsip_label' => 'AKTIF', 'jenis_arsip' => 'aktif', 'created_at' => now()->subHours(2), 'edit_route' => '#'],
        (object)['nama_tampilan' => 'Surat Keputusan Kenaikan Pangkat', 'bidang' => 'umum_kepegawaian', 'user' => (object)['name' => 'Staff HR'], 'jenis_arsip_label' => 'VITAL', 'jenis_arsip' => 'vital', 'created_at' => now()->subDay(), 'edit_route' => '#'],
        (object)['nama_tampilan' => 'Rencana Kerja Tahunan', 'bidang' => 'penyusunan_program', 'user' => (object)['name' => 'Ka. Program'], 'jenis_arsip_label' => 'INAKTIF', 'jenis_arsip' => 'inaktif', 'created_at' => now()->subDays(2), 'edit_route' => '#'],
    ];
@endphp

    {{-- Wrapper Utama Konten Dashboard --}}
    <div class="content-wrapper"> 
        
        {{-- LAYOUT GRID UTAMA (CHART & STATISTIK) --}}
        <div class="grid-content-responsive"> 
            
            {{-- KOLOM KIRI (CHART & RECENT LIST) --}}
            <div class="left-column-layout">
                
                {{-- 2.1. CHART (SVG) --}}
                <div class="d-card chart-wrapper"> 
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                        <h2 style="font-size: 1.25rem; font-weight: 700; color: var(--text-main);">Aktivitas Sekretariat (7 Hari)</h2> 
                        <span style="font-size: 0.75rem; padding: 4px 10px; background: var(--bg-subtle); border-radius: 1rem; color: var(--text-sub); font-weight: 700;">GRAFIK</span> 
                    </div>
                    
                    <div style="flex-grow: 1; position: relative; padding: 10px 20px 30px 20px;">
                        @if(isset($chartData) && !empty($chartData['dataPoints']))
                            <svg class="chart-svg" viewBox="0 0 1000 300" preserveAspectRatio="none">
                                <defs>
                                    <linearGradient id="chartGradientSekretariat" x1="0%" y1="0%" x2="0%" y2="100%">
                                        <stop offset="0%" style="stop-color:var(--chart-line); stop-opacity:0.3"/>
                                        <stop offset="100%" style="stop-color:var(--chart-line); stop-opacity:0"/>
                                    </linearGradient>
                                </defs>

                                {{-- Grid Lines Vertikal --}}
                                @foreach($chartData['dataPoints'] as $point)
                                    <line x1="{{ $point['x'] }}" y1="0" x2="{{ $point['x'] }}" y2="{{ $chartHeight }}" class="chart-grid-line" />
                                @endforeach
                                {{-- Grid Lines Horizontal --}}
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
                                        // $yPos = $scaleY($point['count'], $maxCount, $chartHeight, $paddingY);
                                        $isZero = $point['count'] === 0;
                                        $dotClass = 'chart-dot' . ($isZero ? ' is-zero' : '');
                                        $textFill = $isZero ? 'var(--text-sub)' : 'var(--text-main)';
                                    @endphp
                                    <circle cx="{{ $point['x'] }}" cy="{{ $point['y'] }}" class="charts-dot {{ $dotClass }}" />
                                    <text x="{{ $point['x'] }}" y="{{ $point['y'] - 15 }}" class="chart-label-value" style="fill: {{ $textFill }}; opacity: {{ $isZero ? 0.7 : 1 }};">{{ $point['count'] }}</text> 
                                    <text x="{{ $point['x'] }}" y="300" class="chart-label">{{ $point['label'] }}</text>
                                @endforeach
                            </svg>
                        @else
                            <div style="text-align: center; color: var(--text-sub); padding: 3rem;">
                                <i class="bi bi-bar-chart-line" style="font-size: 3rem; display: block; margin-bottom: 0.5rem; opacity: 0.5;"></i> 
                                <p style="font-weight: 600;">Belum ada data aktivitas.</p>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- 2.2. RECENT ARSIP LIST --}}
                <div class="d-card recent-list-wrapper"> 
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                        <h2 style="font-size: 1.25rem; font-weight: 700; color: var(--text-main);">Arsip Masuk (Sekretariat)</h2>
                        {{-- Link ke Log Aktivitas dengan Filter Sekretariat --}}
                        <a href="{{ route('log.aktivitas', ['filterBidang' => 'sekretariat']) }}" style="font-size: 0.9rem; color: var(--primary); text-decoration: none; font-weight: 600;" wire:navigate>Lihat Semua &rarr;</a> 
                    </div>
                    
                    <div class="arsip-list-container">
                        @forelse($recentArsip as $arsip)
                            {{-- MODIFIKASI: Mengganti <a> menjadi <div> dan menghapus href agar tidak bisa diklik --}}
                            <div class="recent-list-item" style="color: var(--text-main);">
                                <div class="recent-icon-wrapper"><i class="bi bi-file-earmark-text"></i></div>
                                <div style="flex: 1; min-width: 0;">
                                    <div class="arsip-title-line" style="font-weight: 600; font-size: 0.95rem;">{{ $arsip->nama_tampilan }}</div>
                                    <div class="arsip-sub-line" style="font-size: 0.85rem; color: var(--text-sub);">
                                        {{ ucwords(str_replace('_', ' ', $arsip->bidang)) }} • {{ $arsip->user->name ?? 'User' }}
                                    </div>
                                </div>
                                <div class="arsip-right-info" style="text-align: right;">
                                    <span class="arsip-badge" 
                                        @if(isset($arsip->jenis_arsip) && $arsip->jenis_arsip == 'inaktif') 
                                            style="background: var(--color-yellow); color: var(--text-main); font-size: 0.75rem; padding: 4px 8px; border-radius: 4px; font-weight: 700;"
                                        @elseif(isset($arsip->jenis_arsip) && $arsip->jenis_arsip == 'vital')
                                            style="background: var(--color-red); color: var(--bg-card); font-size: 0.75rem; padding: 4px 8px; border-radius: 4px; font-weight: 700;"
                                        @else
                                            style="background: var(--color-green); color: var(--bg-card); font-size: 0.75rem; padding: 4px 8px; border-radius: 4px; font-weight: 700;"
                                        @endif
                                    >
                                        {{ $arsip->jenis_arsip_label }}
                                    </span>
                                    <div class="arsip-time" style="font-size: 0.8rem; color: var(--text-sub); margin-top: 4px;">{{ $arsip->created_at->diffForHumans() }}</div>
                                </div>
                            </div>
                        @empty
                            <div style="text-align: center; padding: 3rem; color: var(--text-sub); flex: 1; display: flex; flex-direction: column; justify-content: center; border: 1px dashed var(--border-color); border-radius: 1rem;"> 
                                <i class="bi bi-inbox" style="font-size: 3rem; display: block; margin-bottom: 1rem; opacity: 0.4; color: var(--color-grey);"></i> 
                                <p style="font-weight: 600;">Belum ada arsip terbaru.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
            
            {{-- KOLOM KANAN (STATISTIK UTAMA) --}}
            <div style="display: flex; flex-direction: column; gap: 1.5rem; height: 100%;">
                <div style="font-size: 0.8rem; font-weight: 700; color: var(--text-sub); text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.5rem;">Statistik Sekretariat</div>
                
                {{-- TOTAL ARSIP SEKRETARIAT --}}
                <div class="hero-card" style="padding: 2rem; text-align: center; flex: 1.5; display: flex; flex-direction: column; justify-content: center;">
                    <div style="width: 3.5rem; height: 3.5rem; background: var(--hero-icon-bg); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem auto; color: var(--hero-icon-color); box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                        <i class="bi bi-building" style="font-size: 1.5rem;"></i>
                    </div>
                    <div style="font-size: 1rem; color: var(--hero-text-title); font-weight: 600;">Total Arsip Sekretariat</div>
                    <div style="font-size: 3rem; font-weight: 800; margin: 0.5rem 0; color: var(--hero-text-number);">{{ $totalArsipCount }}</div>
                    <div> 
                        <span style="font-size: 0.8rem; background: var(--hero-badge-bg); color: var(--hero-text-number); padding: 0.3rem 1rem; border-radius: 999px; border: 1px solid var(--hero-badge-border); font-weight: 600;">
                            Gabungan 3 Sub-Bagian
                        </span>
                    </div>
                </div>

                {{-- ARSIP AKTIF --}}
                <div class="stat-right-card" style="border-left-color: var(--color-green); flex: 1;">
                    <div>
                        <div class="stat-right-title">Arsip Aktif</div>
                        <div class="stat-right-value">{{ $arsipAktifCount ?? 0 }}</div>
                    </div>
                    <div class="stat-right-icon" style="color: var(--color-green);"><i class="bi bi-file-earmark-check"></i></div>
                </div>

                {{-- ARSIP INAKTIF --}}
                <div class="stat-right-card" style="border-left-color: var(--color-yellow); flex: 1;">
                    <div>
                        <div class="stat-right-title">Arsip Inaktif</div>
                        <div class="stat-right-value">{{ $arsipInaktifCount ?? 0 }}</div>
                    </div>
                    <div class="stat-right-icon" style="color: var(--color-yellow);"><i class="bi bi-archive"></i></div>
                </div>

                {{-- ARSIP VITAL --}}
                <div class="stat-right-card" style="border-left-color: var(--color-red); flex: 1;">
                    <div>
                        <div class="stat-right-title">Arsip Vital</div>
                        <div class="stat-right-value">{{ $arsipVitalCount ?? 0 }}</div>
                        </div>
                    <div class="stat-right-icon" style="color: var(--color-yellow);"><i class="bi bi-archive"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>