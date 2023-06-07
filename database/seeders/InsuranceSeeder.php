<?php

namespace Database\Seeders;

use App\Models\Insurance;
use Illuminate\Database\Seeder;

class InsuranceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Insurance::factory()
            ->count(0)
            ->create();
    }
}
