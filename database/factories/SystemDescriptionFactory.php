<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\SystemDescription;
use Illuminate\Database\Eloquent\Factories\Factory;

class SystemDescriptionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SystemDescription::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(10),
            'description' => $this->faker->sentence(15),
            'other' => $this->faker->text(),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
