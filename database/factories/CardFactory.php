<?php

namespace Database\Factories;

use App\Models\Card;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CardFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Card::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'issue_number' => $this->faker->text(255),
            'weight' => $this->faker->randomFloat(2, 0, 9999),
            'height' => $this->faker->randomFloat(2, 0, 9999),
            'head_circumference' => $this->faker->randomNumber(1),
            'apgar_score' => $this->faker->randomNumber(0),
            'birth_defects' => $this->faker->text(255),
            'blood_type_id' => \App\Models\BloodType::factory(),
            'baby_id' => \App\Models\Baby::factory(),
        ];
    }
}
