<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BabyMedicalHostory;

class BabyMedicalHostorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BabyMedicalHostory::factory()
            ->count(5)
            ->create();
    }
}
