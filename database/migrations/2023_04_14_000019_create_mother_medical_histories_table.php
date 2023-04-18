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
        Schema::create('mother_medical_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('mother_id');
            $table
                ->enum('illnes', [
                    'Other',
                    'Anaemia',
                    'UTI',
                    'Depression',
                    'Diabetes',
                    'Heart-conditions',
                    'Hypertension',
                    'Hyperemesis-gravidarum',
                    'Infections',
                    'UIT',
                    'Anxiety',
                    'Malaria',
                    'Cancer',
                ])
                ->default('Other');
            $table->text('Description')->nullable();
            $table->date('date')->nullable();
            $table
                ->enum('status', [
                    'Cured',
                    'illness',
                    'continuous-illness',
                    'on-dose',
                ])
                ->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mother_medical_histories');
    }
};
