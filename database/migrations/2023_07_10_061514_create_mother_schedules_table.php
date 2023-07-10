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
        Schema::create('mother_schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mother_id');
            $table->unsignedBigInteger('schedule_id');
            $table->string('message');
            $table->date('date');
            $table->string('status')->default('0');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mother_schedules');
    }
};