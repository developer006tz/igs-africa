<?php

namespace Database\Factories;

use App\Models\Corsstation;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CorsstationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Corsstation::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pnum' => $this->faker->text(5),
            'stntype' => 'GPS',
            'stnstatus' => 'installed',
            'opstatus' => 'Operable',
            'sitecity' => $this->faker->text(5),
            'sitestate' => $this->faker->text(5),
            'region' => $this->faker->name(),
            'latitude' => $this->faker->randomNumber(1),
            'longitude' => $this->faker->randomNumber(1),
            'elevation' => $this->faker->randomNumber(2),
            'project' => 'PI',
            'network' => 'PI',
            'multi_types' => 'GPS',
            'is_realtime' => $this->faker->randomNumber(0),
            'mean_latency_last_hour' => $this->faker->randomNumber(0),
            'mean_latency_last_day' => $this->faker->randomNumber(0),
            'data_complete_last_hour' => $this->faker->randomNumber(0),
            'data_complete_last_day' => $this->faker->randomNumber(0),
            'status' => 'ok',
            'date_installed' => $this->faker->date(),
            'last_rinex_data_year' => $this->faker->year(),
            'data_download_link' => $this->faker->text(5),
        ];
    }
}
