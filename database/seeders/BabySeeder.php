<?php

namespace Database\Seeders;

use App\Models\Baby;
use Illuminate\Database\Seeder;

class BabySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Baby::factory()
            ->count(3)
            ->create();
    }
}
