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
        Schema::create('birth_certificates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('baby_id');
            $table->date('date_of_birth')->nullable();
            $table->string('Hospital')->nullable();
            $table->unsignedBigInteger('mother_id')->nullable();
            $table->unsignedBigInteger('father_id')->nullable();
            $table->string('father_ocupation')->nullable();
            $table->string('Mother_ocupation')->nullable();
            $table->string('father_address')->nullable();
            $table->string('Mother_address')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('birth_certificates');
    }
};
