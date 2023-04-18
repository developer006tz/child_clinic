<?php

namespace Database\Factories;

use App\Models\ComposeSms;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComposeSmsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ComposeSms::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'custom_message' => $this->faker->sentence(20),
            'message_template_id' => \App\Models\MessageTemplate::factory(),
        ];
    }
}
