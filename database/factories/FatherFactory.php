<?php

namespace Database\Factories;

use App\Models\Father;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class FatherFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Father::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'dob' => $this->faker->date(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'occupation' => $this->faker->text(255),
            'mother_id' => \App\Models\Mother::factory(),
        ];
    }
}
