<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\BabyVaccination;
use Illuminate\Database\Eloquent\Factories\Factory;

class BabyVaccinationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BabyVaccination::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date_of_vaccine' => $this->faker->date(),
            'reaction_occured' => $this->faker->text(255),
            'is_vaccinated' => 'No',
            'baby_id' => \App\Models\Baby::factory(),
            'vacination_id' => \App\Models\Vacination::factory(),
        ];
    }
}
