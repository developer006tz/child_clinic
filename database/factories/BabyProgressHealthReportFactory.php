<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\BabyProgressHealthReport;
use Illuminate\Database\Eloquent\Factories\Factory;

class BabyProgressHealthReportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BabyProgressHealthReport::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'age_per_month'=> $this->faker->randomNumber(1),
            'height' => $this->faker->randomNumber(1),
            'weight' => $this->faker->randomNumber(1),
            'head_circumference' => $this->faker->randomNumber(1),
            'bmi' => $this->faker->randomNumber(1),
            'baby_id' => \App\Models\Baby::factory(),
        ];
    }
}
