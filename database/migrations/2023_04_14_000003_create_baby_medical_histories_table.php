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
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baby_medical_histories');
    }
};
