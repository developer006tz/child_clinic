<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BirthCertificate;

class BirthCertificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BirthCertificate::factory()
            ->count(0)
            ->create();
    }
}
