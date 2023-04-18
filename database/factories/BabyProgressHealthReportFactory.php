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
            'current_height' => $this->faker->randomNumber(1),
            'current_weight' => $this->faker->randomNumber(1),
            'current_health_status' => 'Normal',
            'bmi' => $this->faker->randomNumber(1),
            'baby_id' => \App\Models\Baby::factory(),
        ];
    }
}
