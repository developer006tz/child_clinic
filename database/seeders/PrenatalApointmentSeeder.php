<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PrenatalApointment;

class PrenatalApointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PrenatalApointment::factory()
            ->count(5)
            ->create();
    }
}
