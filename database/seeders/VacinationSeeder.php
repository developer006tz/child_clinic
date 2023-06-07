<?php

namespace Database\Seeders;

use App\Models\Vacination;
use Illuminate\Database\Seeder;

class VacinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vacination::factory()
            ->count(0)
            ->create();
    }
}
