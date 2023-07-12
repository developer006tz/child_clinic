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
            $table->integer('age_per_month');
            $table->decimal('height')->nullable();
            $table->decimal('weight');
            $table->decimal('head_circumference')->nullable();
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
                'created_at'=>now(),
            ],
            [
                'baby_id' => 1,
                'age_per_month' => 2,
                'height' => 56.3,
                'weight' => 4.5,
                'head_circumference' => 38.6,
                'bmi' => 15.4,
                'created_at'=>now(),
            ],
            [
                'baby_id' => 2,
                'age_per_month' => 1,
                'height' => 50.2,
                'weight' => 3.6,
                'head_circumference' => 36.8,
                'bmi' => 14.2,
                'created_at'=>now(),
            ],
            [
                'baby_id' => 2,
                'age_per_month' => 2,
                'height' => 54.1,
                'weight' => 4.2,
                'head_circumference' => 38.1,
                'bmi' => 15.1,
                'created_at'=>now(),
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
