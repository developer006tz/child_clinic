<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\BloodType;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BloodTypeControllerTest extends TestCase
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
    public function it_displays_index_view_with_blood_types(): void
    {
        $bloodTypes = BloodType::factory()
            ->count(0)
            ->create();

        $response = $this->get(route('blood-types.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.blood_types.index')
            ->assertViewHas('bloodTypes');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_blood_type(): void
    {
        $response = $this->get(route('blood-types.create'));

        $response->assertOk()->assertViewIs('app.blood_types.create');
    }

    /**
     * @test
     */
    public function it_stores_the_blood_type(): void
    {
        $data = BloodType::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('blood-types.store'), $data);

        $this->assertDatabaseHas('blood_types', $data);

        $bloodType = BloodType::latest('id')->first();

        $response->assertRedirect(route('blood-types.edit', $bloodType));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_blood_type(): void
    {
        $bloodType = BloodType::factory()->create();

        $response = $this->get(route('blood-types.show', $bloodType));

        $response
            ->assertOk()
            ->assertViewIs('app.blood_types.show')
            ->assertViewHas('bloodType');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_blood_type(): void
    {
        $bloodType = BloodType::factory()->create();

        $response = $this->get(route('blood-types.edit', $bloodType));

        $response
            ->assertOk()
            ->assertViewIs('app.blood_types.edit')
            ->assertViewHas('bloodType');
    }

    /**
     * @test
     */
    public function it_updates_the_blood_type(): void
    {
        $bloodType = BloodType::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'description' => $this->faker->sentence(15),
            'rh_factor' => '+',
        ];

        $response = $this->put(route('blood-types.update', $bloodType), $data);

        $data['id'] = $bloodType->id;

        $this->assertDatabaseHas('blood_types', $data);

        $response->assertRedirect(route('blood-types.edit', $bloodType));
    }

    /**
     * @test
     */
    public function it_deletes_the_blood_type(): void
    {
        $bloodType = BloodType::factory()->create();

        $response = $this->delete(route('blood-types.destroy', $bloodType));

        $response->assertRedirect(route('blood-types.index'));

        $this->assertModelMissing($bloodType);
    }
}
