<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BabyMedicalHistory;

class BabyMedicalHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BabyMedicalHistory::factory()
            ->count(5)
            ->create();
    }
}
