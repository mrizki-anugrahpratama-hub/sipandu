{{-- Menggunakan class utama dashboard-container --}}
<div class="dashboard-container dashboard-scope" style="min-height: 100vh; background: var(--bg-page, #151c28);">

    {{-- 1. HEADER HALAMAN --}}
    <x-slot name="header">
        <div class="welcome-title-group">
            <h1 class="dashboard-header__title">Penyusutan Arsip</h1>
            <span class="text-sub-color" style="font-size: 0.9rem;">Kelola arsip musnah dan permanen</span>
        </div>
    </x-slot>

    {{-- 2. CSS KHUSUS (MENGIMPOR GAYA DASBOR) --}}
    @push('styles')
    <style>
        /* 🎨 VARIBEL KHUSUS UNTUK KOMPONEN INI (Menggunakan warna dari dasbor) */
        .dashboard-scope {
            /* Fallback untuk light mode jika diperlukan */
            --bg-page: #f8fafc;
            --bg-card: #ffffff;
            --border-color: #e2e8f0;
            --red-bg: rgba(239, 68, 68, 0.15); /* Red for light mode */
            --red-text: #ef4444;
            --blue-bg: rgba(59, 130, 246, 0.15); /* Primary/Blue for light mode */
            --blue-text: #3b82f6;
            --text-primary: #1e293b;
            --text-secondary: #64748b;
            --shadow-lift: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -4px rgba(0, 0, 0, 0.1);
            --radius-lg: 0.75rem;
        }
        
        /* DARK MODE STYLES (Menggunakan skema Dark Mode yang sudah disepakati) */
        body.dark-mode .dashboard-scope, :is([class*="dark"] .dashboard-scope) {
            --bg-page: #151c28; /* Warna latar belakang utama */
            --bg-card: #1f2937; /* Warna kartu */
            --border-color: #374151;
            --red-bg: rgba(248, 113, 113, 0.15); /* Red for dark mode */
            --red-text: #f87171;
            --blue-bg: rgba(96, 165, 250, 0.15); /* Primary/Blue for dark mode */
            --blue-text: #60a5fa;
            --text-primary: #f1f5f9;
            --text-secondary: #94a3b8;
            --shadow-lift: 0 10px 15px -3px rgba(0, 0, 0, 0.3), 0 4px 6px -4px rgba(0, 0, 0, 0.3);
        }

        /* Container untuk grid opsi */
        .penyusutan-options {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(380px, 1fr));
            gap: 1.5rem; /* 24px */
            margin-top: 1.5rem; /* 24px */
        }

        /* Kartu Utama (Option Card) - Menggunakan gaya yang lebih solid dari dasbor */
        .option-card {
            background-color: var(--bg-card); /* Menggunakan warna kartu yang solid */
            border: 1px solid var(--border-color);
            border-radius: var(--radius-lg);
            padding: 2rem; /* 32px */
            display: flex;
            align-items: center; /* Disesuaikan agar ikon dan teks sejajar tengah */
            gap: 1.5rem; /* 24px */
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); /* Shadow halus */
        }
        
        .option-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lift);
            border-color: var(--hover-border);
        }

        /* Icon Wrapper */
        .option-icon {
            width: 4rem; /* 64px */
            height: 4rem; /* 64px */
            border-radius: 0.5rem; /* 16px */
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem; /* 1.75rem */
            flex-shrink: 0;
            transition: transform 0.3s ease;
        }

        .option-card:hover .option-icon {
            transform: scale(1.05); /* Efek hover lebih halus */
        }

        /* Tema Warna Khusus */
        .theme-red {
            --hover-border: var(--red-text);
        }
        .theme-red .option-icon {
            background-color: var(--red-bg); 
            color: var(--red-text);
        }
        .theme-red .option-arrow {
            color: var(--red-text);
        }

        .theme-blue {
            --hover-border: var(--blue-text);
        }
        .theme-blue .option-icon {
            background-color: var(--blue-bg);
            color: var(--blue-text);
        }
        .theme-blue .option-arrow {
            color: var(--blue-text);
        }

        /* Konten Teks */
        .option-content {
            flex-grow: 1;
        }

        .option-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 0.5rem; /* 8px */
            display: block;
        }

        .option-desc {
            font-size: 0.95rem;
            color: var(--text-secondary);
            line-height: 1.6;
            margin-bottom: 0;
        }

        /* Panah Aksi */
        .option-arrow {
            position: absolute;
            top: 1.5rem; /* 32px */
            right: 1.5rem; /* 32px */
            font-size: 1.5rem;
            opacity: 0.5; /* Opacity lebih jelas */
            transition: all 0.3s ease;
        }

        .option-card:hover .option-arrow {
            opacity: 1;
            transform: translateX(5px);
        }

        /* Label Badge Kecil */
        .option-badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-bottom: 0.5rem; /* 12px */
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .theme-red .option-badge { background-color: var(--red-bg); color: var(--red-text); }
        .theme-blue .option-badge { background-color: var(--blue-bg); color: var(--blue-text); }

        /* Judul Section */
        .section-header {
            padding-bottom: 0.5rem;
        }
        .section-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-primary);
            margin: 0 0 0.25rem 0;
        }
        .section-intro {
            font-size: 0.9rem;
            color: var(--text-secondary);
            margin: 0;
        }

        @media (max-width: 768px) {
            .penyusutan-options { grid-template-columns: 1fr; }
            .option-card { padding: 1.5rem; }
        }
    </style>
    @endpush

    {{-- 3. KONTEN UTAMA --}}
    <div class="section-block" style="padding: 1.5rem; flex: 1;">
        <div class="section-header">
            <h2 class="section-title">Opsi Penyusutan</h2>
            <p class="section-intro">
                Silakan pilih metode penyusutan arsip di bawah ini.
            </p>
        </div>

        <div class="penyusutan-options">
            
            {{-- OPSI 1: ARSIP MUSNAH (TEMA MERAH) --}}
            <a href="{{ route('penyusutan.musnah.index') }}" class="option-card theme-red animated-card" style="animation-delay: 0.1s;" wire:navigate>
                <div class="option-icon">
                    <i class="bi bi-trash3"></i>
                </div>
                <div class="option-content">
                    <span class="option-badge">JRA Habis</span>
                    <span class="option-title">Arsip Musnah</span>
                    <p class="option-desc">
                        Kelola arsip yang masa retensinya telah habis. Lihat daftar, lakukan pemusnahan, dan cetak berita acara.
                    </p>
                </div>
                <div class="option-arrow">
                    <i class="bi bi-arrow-right"></i>
                </div>
            </a>
            
            {{-- OPSI 2: ARSIP PERMANEN (TEMA BIRU) --}}
            <a href="{{ route('penyusutan.permanen.index') }}" class="option-card theme-blue animated-card" style="animation-delay: 0.2s;" wire:navigate>
                <div class="option-icon">
                    <i class="bi bi-archive"></i>
                </div>
                <div class="option-content">
                    <span class="option-badge">Arsip Statis</span>
                    <span class="option-title">Arsip Permanen</span>
                    <p class="option-desc">
                        Kelola arsip bernilai guna berkelanjutan. Arsip ini akan disimpan selamanya sebagai aset memori institusi.
                    </p>
                </div>
                <div class="option-arrow">
                    <i class="bi bi-arrow-right"></i>
                </div>
            </a>

        </div>
    </div>
</div>