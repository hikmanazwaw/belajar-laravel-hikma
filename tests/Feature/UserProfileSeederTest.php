<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserProfileSeederTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_factory_persists_profile_fields(): void
    {
        $user = User::factory()->create([
            'nama' => 'Siti Aminah',
            'foto' => 'siti.jpg',
            'role' => 'admin',
        ]);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'nama' => 'Siti Aminah',
            'foto' => 'siti.jpg',
            'role' => 'admin',
        ]);
    }

    public function test_user_seeder_creates_one_repeatable_admin_record(): void
    {
        $this->seed(UserSeeder::class);
        $this->seed(UserSeeder::class);

        $this->assertDatabaseHas('users', [
            'email' => 'admin.demo@example.test',
            'nama' => 'Admin Demo',
            'foto' => '',
            'role' => 'admin',
        ]);
        $this->assertDatabaseCount('users', 1);
    }
}
