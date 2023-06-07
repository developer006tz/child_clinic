<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Insurance;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InsuranceControllerTest extends TestCase
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
    public function it_displays_index_view_with_insurances(): void
    {
        $insurances = Insurance::factory()
            ->count(0)
            ->create();

        $response = $this->get(route('insurances.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.insurances.index')
            ->assertViewHas('insurances');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_insurance(): void
    {
        $response = $this->get(route('insurances.create'));

        $response->assertOk()->assertViewIs('app.insurances.create');
    }

    /**
     * @test
     */
    public function it_stores_the_insurance(): void
    {
        $data = Insurance::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('insurances.store'), $data);

        $this->assertDatabaseHas('insurances', $data);

        $insurance = Insurance::latest('id')->first();

        $response->assertRedirect(route('insurances.edit', $insurance));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_insurance(): void
    {
        $insurance = Insurance::factory()->create();

        $response = $this->get(route('insurances.show', $insurance));

        $response
            ->assertOk()
            ->assertViewIs('app.insurances.show')
            ->assertViewHas('insurance');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_insurance(): void
    {
        $insurance = Insurance::factory()->create();

        $response = $this->get(route('insurances.edit', $insurance));

        $response
            ->assertOk()
            ->assertViewIs('app.insurances.edit')
            ->assertViewHas('insurance');
    }

    /**
     * @test
     */
    public function it_updates_the_insurance(): void
    {
        $insurance = Insurance::factory()->create();

        $data = [
            'provider_name' => $this->faker->text(255),
            'insurance_name' => $this->faker->text(255),
            'policy_number' => $this->faker->text(255),
            'contact' => $this->faker->text(255),
        ];

        $response = $this->put(route('insurances.update', $insurance), $data);

        $data['id'] = $insurance->id;

        $this->assertDatabaseHas('insurances', $data);

        $response->assertRedirect(route('insurances.edit', $insurance));
    }

    /**
     * @test
     */
    public function it_deletes_the_insurance(): void
    {
        $insurance = Insurance::factory()->create();

        $response = $this->delete(route('insurances.destroy', $insurance));

        $response->assertRedirect(route('insurances.index'));

        $this->assertModelMissing($insurance);
    }
}
