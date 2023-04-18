<?php

namespace Database\Factories;

use App\Models\Schedule;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScheduleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Schedule::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'message' => $this->faker->sentence(20),
            'date_start' => $this->faker->date(),
            'date_end' => $this->faker->date(),
            'time_start' => $this->faker->time(),
            'time_end' => $this->faker->time(),
        ];
    }
}
