<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'hrAsAdmin',
            'email' => 'HRZPC@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('HRZPC@gmail.com'),
        ]);
    }
}
