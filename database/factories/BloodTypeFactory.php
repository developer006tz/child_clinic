<?php

namespace Database\Factories;

use App\Models\BloodType;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class BloodTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BloodType::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->sentence(15),
            'rh_factor' => '+',
        ];
    }
}
