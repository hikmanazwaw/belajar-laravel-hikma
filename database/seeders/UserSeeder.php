<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->firstOrCreate(
            ['email' => 'admin.demo@example.test'],
            [
                'nama' => 'Admin Demo',
                'password' => Hash::make(Str::random(40)),
                'foto' => '',
                'role' => 'admin',
            ],
        );
    }
}
