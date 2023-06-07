<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BabyVaccination;

class BabyVaccinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BabyVaccination::factory()
            ->count(0)
            ->create();
    }
}
