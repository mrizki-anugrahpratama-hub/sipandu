<style>
    /* 🎨 VARIABLES UNTUK DUA MODE (LIGHT/DARK) */
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
        /* Tambahan untuk arsip list */
        --arsip-title-color: var(--text-main);
        --arsip-sub-color: var(--text-sub);
        --arsip-time-color: var(--text-sub);
    }

    /* DARK MODE */
    .dark .dashboard-scope, [class*="dark"] .dashboard-scope {
        --bg-page: #1a202c; --bg-card: #2d3748; --bg-subtle: #4a5568; --text-main: #ffffff; --text-sub: #a0aec0; --border-color: #4a5568; --primary: #4fd1c5; --primary-soft: rgba(79, 209, 197, 0.1); --shadow-soft-out: 0 4px 6px -1px rgba(0, 0, 0, 0.3), 0 2px 4px -1px rgba(0, 0, 0, 0.1); 
        --color-green: #68d391; --color-yellow: #f6e05e; --color-red: #fc8181; --color-grey: #a0aec0;
        --chart-line: var(--primary); --chart-grid: #4a5568; --chart-fill: var(--primary-soft); 
        --hero-bg: var(--bg-card); --hero-border: var(--border-color); --hero-text-title: var(--text-sub); --hero-text-number: var(--text-main); --hero-icon-bg: var(--bg-subtle); --hero-icon-color: var(--primary); --hero-badge-bg: var(--bg-subtle); --hero-badge-text: var(--text-sub); --hero-badge-border: var(--border-color);
        /* Tambahan untuk arsip list */
        --arsip-title-color: var(--text-main);
        --arsip-sub-color: var(--text-sub);
        --arsip-time-color: var(--text-sub);
    }
    
    /* 1. CONTAINER UTAMA */
    .dashboard-container { 
        height: 100%; 
        display: flex; 
        flex-direction: column; 
        background: transparent !important; 
        /* ---- PERBAIKAN: Sembunyikan scrollbar utama, tapi pertahankan fungsi scroll ---- */
        overflow-y: auto; 
        scrollbar-width: none; /* Firefox */
    }
    /* WebKit (Chrome, Safari, Edge) Scrollbar Hide */
    .dashboard-container::-webkit-scrollbar {
        display: none; 
        width: 0; 
    }
    /* ----------------------------------------------------------- */

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
        /* Tambahan untuk visual */
        border-left: 5px solid transparent; 
    }
    .stat-right-card > div:first-child { flex-grow: 1; padding-right: 1rem; }
    .stat-right-title { font-size: 0.8rem; font-weight: 700; color: var(--text-sub); text-transform: uppercase; margin-bottom: 5px; }
    .stat-right-value { font-size: 1.8rem; font-weight: 800; color: var(--text-main); }
    .stat-right-icon { font-size: 2.2rem; flex-shrink: 0; }

    /* SVG CHART STYLES (DIPERBAIKI) */
    .chart-svg { width: 100%; height: 100%; overflow: visible; }
    .chart-grid-line { stroke: var(--chart-grid); stroke-width: 1; stroke-dasharray: 4 4; }
    .chart-polyline {
        fill: none;
        stroke: var(--chart-line);
        stroke-width: 3;
        filter: none; 
    }
    .chart-area {
        fill: url(#chartGradient); 
        stroke: none;
        opacity: 0.8;
    }
    .chart-dot { fill: var(--bg-card); stroke: var(--chart-line); stroke-width: 3; r: 4; }
    .chart-dot:hover { r: 6; fill: var(--chart-line); cursor: pointer; }
    .chart-label { 
        font-size: 11px; /* Dikecilkan untuk memberi ruang horizontal */ 
        fill: var(--text-sub); 
        text-anchor: middle; 
        font-family: 'Inter', sans-serif; 
        font-weight: 600; 
    }
    .chart-label-value { 
        font-size: 14px; 
        font-weight: 700; 
        fill: var(--text-main); 
    }
    
    /* STYLE KHUSUS ITEM ARSIP */
    .arsip-list-container {
        display: flex; flex-direction: column; gap: 0.5rem; flex-grow: 1; 
        /* Scroll fungsional tanpa scrollbar visual */
        overflow-y: auto; 
        margin-top: 1rem;
        scrollbar-width: none; /* Untuk Firefox */
    }
    /* WebKit (Chrome, Safari, Edge) Scrollbar Hide */
    .arsip-list-container::-webkit-scrollbar {
        display: none; 
        width: 0;
    }

    .recent-list-item {
        display: flex; align-items: center; gap: 1rem; padding: 1rem; border-radius: 0.75rem; background: var(--bg-card); border: 1px solid var(--border-color); box-shadow: none; 
        transition: all 0.2s;
    }
    .recent-list-item:hover {
        background: var(--bg-subtle);
        border-color: var(--primary-soft);
    }
    .recent-icon-wrapper {
        font-size: 1.2rem; color: var(--primary); width: 3rem; height: 3rem; display: flex; align-items: center; justify-content: center; flex-shrink: 0; background: var(--bg-subtle); border-radius: 0.75rem; box-shadow: none;
    }
    .arsip-title-line { font-weight: 600; font-size: 0.95rem; color: var(--arsip-title-color); overflow: hidden; white-space: nowrap; text-overflow: ellipsis; }
    .arsip-sub-line { font-size: 0.8rem; color: var(--arsip-sub-color); margin-top: 2px; }
    .arsip-right-info { text-align: right; flex-shrink: 0; }
    .arsip-badge { display: inline-block; font-size: 0.65rem; font-weight: 700; padding: 3px 8px; border-radius: 999px; border: 1px solid; text-transform: uppercase; }
    .arsip-time { font-size: 0.75rem; color: var(--arsip-time-color); margin-top: 4px; font-weight: 500;}


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
        .recent-list-wrapper { max-height: 400px; } /* Batasi tinggi di mobile/tablet */
    }
    @media (max-width: 640px) {
        .content-wrapper { padding: 1rem; } 
        .chart-wrapper, .recent-list-wrapper { min-height: unset; flex: unset; }
    }
    
    /* FIX FOOTER */
    .dashboard-footer { background: transparent !important; margin-top: 2rem; padding: 1.5rem 3rem; border-top: 1px solid var(--border-color); }
    .dark .dashboard-footer { color: var(--text-sub); } /* Tambahan Dark Mode Footer */
