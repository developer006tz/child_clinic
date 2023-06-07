<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\PrenatalApointment;

use App\Models\Pregnant;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PrenatalApointmentControllerTest extends TestCase
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
    public function it_displays_index_view_with_prenatal_apointments(): void
    {
        $prenatalApointments = PrenatalApointment::factory()
            ->count(0)
            ->create();

        $response = $this->get(route('prenatal-apointments.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.prenatal_apointments.index')
            ->assertViewHas('prenatalApointments');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_prenatal_apointment(): void
    {
        $response = $this->get(route('prenatal-apointments.create'));

        $response->assertOk()->assertViewIs('app.prenatal_apointments.create');
    }

    /**
     * @test
     */
    public function it_stores_the_prenatal_apointment(): void
    {
        $data = PrenatalApointment::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('prenatal-apointments.store'), $data);

        $this->assertDatabaseHas('prenatal_apointments', $data);

        $prenatalApointment = PrenatalApointment::latest('id')->first();

        $response->assertRedirect(
            route('prenatal-apointments.edit', $prenatalApointment)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_prenatal_apointment(): void
    {
        $prenatalApointment = PrenatalApointment::factory()->create();

        $response = $this->get(
            route('prenatal-apointments.show', $prenatalApointment)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.prenatal_apointments.show')
            ->assertViewHas('prenatalApointment');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_prenatal_apointment(): void
    {
        $prenatalApointment = PrenatalApointment::factory()->create();

        $response = $this->get(
            route('prenatal-apointments.edit', $prenatalApointment)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.prenatal_apointments.edit')
            ->assertViewHas('prenatalApointment');
    }

    /**
     * @test
     */
    public function it_updates_the_prenatal_apointment(): void
    {
        $prenatalApointment = PrenatalApointment::factory()->create();

        $pregnant = Pregnant::factory()->create();

        $data = [
            'date' => $this->faker->date(),
            'time' => $this->faker->time(),
            'pregnant_id' => $pregnant->id,
        ];

        $response = $this->put(
            route('prenatal-apointments.update', $prenatalApointment),
            $data
        );

        $data['id'] = $prenatalApointment->id;

        $this->assertDatabaseHas('prenatal_apointments', $data);

        $response->assertRedirect(
            route('prenatal-apointments.edit', $prenatalApointment)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_prenatal_apointment(): void
    {
        $prenatalApointment = PrenatalApointment::factory()->create();

        $response = $this->delete(
            route('prenatal-apointments.destroy', $prenatalApointment)
        );

        $response->assertRedirect(route('prenatal-apointments.index'));

        $this->assertModelMissing($prenatalApointment);
    }
}
