<?php

namespace Database\Seeders;

use App\Models\Sms;
use Illuminate\Database\Seeder;

class SmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sms::factory()
            ->count(5)
            ->create();
    }
}
