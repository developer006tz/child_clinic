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
        Schema::create('mothers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('clinic_id');
            $table->string('name');
            $table->unsignedBigInteger('blood_type_id');
            $table->unsignedBigInteger('user_id');
            $table->date('dob');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table
                ->enum('insurance_info', ['No', 'Yes'])
                ->default('No')
                ->nullable();
            $table->string('occupation')->nullable();

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mothers');
    }
};
