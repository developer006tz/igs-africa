<?php

namespace Database\Factories;

use App\Models\Igsstation;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class IgsstationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Igsstation::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'x_axis' => $this->faker->randomNumber(1),
            'y_axis' => $this->faker->randomNumber(1),
            'z_axiz' => $this->faker->randomNumber(1),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->randomNumber(1),
            'height' => $this->faker->randomFloat(2, 0, 9999),
            'receiver_name' => $this->faker->text(5),
            'receiver_satellite_system' => $this->faker->text(5),
            'receiver_serial_number' => $this->faker->text(5),
            'receiver_firmware_version' => $this->faker->text(5),
            'receiver_date_installed' => $this->faker->dateTime(),
            'antenna_name' => $this->faker->text(5),
            'antenna_radome' => $this->faker->text(5),
            'antenna_serial_number' => $this->faker->text(5),
            'antenna_arp' => $this->faker->text(5),
            'antenna_marker_north' => $this->faker->randomNumber(1),
            'antenna_marker_east' => $this->faker->randomNumber(1),
            'antenna_date_installed' => $this->faker->dateTime(),
            'clock_type' => $this->faker->text(5),
            'clock_input_frequency' => $this->faker->randomNumber(0),
            'receiver_elevation_cutoff' => $this->faker->randomNumber(0),
            'antenna_marker_up' => $this->faker->randomNumber(1),
            'clock_effective_dates' => $this->faker->text(5),
        ];
    }
}
