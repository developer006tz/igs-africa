<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Corsstation;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CorsstationControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_corsstations(): void
    {
        $corsstations = Corsstation::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('corsstations.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.corsstations.index')
            ->assertViewHas('corsstations');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_corsstation(): void
    {
        $response = $this->get(route('corsstations.create'));

        $response->assertOk()->assertViewIs('app.corsstations.create');
    }

    /**
     * @test
     */
    public function it_stores_the_corsstation(): void
    {
        $data = Corsstation::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('corsstations.store'), $data);

        $this->assertDatabaseHas('corstations', $data);

        $corsstation = Corsstation::latest('id')->first();

        $response->assertRedirect(route('corsstations.edit', $corsstation));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_corsstation(): void
    {
        $corsstation = Corsstation::factory()->create();

        $response = $this->get(route('corsstations.show', $corsstation));

        $response
            ->assertOk()
            ->assertViewIs('app.corsstations.show')
            ->assertViewHas('corsstation');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_corsstation(): void
    {
        $corsstation = Corsstation::factory()->create();

        $response = $this->get(route('corsstations.edit', $corsstation));

        $response
            ->assertOk()
            ->assertViewIs('app.corsstations.edit')
            ->assertViewHas('corsstation');
    }

    /**
     * @test
     */
    public function it_updates_the_corsstation(): void
    {
        $corsstation = Corsstation::factory()->create();

        $data = [
            'pnum' => $this->faker->text(255),
            'stntype' => 'GPS',
            'stnstatus' => 'installed',
            'opstatus' => 'Operable',
            'sitecity' => $this->faker->text(255),
            'sitestate' => $this->faker->text(255),
            'region' => $this->faker->region(),
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
            'data_download_link' => $this->faker->text(255),
        ];

        $response = $this->put(
            route('corsstations.update', $corsstation),
            $data
        );

        $data['id'] = $corsstation->id;

        $this->assertDatabaseHas('corstations', $data);

        $response->assertRedirect(route('corsstations.edit', $corsstation));
    }

    /**
     * @test
     */
    public function it_deletes_the_corsstation(): void
    {
        $corsstation = Corsstation::factory()->create();

        $response = $this->delete(route('corsstations.destroy', $corsstation));

        $response->assertRedirect(route('corsstations.index'));

        $this->assertModelMissing($corsstation);
    }
}
