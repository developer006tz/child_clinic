<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Pregnant;

use App\Models\Mother;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PregnantControllerTest extends TestCase
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
    public function it_displays_index_view_with_pregnants(): void
    {
        $pregnants = Pregnant::factory()
            ->count(0)
            ->create();

        $response = $this->get(route('pregnants.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.pregnants.index')
            ->assertViewHas('pregnants');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_pregnant(): void
    {
        $response = $this->get(route('pregnants.create'));

        $response->assertOk()->assertViewIs('app.pregnants.create');
    }

    /**
     * @test
     */
    public function it_stores_the_pregnant(): void
    {
        $data = Pregnant::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('pregnants.store'), $data);

        $this->assertDatabaseHas('pregnants', $data);

        $pregnant = Pregnant::latest('id')->first();

        $response->assertRedirect(route('pregnants.edit', $pregnant));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_pregnant(): void
    {
        $pregnant = Pregnant::factory()->create();

        $response = $this->get(route('pregnants.show', $pregnant));

        $response
            ->assertOk()
            ->assertViewIs('app.pregnants.show')
            ->assertViewHas('pregnant');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_pregnant(): void
    {
        $pregnant = Pregnant::factory()->create();

        $response = $this->get(route('pregnants.edit', $pregnant));

        $response
            ->assertOk()
            ->assertViewIs('app.pregnants.edit')
            ->assertViewHas('pregnant');
    }

    /**
     * @test
     */
    public function it_updates_the_pregnant(): void
    {
        $pregnant = Pregnant::factory()->create();

        $mother = Mother::factory()->create();

        $data = [
            'due_date' => $this->faker->date(),
            'date_of_delivery' => $this->faker->date(),
            'time_of_delivery' => $this->faker->time(),
            'number_of_weeks_lasted' => $this->faker->randomNumber(0),
            'weight_at_birth' => $this->faker->randomNumber(1),
            'height_at_birth' => $this->faker->randomNumber(1),
            'gender' => \Arr::random(['male', 'female']),
            'pregnant_defects' => $this->faker->text(),
            'mother_id' => $mother->id,
        ];

        $response = $this->put(route('pregnants.update', $pregnant), $data);

        $data['id'] = $pregnant->id;

        $this->assertDatabaseHas('pregnants', $data);

        $response->assertRedirect(route('pregnants.edit', $pregnant));
    }

    /**
     * @test
     */
    public function it_deletes_the_pregnant(): void
    {
        $pregnant = Pregnant::factory()->create();

        $response = $this->delete(route('pregnants.destroy', $pregnant));

        $response->assertRedirect(route('pregnants.index'));

        $this->assertModelMissing($pregnant);
    }
}
