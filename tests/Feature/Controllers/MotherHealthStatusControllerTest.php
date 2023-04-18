<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\MotherHealthStatus;

use App\Models\Mother;
use App\Models\Desease;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MotherHealthStatusControllerTest extends TestCase
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
    public function it_displays_index_view_with_mother_health_statuses(): void
    {
        $motherHealthStatuses = MotherHealthStatus::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('mother-health-statuses.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.mother_health_statuses.index')
            ->assertViewHas('motherHealthStatuses');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_mother_health_status(): void
    {
        $response = $this->get(route('mother-health-statuses.create'));

        $response
            ->assertOk()
            ->assertViewIs('app.mother_health_statuses.create');
    }

    /**
     * @test
     */
    public function it_stores_the_mother_health_status(): void
    {
        $data = MotherHealthStatus::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('mother-health-statuses.store'), $data);

        $this->assertDatabaseHas('mother_health_statuses', $data);

        $motherHealthStatus = MotherHealthStatus::latest('id')->first();

        $response->assertRedirect(
            route('mother-health-statuses.edit', $motherHealthStatus)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_mother_health_status(): void
    {
        $motherHealthStatus = MotherHealthStatus::factory()->create();

        $response = $this->get(
            route('mother-health-statuses.show', $motherHealthStatus)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.mother_health_statuses.show')
            ->assertViewHas('motherHealthStatus');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_mother_health_status(): void
    {
        $motherHealthStatus = MotherHealthStatus::factory()->create();

        $response = $this->get(
            route('mother-health-statuses.edit', $motherHealthStatus)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.mother_health_statuses.edit')
            ->assertViewHas('motherHealthStatus');
    }

    /**
     * @test
     */
    public function it_updates_the_mother_health_status(): void
    {
        $motherHealthStatus = MotherHealthStatus::factory()->create();

        $mother = Mother::factory()->create();
        $desease = Desease::factory()->create();

        $data = [
            'height' => $this->faker->randomFloat(2, 0, 9999),
            'weight' => $this->faker->randomFloat(2, 0, 9999),
            'hiv_status' => 'negative-',
            'health_status' => 'Normal',
            'mother_id' => $mother->id,
            'desease_id' => $desease->id,
        ];

        $response = $this->put(
            route('mother-health-statuses.update', $motherHealthStatus),
            $data
        );

        $data['id'] = $motherHealthStatus->id;

        $this->assertDatabaseHas('mother_health_statuses', $data);

        $response->assertRedirect(
            route('mother-health-statuses.edit', $motherHealthStatus)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_mother_health_status(): void
    {
        $motherHealthStatus = MotherHealthStatus::factory()->create();

        $response = $this->delete(
            route('mother-health-statuses.destroy', $motherHealthStatus)
        );

        $response->assertRedirect(route('mother-health-statuses.index'));

        $this->assertModelMissing($motherHealthStatus);
    }
}
