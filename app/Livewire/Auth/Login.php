<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;

#[Layout('layouts.guest')]
class Login extends Component
{
    public $email;
    public $password;
    public $remember = false;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            session()->regenerate();
            
            $role = Auth::user()->role;
            
            // [PERBAIKAN UTAMA]
            // Mengubah underscore (_) menjadi dash (-) agar sesuai dengan nama route di web.php
            // Contoh: 'super_admin' menjadi 'super-admin' -> route('dashboard.super-admin')
            return redirect()->route('dashboard.' . str_replace('_', '-', $role));
        }

        $this->addError('email', 'Email atau password salah.');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}