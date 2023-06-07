<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Desease;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeseaseControllerTest extends TestCase
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
    public function it_displays_index_view_with_deseases(): void
    {
        $deseases = Desease::factory()
            ->count(0)
            ->create();

        $response = $this->get(route('deseases.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.deseases.index')
            ->assertViewHas('deseases');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_desease(): void
    {
        $response = $this->get(route('deseases.create'));

        $response->assertOk()->assertViewIs('app.deseases.create');
    }

    /**
     * @test
     */
    public function it_stores_the_desease(): void
    {
        $data = Desease::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('deseases.store'), $data);

        $this->assertDatabaseHas('deseases', $data);

        $desease = Desease::latest('id')->first();

        $response->assertRedirect(route('deseases.edit', $desease));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_desease(): void
    {
        $desease = Desease::factory()->create();

        $response = $this->get(route('deseases.show', $desease));

        $response
            ->assertOk()
            ->assertViewIs('app.deseases.show')
            ->assertViewHas('desease');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_desease(): void
    {
        $desease = Desease::factory()->create();

        $response = $this->get(route('deseases.edit', $desease));

        $response
            ->assertOk()
            ->assertViewIs('app.deseases.edit')
            ->assertViewHas('desease');
    }

    /**
     * @test
     */
    public function it_updates_the_desease(): void
    {
        $desease = Desease::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'type' => 'non-infectious',
            'description' => $this->faker->sentence(15),
        ];

        $response = $this->put(route('deseases.update', $desease), $data);

        $data['id'] = $desease->id;

        $this->assertDatabaseHas('deseases', $data);

        $response->assertRedirect(route('deseases.edit', $desease));
    }

    /**
     * @test
     */
    public function it_deletes_the_desease(): void
    {
        $desease = Desease::factory()->create();

        $response = $this->delete(route('deseases.destroy', $desease));

        $response->assertRedirect(route('deseases.index'));

        $this->assertModelMissing($desease);
    }
}
