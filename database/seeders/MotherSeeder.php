<?php

namespace Database\Seeders;

use App\Models\Mother;
use Illuminate\Database\Seeder;

class MotherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mother::factory()
            ->count(0)
            ->create();
    }
}
