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
        Schema::create('mother_health_statuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('mother_id');
            $table->decimal('height')->nullable();
            $table->decimal('weight')->nullable();
            $table
                ->enum('hiv_status', ['negative-', 'positive+'])
                ->default('negative-')
                ->nullable();
            $table->unsignedBigInteger('desease_id')->nullable();
            $table
                ->enum('health_status', ['Normal', 'Illness'])
                ->default('Normal')
                ->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mother_health_statuses');
    }
};
