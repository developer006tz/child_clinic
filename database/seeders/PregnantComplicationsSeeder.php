<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PregnantComplications;

class PregnantComplicationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PregnantComplications::factory()
            ->count(5)
            ->create();
    }
}
