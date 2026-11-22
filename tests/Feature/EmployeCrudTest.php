<?php

namespace Tests\Feature;

use App\Models\Employe;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmployeCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_page_displays_the_employe_form(): void
    {
        $this->get(route('employes.create'))
            ->assertOk()
            ->assertSee('Tambah Pegawai')
            ->assertSee('name="nama"', false)
            ->assertSee('name="alamat"', false)
            ->assertSee('name="gender"', false)
            ->assertSee('name="gaji"', false);
    }

    public function test_index_displays_employe_records(): void
    {
        $employe = Employe::factory()->create([
            'nama' => 'Siti Aminah',
            'alamat' => 'Bandung',
            'gender' => 'P',
            'gaji' => 6500000,
        ]);

        $this->get(route('employes.index'))
            ->assertOk()
            ->assertSee('Siti Aminah')
            ->assertSee('Bandung')
            ->assertSee('Rp 6.500.000')
            ->assertSee(route('employes.show', $employe));
    }

    public function test_valid_form_submission_creates_an_employe(): void
    {
        $this->post(route('employes.store'), [
            'nama' => 'Budi Santoso',
            'alamat' => 'Surabaya',
            'gender' => 'L',
            'gaji' => 5000000,
        ])
            ->assertRedirectToRoute('employes.index')
            ->assertSessionHas('status', 'Data pegawai berhasil ditambahkan.');

        $this->assertDatabaseHas('employes', [
            'nama' => 'Budi Santoso',
            'alamat' => 'Surabaya',
            'gender' => 'L',
            'gaji' => 5000000,
        ]);
    }

    public function test_invalid_gender_is_rejected_without_creating_an_employe(): void
    {
        $this->from(route('employes.create'))
            ->post(route('employes.store'), [
                'nama' => 'Budi Santoso',
                'alamat' => 'Surabaya',
                'gender' => 'X',
                'gaji' => 5000000,
            ])
            ->assertRedirect(route('employes.create'))
            ->assertSessionHasErrors(['gender']);

        $this->assertDatabaseCount('employes', 0);
    }

    public function test_show_displays_an_employe_record(): void
    {
        $employe = Employe::factory()->create([
            'nama' => 'Siti Aminah',
            'alamat' => 'Bandung',
            'gender' => 'P',
            'gaji' => 6500000,
        ]);

        $this->get(route('employes.show', $employe))
            ->assertOk()
            ->assertSee('Siti Aminah')
            ->assertSee('Bandung')
            ->assertSee('Rp 6.500.000');
    }

    public function test_edit_page_displays_the_existing_employe_values(): void
    {
        $employe = Employe::factory()->create([
            'nama' => 'Siti Aminah',
            'alamat' => 'Bandung',
            'gender' => 'P',
            'gaji' => 6500000,
        ]);

        $this->get(route('employes.edit', $employe))
            ->assertOk()
            ->assertSee('Ubah Data Pegawai')
            ->assertSee('value="Siti Aminah"', false)
            ->assertSee('Bandung')
            ->assertSee('value="6500000"', false);
    }

    public function test_valid_update_changes_an_employe_record(): void
    {
        $employe = Employe::factory()->create();

        $this->put(route('employes.update', $employe), [
            'nama' => 'Dewi Lestari',
            'alamat' => 'Yogyakarta',
            'gender' => 'P',
            'gaji' => 7200000,
        ])
            ->assertRedirectToRoute('employes.index')
            ->assertSessionHas('status', 'Data pegawai berhasil diperbarui.');

        $this->assertDatabaseHas('employes', [
            'id' => $employe->id,
            'nama' => 'Dewi Lestari',
            'alamat' => 'Yogyakarta',
            'gender' => 'P',
            'gaji' => 7200000,
        ]);
    }

    public function test_delete_removes_an_employe_record(): void
    {
        $employe = Employe::factory()->create();

        $this->delete(route('employes.destroy', $employe))
            ->assertRedirectToRoute('employes.index')
            ->assertSessionHas('status', 'Data pegawai berhasil dihapus.');

        $this->assertDatabaseMissing('employes', [
            'id' => $employe->id,
        ]);
    }
}
