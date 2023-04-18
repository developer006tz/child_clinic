<?php

namespace Database\Factories;

use App\Models\Desease;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeseaseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Desease::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'type' => 'non-infectious',
            'description' => $this->faker->sentence(15),
        ];
    }
}
