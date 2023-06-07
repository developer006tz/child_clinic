<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vacinations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->enum('type', [
                'Inactivated',
                'Live-attenuated',
                'mRNA',
                'Subunit',
                'Toxoid',
                'Viral-vector',
                'Other',
            ]);

            $table->timestamps();
        });

        DB::table('vacinations')->insert([
            ['name' => 'Hepatitis B Vaccine', 'type' => 'Inactivated'],
            ['name' => 'Rotavirus Vaccine', 'type' => 'Live-attenuated'],
            ['name' => 'DTaP Vaccine', 'type' => 'Other'],
            ['name' => 'Hib Vaccine', 'type' => 'Subunit'],
            ['name' => 'Pneumococcal', 'type' => 'Subunit'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacinations');
    }
};
