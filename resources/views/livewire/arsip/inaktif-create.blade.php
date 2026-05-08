@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/litepicker/dist/css/litepicker.css">
<style>
    /* === LAYOUT GRID UTAMA === */
    .form-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr); /* Default Desktop: 3 Kolom */
        gap: 24px;
    }

    /* Tablet: 2 Kolom */
    @media (max-width: 1024px) {
        .form-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    /* Ponsel: 1 Kolom */
    @media (max-width: 640px) {
        .form-grid {
            grid-template-columns: 1fr;
        }
    }

    /* === FORM COMPONENTS === */
    .form-group {
        margin-bottom: 0;
        position: relative;
    }

    .form-group label {
        display: block;
        margin-bottom: 6px;
        font-weight: 500;
        color: var(--text-primary);
        font-size: 0.9rem;
    }

    .form-group input.form-input-sm,
    .form-group select.form-select-sm,
    .form-group textarea.form-input-sm {
        width: 100%;
    }

    /* Helpers Grid Span */
    .grid-col-span-full { grid-column: 1 / -1; }
    .grid-col-span-2 { grid-column: span 2 / span 2; }
    
    @media (max-width: 1024px) {
        .grid-col-span-2 { grid-column: 1 / -1; } /* Full width di tablet */
    }

    /* Footer & Error */
    .form-footer {
        margin-top: 24px;
        border-top: 1px solid var(--border-color);
        padding-top: 20px;
        display: flex;
        justify-content: flex-end;
        gap: 12px;
    }

    .text-danger {
        color: #ff5c5c;
        font-size: 0.875rem;
        margin-top: 4px;
        display: block;
    }
    
    .loading-indicator {
        font-size: 0.8rem;
        color: var(--text-secondary);
        margin-left: 8px;
        font-style: italic;
    }

    /* === UPLOAD FILE STYLE (Khusus Inaktif) === */
    .file-upload-box {
        border: 2px dashed var(--border-color);
        border-radius: var(--radius-md);
        padding: 20px;
        text-align: center;
        cursor: pointer;
        transition: all 0.2s;
        background-color: var(--bg-active);
        display: block;
    }
    .file-upload-box:hover {
        border-color: var(--primary-blue);
        background-color: var(--primary-blue-light);
    }
    .file-upload-box input[type="file"] { display: none; }
    .file-info { font-size: 0.9rem; color: var(--text-secondary); margin-top: 10px; display: block; }
    .file-count-badge { 
        background-color: var(--green-light); 
        color: var(--green-dark); 
        padding: 4px 8px; 
        border-radius: var(--radius-md); 
        font-weight: 600; 
        margin-top: 10px; 
        display: inline-block; 
    }

    /* === LITEPICKER DARK MODE FIXES === */
    body.dark-mode .litepicker { background: var(--bg-sidebar); border: 1px solid var(--border-color); box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3); }
    body.dark-mode .litepicker .button-next-month, body.dark-mode .litepicker .button-prev-month { filter: invert(1); }
    body.dark-mode .litepicker .container__months { background-color: var(--bg-main); color: var(--text-primary); }
    body.dark-mode .litepicker .container__months > .month-item .month-header, 
    body.dark-mode .litepicker .container__months > .month-item .day-item { color: var(--text-primary); }
    body.dark-mode .litepicker .container__months > .month-item .day-item:hover { background-color: var(--bg-active); }
    body.dark-mode .litepicker .container__months > .month-item .day-item.is-selected { background-color: var(--primary-blue) !important; color: var(--text-light); }
    body.dark-mode .litepicker .container__months .month-item .month-weekday { color: var(--text-secondary); }
</style>
@endpush

