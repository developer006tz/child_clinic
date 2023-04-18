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
        Schema::table('baby_insurance', function (Blueprint $table) {
            $table
                ->foreign('baby_id')
                ->references('id')
                ->on('babies')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('insurance_id')
                ->references('id')
                ->on('insurances')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('baby_insurance', function (Blueprint $table) {
            $table->dropForeign(['baby_id']);
            $table->dropForeign(['insurance_id']);
        });
    }
};
