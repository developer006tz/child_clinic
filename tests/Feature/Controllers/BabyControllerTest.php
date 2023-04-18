<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Baby;

use App\Models\Mother;
use App\Models\Father;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BabyControllerTest extends TestCase
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
    public function it_displays_index_view_with_babies(): void
    {
        $babies = Baby::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('babies.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.babies.index')
            ->assertViewHas('babies');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_baby(): void
    {
        $response = $this->get(route('babies.create'));

        $response->assertOk()->assertViewIs('app.babies.create');
    }

    /**
     * @test
     */
    public function it_stores_the_baby(): void
    {
        $data = Baby::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('babies.store'), $data);

        $this->assertDatabaseHas('babies', $data);

        $baby = Baby::latest('id')->first();

        $response->assertRedirect(route('babies.edit', $baby));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_baby(): void
    {
        $baby = Baby::factory()->create();

        $response = $this->get(route('babies.show', $baby));

        $response
            ->assertOk()
            ->assertViewIs('app.babies.show')
            ->assertViewHas('baby');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_baby(): void
    {
        $baby = Baby::factory()->create();

        $response = $this->get(route('babies.edit', $baby));

        $response
            ->assertOk()
            ->assertViewIs('app.babies.edit')
            ->assertViewHas('baby');
    }

    /**
     * @test
     */
    public function it_updates_the_baby(): void
    {
        $baby = Baby::factory()->create();

        $mother = Mother::factory()->create();
        $father = Father::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'gender' => \Arr::random(['male', 'female']),
            'birthdate' => $this->faker->date(),
            'weight_at_birth' => $this->faker->randomFloat(2, 0, 9999),
            'mother_id' => $mother->id,
            'father_id' => $father->id,
        ];

        $response = $this->put(route('babies.update', $baby), $data);

        $data['id'] = $baby->id;

        $this->assertDatabaseHas('babies', $data);

        $response->assertRedirect(route('babies.edit', $baby));
    }

    /**
     * @test
     */
    public function it_deletes_the_baby(): void
    {
        $baby = Baby::factory()->create();

        $response = $this->delete(route('babies.destroy', $baby));

        $response->assertRedirect(route('babies.index'));

        $this->assertModelMissing($baby);
    }
}
