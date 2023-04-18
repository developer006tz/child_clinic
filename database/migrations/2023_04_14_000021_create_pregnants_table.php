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
        Schema::create('pregnants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('mother_id');
            $table->date('due_date');
            $table->date('date_of_delivery')->nullable();
            $table->time('time_of_delivery')->nullable();
            $table->integer('number_of_weeks_lasted')->nullable();
            $table->decimal('weight_at_birth')->nullable();
            $table->decimal('height_at_birth')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->text('pregnant_defects');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pregnants');
    }
};
