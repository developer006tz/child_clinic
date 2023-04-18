<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\BirthCertificate;
use Illuminate\Database\Eloquent\Factories\Factory;

class BirthCertificateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BirthCertificate::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date_of_birth' => $this->faker->date(),
            'Hospital' => $this->faker->text(255),
            'father_ocupation' => $this->faker->text(255),
            'Mother_ocupation' => $this->faker->text(255),
            'father_address' => $this->faker->text(255),
            'Mother_address' => $this->faker->text(255),
            'baby_id' => \App\Models\Baby::factory(),
            'mother_id' => \App\Models\Mother::factory(),
            'father_id' => \App\Models\Father::factory(),
        ];
    }
}
