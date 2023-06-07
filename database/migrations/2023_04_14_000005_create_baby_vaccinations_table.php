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
        Schema::create('baby_vaccinations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('baby_id');
            $table->unsignedBigInteger('vacination_id');
            $table->date('date_of_vaccine');
            $table->string('reaction_occured')->nullable();
            $table->enum('is_vaccinated', ['Yes', 'No'])->default('No');

            $table->timestamps();
        });

        DB::table('baby_vaccinations')->insert([
            [
                'baby_id' => 1,
                'vacination_id' => 1,
                'date_of_vaccine' => '2022-01-15',
                'reaction_occured' => null,
                'is_vaccinated' => 'Yes',
            ],
            [
                'baby_id' => 1,
                'vacination_id' => 2,
                'date_of_vaccine' => '2022-02-28',
                'reaction_occured' => 'Mild fever',
                'is_vaccinated' => 'Yes',
            ],
            [
                'baby_id' => 2,
                'vacination_id' => 1,
                'date_of_vaccine' => '2022-01-20',
                'reaction_occured' => null,
                'is_vaccinated' => 'Yes',
            ],
            [
                'baby_id' => 3,
                'vacination_id' => 1,
                'date_of_vaccine' => '2022-02-05',
                'reaction_occured' => null,
                'is_vaccinated' => 'Yes',
            ],
            [
                'baby_id' => 3,
                'vacination_id' => 3,
                'date_of_vaccine' => '2022-03-15',
                'reaction_occured' => null,
                'is_vaccinated' => 'Yes',
            ],
            [
                'baby_id' => 4,
                'vacination_id' => 1,
                'date_of_vaccine' => '2022-01-25',
                'reaction_occured' => null,
                'is_vaccinated' => 'Yes',
            ],
            [
                'baby_id' => 4,
                'vacination_id' => 2,
                'date_of_vaccine' => '2022-03-10',
                'reaction_occured' => 'Redness at injection site',
                'is_vaccinated' => 'Yes',
            ],
            [
                'baby_id' => 5,
                'vacination_id' => 1,
                'date_of_vaccine' => '2022-02-10',
                'reaction_occured' => null,
                'is_vaccinated' => 'Yes',
            ],
            [
                'baby_id' => 5,
                'vacination_id' => 3,
                'date_of_vaccine' => '2022-03-20',
                'reaction_occured' => null,
                'is_vaccinated' => 'Yes',
            ],
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baby_vaccinations');
    }
};
