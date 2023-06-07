<?php

namespace Database\Seeders;

use App\Models\Desease;
use Illuminate\Database\Seeder;

class DeseaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Desease::factory()
            ->count(0)
            ->create();
    }
}
