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
        Schema::create('blood_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description');
            $table->enum('rh_factor', ['+', '-'])->default('+');

            $table->timestamps();
        });

        DB::table('blood_types')->insert([
            ['name' => 'A+', 'description' => 'A positive blood type', 'rh_factor' => '+'],
            ['name' => 'A-', 'description' => 'A negative blood type', 'rh_factor' => '-'],
            ['name' => 'B+', 'description' => 'B positive blood type', 'rh_factor' => '+'],
            ['name' => 'B-', 'description' => 'B negative blood type', 'rh_factor' => '-'],
            ['name' => 'AB+', 'description' => 'AB positive blood type', 'rh_factor' => '+'],
            ['name' => 'AB-', 'description' => 'AB negative blood type', 'rh_factor' => '-'],
            ['name' => 'O+', 'description' => 'O positive blood type', 'rh_factor' => '+'],
            ['name' => 'O-', 'description' => 'O negative blood type', 'rh_factor' => '-'],
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blood_types');
    }
};
