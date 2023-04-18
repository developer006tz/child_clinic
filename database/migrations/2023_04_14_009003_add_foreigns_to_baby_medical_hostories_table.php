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
        Schema::table('baby_medical_hostories', function (Blueprint $table) {
            $table
                ->foreign('desease_id')
                ->references('id')
                ->on('deseases')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('baby_medical_hostories', function (Blueprint $table) {
            $table->dropForeign(['desease_id']);
        });
    }
};
