<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BabyDevelopmentMilestone;

class BabyDevelopmentMilestoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BabyDevelopmentMilestone::factory()
            ->count(5)
            ->create();
    }
}
