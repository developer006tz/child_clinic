<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Vacination;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VacinationControllerTest extends TestCase
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
    public function it_displays_index_view_with_vacinations(): void
    {
        $vacinations = Vacination::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('vacinations.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.vacinations.index')
            ->assertViewHas('vacinations');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_vacination(): void
    {
        $response = $this->get(route('vacinations.create'));

        $response->assertOk()->assertViewIs('app.vacinations.create');
    }

    /**
     * @test
     */
    public function it_stores_the_vacination(): void
    {
        $data = Vacination::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('vacinations.store'), $data);

        $this->assertDatabaseHas('vacinations', $data);

        $vacination = Vacination::latest('id')->first();

        $response->assertRedirect(route('vacinations.edit', $vacination));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_vacination(): void
    {
        $vacination = Vacination::factory()->create();

        $response = $this->get(route('vacinations.show', $vacination));

        $response
            ->assertOk()
            ->assertViewIs('app.vacinations.show')
            ->assertViewHas('vacination');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_vacination(): void
    {
        $vacination = Vacination::factory()->create();

        $response = $this->get(route('vacinations.edit', $vacination));

        $response
            ->assertOk()
            ->assertViewIs('app.vacinations.edit')
            ->assertViewHas('vacination');
    }

    /**
     * @test
     */
    public function it_updates_the_vacination(): void
    {
        $vacination = Vacination::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'type' => 'Inactivated',
        ];

        $response = $this->put(route('vacinations.update', $vacination), $data);

        $data['id'] = $vacination->id;

        $this->assertDatabaseHas('vacinations', $data);

        $response->assertRedirect(route('vacinations.edit', $vacination));
    }

    /**
     * @test
     */
    public function it_deletes_the_vacination(): void
    {
        $vacination = Vacination::factory()->create();

        $response = $this->delete(route('vacinations.destroy', $vacination));

        $response->assertRedirect(route('vacinations.index'));

        $this->assertModelMissing($vacination);
    }
}
