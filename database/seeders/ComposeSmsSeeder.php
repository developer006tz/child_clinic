<?php

namespace Database\Seeders;

use App\Models\ComposeSms;
use Illuminate\Database\Seeder;

class ComposeSmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ComposeSms::factory()
            ->count(0)
            ->create();
    }
}
