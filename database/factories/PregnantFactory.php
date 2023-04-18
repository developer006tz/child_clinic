<?php

namespace Database\Factories;

use App\Models\Pregnant;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PregnantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pregnant::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'due_date' => $this->faker->date(),
            'date_of_delivery' => $this->faker->date(),
            'time_of_delivery' => $this->faker->time(),
            'number_of_weeks_lasted' => $this->faker->randomNumber(0),
            'weight_at_birth' => $this->faker->randomNumber(1),
            'height_at_birth' => $this->faker->randomNumber(1),
            'gender' => \Arr::random(['male', 'female']),
            'pregnant_defects' => $this->faker->text(),
            'mother_id' => \App\Models\Mother::factory(),
        ];
    }
}
