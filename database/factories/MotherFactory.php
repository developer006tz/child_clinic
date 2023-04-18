<?php

namespace Database\Factories;

use App\Models\Mother;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class MotherFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mother::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'clinic_id' => $this->faker->text(255),
            'name' => $this->faker->name(),
            'dob' => $this->faker->date(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'insurance_info' => 'No',
            'occupation' => $this->faker->text(255),
            'blood_type_id' => \App\Models\BloodType::factory(),
        ];
    }
}
