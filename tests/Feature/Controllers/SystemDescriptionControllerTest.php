<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\SystemDescription;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SystemDescriptionControllerTest extends TestCase
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
    public function it_displays_index_view_with_system_descriptions(): void
    {
        $systemDescriptions = SystemDescription::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('system-descriptions.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.system_descriptions.index')
            ->assertViewHas('systemDescriptions');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_system_description(): void
    {
        $response = $this->get(route('system-descriptions.create'));

        $response->assertOk()->assertViewIs('app.system_descriptions.create');
    }

    /**
     * @test
     */
    public function it_stores_the_system_description(): void
    {
        $data = SystemDescription::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('system-descriptions.store'), $data);

        $this->assertDatabaseHas('system_descriptions', $data);

        $systemDescription = SystemDescription::latest('id')->first();

        $response->assertRedirect(
            route('system-descriptions.edit', $systemDescription)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_system_description(): void
    {
        $systemDescription = SystemDescription::factory()->create();

        $response = $this->get(
            route('system-descriptions.show', $systemDescription)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.system_descriptions.show')
            ->assertViewHas('systemDescription');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_system_description(): void
    {
        $systemDescription = SystemDescription::factory()->create();

        $response = $this->get(
            route('system-descriptions.edit', $systemDescription)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.system_descriptions.edit')
            ->assertViewHas('systemDescription');
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

        $response = $this->put(
            route('system-descriptions.update', $systemDescription),
            $data
        );

        $data['id'] = $systemDescription->id;

        $this->assertDatabaseHas('system_descriptions', $data);

        $response->assertRedirect(
            route('system-descriptions.edit', $systemDescription)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_system_description(): void
    {
        $systemDescription = SystemDescription::factory()->create();

        $response = $this->delete(
            route('system-descriptions.destroy', $systemDescription)
        );

        $response->assertRedirect(route('system-descriptions.index'));

        $this->assertModelMissing($systemDescription);
    }
}
