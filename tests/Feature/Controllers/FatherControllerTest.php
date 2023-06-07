<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Father;

use App\Models\Mother;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FatherControllerTest extends TestCase
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
    public function it_displays_index_view_with_fathers(): void
    {
        $fathers = Father::factory()
            ->count(0)
            ->create();

        $response = $this->get(route('fathers.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.fathers.index')
            ->assertViewHas('fathers');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_father(): void
    {
        $response = $this->get(route('fathers.create'));

        $response->assertOk()->assertViewIs('app.fathers.create');
    }

    /**
     * @test
     */
    public function it_stores_the_father(): void
    {
        $data = Father::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('fathers.store'), $data);

        $this->assertDatabaseHas('fathers', $data);

        $father = Father::latest('id')->first();

        $response->assertRedirect(route('fathers.edit', $father));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_father(): void
    {
        $father = Father::factory()->create();

        $response = $this->get(route('fathers.show', $father));

        $response
            ->assertOk()
            ->assertViewIs('app.fathers.show')
            ->assertViewHas('father');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_father(): void
    {
        $father = Father::factory()->create();

        $response = $this->get(route('fathers.edit', $father));

        $response
            ->assertOk()
            ->assertViewIs('app.fathers.edit')
            ->assertViewHas('father');
    }

    /**
     * @test
     */
    public function it_updates_the_father(): void
    {
        $father = Father::factory()->create();

        $mother = Mother::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'dob' => $this->faker->date(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'occupation' => $this->faker->text(255),
            'mother_id' => $mother->id,
        ];

        $response = $this->put(route('fathers.update', $father), $data);

        $data['id'] = $father->id;

        $this->assertDatabaseHas('fathers', $data);

        $response->assertRedirect(route('fathers.edit', $father));
    }

    /**
     * @test
     */
    public function it_deletes_the_father(): void
    {
        $father = Father::factory()->create();

        $response = $this->delete(route('fathers.destroy', $father));

        $response->assertRedirect(route('fathers.index'));

        $this->assertModelMissing($father);
    }
}
