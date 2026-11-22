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
        $admin = User::query()->firstOrNew(['email' => 'admin.demo@example.test']);
        $adminPassword = config('auth.demo_admin_password');

        $admin->nama = 'Admin Demo';
        $admin->foto = '';
        $admin->role = 'admin';

        if (! $admin->exists || (is_string($adminPassword) && $adminPassword !== '')) {
            $admin->password = Hash::make(
                is_string($adminPassword) && $adminPassword !== ''
                    ? $adminPassword
                    : Str::random(40),
            );
        }

        $admin->save();
    }
}
