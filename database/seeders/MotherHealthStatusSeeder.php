<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MotherHealthStatus;

class MotherHealthStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MotherHealthStatus::factory()
            ->count(0)
            ->create();
    }
}
