<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Clinic;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClinicControllerTest extends TestCase
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
    public function it_displays_index_view_with_clinics(): void
    {
        $clinics = Clinic::factory()
            ->count(0)
            ->create();

        $response = $this->get(route('clinics.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.clinics.index')
            ->assertViewHas('clinics');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_clinic(): void
    {
        $response = $this->get(route('clinics.create'));

        $response->assertOk()->assertViewIs('app.clinics.create');
    }

    /**
     * @test
     */
    public function it_stores_the_clinic(): void
    {
        $data = Clinic::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('clinics.store'), $data);

        $this->assertDatabaseHas('clinics', $data);

        $clinic = Clinic::latest('id')->first();

        $response->assertRedirect(route('clinics.edit', $clinic));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_clinic(): void
    {
        $clinic = Clinic::factory()->create();

        $response = $this->get(route('clinics.show', $clinic));

        $response
            ->assertOk()
            ->assertViewIs('app.clinics.show')
            ->assertViewHas('clinic');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_clinic(): void
    {
        $clinic = Clinic::factory()->create();

        $response = $this->get(route('clinics.edit', $clinic));

        $response
            ->assertOk()
            ->assertViewIs('app.clinics.edit')
            ->assertViewHas('clinic');
    }

    /**
     * @test
     */
    public function it_updates_the_clinic(): void
    {
        $clinic = Clinic::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'location' => $this->faker->text(255),
            'registration_number' => $this->faker->text(255),
        ];

        $response = $this->put(route('clinics.update', $clinic), $data);

        $data['id'] = $clinic->id;

        $this->assertDatabaseHas('clinics', $data);

        $response->assertRedirect(route('clinics.edit', $clinic));
    }

    /**
     * @test
     */
    public function it_deletes_the_clinic(): void
    {
        $clinic = Clinic::factory()->create();

        $response = $this->delete(route('clinics.destroy', $clinic));

        $response->assertRedirect(route('clinics.index'));

        $this->assertModelMissing($clinic);
    }
}
