<?php

namespace Tests\Feature;

use Tests\TestCase;

class KalkulatorControllerTest extends TestCase
{
    public function test_laman_kalkulator_menampilkan_form_segitiga(): void
    {
        $this->get('/kalkulator/segitiga')
            ->assertOk()
            ->assertSee('Luas Segitiga')
            ->assertSee('Alas')
            ->assertSee('Tinggi');
    }

    public function test_perhitungan_menampilkan_luas_segitiga(): void
    {
        $this->post('/kalkulator/segitiga', [
            'alas' => '8',
            'tinggi' => '6',
        ])
            ->assertOk()
            ->assertSee('24,00 satuan²');
    }

    public function test_perhitungan_menolak_nilai_kosong(): void
    {
        $this->from('/kalkulator/segitiga')
            ->post('/kalkulator/segitiga', [
                'alas' => '',
                'tinggi' => '',
            ])
            ->assertRedirect('/kalkulator/segitiga')
            ->assertSessionHasErrors([
                'alas' => 'Alas wajib diisi.',
                'tinggi' => 'Tinggi wajib diisi.',
            ]);
    }

    public function test_perhitungan_menolak_nilai_yang_tidak_positif(): void
    {
        $this->from('/kalkulator/segitiga')
            ->post('/kalkulator/segitiga', [
                'alas' => '0',
                'tinggi' => '-2',
            ])
            ->assertRedirect('/kalkulator/segitiga')
            ->assertSessionHasErrors([
                'alas' => 'Alas harus lebih besar dari 0.',
                'tinggi' => 'Tinggi harus lebih besar dari 0.',
            ]);
    }

    public function test_perhitungan_menolak_input_non_angka(): void
    {
        $this->from('/kalkulator/segitiga')
            ->post('/kalkulator/segitiga', [
                'alas' => 'delapan',
                'tinggi' => 'enam',
            ])
            ->assertRedirect('/kalkulator/segitiga')
            ->assertSessionHasErrors([
                'alas' => 'Alas harus berupa angka.',
                'tinggi' => 'Tinggi harus berupa angka.',
            ]);
    }
}
