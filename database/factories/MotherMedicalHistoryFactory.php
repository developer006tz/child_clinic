<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\MotherMedicalHistory;
use Illuminate\Database\Eloquent\Factories\Factory;

class MotherMedicalHistoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MotherMedicalHistory::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'illnes' => 'Other',
            'Description' => $this->faker->sentence(15),
            'date' => $this->faker->date(),
            'status' => 'Cured',
            'mother_id' => \App\Models\Mother::factory(),
        ];
    }
}
