<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Igsstation;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IgsstationControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'dev@ludovickonyo.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_igsstations(): void
    {
        $igsstations = Igsstation::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('igsstations.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.igsstations.index')
            ->assertViewHas('igsstations');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_igsstation(): void
    {
        $response = $this->get(route('igsstations.create'));

        $response->assertOk()->assertViewIs('app.igsstations.create');
    }

    /**
     * @test
     */
    public function it_stores_the_igsstation(): void
    {
        $data = Igsstation::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('igsstations.store'), $data);

        $this->assertDatabaseHas('igsstations', $data);

        $igsstation = Igsstation::latest('id')->first();

        $response->assertRedirect(route('igsstations.edit', $igsstation));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_igsstation(): void
    {
        $igsstation = Igsstation::factory()->create();

        $response = $this->get(route('igsstations.show', $igsstation));

        $response
            ->assertOk()
            ->assertViewIs('app.igsstations.show')
            ->assertViewHas('igsstation');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_igsstation(): void
    {
        $igsstation = Igsstation::factory()->create();

        $response = $this->get(route('igsstations.edit', $igsstation));

        $response
            ->assertOk()
            ->assertViewIs('app.igsstations.edit')
            ->assertViewHas('igsstation');
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

        $response = $this->put(route('igsstations.update', $igsstation), $data);

        $data['id'] = $igsstation->id;

        $this->assertDatabaseHas('igsstations', $data);

        $response->assertRedirect(route('igsstations.edit', $igsstation));
    }

    /**
     * @test
     */
    public function it_deletes_the_igsstation(): void
    {
        $igsstation = Igsstation::factory()->create();

        $response = $this->delete(route('igsstations.destroy', $igsstation));

        $response->assertRedirect(route('igsstations.index'));

        $this->assertModelMissing($igsstation);
    }
}
