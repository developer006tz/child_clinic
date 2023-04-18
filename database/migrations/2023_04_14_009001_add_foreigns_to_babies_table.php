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
        Schema::table('babies', function (Blueprint $table) {
            $table
                ->foreign('mother_id')
                ->references('id')
                ->on('mothers')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('father_id')
                ->references('id')
                ->on('fathers')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('babies', function (Blueprint $table) {
            $table->dropForeign(['mother_id']);
            $table->dropForeign(['father_id']);
        });
    }
};
