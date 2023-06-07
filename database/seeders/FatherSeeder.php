<?php

namespace Database\Seeders;

use App\Models\Father;
use Illuminate\Database\Seeder;

class FatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Father::factory()
            ->count(0)
            ->create();
    }
}
