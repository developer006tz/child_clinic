<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\PregnantComplications;

use App\Models\Pregnant;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PregnantComplicationsControllerTest extends TestCase
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
    public function it_displays_index_view_with_all_pregnant_complications(): void
    {
        $allPregnantComplications = PregnantComplications::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('all-pregnant-complications.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.all_pregnant_complications.index')
            ->assertViewHas('allPregnantComplications');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_pregnant_complications(): void
    {
        $response = $this->get(route('all-pregnant-complications.create'));

        $response
            ->assertOk()
            ->assertViewIs('app.all_pregnant_complications.create');
    }

    /**
     * @test
     */
    public function it_stores_the_pregnant_complications(): void
    {
        $data = PregnantComplications::factory()
            ->make()
            ->toArray();

        $response = $this->post(
            route('all-pregnant-complications.store'),
            $data
        );

        $this->assertDatabaseHas('pregnant_complications', $data);

        $pregnantComplications = PregnantComplications::latest('id')->first();

        $response->assertRedirect(
            route('all-pregnant-complications.edit', $pregnantComplications)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_pregnant_complications(): void
    {
        $pregnantComplications = PregnantComplications::factory()->create();

        $response = $this->get(
            route('all-pregnant-complications.show', $pregnantComplications)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.all_pregnant_complications.show')
            ->assertViewHas('pregnantComplications');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_pregnant_complications(): void
    {
        $pregnantComplications = PregnantComplications::factory()->create();

        $response = $this->get(
            route('all-pregnant-complications.edit', $pregnantComplications)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.all_pregnant_complications.edit')
            ->assertViewHas('pregnantComplications');
    }

    /**
     * @test
     */
    public function it_updates_the_pregnant_complications(): void
    {
        $pregnantComplications = PregnantComplications::factory()->create();

        $pregnant = Pregnant::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'description' => $this->faker->sentence(15),
            'pregnant_id' => $pregnant->id,
        ];

        $response = $this->put(
            route('all-pregnant-complications.update', $pregnantComplications),
            $data
        );

        $data['id'] = $pregnantComplications->id;

        $this->assertDatabaseHas('pregnant_complications', $data);

        $response->assertRedirect(
            route('all-pregnant-complications.edit', $pregnantComplications)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_pregnant_complications(): void
    {
        $pregnantComplications = PregnantComplications::factory()->create();

        $response = $this->delete(
            route('all-pregnant-complications.destroy', $pregnantComplications)
        );

        $response->assertRedirect(route('all-pregnant-complications.index'));

        $this->assertModelMissing($pregnantComplications);
    }
}
