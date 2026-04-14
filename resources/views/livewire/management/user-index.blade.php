{{-- Menggunakan class utama dashboard-scope agar variabel warna konsisten --}}
<div class="dashboard-container dashboard-scope">

    {{-- 1. HEADER HALAMAN --}}
    <x-slot name="header">
        <div class="welcome-title-group">
            <h1 class="dashboard-header__title">Manajemen Akun</h1>
            <span class="text-sub-color" style="font-size: 0.9rem;">Kelola hak akses dan profil pengguna sistem</span>
        </div>
    </x-slot>

    {{-- 2. CSS KHUSUS (Konsistensi dengan Penyusutan) --}}
    @push('styles')
    <style>
        .dashboard-scope {
            /* Variabel Warna Utama (Sama dengan Index Penyusutan) */
            --bg-page: #f8fafc;
            --bg-card: #ffffff;
            --border-color: #e2e8f0;
            --primary-blue: #3b82f6;
            --primary-blue-light: rgba(59, 130, 246, 0.15);
            --text-primary: #1e293b;
            --text-secondary: #64748b;
            --radius-lg: 0.75rem;
        }

        /* Dark Mode Override */
        body.dark-mode .dashboard-scope, :is([class*="dark"] .dashboard-scope) {
            --bg-page: #151c28;
            --bg-card: #1f2937;
            --border-color: #374151;
            --text-primary: #f1f5f9;
            --text-secondary: #94a3b8;
        }

        /* Styling Table Card */
        .management-card {
            background-color: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table th {
            background-color: var(--primary-blue-light);
            color: var(--primary-blue);
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            font-weight: 700;
            padding: 1rem;
            border-bottom: 2px solid var(--border-color);
        }

        .data-table td {
            padding: 1rem;
            color: var(--text-primary);
            border-bottom: 1px solid var(--border-color);
            font-size: 0.9rem;
        }

        /* Badge Role */
        .role-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            background-color: var(--primary-blue-light);
            color: var(--primary-blue);
        }

        /* Custom Input & Select */
        .form-input-custom {
            width: 100%;
            padding: 0.6rem 1rem;
            border-radius: 0.5rem;
            border: 1px solid var(--border-color);
            background-color: var(--bg-page);
            color: var(--text-primary);
            transition: all 0.3s ease;
        }

        .form-input-custom:focus {
            outline: none;
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px var(--primary-blue-light);
        }

        /* Modal Overlay */
        .modal-overlay {
            background-color: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(4px);
        }
    </style>
    @endpush

    {{-- 3. TOOLBAR --}}
    <div class="main-toolbar" style="display: flex; justify-content: space-between; align-items: center; margin: 1.5rem 0; gap: 1rem;">
        <div class="search-bar-table" style="position: relative; flex: 1; max-width: 400px;">
            <i class="bi bi-search" style="position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); color: var(--text-secondary);"></i>
            <input wire:model.live="searchQuery" type="text" class="form-input-custom" style="padding-left: 2.8rem;" placeholder="Cari nama atau email...">
        </div>
        
        <button wire:click="create()" class="action-button btn-primary-live" style="background: var(--primary-blue); color: white; border: none; padding: 0.6rem 1.2rem; border-radius: 0.5rem; font-weight: 600; cursor: pointer;">
            <i class="bi bi-person-plus-fill"></i> Tambah Akun
        </button>
    </div>

    {{-- 4. KONTEN TABEL --}}
    <div class="management-card">
        <table class="data-table">
            <thead>
                <tr>
                    <th style="text-align: left;">Pengguna</th>
                    <th style="text-align: left;">Role / Bidang</th>
                    <th style="text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr style="transition: background 0.2s;" onmouseover="this.style.backgroundColor='var(--primary-blue-light)'" onmouseout="this.style.backgroundColor='transparent'">
                    <td>
                        <div style="display: flex; align-items: center; gap: 0.75rem;">
                            <div style="width: 35px; height: 35px; border-radius: 50%; background: var(--primary-blue); color: white; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 0.8rem;">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                            <div>
                                <div style="font-weight: 600;">{{ $user->name }}</div>
                                <div style="font-size: 0.75rem; color: var(--text-secondary);">{{ $user->email }}</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="role-badge">
                            {{ $roles[$user->role] ?? $user->role }}
                        </span>
                    </td>
                    <td style="text-align: center;">
                        <button wire:click="edit({{ $user->id }})" title="Ubah" style="background: none; border: none; color: var(--primary-blue); cursor: pointer; font-size: 1.1rem; margin-right: 0.5rem;">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <button onclick="confirm('Hapus akun ini?') || event.stopImmediatePropagation()" wire:click="delete({{ $user->id }})" title="Hapus" style="background: none; border: none; color: #ef4444; cursor: pointer; font-size: 1.1rem;">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" style="text-align: center; padding: 3rem; color: var(--text-secondary);">
                        <i class="bi bi-people" style="font-size: 3rem; display: block; margin-bottom: 1rem; opacity: 0.3;"></i>
                        Belum ada data akun ditemukan.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        
        @if($users->hasPages())
        <div style="padding: 1rem; border-top: 1px solid var(--border-color);">
            {{ $users->links() }}
        </div>
        @endif
    </div>

    {{-- 5. MODAL FORM --}}
    @if($isOpen)
    <div class="fixed inset-0 z-50 flex items-center justify-center modal-overlay" style="position: fixed; top:0; left:0; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">
        <div class="animated-card" style="background-color: var(--bg-card); width: 100%; max-width: 450px; border-radius: 1rem; padding: 2rem; border: 1px solid var(--border-color); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                <h2 style="font-size: 1.25rem; font-weight: 700; color: var(--text-primary);">{{ $userId ? 'Perbarui Profil' : 'Daftarkan Akun Baru' }}</h2>
                <button wire:click="closeModal()" style="background: none; border: none; color: var(--text-secondary); cursor: pointer; font-size: 1.2rem;">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>

            <form wire:submit.prevent="store" style="display: flex; flex-direction: column; gap: 1.2rem;">
                <div>
                    <label style="display: block; font-size: 0.8rem; font-weight: 600; color: var(--text-secondary); margin-bottom: 0.4rem;">NAMA LENGKAP</label>
                    <input wire:model="name" type="text" class="form-input-custom" placeholder="Nama user...">
                    @error('name') <span style="color: #ef4444; font-size: 0.7rem;">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label style="display: block; font-size: 0.8rem; font-weight: 600; color: var(--text-secondary); margin-bottom: 0.4rem;">ALAMAT EMAIL</label>
                    <input wire:model="email" type="email" class="form-input-custom" placeholder="email@sipandu.com">
                    @error('email') <span style="color: #ef4444; font-size: 0.7rem;">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label style="display: block; font-size: 0.8rem; font-weight: 600; color: var(--text-secondary); margin-bottom: 0.4rem;">BIDANG / AKSES</label>
                    <select wire:model="role" class="form-input-custom">
                        <option value="">Pilih Bidang...</option>
                        @foreach($roles as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                    @error('role') <span style="color: #ef4444; font-size: 0.7rem;">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label style="display: block; font-size: 0.8rem; font-weight: 600; color: var(--text-secondary); margin-bottom: 0.4rem;">PASSWORD {{ $userId ? '(Kosongkan jika tetap)' : '' }}</label>
                    <input wire:model="password" type="password" class="form-input-custom" placeholder="••••••••">
                    @error('password') <span style="color: #ef4444; font-size: 0.7rem;">{{ $message }}</span> @enderror
                </div>

                <div style="display: flex; gap: 1rem; margin-top: 1rem;">
                    <button type="button" wire:click="closeModal()" style="flex: 1; padding: 0.75rem; border-radius: 0.5rem; border: 1px solid var(--border-color); background: none; color: var(--text-primary); font-weight: 600; cursor: pointer;">Batal</button>
                    <button type="submit" style="flex: 2; padding: 0.75rem; border-radius: 0.5rem; background: var(--primary-blue); color: white; border: none; font-weight: 700; cursor: pointer; box-shadow: 0 4px 12px var(--primary-blue-light);">
                        {{ $userId ? 'Simpan Perubahan' : 'Daftarkan User' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endif
</div>