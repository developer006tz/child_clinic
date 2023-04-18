<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\BabyDevelopmentMilestone;
use Illuminate\Database\Eloquent\Factories\Factory;

class BabyDevelopmentMilestoneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BabyDevelopmentMilestone::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_smile' => $this->faker->date(),
            'first_word' => $this->faker->date(),
            'first_step' => $this->faker->date(),
            'baby_id' => \App\Models\Baby::factory(),
        ];
    }
}
