<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\BabyVaccination;

use App\Models\Baby;
use App\Models\Vacination;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BabyVaccinationControllerTest extends TestCase
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
    public function it_displays_index_view_with_baby_vaccinations(): void
    {
        $babyVaccinations = BabyVaccination::factory()
            ->count(0)
            ->create();

        $response = $this->get(route('baby-vaccinations.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.baby_vaccinations.index')
            ->assertViewHas('babyVaccinations');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_baby_vaccination(): void
    {
        $response = $this->get(route('baby-vaccinations.create'));

        $response->assertOk()->assertViewIs('app.baby_vaccinations.create');
    }

    /**
     * @test
     */
    public function it_stores_the_baby_vaccination(): void
    {
        $data = BabyVaccination::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('baby-vaccinations.store'), $data);

        $this->assertDatabaseHas('baby_vaccinations', $data);

        $babyVaccination = BabyVaccination::latest('id')->first();

        $response->assertRedirect(
            route('baby-vaccinations.edit', $babyVaccination)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_baby_vaccination(): void
    {
        $babyVaccination = BabyVaccination::factory()->create();

        $response = $this->get(
            route('baby-vaccinations.show', $babyVaccination)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.baby_vaccinations.show')
            ->assertViewHas('babyVaccination');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_baby_vaccination(): void
    {
        $babyVaccination = BabyVaccination::factory()->create();

        $response = $this->get(
            route('baby-vaccinations.edit', $babyVaccination)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.baby_vaccinations.edit')
            ->assertViewHas('babyVaccination');
    }

    /**
     * @test
     */
    public function it_updates_the_baby_vaccination(): void
    {
        $babyVaccination = BabyVaccination::factory()->create();

        $baby = Baby::factory()->create();
        $vacination = Vacination::factory()->create();

        $data = [
            'date_of_vaccine' => $this->faker->date(),
            'reaction_occured' => $this->faker->text(255),
            'is_vaccinated' => 'No',
            'baby_id' => $baby->id,
            'vacination_id' => $vacination->id,
        ];

        $response = $this->put(
            route('baby-vaccinations.update', $babyVaccination),
            $data
        );

        $data['id'] = $babyVaccination->id;

        $this->assertDatabaseHas('baby_vaccinations', $data);

        $response->assertRedirect(
            route('baby-vaccinations.edit', $babyVaccination)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_baby_vaccination(): void
    {
        $babyVaccination = BabyVaccination::factory()->create();

        $response = $this->delete(
            route('baby-vaccinations.destroy', $babyVaccination)
        );

        $response->assertRedirect(route('baby-vaccinations.index'));

        $this->assertModelMissing($babyVaccination);
    }
}
