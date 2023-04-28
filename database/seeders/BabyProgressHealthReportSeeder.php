<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BabyProgressHealthReport;

class BabyProgressHealthReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BabyProgressHealthReport::factory()
            ->count(3)
            ->create();
    }
}
