<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MahasiswaControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(User::factory()->create());
    }

    public function test_daftar_mahasiswa_menampilkan_seluruh_data(): void
    {
        $this->get('/daftar/mahasiswa')
            ->assertOk()
            ->assertSee('Daftar Mahasiswa')
            ->assertSee('Anton')
            ->assertSee('Surabaya')
            ->assertSee('Budi')
            ->assertSee('Kediri')
            ->assertSee('Ani')
            ->assertSee('Malang')
            ->assertSee('Sinta')
            ->assertSee('Gender')
            ->assertSee('L')
            ->assertSee('P');
    }
}
