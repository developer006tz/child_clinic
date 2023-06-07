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
        Schema::create('baby_progress_health_reports', function (
            Blueprint $table
        ) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('baby_id');
            $table->decimal('age_per_month');
            $table->decimal('height');
            $table->decimal('weight');
            $table->decimal('head_circumference');
            $table->decimal('bmi')->nullable();

            $table->timestamps();
        });

        DB::table('baby_progress_health_reports')->insert([
            [
                'baby_id' => 1,
                'age_per_month' => 1,
                'height' => 52.5,
                'weight' => 3.8,
                'head_circumference' => 37.2,
                'bmi' => 14.1,
            ],
            [
                'baby_id' => 1,
                'age_per_month' => 2,
                'height' => 56.3,
                'weight' => 4.5,
                'head_circumference' => 38.6,
                'bmi' => 15.4,
            ],
            [
                'baby_id' => 2,
                'age_per_month' => 1,
                'height' => 50.2,
                'weight' => 3.6,
                'head_circumference' => 36.8,
                'bmi' => 14.2,
            ],
            [
                'baby_id' => 2,
                'age_per_month' => 2,
                'height' => 54.1,
                'weight' => 4.2,
                'head_circumference' => 38.1,
                'bmi' => 15.1,
            ],
            [
                'baby_id' => 3,
                'age_per_month' => 1,
                'height' => 51.8,
                'weight' => 3.9,
                'head_circumference' => 37.0,
                'bmi' => 14.4,
            ],
            [
                'baby_id' => 4,
                'age_per_month' => 1,
                'height' => 53.6,
                'weight' => 4.2,
                'head_circumference' => 37.5,
                'bmi' => 14.9,
            ],
            [
                'baby_id' => 4,
                'age_per_month' => 2,
                'height' => 57.2,
                'weight' => 4.8,
                'head_circumference' => 39.3,
                'bmi' => 16.2,
            ],
            [
                'baby_id' => 5,
                'age_per_month' => 1,
                'height' => 52.4,
                'weight' => 3.7,
                'head_circumference' => 36.5,
                'bmi' => 14.0,
            ],
            [
                'baby_id' => 5,
                'age_per_month' => 2,
                'height' => 56.1,
                'weight' => 4.4,
                'head_circumference' => 38.0,
                'bmi' => 15.3,
            ],
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baby_progress_health_reports');
    }
};
