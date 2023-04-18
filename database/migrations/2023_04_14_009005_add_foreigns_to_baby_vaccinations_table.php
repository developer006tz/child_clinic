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
        Schema::table('baby_vaccinations', function (Blueprint $table) {
            $table
                ->foreign('baby_id')
                ->references('id')
                ->on('babies')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('vacination_id')
                ->references('id')
                ->on('vacinations')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('baby_vaccinations', function (Blueprint $table) {
            $table->dropForeign(['baby_id']);
            $table->dropForeign(['vacination_id']);
        });
    }
};
