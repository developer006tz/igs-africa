<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\SystemDescription;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserSystemDescriptionsTest extends TestCase
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
    public function it_gets_user_system_descriptions(): void
    {
        $user = User::factory()->create();
        $systemDescriptions = SystemDescription::factory()
            ->count(2)
            ->create([
                'user_id' => $user->id,
            ]);

        $response = $this->getJson(
            route('api.users.system-descriptions.index', $user)
        );

        $response->assertOk()->assertSee($systemDescriptions[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_user_system_descriptions(): void
    {
        $user = User::factory()->create();
        $data = SystemDescription::factory()
            ->make([
                'user_id' => $user->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.users.system-descriptions.store', $user),
            $data
        );

        $this->assertDatabaseHas('system_descriptions', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $systemDescription = SystemDescription::latest('id')->first();

        $this->assertEquals($user->id, $systemDescription->user_id);
    }
}