<div x-data="{ 
    datePicker: null,
    filesCount: 0,
    
    initDatePicker() {
        this.$nextTick(() => {
            if (this.datePicker) { this.datePicker.destroy(); }
            this.datePicker = new Litepicker({
                element: this.$refs.tglDibuat, 
                singleMode: true, 
                format: 'YYYY-MM-DD', 
                lang: 'id',
                dropdowns: { minYear: 2000, maxYear: (new Date()).getFullYear(), months: true, years: true },
                plugins: ['mobilefriendly'],
                setup: (picker) => {
                    picker.on('selected', (date1) => {
                        $wire.set('tanggal_dibuat', date1.format('YYYY-MM-DD'));
                    });
                }
            });
            if ($wire.get('tanggal_dibuat')) { this.datePicker.setDate($wire.get('tanggal_dibuat')); }
        });
    },

    updateFileCount() {
        const input = this.$refs.fileInput;
        this.filesCount = input.files ? input.files.length : 0;
    }

}" x-init="initDatePicker()">
    
    {{-- HEADER BREADCRUMB --}}
    <x-slot name="header">
        @php
            $urlBidang = $slugBidangYangDibuka ? route('dashboard.' . str_replace('_', '-', $slugBidangYangDibuka)) : '#';
            
            // PERBAIKAN: Tambahkan parameter filterBidang agar tetap terkunci di sub-bidang (misal: umpeg)
            $urlArsipInaktif = route('arsip.inaktif.index', ['filterBidang' => $slugBidangYangDibuka]);
        @endphp
        <div class="welcome-title-group">
            <h1>Tambah Berkas Inaktif</h1>
            <div class="breadcrumbs">
                {{-- Nama bidang diambil dari $namaBidangYangDibuka yang sudah dipetakan di mount() --}}
                <a href="{{ $urlBidang }}" class="breadcrumb-item active">{{ $namaBidangYangDibuka }}</a>
                <i class="bi bi-chevron-right breadcrumb-separator"></i>
                <a href="{{ $urlArsipInaktif }}" class="breadcrumb-item active">Arsip Inaktif</a>
                <i class="bi bi-chevron-right breadcrumb-separator"></i>
                <span class="breadcrumb-item active">Tambah</span>
            </div>
        </div>
    </x-slot>

    <section class="card animated-card">
        <h2 class="section-title" style="margin-bottom: 24px;">Form Input Arsip</h2>

        <form wire:submit.prevent="save" autocomplete="off">
            <div class="form-grid">

                {{-- == BARIS 1: PEMICU DAN KODE KLASIFIKASI == --}}

                <div class="form-group">
                    <label for="selectedPergub">Pilih Pergub (Opsional)</label>
                    <select id="selectedPergub" wire:model.live="selectedPergub" class="form-select-sm">
                        <option value="">-- Pilih (Untuk Autofill) --</option>
                        <option value="pergub26">Pergub 26</option>
                        <option value="pergub30">Pergub 30</option>
                    </select>
                    @error('selectedPergub') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group grid-col-span-2">
                    <label for="kode_klasifikasi">Kode Klasifikasi <span style="color: #ff5c5c;">*</span>
                        <span wire:loading wire:target="selectedPergub" class="loading-indicator">Memuat list...</span>
                        <span wire:loading wire:target="kode_klasifikasi" class="loading-indicator">Mencari...</span>
                    </label>
                    
                    <input type="text" id="kode_klasifikasi" 
                           list="klasifikasiListOptions"
                           wire:model.live.debounce.300ms="kode_klasifikasi"
                           class="form-input-sm @error('kode_klasifikasi') error @enderror"
                           placeholder="Ketik kode atau pilih dari list..."
                           autocomplete="off">
                    
                    <datalist id="klasifikasiListOptions">
                        @foreach($klasifikasiList as $item)
                            <option value="{{ $item->kode_klasifikasi }}">
                                {{ $item->kode_klasifikasi }} - {{ $item->index ?? $item->nama_klasifikasi }}
                            </option>
                        @endforeach
                    </datalist>

                    @error('kode_klasifikasi') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- == BARIS 2: URAIAN (FULL WIDTH) == --}}

                <div class="form-group grid-col-span-full">
                    <label for="uraian">Uraian <span style="color: #ff5c5c;">*</span></label>
                    <textarea id="uraian" wire:model.defer="uraian" rows="2"
                              class="form-input-sm @error('uraian') error @enderror"
                              placeholder="Uraian lengkap dari arsip"></textarea>
                    @error('uraian') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- == BARIS 3: BOX, BERKAS, INDEX == --}}
                
                {{-- Nomor Box (Kolom 1 - Khusus Inaktif) --}}
                <div class="form-group">
                    <label for="nomor_box">Nomor Box</label>
                    <input type="text" id="nomor_box" wire:model.defer="nomor_box"
                           class="form-input-sm @error('nomor_box') error @enderror"
                           placeholder="Contoh: BOX-01">
                    @error('nomor_box') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- Nomor Berkas (Kolom 2 - Auto Fill) --}}
                <div class="form-group">
                    <label for="nomor_berkas">Nomor Berkas <span style="color: #ff5c5c;">*</span>
                         <span wire:loading wire:target="kurun_waktu" class="loading-indicator">Hitung ulang...</span>
                    </label>
                    <input type="text" id="nomor_berkas" wire:model="nomor_berkas"
                           class="form-input-sm @error('nomor_berkas') error @enderror"
                           placeholder="(Otomatis)" readonly>
                    @error('nomor_berkas') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- Index (Kolom 3 - Auto Fill) --}}
                <div class="form-group">
                    <label for="index">Index</label>
                    <input type="text" id="index" wire:model="index"
                           class="form-input-sm @error('index') error @enderror"
                           placeholder="(Otomatis)" readonly>
                    @error('index') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- == BARIS 4: WAKTU, TANGGAL, JUMLAH == --}}

                {{-- Kurun Waktu (Kolom 1) --}}
                <div class="form-group">
                    <label for="kurun_waktu">Kurun Waktu (Tahun) <span style="color: #ff5c5c;">*</span></label>
                    {{-- .live digunakan untuk memicu hitung ulang nomor berkas di backend --}}
                    <input type="text" id="kurun_waktu" wire:model.live.debounce.500ms="kurun_waktu"
                           class="form-input-sm @error('kurun_waktu') error @enderror"
                           placeholder="Contoh: 2025">
                    @error('kurun_waktu') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- Tanggal Dibuat (Kolom 2) --}}
                <div class="form-group">
                    <label for="tanggal_dibuat">Tanggal Dibuat <span style="color: #ff5c5c;">*</span></label>
                    <input type="text" id="tanggal_dibuat" x-ref="tglDibuat" wire:model.defer="tanggal_dibuat"
                           class="form-input-sm @error('tanggal_dibuat') error @enderror" readonly style="cursor: pointer;">
                    @error('tanggal_dibuat') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- Jumlah (Kolom 3) --}}
                <div class="form-group">
                    <label for="jumlah">Jumlah Satuan <span style="color: #ff5c5c;">*</span></label>
                    <input type="number" id="jumlah" wire:model.defer="jumlah" min="1"
                           class="form-input-sm @error('jumlah') error @enderror" placeholder="1">
                    @error('jumlah') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- == BARIS 5: RETENSI & STATUS == --}}

                {{-- Retensi Inaktif (Kolom 1 - Auto Fill) --}}
                <div class="form-group">
                    <label for="masa_retensi_inaktif">Retensi Inaktif (Tahun) <span style="color: #ff5c5c;">*</span></label>
                    <input type="number" id="masa_retensi_inaktif" wire:model="masa_retensi_inaktif" min="0"
                           class="form-input-sm @error('masa_retensi_inaktif') error @enderror" placeholder="Auto">
                    @error('masa_retensi_inaktif') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- Status Akhir (Kolom 2 - Auto Fill) --}}
                <div class="form-group">
                    <label for="status_akhir">Status Akhir <span style="color: #ff5c5c;">*</span></label>
                    <select id="status_akhir" wire:model="status_akhir"
                            class="form-select-sm @error('status_akhir') error @enderror">
                        <option value="">-- Pilih --</option>
                        <option value="Musnah">Musnah</option>
                        <option value="Permanen">Permanen</option>
                    </select>
                    @error('status_akhir') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- Kosong (Kolom 3) untuk merapikan layout --}}
                <div class="form-group"></div>

                {{-- == BARIS 6: KLASIFIKASI == --}}

                <div class="form-group">
                    <label for="tingkat_perkembangan">Tingkat Perkembangan <span style="color: #ff5c5c;">*</span></label>
                    <select id="tingkat_perkembangan" wire:model.defer="tingkat_perkembangan" 
                            class="form-select-sm @error('tingkat_perkembangan') error @enderror">
                        <option value="">-- Pilih --</option>
                        <option value="Asli">Asli</option>
                        <option value="Fotokopi">Fotokopi</option>
                    </select>
                    @error('tingkat_perkembangan') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="klasifikasi_keamanan">Klasifikasi Keamanan <span style="color: #ff5c5c;">*</span></label>
                    <select id="klasifikasi_keamanan" wire:model.defer="klasifikasi_keamanan"
                            class="form-select-sm @error('klasifikasi_keamanan') error @enderror">
                        <option value="">-- Pilih --</option>
                        <option value="Terbuka">Terbuka</option>
                        <option value="Terbatas">Terbatas</option>
                        <option value="Rahasia">Rahasia</option>
                        <option value="Sangat rahasia">Sangat rahasia</option>
                    </select>
                    @error('klasifikasi_keamanan') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="klasifikasi_akses">Klasifikasi Akses <span style="color: #ff5c5c;">*</span></label>
                    <select id="klasifikasi_akses" wire:model.defer="klasifikasi_akses"
                            class="form-select-sm @error('klasifikasi_akses') error @enderror">
                        <option value="">-- Pilih --</option>
                        <option value="internal dan eksternal">Internal dan Eksternal</option>
                        <option value="Eselon II">Eselon II</option>
                        <option value="Eselon III">Eselon III</option>
                        <option value="Eselon IV">Eselon IV</option>
                    </select>
                    @error('klasifikasi_akses') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- == BARIS 7: UPLOAD FILE (FULL WIDTH) == --}}
                
                <div class="form-group grid-col-span-full">
                    <label>File Digital (Maks 5 File, PDF/JPG/PNG)</label>
                    <label for="fileInput" class="file-upload-box">
                        <i class="bi bi-cloud-upload" style="font-size: 1.5rem; color: var(--primary-blue);"></i>
                        <p style="margin: 5px 0;">Klik untuk memilih file</p>
                        
                        <input type="file" id="fileInput" x-ref="fileInput" wire:model="files" 
                               multiple accept=".pdf,.jpg,.jpeg,.png" @change="updateFileCount()">
                        
                        <div wire:loading wire:target="files">
                             <p class="text-danger" style="color: var(--primary-blue); font-weight: 600;">Mengunggah file...</p>
                        </div>

                        <template x-if="filesCount > 0">
                            <span class="file-count-badge" x-text="filesCount + ' File Siap Diunggah'"></span>
                        </template>
                        <template x-if="filesCount === 0">
                            <span class="file-info">Belum ada file yang dipilih.</span>
                        </template>
                    </label>
                    @error('files') <span class="text-danger">{{ $message }}</span> @enderror
                    @error('files.*') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- == BARIS 8: KETERANGAN (FULL WIDTH) == --}}

                <div class="form-group grid-col-span-full">
                    <label for="keterangan">Keterangan (Opsional)</label>
                    <textarea id="keterangan" wire:model.defer="keterangan" class="form-input-sm" rows="3" 
                              placeholder="Tambahkan keterangan tambahan jika ada..."></textarea>
                    @error('keterangan') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

            </div>

            <div class="form-footer">
                <a href="{{ route('arsip.inaktif.index') }}" class="btn btn-secondary">
                    <i class="bi bi-x-lg"></i> Batal
                </a>
                <button type="submit" class="btn btn-primary" wire:loading.attr="disabled" wire:target="save, files">
                    <i class="bi bi-save"></i> Simpan Berkas
                </button>
            </div>
        </form>
    </section>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/litepicker/dist/litepicker.js"></script>
<script>
    if (typeof Litepicker !== 'undefined') {
        Litepicker.lang = {
            'id': {
                months: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                monthsShort: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                weekdays: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
                weekdaysShort: ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
                resetText: 'Reset',
                applyText: 'Terapkan',
                buttonText: 'Tutup'
            }
        };
    }
</script>
@endpush