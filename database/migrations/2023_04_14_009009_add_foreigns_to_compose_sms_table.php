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
        Schema::table('compose_sms', function (Blueprint $table) {
            $table
                ->foreign('message_template_id')
                ->references('id')
                ->on('message_templates')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('compose_sms', function (Blueprint $table) {
            $table->dropForeign(['message_template_id']);
        });
    }
};
