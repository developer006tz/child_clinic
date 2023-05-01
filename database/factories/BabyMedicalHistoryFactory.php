<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\BabyMedicalHistory;
use Illuminate\Database\Eloquent\Factories\Factory;

class BabyMedicalHistoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BabyMedicalHistory::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'level_of_illness' => 'normal',
            'description' => $this->faker->sentence(15),
            'date' => $this->faker->date(),
            'desease_id' => \App\Models\Desease::factory(),
            'baby_id' => \App\Models\Baby::factory(),
        ];
    }
}
