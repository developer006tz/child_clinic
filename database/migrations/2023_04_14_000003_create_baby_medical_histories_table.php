<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('baby_medical_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('desease_id');
            $table->unsignedBigInteger('baby_id');
            $table->enum('level_of_illness', [
                'normal',
                'medium',
                'serious',
                'very-serious',
                'icu',
            ]);
            $table->text('description');
            $table->date('date');

            $table->timestamps();
        });

        DB::table('baby_medical_histories')->insert([
            [
                'desease_id' => 1,
                'baby_id' => 1,
                'level_of_illness' => 'medium',
                'description' => 'Had a fever and cough',
                'date' => '2022-02-10',
            ],
            [
                'desease_id' => 2,
                'baby_id' => 2,
                'level_of_illness' => 'serious',
                'description' => 'Diagnosed with asthma',
                'date' => '2022-03-20',
            ],
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baby_medical_histories');
    }
};
