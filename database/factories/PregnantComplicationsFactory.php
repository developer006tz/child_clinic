<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\PregnantComplications;
use Illuminate\Database\Eloquent\Factories\Factory;

class PregnantComplicationsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PregnantComplications::class;

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
            'pregnant_id' => \App\Models\Pregnant::factory(),
        ];
    }
}
