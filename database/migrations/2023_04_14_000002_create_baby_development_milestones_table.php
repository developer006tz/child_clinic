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
        Schema::create('baby_development_milestones', function (
            Blueprint $table
        ) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('baby_id');
            $table->date('first_smile');
            $table->date('first_word');
            $table->date('first_step');

            $table->timestamps();
        });

        DB::table('baby_development_milestones')->insert([
            [
                'baby_id' => 1,
                'first_smile' => '2022-03-01',
                'first_word' => '2022-06-15',
                'first_step' => '2022-09-10',
            ],
            [
                'baby_id' => 2,
                'first_smile' => '2021-12-20',
                'first_word' => '2022-04-10',
                'first_step' => '2022-07-25',
            ],
            [
                'baby_id' => 3,
                'first_smile' => '2022-04-05',
                'first_word' => '2022-07-20',
                'first_step' => '2022-10-05',
            ],
            [
                'baby_id' => 4,
                'first_smile' => '2022-06-01',
                'first_word' => '2022-09-15',
                'first_step' => '2023-01-10',
            ],
            [
                'baby_id' => 5,
                'first_smile' => '2022-08-10',
                'first_word' => '2022-12-01',
                'first_step' => '2023-03-20',
            ],
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baby_development_milestones');
    }
};
