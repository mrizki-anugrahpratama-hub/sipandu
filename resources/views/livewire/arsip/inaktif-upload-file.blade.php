<div>
    <x-slot name="header">
        <div class="welcome-title-group">
            <h1>Manajemen File Digital</h1>
            <a href="{{ route('arsip.inaktif.index') }}" class="breadcrumb-item">Arsip Inaktif</a>
            <i class="bi bi-chevron-right breadcrumb-separator"></i>
            <span class="breadcrumb-item active">Berkas #{{ $arsipInaktif->nomor_berkas }}</span>
        </div>
    </x-slot>

    <section class="card animated-card">
        <div class="p-4">
            <h3 class="text-xl font-weight-bold mb-3">Detail Arsip Induk</h3>
            <p><strong>Uraian:</strong> {{ $arsipInaktif->uraian }}</p>
            <p><strong>Kode Klasifikasi:</strong> {{ $arsipInaktif->kode_klasifikasi }}</p>
            <p><strong>Tanggal Dibuat:</strong> {{ \Carbon\Carbon::parse($arsipInaktif->tanggal_dibuat)->isoFormat('D MMMM YYYY') }}</p>
        </div>
        
        <div class="border-top my-4"></div>
        
        <h2 class="text-2xl font-weight-bold px-4">Daftar File ({{ $filesList->count() }} File)</h2>
        
        @if($filesList->isEmpty())
            <div class="alert alert-info mx-4 my-4" role="alert">
                <i class="bi bi-info-circle"></i> Belum ada file digital yang diunggah untuk arsip ini.
            </div>
        @else
            {{-- Tabel Daftar File --}}
            <div class="table-responsive p-4">
                <table class="table table-striped clickable-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama File</th>
                            <th>Ukuran</th>
                            <th>Diunggah Oleh</th>
                            <th style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($filesList as $file)
                        <tr> 
                            <td>{{ $loop->iteration }}</td>
                            
                            {{-- PERBAIKAN: Kolom Nama File kini menjadi tautan --}}
                            <td>
                                {{-- Tautan ini akan membuka file di tab baru, yang menghasilkan tampilan inline viewer di browser modern (seperti yang ada di screenshot Anda) --}}
                                <a href="{{ asset('storage/' . $file->path) }}" target="_blank" title="Lihat Isi File" style="text-decoration: underline; color: var(--text-primary); font-weight: 500;">
                                    {{ $file->nama_file }}
                                </a>
                            </td>
                            
                            {{-- Menampilkan ukuran dalam MB --}}
                            <td>{{ number_format($file->ukuran / 1024 / 1024, 2) }} MB</td>
                            <td>{{ $file->user->name ?? 'N/A' }}</td>
                            
                            {{-- Kolom Aksi --}}
                            <td class="d-flex gap-2">
                                {{-- Ikon Lihat (Lihat/Unduh): Sudah ada, berfungsi sebagai backup --}}
                                <a href="{{ asset('storage/' . $file->path) }}" target="_blank" class="btn-icon" title="Lihat/Unduh File">
                                    <i class="bi bi-eye"></i>
                                </a>
                                {{-- Tombol Hapus (Perlu fungsi delete di komponen Livewire) --}}
                                <button wire:click="confirmDeleteFile({{ $file->id }})" class="btn-icon btn-icon-danger" title="Hapus File">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        
        {{-- Area Upload File Baru --}}
        <div class="border-top mt-4 pt-4 px-4">
            <h3 class="text-xl font-weight-bold mb-3">Unggah File Baru</h3>
            {{-- Anda akan menambahkan form upload di sini --}}
            <p class="text-muted">Formulir upload file baru akan ditambahkan di sini.</p>
        </div>
        
        <div class="px-4 pb-4 mt-3">
             <a href="{{ route('arsip.inaktif.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali ke Daftar Arsip
            </a>
        </div>
    </section>
</div>