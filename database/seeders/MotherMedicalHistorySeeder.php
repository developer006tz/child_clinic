<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MotherMedicalHistory;

class MotherMedicalHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MotherMedicalHistory::factory()
            ->count(0)
            ->create();
    }
}
