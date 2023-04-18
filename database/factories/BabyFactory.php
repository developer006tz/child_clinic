<?php

namespace Database\Factories;

use App\Models\Baby;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class BabyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Baby::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'gender' => \Arr::random(['male', 'female']),
            'birthdate' => $this->faker->date(),
            'weight_at_birth' => $this->faker->randomFloat(2, 0, 9999),
            'mother_id' => \App\Models\Mother::factory(),
            'father_id' => \App\Models\Father::factory(),
        ];
    }
}
