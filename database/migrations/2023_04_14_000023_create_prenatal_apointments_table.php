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
        Schema::create('prenatal_apointments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pregnant_id');
            $table->date('date');
            $table->time('time');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prenatal_apointments');
    }
};
