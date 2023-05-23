<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Igsstation;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IgsstationTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_igsstations_list(): void
    {
        $igsstations = Igsstation::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.igsstations.index'));

        $response->assertOk()->assertSee($igsstations[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_igsstation(): void
    {
        $data = Igsstation::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.igsstations.store'), $data);

        $this->assertDatabaseHas('igsstations', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_igsstation(): void
    {
        $igsstation = Igsstation::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'x_axis' => $this->faker->randomNumber(1),
            'y_axis' => $this->faker->randomNumber(1),
            'z_axiz' => $this->faker->randomNumber(1),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->randomNumber(1),
            'height' => $this->faker->randomFloat(2, 0, 9999),
            'receiver_name' => $this->faker->text(255),
            'receiver_satellite_system' => $this->faker->text(255),
            'receiver_serial_number' => $this->faker->text(255),
            'receiver_firmware_version' => $this->faker->text(255),
            'receiver_date_installed' => $this->faker->dateTime(),
            'antenna_name' => $this->faker->text(255),
            'antenna_radome' => $this->faker->text(255),
            'antenna_serial_number' => $this->faker->text(255),
            'antenna_arp' => $this->faker->text(255),
            'antenna_marker_north' => $this->faker->randomNumber(1),
            'antenna_marker_east' => $this->faker->randomNumber(1),
            'antenna_date_installed' => $this->faker->dateTime(),
            'clock_type' => $this->faker->text(255),
            'clock_input_frequency' => $this->faker->randomNumber(0),
            'receiver_elevation_cutoff' => $this->faker->randomNumber(0),
            'antenna_marker_up' => $this->faker->randomNumber(1),
            'clock_effective_dates' => $this->faker->text(255),
        ];

        $response = $this->putJson(
            route('api.igsstations.update', $igsstation),
            $data
        );

        $data['id'] = $igsstation->id;

        $this->assertDatabaseHas('igsstations', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_igsstation(): void
    {
        $igsstation = Igsstation::factory()->create();

        $response = $this->deleteJson(
            route('api.igsstations.destroy', $igsstation)
        );

        $this->assertModelMissing($igsstation);

        $response->assertNoContent();
    }
}
