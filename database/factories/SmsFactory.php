<?php

namespace Database\Factories;

use App\Models\Sms;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class SmsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sms::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'body' => $this->faker->text(),
            'phone' => $this->faker->phoneNumber(),
            'status' => '0',
        ];
    }
}
