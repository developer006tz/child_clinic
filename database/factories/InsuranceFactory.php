<?php

namespace Database\Factories;

use App\Models\Insurance;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class InsuranceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Insurance::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'provider_name' => $this->faker->text(255),
            'insurance_name' => $this->faker->text(255),
            'policy_number' => $this->faker->text(255),
            'contact' => $this->faker->text(255),
        ];
    }
}
