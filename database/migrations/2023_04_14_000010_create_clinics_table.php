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
        Schema::create('clinics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('location')->nullable();
            $table->string('registration_number')->nullable();

            $table->timestamps();
        });

        //insert one clinic record into the clinics table
        DB::table('clinics')->insert([
            [
                'id'=> 1,
                'name' => 'MULEBA CLINIC',
                'location' => 'KAGERA',
                'registration_number' => '1234567890',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clinics');
    }
};
