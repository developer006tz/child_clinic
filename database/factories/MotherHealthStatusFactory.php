<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\MotherHealthStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class MotherHealthStatusFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MotherHealthStatus::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'height' => $this->faker->randomFloat(2, 0, 9999),
            'weight' => $this->faker->randomFloat(2, 0, 9999),
            'hiv_status' => 'negative-',
            'health_status' => 'Normal',
            'mother_id' => \App\Models\Mother::factory(),
            'desease_id' => \App\Models\Desease::factory(),
        ];
    }
}
