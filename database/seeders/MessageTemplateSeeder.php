<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MessageTemplate;

class MessageTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MessageTemplate::factory()
            ->count(5)
            ->create();
    }
}
