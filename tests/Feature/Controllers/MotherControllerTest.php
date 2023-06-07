<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Mother;

use App\Models\BloodType;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MotherControllerTest extends TestCase
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
    public function it_displays_index_view_with_mothers(): void
    {
        $mothers = Mother::factory()
            ->count(0)
            ->create();

        $response = $this->get(route('mothers.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.mothers.index')
            ->assertViewHas('mothers');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_mother(): void
    {
        $response = $this->get(route('mothers.create'));

        $response->assertOk()->assertViewIs('app.mothers.create');
    }

    /**
     * @test
     */
    public function it_stores_the_mother(): void
    {
        $data = Mother::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('mothers.store'), $data);

        $this->assertDatabaseHas('mothers', $data);

        $mother = Mother::latest('id')->first();

        $response->assertRedirect(route('mothers.edit', $mother));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_mother(): void
    {
        $mother = Mother::factory()->create();

        $response = $this->get(route('mothers.show', $mother));

        $response
            ->assertOk()
            ->assertViewIs('app.mothers.show')
            ->assertViewHas('mother');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_mother(): void
    {
        $mother = Mother::factory()->create();

        $response = $this->get(route('mothers.edit', $mother));

        $response
            ->assertOk()
            ->assertViewIs('app.mothers.edit')
            ->assertViewHas('mother');
    }

    /**
     * @test
     */
    public function it_updates_the_mother(): void
    {
        $mother = Mother::factory()->create();

        $bloodType = BloodType::factory()->create();

        $data = [
            'clinic_id' => $this->faker->text(255),
            'name' => $this->faker->name(),
            'dob' => $this->faker->date(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'insurance_info' => 'No',
            'occupation' => $this->faker->text(255),
            'blood_type_id' => $bloodType->id,
        ];

        $response = $this->put(route('mothers.update', $mother), $data);

        $data['id'] = $mother->id;

        $this->assertDatabaseHas('mothers', $data);

        $response->assertRedirect(route('mothers.edit', $mother));
    }

    /**
     * @test
     */
    public function it_deletes_the_mother(): void
    {
        $mother = Mother::factory()->create();

        $response = $this->delete(route('mothers.destroy', $mother));

        $response->assertRedirect(route('mothers.index'));

        $this->assertModelMissing($mother);
    }
}
