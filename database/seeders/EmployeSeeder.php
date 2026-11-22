<?php

namespace Database\Seeders;

use App\Models\Employe;
use Illuminate\Database\Seeder;

class EmployeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $missingEmployes = max(0, 20 - Employe::query()->count());

        if ($missingEmployes > 0) {
            Employe::factory()->count($missingEmployes)->create();
        }
    }
}
