<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\SystemDescription;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SystemDescriptionTest extends TestCase
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
    public function it_gets_system_descriptions_list(): void
    {
        $systemDescriptions = SystemDescription::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.system-descriptions.index'));

        $response->assertOk()->assertSee($systemDescriptions[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_system_description(): void
    {
        $data = SystemDescription::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.system-descriptions.store'),
            $data
        );

        $this->assertDatabaseHas('system_descriptions', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_system_description(): void
    {
        $systemDescription = SystemDescription::factory()->create();

        $user = User::factory()->create();

        $data = [
            'title' => $this->faker->sentence(10),
            'description' => $this->faker->sentence(15),
            'other' => $this->faker->text(),
            'user_id' => $user->id,
        ];

        $response = $this->putJson(
            route('api.system-descriptions.update', $systemDescription),
            $data
        );

        $data['id'] = $systemDescription->id;

        $this->assertDatabaseHas('system_descriptions', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_system_description(): void
    {
        $systemDescription = SystemDescription::factory()->create();

        $response = $this->deleteJson(
            route('api.system-descriptions.destroy', $systemDescription)
        );

        $this->assertModelMissing($systemDescription);

        $response->assertNoContent();
    }
}
