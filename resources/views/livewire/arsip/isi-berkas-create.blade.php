<div>
    {{-- 1. HEADER --}}
    <x-slot name="header">
        @php
            $urlBidang = $slugBidangYangDibuka ? route('dashboard.' . $slugBidangYangDibuka) : '#';
            /* [BARU] URL kembali ke halaman detail */
            $urlDetailArsip = route('arsip.aktif.show', $arsip->id); 
        @endphp

        <div class="welcome-title-group">
            {{-- [BARU] Judul Halaman diubah --}}
            <h1>Upload Isi Berkas</h1>
            <a href="{{ $urlBidang }}" class="breadcrumb-item active">{{ $namaBidangYangDibuka }}</a>
            <i class="bi bi-chevron-right breadcrumb-separator"></i>
            {{-- [BARU] Breadcrumb diubah --}}
            <a href="{{ $urlDetailArsip }}" class="breadcrumb-item active">Detail Arsip</a>
            <i class="bi bi-chevron-right breadcrumb-separator"></i>
            <span class="breadcrumb-item active">Upload Baru</span>
        </div>
    </x-slot>

    {{-- 2. CSS KHUSUS HALAMAN FORM --}}
    @push('styles')
    <style>
        .row {
            display: flex;
            flex-wrap: wrap;
            margin-left: -12px;
            margin-right: -12px;
        }
        .col-lg-12 {
            width: 100%;
            padding-left: 12px;
            padding-right: 12px;
            flex-shrink: 0;
            margin-bottom: 24px;
        }
        .detail-card {
            background-color: var(--bg-white);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            box-shadow: var(--shadow-sm);
            height: 100%;
        }
        body.dark-mode .detail-card { background-color: var(--bg-sidebar); }
        .detail-body { 
            padding: 24px; 
            font-size: 0.95rem;
            color: var(--text-primary);
        }
        .detail-body h3 {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 16px;
        }
        .text-danger { 
            color: #ff5c5c; 
            font-size: 0.875rem; 
            margin-top: 4px; 
            display: block; 
        }

        /* [BARU] CSS UNTUK FORM UPLOAD (Dipindahkan ke sini) */
        .upload-form-container {
            /* [DIHAPUS] Dihapus style .upload-form-container
               karena form sekarang langsung di dalam .detail-body */
        }
        .form-row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 16px;
        }
        .form-row:last-child {
            margin-bottom: 0;
        }
        .form-group {
            flex: 1 1 100%;
            display: flex;
            flex-direction: column;
        }
        .form-label {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 8px;
        }
        .form-control,
        .form-control-file {
            width: 100%;
            padding: 10px 14px;
            font-size: 0.95rem;
            color: var(--text-primary);
            background-color: var(--bg-white);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            transition: border-color 0.2s, box-shadow 0.2s;
            box-sizing: border-box; 
        }
        body.dark-mode .form-control {
            background-color: var(--bg-sidebar);
        }
        .form-control:focus {
            outline: none;
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 2px var(--primary-blue-light);
        }
        .form-control-file {
            padding: 8px;
        }
        .form-control.is-invalid,
        .form-control-file.is-invalid {
            border-color: #ff5c5c;
        }
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 10px 16px;
            font-size: 0.95rem;
            font-weight: 600;
            border-radius: var(--radius-md);
            cursor: pointer;
            transition: all 0.2s;
            border: 1px solid transparent;
            text-decoration: none;
        }
        .btn-primary {
            background-color: var(--primary-blue);
            color: var(--bg-white);
            border-color: var(--primary-blue);
        }
        .btn-primary:hover {
            background-color: #0056b3; 
            border-color: #0056b3; 
        }
        /* [BARU] Tombol sekunder untuk "Batal" */
        .btn-secondary {
            background-color: var(--bg-active);
            color: var(--text-primary);
            border: 1px solid var(--border-color);
        }
        .btn-secondary:hover {
            background-color: var(--border-color);
        }
        .form-actions {
            display: flex;
            gap: 12px;
            justify-content: flex-end; /* Tombol di kanan */
            margin-top: 24px;
        }
        /* [AKHIR CSS FORM UPLOAD] */

    </style>
    @endpush

    {{-- 3. KONTEN HALAMAN (Layout 1 Kolom) --}}
    <div class="row">
        <div class="col-lg-12">
            <section class="card detail-card animated-card">
                <div class="detail-body">
                    
                    <h3>Formulir Upload Item untuk Berkas: "{{ $arsip->nama_berkas }}"</h3>
                    
                    {{-- [FORM DIPINDAHKAN KE SINI] --}}
                    {{-- Ganti 'isi-berkas.store' dengan nama route Anda --}}
                    <form action="#" {{-- route('isi-berkas.store', $arsip->id) --}} method="POST" enctype="multipart/form-data" style="margin-top: 20px;">
                        @csrf
                        <div class="form-row">
                            <div class="form-group" style="flex: 2;"> <label for="uraian" class="form-label">Uraian Informasi Arsip</label>
                                <input type="text" id="uraian" name="uraian" class="form-control @error('uraian') is-invalid @enderror" value="{{ old('uraian') }}" required>
                                @error('uraian')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group" style="flex: 1;"> <label for="tanggal_file" class="form-label">Tanggal File</label>
                                <input type="date" id="tanggal_file" name="tanggal_file" class="form-control @error('tanggal_file') is-invalid @enderror" value="{{ old('tanggal_file') }}" required>
                                @error('tanggal_file')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group" style="flex: 1;">
                                <label for="file_arsip" class="form-label">Upload File (PDF, DOCX, JPG, dll)</label>
                                <input type="file" id="file_arsip" name="file_arsip" class="form-control-file @error('file_arsip') is-invalid @enderror" required>
                                @error('file_arsip')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- [BARU] Tombol Aksi (Submit dan Batal) --}}
                        <div class="form-actions">
                            <a href="{{ route('arsip.aktif.show', $arsip->id) }}" class="btn btn-secondary">
                                Batal
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-upload"></i> Upload Arsip
                            </button>
                        </div>
                    </form>
                    
                </div>
            </section>
        </div>
    </div>
</div>