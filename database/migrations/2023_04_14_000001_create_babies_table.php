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
        Schema::create('babies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->enum('gender', ['male', 'female']);
            $table->date('birthdate');
            $table->decimal('weight_at_birth');
            $table->decimal('height_at_birth');
            $table->decimal('head_circumference');
            $table->unsignedBigInteger('mother_id');
            $table->unsignedBigInteger('father_id');

            $table->timestamps();
        });

        DB::table('babies')->insert([
            [
                'name' => 'Emma Grace',
                'gender' => 'female',
                'birthdate' => '2022-01-05',
                'weight_at_birth' => 3.2,
                'height_at_birth' => 50.5,
                'head_circumference' => 35.2,
                'mother_id' => 1,
                'father_id' => 1,
                'created_at'=>now(),
            ],
            [
                'name' => 'Liam James',
                'gender' => 'male',
                'birthdate' => '2021-11-12',
                'weight_at_birth' => 3.5,
                'height_at_birth' => 51.0,
                'head_circumference' => 36.0,
                'mother_id' => 2,
                'father_id' => 2,
                'created_at'=>now(),
            ],

        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('babies');
    }
};
