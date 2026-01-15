<?php

namespace App\Livewire\Penyusutan;

use Livewire\Component;
use Livewire\Attributes\Layout; // <-- TAMBAHKAN INI

#[Layout('layouts.app')] // <-- TAMBAHKAN INI
class Index extends Component
{
    public function render()
    {
        // File ini HANYA merender view 
        // yang berisi 2 tombol (Musnah & Permanen).
        // Tidak perlu logika query database di sini.
        return view('livewire.penyusutan.index');
    }
}