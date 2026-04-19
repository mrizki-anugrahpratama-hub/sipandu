<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File; 

// --- IMPOR KOMPONENT LIVEWIRE ---
use App\Livewire\Auth\Login;

// Dashboard Components
use App\Livewire\Dashboard\SuperAdmin;
use App\Livewire\Dashboard\Sekretariat;
use App\Livewire\Dashboard\Pemerintahan;
use App\Livewire\Dashboard\PembangunanEkonomi;
use App\Livewire\Dashboard\Kemasyarakatan;
use App\Livewire\Dashboard\SaranaPrasarana;
use App\Livewire\Dashboard\UmumKepegawaian;
use App\Livewire\Dashboard\Keuangan;
use App\Livewire\Dashboard\PenyusunanProgram;

// Manajemen & Log
use App\Livewire\RecycleBin\Index as RecycleBinIndex;
use App\Livewire\Log\AktivitasIndex;
use App\Livewire\Management\UserIndex;

// Penyusutan
use App\Livewire\Penyusutan\Index as PenyusutanIndex;
use App\Livewire\Penyusutan\MusnahIndex;
use App\Livewire\Penyusutan\PermanenIndex;

// Arsip Aktif
use App\Livewire\Arsip\AktifIndex;
use App\Livewire\Arsip\AktifCreate;
use App\Livewire\Arsip\AktifEdit;
use App\Livewire\Arsip\AktifShow;
use App\Livewire\Arsip\AktifUploadFile;

// Arsip Inaktif
use App\Livewire\Arsip\InaktifIndex;
use App\Livewire\Arsip\InaktifCreate;
use App\Livewire\Arsip\InaktifEdit;
use App\Livewire\Arsip\InaktifShow;
use App\Livewire\Arsip\InaktifUploadFile; 

// Arsip Vital
use App\Livewire\Arsip\VitalIndex;
use App\Livewire\Arsip\VitalCreate;
use App\Livewire\Arsip\VitalEdit;
use App\Livewire\Arsip\VitalShow;

// =========================================================================
// ROUTE AUTHENTICATION
// =========================================================================

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', Login::class)->name('login')->middleware('guest');

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('login');
})->name('logout');

// =========================================================================
// LOGIKA PENGALIH DASHBOARD (REDIRECTOR)
// =========================================================================
Route::get('/dashboard', function () {
    $role = Auth::user()->role;

    // Pastikan case di sini cocok dengan kolom 'role' di database
    switch ($role) {
        case 'super_admin':
            return redirect()->route('dashboard.super-admin');
        case 'sekretariat':
            return redirect()->route('dashboard.sekretariat');
        case 'pemerintahan':
            return redirect()->route('dashboard.pemerintahan');
        case 'pembangunan_ekonomi':
            return redirect()->route('dashboard.pembangunan-ekonomi');
        case 'kemasyarakatan':
            return redirect()->route('dashboard.kemasyarakatan');
        case 'sarana_prasarana':
            return redirect()->route('dashboard.sarana-prasarana');
        case 'umum_kepegawaian':
            return redirect()->route('dashboard.umum-kepegawaian');
        case 'keuangan':
            return redirect()->route('dashboard.keuangan');
        case 'penyusunan_program':
            return redirect()->route('dashboard.penyusunan-program');
        // Jika ada role 'sistem' di database, tambahkan case-nya di sini
        default:
            return redirect()->route('arsip.aktif.index');
    }
})->middleware('auth')->name('dashboard');

