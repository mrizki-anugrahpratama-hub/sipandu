<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'name' => 'Super Admin',
                'email' => 'super.admin@sipandu.com',
                'password' => Hash::make('password'),
                'role' => 'super_admin'
            ],
            [
                'name' => 'Admin Sekretariat',
                'email' => 'admin.sekretariat@sipandu.com',
                'password' => Hash::make('password'),
                'role' => 'sekretariat'
            ],
            [
                'name' => 'Admin Pemerintahan',
                'email' => 'admin.pemerintahan@sipandu.com',
                'password' => Hash::make('password'),
                'role' => 'pemerintahan'
            ],
            [
                'name' => 'Admin Pembangunan & Ekonomi',
                'email' => 'admin.pembangunanekonomi@sipandu.com',
                'password' => Hash::make('password'),
                'role' => 'pembangunan_ekonomi'
            ],
            [
                'name' => 'Admin Kemasyarakatan',
                'email' => 'admin.kemasyarakatan@sipandu.com',
                'password' => Hash::make('password'),
                'role' => 'kemasyarakatan'
            ],
            [
                'name' => 'Admin Sarana dan Prasarana',
                'email' => 'admin.saranadanprasarana@sipandu.com',
                'password' => Hash::make('password'),
                'role' => 'sarana_prasarana'
            ],
            [
                'name' => 'Admin Umum & Kepegawaian',
                'email' => 'admin.umumkepegawaian@sipandu.com',
                'password' => Hash::make('password'),
                'role' => 'umum_kepegawaian'
            ],
            [
                'name' => 'Admin Keuangan',
                'email' => 'admin.keuangan@sipandu.com',
                'password' => Hash::make('password'),
                'role' => 'keuangan'
            ],
            [
                'name' => 'Admin Penyusunan Program & Anggaran',
                'email' => 'admin.penyusunanprogramanggaran@sipandu.com',
                'password' => Hash::make('password'),
                'role' => 'penyusunan_program'
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}