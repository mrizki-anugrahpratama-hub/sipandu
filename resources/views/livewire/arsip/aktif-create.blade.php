@push('styles')
<style>
    /* Mengatur tata letak grid untuk formulir */
    .form-grid {
        display: grid;
        /* Default: 3 kolom */
        grid-template-columns: repeat(3, 1fr);
        gap: 24px;
    }

    /* Tablet (Max 1024px): 2 kolom */
    @media (max-width: 1024px) {
        .form-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    /* Ponsel (Max 640px): 1 kolom */
    @media (max-width: 640px) {
        .form-grid {
            grid-template-columns: 1fr;
        }
    }

    /* Pengaturan umum form group */
    .form-group {
        margin-bottom: 0; /* Mengandalkan gap dari form-grid */
    }

    .form-group label {
        display: block;
        margin-bottom: 6px;
        font-weight: 500;
        color: var(--text-primary);
        font-size: 0.9rem;
    }

    /* Memastikan input, select, textarea mengambil lebar penuh */
    .form-group input.form-input-sm,
    .form-group select.form-select-sm,
    .form-group textarea.form-input-sm {
        width: 100%;
    }

    /* Footer tombol */
    .form-footer {
        margin-top: 24px;
        border-top: 1px solid var(--border-color);
        padding-top: 20px;
        display: flex;
        justify-content: flex-end;
        gap: 12px;
    }

    /* Teks validasi error */
    .text-danger {
        color: #ff5c5c;
        font-size: 0.875rem;
        margin-top: 4px;
        display: block;
    }

    /* Mengambil lebar penuh (1/1 di ponsel, 2/2 di tablet, 3/3 di desktop) */
    .grid-col-span-full {
        grid-column: 1 / -1;
    }

    /* Mengambil lebar 2/3 di desktop */
    .grid-col-span-2 {
        grid-column: span 2 / span 2;
    }
    
    /* Di layar tablet (<= 1024px, 2 kolom), grid-col-span-2 mengambil lebar penuh */
    @media (max-width: 1024px) {
        .grid-col-span-2 {
            grid-column: 1 / -1;
        }
    }

    /* CSS untuk loading indicator */
    .loading-indicator {
        font-size: 0.8rem;
        color: var(--text-secondary);
        margin-left: 8px;
    }
    
    /* ----------------------------------------------------- */
    /* === CSS LITEPICKER DARK MODE FIXES === */
    /* ----------------------------------------------------- */
    
    body.dark-mode .litepicker { 
        background: var(--bg-sidebar); 
        border: 1px solid var(--border-color);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }
    body.dark-mode .litepicker .button-next-month,
    body.dark-mode .litepicker .button-prev-month {
        filter: invert(1); /* Membalik warna panah navigasi */
    }
    body.dark-mode .litepicker .container__months > .month-item .month-header {
        color: var(--text-primary);
    }
    body.dark-mode .litepicker .container__months > .month-item .day-item {
        color: var(--text-primary);
    }
    body.dark-mode .litepicker .container__months > .month-item .day-item:hover {
        background-color: var(--bg-active);
    }
    body.dark-mode .litepicker .container__months > .month-item .day-item.is-selected {
        background-color: var(--primary-blue) !important;
        border-color: var(--primary-blue) !important;
        color: var(--text-light);
    }
    
    body.dark-mode .litepicker .container__months {
        background-color: var(--bg-main); 
        color: var(--text-primary);
    }
    
    body.dark-mode .litepicker .container__months .day-item.is-in-range,
    body.dark-mode .litepicker .container__months .day-item.is-start-date,
    body.dark-mode .litepicker .container__months .day-item.is-end-date {
        color: var(--text-light) !important;
    }

    body.dark-mode .litepicker .container__months .month-item .month-weekday {
        color: var(--text-secondary); 
    }
    
    body.dark-mode .litepicker .container__months .month-item .month-header select {
        color: var(--text-primary) !important;
        background-color: var(--bg-sidebar) !important;
        border: 1px solid var(--border-color) !important;
    }
    
    body.dark-mode .litepicker .container__months .day-item.is-in-range {
        background-color: var(--primary-blue-light) !important; 
    }
    
    body.dark-mode .litepicker .container__months .day-item.is-outside-month {
        color: var(--text-muted) !important; 
    }
</style>
{{-- Tambahkan Litepicker CSS --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/litepicker/dist/css/litepicker.css">
@endpush

<div x-data="{ 
    datePicker: null,
    
    // Fungsi untuk inisialisasi Litepicker
    initDatePicker() {
        this.$nextTick(() => {
            // Hancurkan instance lama jika ada, untuk menghindari duplikasi saat Livewire me-render
            if (this.datePicker) {
                this.datePicker.destroy();
            }

            this.datePicker = new Litepicker({
                element: this.$refs.tglDibuat, // Merujuk ke input tanggal
                singleMode: true, // Mode tanggal tunggal
                format: 'YYYY-MM-DD',
                lang: 'id',
                dropdowns: { minYear: 2000, maxYear: (new Date()).getFullYear(), months: true, years: true },
                plugins: ['mobilefriendly'],
                
                setup: (picker) => {
                    // Sinkronisasi nilai kembali ke Livewire saat tanggal dipilih
                    picker.on('selected', (date1) => {
                        $wire.set('tanggal_dibuat', date1.format('YYYY-MM-DD'));
                    });
                }
            });

            // Set nilai awal jika sudah ada (untuk kasus edit/load)
            if ($wire.get('tanggal_dibuat')) {
                 this.datePicker.setDate($wire.get('tanggal_dibuat'));
            }
        });
    }
}" x-init="initDatePicker()">

    <x-slot name="header">
        @php
            $urlBidang = $slugBidangYangDibuka ? route('dashboard.' . str_replace('_', '-', $slugBidangYangDibuka)) : '#';
            
            // PERBAIKAN: Tambahkan parameter filterBidang agar tetap terkunci di sub-bidang (misal: umpeg)
            $urlArsipAktif = route('arsip.aktif.index', ['filterBidang' => $slugBidangYangDibuka]);
        @endphp
        <div class="welcome-title-group">
            <h1>Tambah Berkas Aktif</h1>
            <div class="breadcrumbs">
                {{-- Nama bidang diambil dari $namaBidangYangDibuka yang sudah dipetakan di mount() --}}
                <a href="{{ $urlBidang }}" class="breadcrumb-item active">{{ $namaBidangYangDibuka }}</a>
                <i class="bi bi-chevron-right breadcrumb-separator"></i>
                <a href="{{ $urlArsipAktif }}" class="breadcrumb-item active">Arsip Aktif</a>
                <i class="bi bi-chevron-right breadcrumb-separator"></i>
                <span class="breadcrumb-item active">Tambah</span>
            </div>
        </div>
    </x-slot>

    <section class="card animated-card">

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
                    <label for="kode_klasifikasi">Kode Klasifikasi *
                        <span wire:loading wire:target="selectedPergub" class="loading-indicator">
                            Memuat...
                        </span>
                    </label>
                    <input type="text"
                        id="kode_klasifikasi"
                        wire:model.live.debounce.300ms="kode_klasifikasi"
                        class="form-input-sm @error('kode_klasifikasi') error @enderror"
                        list="klasifikasi-data-list"
                        placeholder="Ketik kode atau pilih dari daftar..."
                        autocomplete="off">
                    <datalist id="klasifikasi-data-list">
                        @foreach($klasifikasiList as $klasifikasi)
                            {{-- Di sini kita gabungkan kode dan namanya agar sama dengan Arsip Inaktif/Vital --}}
                            <option value="{{ $klasifikasi->kode_klasifikasi }}">
                                {{ $klasifikasi->kode_klasifikasi }} - {{ $klasifikasi->nama_klasifikasi }}
                            </option>
                        @endforeach
                    </datalist>
                    @error('kode_klasifikasi') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- == BARIS 2: URAIAN (LEBAR PENUH) == --}}

                <div class="form-group grid-col-span-full">
                    <label for="uraian">Uraian *</label>
                    <input type="text" id="uraian" wire:model.defer="uraian" class="form-input-sm @error('uraian') error @enderror" placeholder="Masukkan nama/uraian berkas...">
                    @error('uraian') <span class="text-danger">{{ $message }}</span> @enderror
                </div>


                {{-- == BARIS 3: HASIL AUTOFILL (Index, No. Berkas) == --}}
                
                {{-- Index (Kolom 1) --}}
                <div class="form-group">
                    <label for="index">Index
                        <span wire:loading wire:target="kode_klasifikasi" class="loading-indicator">
                            ...
                        </span>
                    </label>
                    <input type="text" id="index" wire:model="index" class="form-input-sm" placeholder="- (Otomatis)" readonly>
                    @error('index') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- Nomor Berkas (Kolom 2) --}}
                <div class="form-group">
                    <label for="nomor_berkas">Nomor Berkas *</label>
                    <input type="text" id="nomor_berkas" wire:model="nomor_berkas" class="form-input-sm" placeholder="- (Otomatis)" readonly>
                    @error('nomor_berkas') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- Kolom Kosong (Kolom 3) --}}
                <div class="form-group">
                    {{-- Slot kosong untuk menjaga tata letak 3 kolom --}}
                </div>

                {{-- == BARIS 4: RETENSI & STATUS AKHIR == --}}

                {{-- Masa Retensi Aktif (Kolom 1) --}}
                <div class="form-group">
                    <label for="masa_retensi_aktif">Masa Retensi Aktif (Tahun) *</label>
                    <input type="number" id="masa_retensi_aktif" wire:model="masa_retensi_aktif" class="form-input-sm @error('masa_retensi_aktif') error @enderror" placeholder="Contoh: 5">
                    @error('masa_retensi_aktif') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- Masa Retensi Inaktif (Kolom 2) --}}
                <div class="form-group">
                    <label for="masa_retensi_inaktif">Masa Retensi Inaktif (Tahun) *</label>
                    <input type="number" id="masa_retensi_inaktif" wire:model="masa_retensi_inaktif" class="form-input-sm @error('masa_retensi_inaktif') error @enderror" placeholder="Contoh: 10">
                    @error('masa_retensi_inaktif') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- Status Akhir (Kolom 3) --}}
                <div class="form-group">
                    <label for="status_akhir">Status Akhir</label>
                    <select id="status_akhir" wire:model="status_akhir" class="form-select-sm @error('status_akhir') error @enderror">
                        <option value="">-- Pilih (Opsional) --</option>
                        <option value="Musnah">Musnah</option>
                        <option value="Permanen">Permanen</option>
                    </select>
                    @error('status_akhir') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- == BARIS 5: TANGGAL, WAKTU, JUMLAH == --}}

                {{-- Kurun Waktu (Kolom 1) --}}
                <div class="form-group">
                    <label for="kurun_waktu">Kurun Waktu *</label>
                    <input type="text" id="kurun_waktu" wire:model.live="kurun_waktu" class="form-input-sm @error('kurun_waktu') error @enderror" placeholder="Contoh: 2024">
                    @error('kurun_waktu') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- Tanggal Dibuat (Kolom 2) - Diperbaiki untuk Litepicker --}}
                <div class="form-group">
                    <label for="tanggal_dibuat">Tanggal Dibuat (Tanggal Berkas) *</label>
                    <input type="text" id="tanggal_dibuat" x-ref="tglDibuat" wire:model.defer="tanggal_dibuat"
                        class="form-input-sm @error('tanggal_dibuat') error @enderror" readonly style="cursor: pointer;">
                    @error('tanggal_dibuat') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- Jumlah (Kolom 3) --}}
                <div class="form-group">
                    <label for="jumlah">Jumlah *</label>
                    <input type="number" id="jumlah" wire:model.defer="jumlah" class="form-input-sm @error('jumlah') error @enderror" placeholder="Contoh: 1" min="1">
                    @error('jumlah') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- == BARIS 6: KLASIFIKASI & PERKEMBANGAN == --}}

                {{-- Tingkat Perkembangan (Kolom 1) --}}
                <div class="form-group">
                    <label for="tingkat_perkembangan">Tingkat Perkembangan</label>
                    <select id="tingkat_perkembangan" wire:model.defer="tingkat_perkembangan" class="form-select-sm">
                        <option value="">-- Pilih --</option>
                        <option value="Asli">Asli</option>
                        <option value="Fotokopi">Fotokopi</option>
                    </select>
                    @error('tingkat_perkembangan') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- Klasifikasi Keamanan (Kolom 2) --}}
                <div class="form-group">
                    <label for="klasifikasi_keamanan">Klasifikasi Keamanan</label>
                    <select id="klasifikasi_keamanan" wire:model.defer="klasifikasi_keamanan" class="form-select-sm">
                        <option value="">-- Pilih --</option>
                        <option value="Terbuka">Terbuka</option>
                        <option value="Terbatas">Terbatas</option>
                        <option value="Rahasia">Rahasia</option>
                        <option value="Sangat rahasia">Sangat rahasia</option>
                    </select>
                    @error('klasifikasi_keamanan') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- Klasifikasi Akses (Kolom 3) --}}
                <div class="form-group">
                    <label for="klasifikasi_akses">Klasifikasi Akses</label>
                    <select id="klasifikasi_akses" wire:model.defer="klasifikasi_akses" class="form-select-sm">
                        <option value="">-- Pilih --</option>
                        <option value="internal dan eksternal">Internal dan Eksternal</option>
                        <option value="Eselon II">Eselon II</option>
                        <option value="Eselon III">Eselon III</option>
                        <option value="Eselon IV">Eselon IV</option>
                    </select>
                    @error('klasifikasi_akses') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- == BARIS 7: KETERANGAN (LEBAR PENUH) == --}}

                <div class="form-group grid-col-span-full">
                    <label for="keterangan">Keterangan (Opsional)</label>
                    <textarea id="keterangan" wire:model.defer="keterangan" class="form-input-sm" rows="3" placeholder="Tambahkan keterangan tambahan jika ada..."></textarea>
                    @error('keterangan') <span class="text-danger">{{ $message }}</span> @enderror
                </div>


            </div>

            <div class="form-footer">
                <a href="{{ route('arsip.aktif.index') }}" class="btn btn-secondary">
                    <i class="bi bi-x-lg"></i> Batal
                </a>
                <button type="submit" class="btn btn-primary" wire:loading.attr="disabled" wire:target="save">
                    <i class="bi bi-save"></i> Simpan Berkas
                </button>
            </div>
        </form>
    </section>

</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/litepicker/dist/litepicker.js"></script>
{{-- Skrip untuk Bahasa Indonesia dan Inisialisasi --}}
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
                buttonText: 'Tutup',
                plural: 'hari',
                singular: 'hari'
            }
        };
    }
</script>
@endpush