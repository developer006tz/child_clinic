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
        Schema::table('insurance_mother', function (Blueprint $table) {
            $table
                ->foreign('mother_id')
                ->references('id')
                ->on('mothers')
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
        Schema::table('insurance_mother', function (Blueprint $table) {
            $table->dropForeign(['mother_id']);
            $table->dropForeign(['insurance_id']);
        });
    }
};
