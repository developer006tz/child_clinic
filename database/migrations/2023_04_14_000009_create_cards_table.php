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
        Schema::create('cards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('baby_id');
            $table->string('issue_number');
            $table->decimal('weight');
            $table->decimal('height');
            $table->decimal('head_circumference');
            $table->integer('apgar_score');
            $table->string('birth_defects');
            $table->unsignedBigInteger('blood_type_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
