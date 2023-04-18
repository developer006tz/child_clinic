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
        Schema::table('pregnant_complications', function (Blueprint $table) {
            $table
                ->foreign('pregnant_id')
                ->references('id')
                ->on('pregnants')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pregnant_complications', function (Blueprint $table) {
            $table->dropForeign(['pregnant_id']);
        });
    }
};
