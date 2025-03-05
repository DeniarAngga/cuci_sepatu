<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Jalankan seeder untuk database.
     */
    public function run(): void
    {
        // Membuat pengguna dengan role Admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin User',
                'username' => 'admin',
                'password' => Hash::make('12345678'),
            ]
        );
        $admin->assignRole('admin');

        // Membuat pengguna dengan role User
        $user = User::firstOrCreate(
            ['email' => 'user@gmail.com'],
            [
                'name' => 'Regular User',
                'username' => 'user',
                'password' => Hash::make('12345678'),

            ]
        );
        $user->assignRole('user');

        $this->command->info('Pengguna dengan role admin, user, berhasil dibuat!');
    }
}