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
        Schema::create('babies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->enum('gender', ['male', 'female']);
            $table->date('birthdate');
            $table->decimal('weight_at_birth');
            $table->decimal('height_at_birth');
            $table->decimal('head_circumference');
            $table->unsignedBigInteger('mother_id');
            $table->unsignedBigInteger('father_id');

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('babies');
    }
};
