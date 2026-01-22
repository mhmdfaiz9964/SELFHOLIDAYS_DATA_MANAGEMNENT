<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@selfholidays.com'],
            [
                'name' => 'MR Admin',
                'password' => Hash::make('admin@selfholidays.com'),
                'email_verified_at' => now(),
            ]
        );
    }
}
