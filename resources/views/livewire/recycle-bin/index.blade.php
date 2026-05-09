<div class="dashboard-container dashboard-scope">
    {{-- 
        PERBAIKAN: Style diletakkan DI DALAM root element.
    --}}
    <style>
        /* 🎨 VARIABLES DARI TEMA DASHBOARD */
        .dashboard-scope {
            font-family: 'Inter', 'Poppins', 'Helvetica Neue', Arial, sans-serif;
            
            /* LIGHT MODE */
            --bg-page: #f8f9fe;
            --bg-card: #ffffff;
            --bg-subtle: #f0f3f9;
            --text-main: #2d3748;
            --text-sub: #a0aec0; /* Abu-abu untuk text footer */
            --border-color: #e2e8f0; /* Abu-abu untuk garis footer */
            --primary: #4fd1c5;
            --primary-soft: rgba(79, 209, 197, 0.1);
            --shadow-soft-out: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --color-green: #48bb78;
            --color-yellow: #f6e05e;
            --color-red: #fc8181;
            --color-grey: #a0aec0;
        }

        /* DARK MODE */
        .dark .dashboard-scope, [class*="dark"] .dashboard-scope {
            --bg-page: #1a202c;
            --bg-card: #2d3748;
            --bg-subtle: #4a5568;
            --text-main: #ffffff;
            --text-sub: #718096; /* Abu-abu lebih gelap untuk dark mode */
            --border-color: #4a5568; /* Garis footer dark mode */
            --primary: #4fd1c5;
            --shadow-soft-out: 0 4px 6px -1px rgba(0, 0, 0, 0.3), 0 2px 4px -1px rgba(0, 0, 0, 0.1);
            --color-green: #68d391;
            --color-yellow: #f6e05e;
            --color-red: #fc8181;
            --color-grey: #a0aec0;
        }

        /* CONTAINER SETUP */
        .dashboard-container {
            height: 100%;
            min-height: 100vh; /* Pastikan minimal setinggi layar */
            display: flex; flex-direction: column;
            background: transparent !important;
            overflow-y: auto; scrollbar-width: none;
        }
        
        /* Content Wrapper mengisi sisa ruang (flex: 1) */
        .content-wrapper { 
            padding: 1rem 3rem 2rem 3rem; 
            flex: 1; 
            display: flex; 
            flex-direction: column;
        }

        /* CARD STYLES */
        .d-card {
            background-color: var(--bg-card);
            border: 1px solid var(--border-color);
            color: var(--text-main);
            box-shadow: var(--shadow-soft-out);
            border-radius: 1.5rem;
            padding: 2rem;
            transition: all 0.3s ease;
        }

        /* STAT CARD STYLES */
        .stat-card-top {
            padding: 1.5rem;
            border-radius: 1.25rem;
            border: 1px solid var(--border-color);
            background-color: var(--bg-card);
            color: var(--text-main);
            transition: all 0.2s ease-out;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
            display: flex; flex-direction: column; justify-content: space-between;
            text-decoration: none;
        }
        .stat-card-top:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1);
            border-color: var(--primary);
        }
        .stat-content { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 0.5rem; }
        .stat-text-group { display: flex; flex-direction: column; }
        .stat-icon-title { font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: var(--text-sub); margin-bottom: 4px; }
        .stat-value { font-size: 2rem; font-weight: 800; color: var(--text-main); line-height: 1.2; }
        .stat-desc { font-size: 0.85rem; color: var(--text-sub); margin-top: 4px; }
        
        .stat-icon-wrapper-circle {
            font-size: 1.25rem; width: 3rem; height: 3rem;
            border-radius: 50%; display: flex; align-items: center; justify-content: center;
            flex-shrink: 0; color: var(--bg-card);
        }

        /* TABLE STYLES ADAPTATION */
        .custom-table { width: 100%; border-collapse: collapse; }
        .custom-table th {
            text-align: left; padding: 1rem;
            background-color: var(--bg-subtle);
            color: var(--text-sub);
            font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em;
            border-bottom: 1px solid var(--border-color);
        }
        .custom-table td {
            padding: 1rem;
            color: var(--text-main);
            border-bottom: 1px solid var(--border-color);
            vertical-align: middle;
        }
        .custom-table tr:last-child td { border-bottom: none; }
        .custom-table tr:hover td { background-color: var(--bg-subtle); }
        
        /* UTILS */
        .badge-soft { padding: 4px 10px; border-radius: 6px; font-size: 0.75rem; font-weight: 600; }
        .grid-stats-4 { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.5rem; }
        
        /* INPUT & SELECT STYLING MATCHING THEME */
        .theme-input {
            background-color: var(--bg-card);
            border: 1px solid var(--border-color);
            color: var(--text-main);
            padding: 0.5rem 1rem;
            border-radius: 0.75rem;
            outline: none;
        }
        .theme-input:focus { border-color: var(--primary); box-shadow: 0 0 0 2px var(--primary-soft); }

        /* FOOTER STYLE */
        .dashboard-footer {
            margin-top: auto; /* Kunci: Mendorong footer ke bawah */
            padding: 1.5rem 3rem;
            border-top: 1px solid var(--border-color); /* Garis abu-abu tipis */
            text-align: center;
            color: var(--text-sub); /* Warna teks abu-abu */
            font-size: 0.85rem;
            width: 100%;
        }

        @media (max-width: 1024px) { .grid-stats-4 { grid-template-columns: repeat(2, 1fr); } .content-wrapper { padding: 1.5rem; } }
        @media (max-width: 640px) { .grid-stats-4 { grid-template-columns: 1fr; } }
    </style>
    
    @section('breadcrumbs')
    <span class="breadcrumb-item active">Recycle Bin</span>
    @endsection

    <div class="content-wrapper">

        {{-- HEADER SECTION --}}
        <div style="margin-bottom: 2rem;">
            
            {{-- JUDUL & DESKRIPSI DIHAPUS --}}

            {{-- FLASH MESSAGES --}}
            @if (session()->has('success'))
            <div style="background: rgba(72, 187, 120, 0.1); color: var(--color-green); padding: 1rem; border-radius: 1rem; margin-bottom: 1.5rem; border: 1px solid var(--color-green);">
                {{ session('success') }}
            </div>
            @endif
             @if (session()->has('error'))
            <div style="background: rgba(252, 129, 129, 0.1); color: var(--color-red); padding: 1rem; border-radius: 1rem; margin-bottom: 1.5rem; border: 1px solid var(--color-red);">
                {{ session('error') }}
            </div>
            @endif

            {{-- STATS GRID --}}
            <section class="grid-stats-4">
                
                {{-- CARD 1: TOTAL --}}
                <div class="stat-card-top">
                    <div class="stat-content">
                        <div class="stat-text-group">
                            <div class="stat-icon-title">TOTAL RECYCLE BIN</div>
                            <strong class="stat-value">{{ $stats['total'] }}</strong>
                        </div>
                        <div class="stat-icon-wrapper-circle" style="background-color: var(--color-red);">
                            <i class="bi bi-trash"></i>
                        </div>
                    </div>
                    <span class="stat-desc">Total arsip terhapus</span>
                </div>

                {{-- CARD 2: AKTIF --}}
                <div class="stat-card-top">
                    <div class="stat-content">
                        <div class="stat-text-group">
                            <div class="stat-icon-title">DARI AKTIF</div>
                            <strong class="stat-value">{{ $stats['aktif'] }}</strong>
                        </div>
                        <div class="stat-icon-wrapper-circle" style="background-color: var(--color-green);">
                            <i class="bi bi-file-earmark-check"></i>
                        </div>
                    </div>
                    <span class="stat-desc">Arsip aktif terhapus</span>
                </div>

                {{-- CARD 3: INAKTIF --}}
                <div class="stat-card-top">
                    <div class="stat-content">
                        <div class="stat-text-group">
                            <div class="stat-icon-title">DARI INAKTIF</div>
                            <strong class="stat-value">{{ $stats['inaktif'] }}</strong>
                        </div>
                        <div class="stat-icon-wrapper-circle" style="background-color: var(--color-yellow);">
                            <i class="bi bi-file-earmark-zip"></i>
                        </div>
                    </div>
                    <span class="stat-desc">Arsip inaktif terhapus</span>
                </div>

                {{-- CARD 4: VITAL --}}
                <div class="stat-card-top">
                    <div class="stat-content">
                        <div class="stat-text-group">
                            <div class="stat-icon-title">DARI VITAL</div>
                            <strong class="stat-value">{{ $stats['vital'] }}</strong>
                        </div>
                        <div class="stat-icon-wrapper-circle" style="background-color: #4a6fff;">
                            <i class="bi bi-file-earmark-lock"></i>
                        </div>
                    </div>
                    <span class="stat-desc">Arsip vital terhapus</span>
                </div>

            </section>
        </div>

        {{-- MAIN CONTENT CARD --}}
        <section class="d-card">
            
            {{-- TOOLBAR --}}
            <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem; margin-bottom: 1.5rem;">
                
                {{-- Filter --}}
                <div style="flex: 1;">
                    <select wire:model.live="filterJenis" class="theme-input" style="min-width: 200px;">
                        <option value="semua">Semua Jenis</option>
                        <option value="aktif">Arsip Aktif</option>
                        <option value="inaktif">Arsip Inaktif</option>
                        <option value="vital">Arsip Vital</option>
                    </select>
                </div>

                {{-- Actions --}}
                <div style="display: flex; gap: 0.5rem;">
                    {{-- <div wire:loading class="badge-soft" style="background-color: var(--bg-subtle); color: var(--text-sub); display: flex; align-items: center;">
                        Loading...
                    </div> --}}

                    @if(count($selectedItems) > 0)
                        <button wire:click="restoreSelected" class="btn btn-primary" style="border-radius: 0.75rem;">
                            <i class="bi bi-arrow-counterclockwise"></i> Restore ({{ count($selectedItems) }})
                        </button>
                        <button wire:click="deleteSelected" class="btn btn-danger" onclick="return confirm('Hapus permanen {{ count($selectedItems) }} arsip?')" style="border-radius: 0.75rem;">
                            <i class="bi bi-trash"></i> Hapus
                        </button>
                    @endif

                    @if($stats['total'] > 0)
                        <button wire:click="emptyRecycleBin" class="btn btn-danger" onclick="return confirm('Kosongkan semua Recycle Bin? Tindakan ini tidak dapat dibatalkan!')" style="border-radius: 0.75rem;">
                            <i class="bi bi-trash3"></i> Kosongkan Bin
                        </button>
                    @endif
                </div>
            </div>

            {{-- TABLE --}}
            <div style="overflow-x: auto; border-radius: 1rem; border: 1px solid var(--border-color);">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th style="width: 50px; text-align: center;">
                                <input type="checkbox" wire:model.live="selectAll">
                            </th>
                            <th>Nama Berkas</th>
                            <th>Jenis</th>
                            <th>Kode Klasifikasi</th>
                            <th>Dihapus Oleh</th>
                            <th>Tanggal Hapus</th>
                            <th style="text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recycleBin as $item)
                        <tr wire:key="recycle-{{ $item->id }}">
                            <td style="text-align: center;">
                                <input type="checkbox" wire:model.live="selectedItems" value="{{ $item->id }}">
                            </td>
                            <td>
                                <div style="font-weight: 500;">
                                    {{ 
                                        $item->nama_berkas ?? 
                                        $item->data_arsip['nama_berkas'] ?? 
                                        $item->judul ?? 
                                        $item->data_arsip['judul'] ?? 
                                        $item->uraian ?? 
                                        $item->data_arsip['uraian'] ?? 
                                        'Nama Tidak Tersedia' 
                                    }}
                                </div>
                                <div style="font-size: 0.8rem; color: var(--text-sub); margin-top: 2px;">
                                    {{ ucfirst($item->bidang ?? $item->data_arsip['bidang'] ?? '-') }}
                                </div>
                            </td>
                            <td>
                                <span class="badge-soft" style="
                                    @if(strtolower($item->jenis_arsip) == 'aktif') background-color: rgba(72, 187, 120, 0.1); color: var(--color-green);
                                    @elseif(strtolower($item->jenis_arsip) == 'inaktif') background-color: rgba(246, 224, 94, 0.15); color: #d69e2e;
                                    @else background-color: rgba(66, 153, 225, 0.1); color: #4299e1; @endif">
                                    {{ ucfirst($item->jenis_arsip) }}
                                </span>
                            </td>
                            <td>
                                <span style="font-family: monospace; color: var(--text-sub);">
                                    {{ $item->data_arsip['kode_klasifikasi_nomor_berkas'] ?? $item->data_arsip['kode_klasifikasi'] ?? '-' }}
                                </span>
                            </td>
                            <td>
                                {{ optional($item->user)->name ?? 'User Unknown' }}
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($item->deleted_at_date)->format('d M Y') }}
                            </td>
                            <td style="text-align: center;">
                                <div style="display: flex; gap: 4px; justify-content: center;">
                                    <button wire:click="restoreSingle({{ $item->id }})" class="btn btn-sm btn-primary" title="Restore" style="border-radius: 0.5rem;">
                                        <i class="bi bi-arrow-counterclockwise"></i>
                                    </button>
                                    <button wire:click="permanentDeleteSingle({{ $item->id }})" class="btn btn-sm btn-danger" title="Hapus Permanen" onclick="return confirm('Hapus permanen arsip ini?')" style="border-radius: 0.5rem;">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" style="padding: 4rem; text-align: center; color: var(--text-sub);">
                                <i class="bi bi-trash" style="font-size: 3rem; display: block; margin-bottom: 1rem; opacity: 0.5;"></i>
                                <p style="font-weight: 500;">Recycle Bin kosong</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($recycleBin->hasPages())
            <div style="margin-top: 2rem;">
                {{ $recycleBin->links() }}
            </div>
            @endif

        </section>
    </div> {{-- End Content Wrapper --}}

    {{-- FOOTER DILETAKKAN DI LUAR CONTENT WRAPPER AGAR STICKY DI BAWAH --}}
    <footer class="dashboard-footer">
        &copy; 2025 SIPANDU. Hak Cipta Dilindungi.
    </footer>

</div>
