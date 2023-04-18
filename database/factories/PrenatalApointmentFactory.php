<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\PrenatalApointment;
use Illuminate\Database\Eloquent\Factories\Factory;

class PrenatalApointmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PrenatalApointment::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => $this->faker->date(),
            'time' => $this->faker->time(),
            'pregnant_id' => \App\Models\Pregnant::factory(),
        ];
    }
}
