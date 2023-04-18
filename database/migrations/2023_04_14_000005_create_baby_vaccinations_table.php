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
        Schema::create('baby_vaccinations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('baby_id');
            $table->unsignedBigInteger('vacination_id');
            $table->date('date_of_vaccine');
            $table->string('reaction_occured')->nullable();
            $table->enum('is_vaccinated', ['Yes', 'No'])->default('No');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baby_vaccinations');
    }
};
