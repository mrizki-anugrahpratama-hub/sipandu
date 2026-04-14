<?php

namespace App\Livewire\Management;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Hash;

#[Layout('layouts.app')]
class UserIndex extends Component
{
    use WithPagination;

    public $searchQuery = '';
    public $perPage = 10; // Default batas data per halaman
    public $userId, $name, $email, $password, $role;
    public $isOpen = false;

    // Daftar Role sesuai permintaan
    public $roles = [
        'sekretariat' => 'Sekretariat',
        'sub_bagian_keuangan' => 'Sub. Bagian Keuangan',
        'sub_bagian_penyusunan_program' => 'Sub. Bagian Penyusunan Program',
        'sub_bagian_umum_kepegawaian' => 'Sub. Bagian Umum dan Kepegawaian',
        'bidang_pemerintahan' => 'Bidang Pemerintahan',
        'bidang_kemasyarakatan' => 'Bidang Kemasyarakatan',
        'bidang_pembangunan_ekonomi' => 'Bidang Pembangunan Ekonomi',
        'bidang_sarana_prasarana' => 'Bidang Sarana dan Prasarana',
        'super_admin' => 'Super Admin',
    ];

    public function updatingSearchQuery() { $this->resetPage(); }
    public function updatingPerPage() { $this->resetPage(); }

    public function render()
    {
        $users = User::where('name', 'like', '%' . $this->searchQuery . '%')
            ->orWhere('email', 'like', '%' . $this->searchQuery . '%')
            ->latest()
            ->paginate($this->perPage); // Gunakan variabel perPage

        return view('livewire.management.user-index', [
            'users' => $users
        ])->title('Manajemen Akun');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal() { $this->isOpen = true; }
    public function closeModal() { $this->isOpen = false; }

    private function resetInputFields() {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->role = '';
        $this->userId = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->userId,
            'role' => 'required',
            'password' => $this->userId ? 'nullable|min:6' : 'required|min:6',
        ]);

        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
        ];

        if ($this->password) {
            $data['password'] = Hash::make($this->password);
        }

        User::updateOrCreate(['id' => $this->userId], $data);

        session()->flash('success', $this->userId ? 'Akun berhasil diperbarui.' : 'Akun berhasil dibuat.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->userId = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->role;
        $this->password = ''; // Kosongkan password saat edit kecuali ingin diganti
        $this->openModal();
    }

    public function delete($id)
    {
        User::find($id)->delete();
        session()->flash('success', 'Akun berhasil dihapus.');
    }
}