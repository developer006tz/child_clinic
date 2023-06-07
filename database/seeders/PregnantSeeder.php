<?php

namespace Database\Seeders;

use App\Models\Pregnant;
use Illuminate\Database\Seeder;

class PregnantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pregnant::factory()
            ->count(0)
            ->create();
    }
}
