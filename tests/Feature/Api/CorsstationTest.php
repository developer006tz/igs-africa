<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Corsstation;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CorsstationTest extends TestCase
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
    public function it_gets_corsstations_list(): void
    {
        $corsstations = Corsstation::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.corsstations.index'));

        $response->assertOk()->assertSee($corsstations[0]->pnum);
    }

    /**
     * @test
     */
    public function it_stores_the_corsstation(): void
    {
        $data = Corsstation::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.corsstations.store'), $data);

        $this->assertDatabaseHas('corstations', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.corsstations.update', $corsstation),
            $data
        );

        $data['id'] = $corsstation->id;

        $this->assertDatabaseHas('corstations', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_corsstation(): void
    {
        $corsstation = Corsstation::factory()->create();

        $response = $this->deleteJson(
            route('api.corsstations.destroy', $corsstation)
        );

        $this->assertModelMissing($corsstation);

        $response->assertNoContent();
    }
}
