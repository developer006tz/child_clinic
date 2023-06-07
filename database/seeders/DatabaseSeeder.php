<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Adding an admin user
        $user = \App\Models\User::factory()
            ->count(1)
            ->create([
                'email' => 'admin@admin.com',
                'password' => \Hash::make('admin'),
            ]);
        $this->call(PermissionsSeeder::class);

        // $this->call(BabySeeder::class);
        // $this->call(BabyDevelopmentMilestoneSeeder::class);
        // $this->call(BabyMedicalHistorySeeder::class);
        // $this->call(BabyProgressHealthReportSeeder::class);
        // $this->call(BabyVaccinationSeeder::class);
        // $this->call(BirthCertificateSeeder::class);
        $this->call(BloodTypeSeeder::class);
        // $this->call(CardSeeder::class);
        // $this->call(ClinicSeeder::class);
        // $this->call(ComposeSmsSeeder::class);
        $this->call(DeseaseSeeder::class);
        // $this->call(FatherSeeder::class);
        // $this->call(InsuranceSeeder::class);
        // $this->call(MessageTemplateSeeder::class);
        // $this->call(MotherSeeder::class);
        // $this->call(MotherHealthStatusSeeder::class);
        // $this->call(MotherMedicalHistorySeeder::class);
        // $this->call(PregnantSeeder::class);
        // $this->call(PregnantComplicationsSeeder::class);
        // $this->call(PrenatalApointmentSeeder::class);
        // $this->call(ScheduleSeeder::class);
        // $this->call(SmsSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(VacinationSeeder::class);
    }
}
