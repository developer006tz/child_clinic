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
            ],
            [
                'name' => 'Olivia Rose',
                'gender' => 'female',
                'birthdate' => '2022-03-20',
                'weight_at_birth' => 3.1,
                'height_at_birth' => 49.8,
                'head_circumference' => 34.8,
                'mother_id' => 3,
                'father_id' => 3,
            ],
            [
                'name' => 'Noah Benjamin',
                'gender' => 'male',
                'birthdate' => '2022-05-15',
                'weight_at_birth' => 3.6,
                'height_at_birth' => 52.0,
                'head_circumference' => 36.5,
                'mother_id' => 4,
                'father_id' => 4,
            ],
            [
                'name' => 'Sophia Grace',
                'gender' => 'female',
                'birthdate' => '2022-07-10',
                'weight_at_birth' => 3.4,
                'height_at_birth' => 50.2,
                'head_circumference' => 35.0,
                'mother_id' => 5,
                'father_id' => 5,
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
