<?php

namespace Tests\Feature;

use Tests\TestCase;

class MahasiswaControllerTest extends TestCase
{
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