// =========================================================================
// GROUP DASHBOARD (Role Protected)
// =========================================================================
Route::middleware(['auth'])->group(function () {

    // notifikasi
    Route::get('/notifications/mark-all-read', function () {
        Auth::user()->unreadNotifications->markAsRead();
        return back();
    })->name('notifications.markAllRead');
    
    // --- Super Admin ---
    Route::middleware(['role:super_admin'])->group(function () {
        Route::get('/dashboard/super-admin', SuperAdmin::class)->name('dashboard.super-admin'); 

        // [PERBAIKAN PENTING] 
        // Menambahkan route 'dashboard.sistem' untuk mencegah error RouteNotFoundException.
        // Jika Anda belum punya komponen 'Sistem', saya arahkan sementara ke SuperAdmin.
        // Ganti 'SuperAdmin::class' dengan komponen yang benar jika sudah dibuat.
        Route::get('/dashboard/sistem', SuperAdmin::class)->name('dashboard.sistem');

        // Manajemen Akun
        Route::get('/manajemen/akun', UserIndex::class)->name('manajemen.akun.index');

        // Log Aktivitas
        Route::get('/log-aktivitas', AktivitasIndex::class)->name('log.aktivitas');
    });

    // --- Sekretariat ---
    Route::middleware(['role:super_admin,sekretariat'])->group(function () {
        Route::get('/dashboard/sekretariat', Sekretariat::class)->name('dashboard.sekretariat');
    });

    // --- Sub Bidang Sekretariat ---
    Route::middleware(['role:super_admin,sekretariat,umum_kepegawaian'])->group(function () {
        Route::get('/dashboard/umum-kepegawaian', UmumKepegawaian::class)->name('dashboard.umum-kepegawaian');
    });

    Route::middleware(['role:super_admin,sekretariat,keuangan'])->group(function () {
        Route::get('/dashboard/keuangan', Keuangan::class)->name('dashboard.keuangan');
    });

    Route::middleware(['role:super_admin,sekretariat,penyusunan_program'])->group(function () {
        Route::get('/dashboard/penyusunan-program', PenyusunanProgram::class)->name('dashboard.penyusunan-program');
    });

    // --- 4 Bidang Lainnya ---
    Route::middleware(['role:super_admin,pemerintahan'])->group(function () {
        Route::get('/dashboard/pemerintahan', Pemerintahan::class)->name('dashboard.pemerintahan');
    });

    Route::middleware(['role:super_admin,pembangunan_ekonomi'])->group(function () {
        Route::get('/dashboard/pembangunan-ekonomi', PembangunanEkonomi::class)->name('dashboard.pembangunan-ekonomi');
    });

    Route::middleware(['role:super_admin,kemasyarakatan'])->group(function () {
        Route::get('/dashboard/kemasyarakatan', Kemasyarakatan::class)->name('dashboard.kemasyarakatan');
    });

    Route::middleware(['role:super_admin,sarana_prasarana'])->group(function () {
        Route::get('/dashboard/sarana-prasarana', SaranaPrasarana::class)->name('dashboard.sarana-prasarana');
    });
});

// =========================================================================
// GROUP ARSIP & MANAJEMEN
// =========================================================================
Route::middleware(['auth'])->group(function () {
    
    // --- Arsip Aktif ---
    Route::prefix('arsip/aktif')->name('arsip.aktif.')->group(function () {
        Route::get('/', AktifIndex::class)->name('index');
        Route::get('/create', AktifCreate::class)->name('create');
        Route::get('/{id}/edit', AktifEdit::class)->name('edit');
        Route::get('/{id}', AktifShow::class)->name('show');
        Route::get('/{id}/upload', AktifUploadFile::class)->name('file.create');
    });

    // --- Arsip Inaktif ---
    Route::prefix('arsip/inaktif')->name('arsip.inaktif.')->group(function () {
        Route::get('/', InaktifIndex::class)->name('index');
        Route::get('/create', InaktifCreate::class)->name('create');
        Route::get('/{id}/edit', InaktifEdit::class)->name('edit');
        Route::get('/{id}', InaktifShow::class)->name('show');
        // Upload file baru
        Route::get('/{id}/upload', InaktifUploadFile::class)->name('file.create');
        // Manage file (List file) - Sesuai request Anda sebelumnya
        Route::get('/{id}/files', InaktifUploadFile::class)->name('files.manage'); 
    });

    // --- Arsip Vital ---
    Route::prefix('arsip/vital')->name('arsip.vital.')->group(function () {
        Route::get('/', VitalIndex::class)->name('index');
        Route::get('/create', VitalCreate::class)->name('create');
        Route::get('/{id}/edit', VitalEdit::class)->name('edit');
        Route::get('/{id}', VitalShow::class)->name('show');
    });

    // --- MANAJEMEN ---

    // Penyusutan
    Route::get('/penyusutan', PenyusutanIndex::class)->name('penyusutan.index');
    Route::get('/penyusutan/musnah', MusnahIndex::class)->name('penyusutan.musnah.index');
    Route::get('/penyusutan/permanen', PermanenIndex::class)->name('penyusutan.permanen.index');

    // Recycle Bin
    Route::get('/recycle-bin', RecycleBinIndex::class)->name('recycle-bin.index');
});

// =========================================================================
// ROUTE PENYELAMAT STORAGE (MAGIC SEARCH)
// =========================================================================
// Catatan: Hati-hati menggunakan ini di Production karena bisa lambat jika file sangat banyak.
Route::get('/storage/{any}', function ($any) {
    
    // 1. Coba cari persis sesuai URL (Normal)
    $path = storage_path('app/public/' . $any);
    if (file_exists($path)) {
        return response()->file($path);
    }

    // 2. Jika Gagal, Gunakan "Magic Search"
    $filename = basename($any);
    $directory = storage_path('app/public');

    try {
        $files = File::allFiles($directory);
        foreach ($files as $file) {
            if ($file->getFilename() === $filename) {
                return response()->file($file->getPathname());
            }
        }
    } catch (\Exception $e) {
        // Silent fail
    }

    // 3. 404
    abort(404, "File tidak ditemukan.");

})->where('any', '.*');