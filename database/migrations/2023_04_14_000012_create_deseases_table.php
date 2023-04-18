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
        Schema::create('deseases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table
                ->enum('type', [
                    'infectious',
                    'chronic',
                    'mental-illness',
                    'aotoimmune',
                    'non-infectious',
                    'other',
                ])
                ->default('non-infectious');
            $table->text('description');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deseases');
    }
};
