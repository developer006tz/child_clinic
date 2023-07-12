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

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baby_progress_health_reports');
    }
};