</style>

<div class="dashboard-container dashboard-scope">
    @php
        // ====================================================================
        // LOGIKA PHP UNTUK MENENTUKAN JUDUL DAN DATA DITEMPATKAN DI SINI.
        // Data ini idealnya berasal dari Livewire Component atau Controller.
        // ====================================================================
        $bidangSlug = 'sistem'; 
        $currentBidangTitle = 'Overview Sistem'; 
        $userRole = Auth::user()->role ?? 'sekretariat'; 

        // Mengatur Judul berdasarkan Role
        if(isset(Auth::user()->role) && Auth::user()->role !== 'sekretariat') {
            $currentBidangTitle = ucwords(str_replace('_', ' ', Auth::user()->role));
            $bidangSlug = Auth::user()->role;
        }

        // Penanganan Nilai Statistik (Fallback/Dummy)
        $arsipAktifCount = $arsipAktifCount ?? 125;
        $arsipInaktifCount = $arsipInaktifCount ?? 80;
        $arsipVitalCount = $arsipVitalCount ?? 15;
        $arsipDihapusCount = $arsipDihapusCount ?? 5; // Belum ditampilkan, tapi ada
        $totalArsipCount = $arsipAktifCount + $arsipInaktifCount + $arsipVitalCount;
        
        // Data Chart (Fallback/Dummy)
        $chartData = $chartData ?? [
            'dataPoints' => [
                ['x' => 0, 'y' => 280, 'count' => 0, 'label' => 'Jum'],
                ['x' => 166, 'y' => 280, 'count' => 5, 'label' => 'Sab'],
                ['x' => 333, 'y' => 220, 'count' => 15, 'label' => 'Min'],
                ['x' => 500, 'y' => 280, 'count' => 8, 'label' => 'Sen'],
                ['x' => 666, 'y' => 50, 'count' => 25, 'label' => 'Sel'],
                ['x' => 833, 'y' => 150, 'count' => 18, 'label' => 'Rab'],
                ['x' => 1000, 'y' => 280, 'count' => 0, 'label' => 'Kam'],
            ],
            // Data SVG Points HARUS DIHITUNG ULANG JIKA DATA BERUBAH
            'svgPoints' => '0 280, 166 280, 333 220, 500 280, 666 50, 833 150, 1000 280' 
        ];

        // Logika Scaling Ulang (Penting untuk Chart Dinamis)
        $chartHeight = 300;
        $paddingY = 20;
        $counts = array_column($chartData['dataPoints'], 'count');
        $maxCount = max(max($counts), 5); // Ambil nilai maksimum, minimum 5
        
        // Fungsi untuk mengkonversi hitungan (count) ke posisi Y pada SVG
        $scaleY = function (int $count, int $maxCount, int $chartHeight, int $paddingY): int {
            if ($count === 0) return $chartHeight;
            // Hitung persentase hitungan relatif terhadap (Tinggi Chart - Padding)
            $scaledY = $chartHeight - (($count / $maxCount) * ($chartHeight - $paddingY));
            return (int) $scaledY;
        };
        
        // Menentukan level grid horizontal berdasarkan persentase Max Count
        $gridYLevel1 = $scaleY(round($maxCount * 0.75), $maxCount, $chartHeight, $paddingY);
        $gridYLevel2 = $scaleY(round($maxCount * 0.50), $maxCount, $chartHeight, $paddingY);
        $gridYLevel3 = $scaleY(round($maxCount * 0.25), $maxCount, $chartHeight, $paddingY);
        
        // Data Arsip Terbaru (Dummy/Fallback)
        $recentArsip = $recentArsip ?? [
            (object)['nama_tampilan' => 'Notulen Rapat Final Anggaran', 'bidang' => 'keuangan', 'user' => (object)['name' => 'Admin Keu'], 'jenis_arsip_label' => 'AKTIF', 'jenis_arsip' => 'aktif', 'created_at' => now()->subHour(), 'edit_route' => '#'],
            (object)['nama_tampilan' => 'SK Penetapan Pegawai Baru', 'bidang' => 'umum_kepegawaian', 'user' => (object)['name' => 'Staf Pegawai'], 'jenis_arsip_label' => 'VITAL', 'jenis_arsip' => 'vital', 'created_at' => now()->subDay(), 'edit_route' => '#'],
            (object)['nama_tampilan' => 'Data Kependudukan Desa X', 'bidang' => 'pemerintahan', 'user' => (object)['name' => 'Admin Pem'], 'jenis_arsip_label' => 'INAKTIF', 'jenis_arsip' => 'inaktif', 'created_at' => now()->subDays(2), 'edit_route' => '#'],
        ];

    @endphp

    {{-- Modal Video Tutorial SIPANDU --}}
    <div x-data="{ 
            showTutorial: false,
            init() {
                // Muncul setiap sesi baru (login atau buka tab baru)
                if (!sessionStorage.getItem('sipandu_session_tutorial')) {
                    setTimeout(() => { 
                        this.showTutorial = true;
                    }, 1000);
                }
            },
            closeTutorial() {
                this.showTutorial = false;
                sessionStorage.setItem('sipandu_session_tutorial', 'true');
            }
        }" 
        x-show="showTutorial" 
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="fixed inset-0 z-[99999] flex items-center justify-center p-4 bg-black/80 backdrop-blur-md"
        style="display: none;"
        @keydown.escape.window="closeTutorial()">

        {{-- Konten Modal --}}
        <div class="bg-white dark:bg-[#1f2937] rounded-[1rem] shadow-2xl max-w-3xl w-full overflow-hidden border border-gray-200 dark:border-gray-700"
             @click.away="closeTutorial()">

            {{-- 1. Header: Diberi padding yang lebih lega --}}
            <div class="flex justify-between items-center px-14 py-8 border-b border-gray-100 dark:border-gray-700">
                <h3 class="text-xl font-bold text-gray-800 dark:text-white flex items-center gap-3">
                    <i class="bi bi-play-circle-fill text-blue-500 text-2xl"></i>
                    Panduan Penggunaan SIPANDU
                </h3>
                <button @click="closeTutorial()" class="text-gray-400 hover:text-red-500 transition-colors p-2">
                    <i class="bi bi-x-lg text-xl"></i>
                </button>
            </div>
        
            {{-- Container Video (Rasio 16:9 agar tidak gepeng) --}}
            <div class="relative w-full bg-black shadow-inner" style="padding-top: 56.25%; background: #000;">
                <iframe class="absolute inset-0 w-full h-full" 
                    src="https://www.youtube.com/embed/TESWT8O1ojE?autoplay=1&mute=0&rel=0" 
                    title="Tutorial SIPANDU Bakorwil III Malang" 
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen>
                </iframe>
            </div>
        
            {{-- 3. Footer: Diperbaiki agar tidak mepet ke pinggir dan tombol lebih presisi --}}
            <div class="px-14 py-12 bg-gray-50 dark:bg-[#111827] flex flex-col md:flex-row justify-between items-center gap-8">
                <div class="flex items-start gap-4 flex-1">
                    <div class="bg-blue-100 dark:bg-blue-900/30 p-2 rounded-lg flex-shrink-0">
                        <i class="bi bi-info-circle text-blue-600 dark:text-blue-400"></i>
                    </div>
                    <div class="max-w-sm">
                        <p class="text-sm text-gray-700 dark:text-gray-300 leading-relaxed">
                            Tonton video panduan ini untuk memahami alur pengelolaan arsip di <strong>SIPANDU</strong> secara menyeluruh.
                        </p>
                    </div>
                </div>
                
                <div class="w-full md:w-auto flex justify-center md:justify-end">
                    <button @click="closeTutorial()" 
                        class="group relative inline-flex items-center justify-center px-10 py-3.5 bg-blue-600 hover:bg-blue-700 text-white rounded-xl text-sm font-bold shadow-xl shadow-blue-500/30 transition-all transform hover:-translate-y-1 active:scale-95 whitespace-nowrap">
                        <span>Mulai Gunakan Sistem</span>
                        <i class="bi bi-arrow-right ml-2 transition-transform group-hover:translate-x-1"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Wrapper Utama Konten Dashboard --}}
    <div class="content-wrapper"> 
        
        {{-- LAYOUT GRID UTAMA (CHART & STATISTIK) --}}
        <div class="grid-content-responsive"> 
            
            {{-- KOLOM KIRI (CHART & RECENT LIST) --}}
            <div class="left-column-layout">
                
                {{-- 2.1. CHART (SVG) --}}
                <div class="d-card chart-wrapper"> 
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                        <h2 style="font-size: 1.25rem; font-weight: 700; color: var(--text-main);">Tren Aktivitas (7 Hari)</h2> 
                        <span style="font-size: 0.75rem; padding: 4px 10px; background: var(--bg-subtle); border-radius: 1rem; color: var(--text-sub); font-weight: 700;">AKTIF</span> 
                    </div>
                    
                    <div style="flex-grow: 1; position: relative; padding: 10px 20px 30px 20px;">
                        @if(isset($chartData) && !empty($chartData['dataPoints']))
                            
                            {{-- UBAH: Perluas ViewBox dari 300 menjadi 320 untuk memberi ruang di bawah --}}
                            <svg class="chart-svg" viewBox="0 0 1000 320" preserveAspectRatio="none">
                            @php
                                $chartHeightSvg = 290; // Garis dasar chart (y=290)
                                
                                // Recalculate SVG Points based on $chartHeightSvg (290) 
                                $dynamicSvgPoints = collect($chartData['dataPoints'])
                                    ->map(fn($p) => $p['x'] . ' ' . $scaleY($p['count'], $maxCount, $chartHeightSvg, $paddingY))
                                    ->implode(', ');
                            @endphp
                            
                                <defs>
                                    <linearGradient id="chartGradient" x1="0%" y1="0%" x2="0%" y2="100%">
                                        <stop offset="0%" style="stop-color:var(--chart-line); stop-opacity:0.3"/>
                                        <stop offset="100%" style="stop-color:var(--chart-line); stop-opacity:0"/>
                                    </linearGradient>
                                </defs>

                                {{-- Grid Lines Vertikal (Tanggal/Hari) --}}
                                @foreach($chartData['dataPoints'] as $point)
                                    <line x1="{{ $point['x'] }}" y1="0" x2="{{ $point['x'] }}" y2="{{ $chartHeightSvg }}" class="chart-grid-line" />
                                @endforeach
                                {{-- Grid Lines Horizontal (Dinamis: 75%, 50%, 25%) --}}
                                <line x1="0" y1="{{ $gridYLevel1 }}" x2="1000" y2="{{ $gridYLevel1 }}" class="chart-grid-line" />
                                <line x1="0" y1="{{ $gridYLevel2 }}" x2="1000" y2="{{ $gridYLevel2 }}" class="chart-grid-line" />
                                <line x1="0" y1="{{ $gridYLevel3 }}" x2="1000" y2="{{ $gridYLevel3 }}" class="chart-grid-line" />
                                
                                {{-- Garis Dasar Diletakkan di y=290 (chartHeightSvg) --}}
                                <line x1="0" y1="{{ $chartHeightSvg }}" x2="1000" y2="{{ $chartHeightSvg }}" class="chart-grid-line chart-grid-base" />
                                
                                {{-- Area Fill --}}
                                {{-- Area Fill menggunakan y=290 (chartHeightSvg) di bagian bawah --}}
                                <polyline points="0 {{ $chartHeightSvg }}, {{ $dynamicSvgPoints }}, 1000 {{ $chartHeightSvg }}" class="chart-area"/>

                                {{-- Polyline --}}
                                <polyline points="{{ $dynamicSvgPoints }}" class="chart-polyline" />
                                
                                {{-- Dots and Labels --}}
                                @foreach($chartData['dataPoints'] as $point)
                                    @php
                                        // Posisi Y untuk titik data (dihitung berdasarkan chartHeightSvg=290)
                                        $yPosCorrected = $scaleY($point['count'], $maxCount, $chartHeightSvg, $paddingY);
                                        
                                        $isZero = $point['count'] === 0;
                                        $textFill = $isZero ? 'var(--text-sub)' : 'var(--text-main)';
                                        
                                        // Label nilai (Count) digeser sedikit ke atas
                                        $textYPos = $yPosCorrected - 5; 
                                    @endphp
                                    
                                    {{-- Titik Data --}}
                                    <circle cx="{{ $point['x'] }}" cy="{{ $yPosCorrected }}" class="chart-dot" />
                                    
                                    {{-- Label Nilai (Count) --}}
                                    <text x="{{ $point['x'] }}" y="{{ $textYPos }}" class="chart-label-value" style="fill: {{ $textFill }}; opacity: {{ $isZero ? 0.7 : 1 }};">{{ $point['count'] }}</text> 
                                    
                                    {{-- Label Hari (digeser ke y=310 agar tidak tumpang tindih dengan nilai 0) --}}
                                    <text x="{{ $point['x'] }}" y="310" class="chart-label">{{ $point['label'] }}</text>
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
                        <h2 style="font-size: 1.25rem; font-weight: 700; color: var(--text-main);">Arsip Masuk Terbaru</h2>
                        {{-- Link Lihat Semua --}}
                        {{-- <a href="{{ route('log.aktivitas', ['filterBidang' => $bidangSlug]) }}" style="font-size: 0.9rem; color: var(--primary); text-decoration: none; font-weight: 600;" wire:navigate>Lihat Semua &rarr;</a>  --}}
                        {{-- Menambahkan filterAksi => Tambah agar hanya menampilkan data baru --}}
                        <a href="{{ route('log.aktivitas', ['filterBidang' => $bidangSlug, 'filterAksi' => 'Tambah']) }}" 
                            style="font-size: 0.9rem; color: var(--primary); text-decoration: none; font-weight: 600;" 
                            wire:navigate>
                            Lihat Semua &rarr;
                         </a>
                    </div>
                    
                    <div class="arsip-list-container">
                        @forelse($recentArsip as $arsip)
                            {{-- MODIFIKASI: Mengubah <a> menjadi <div> dan menghapus href --}}
                            <div class="recent-list-item">
                                <div class="recent-icon-wrapper"><i class="bi bi-file-earmark-text"></i></div>
                                <div style="flex: 1; min-width: 0;">
                                    <div class="arsip-title-line" title="{{ $arsip->nama_tampilan }}">{{ $arsip->nama_tampilan }}</div>
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
                <div style="font-size: 0.8rem; font-weight: 700; color: var(--text-sub); text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.5rem;">Statistik Utama</div>
                
                {{-- TOTAL ARSIP (Hero Card) --}}
                <div class="hero-card" style="padding: 2rem; text-align: center; flex: 1.5; display: flex; flex-direction: column; justify-content: center;">
                    <div style="width: 3.5rem; height: 3.5rem; background: var(--hero-icon-bg); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem auto; color: var(--hero-icon-color); box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                        <i class="bi bi-collection" style="font-size: 1.5rem;"></i>
                    </div>
                    <div style="font-size: 1rem; color: var(--hero-text-title); font-weight: 600;">Total Aset Arsip</div>
                    <div style="font-size: 3rem; font-weight: 800; margin: 0.5rem 0; color: var(--hero-text-number);">{{ $totalArsipCount }}</div>
                    <div> 
                        <span style="font-size: 0.8rem; background: var(--hero-badge-bg); color: var(--hero-text-number); padding: 0.3rem 1rem; border-radius: 999px; border: 1px solid var(--hero-badge-border); font-weight: 600;">
                            Akumulasi Data
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
                    <div class="stat-right-icon" style="color: var(--color-red);"><i class="bi bi-file-earmark-lock"></i></div>
                </div>
            </div>
        </div>
    </div>
    
    <footer class="text-sub-color dashboard-footer" style="border-top: 1px solid var(--border-color); text-align: center; font-size: 0.8rem;"> 
        &copy; {{ date('Y') }} SIPANDU. Hak Cipta Dilindungi.
    </footer>
</div>