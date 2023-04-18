<?php

namespace Database\Factories;

use App\Models\Clinic;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClinicFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Clinic::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'location' => $this->faker->text(255),
            'registration_number' => $this->faker->text(255),
        ];
    }
}
