<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\BabyMedicalHistory;

use App\Models\Desease;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BabyMedicalHistoryControllerTest extends TestCase
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
    public function it_displays_index_view_with_baby_medical_histories(): void
    {
        $babyMedicalHistories = BabyMedicalHistory::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('baby-medical-histories.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.baby_medical_histories.index')
            ->assertViewHas('babyMedicalHistories');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_baby_medical_history(): void
    {
        $response = $this->get(route('baby-medical-histories.create'));

        $response
            ->assertOk()
            ->assertViewIs('app.baby_medical_histories.create');
    }

    /**
     * @test
     */
    public function it_stores_the_baby_medical_history(): void
    {
        $data = BabyMedicalHistory::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('baby-medical-histories.store'), $data);

        $this->assertDatabaseHas('baby_medical_histories', $data);

        $babyMedicalHistory = BabyMedicalHistory::latest('id')->first();

        $response->assertRedirect(
            route('baby-medical-histories.edit', $babyMedicalHistory)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_baby_medical_history(): void
    {
        $babyMedicalHistory = BabyMedicalHistory::factory()->create();

        $response = $this->get(
            route('baby-medical-histories.show', $babyMedicalHistory)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.baby_medical_histories.show')
            ->assertViewHas('babyMedicalHistory');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_baby_medical_history(): void
    {
        $babyMedicalHistory = BabyMedicalHistory::factory()->create();

        $response = $this->get(
            route('baby-medical-histories.edit', $babyMedicalHistory)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.baby_medical_histories.edit')
            ->assertViewHas('babyMedicalHistory');
    }

    /**
     * @test
     */
    public function it_updates_the_baby_medical_history(): void
    {
        $babyMedicalHistory = BabyMedicalHistory::factory()->create();

        $desease = Desease::factory()->create();

        $data = [
            'level_of_illness' => 'normal',
            'description' => $this->faker->sentence(15),
            'date' => $this->faker->date(),
            'desease_id' => $desease->id,
        ];

        $response = $this->put(
            route('baby-medical-histories.update', $babyMedicalHistory),
            $data
        );

        $data['id'] = $babyMedicalHistory->id;

        $this->assertDatabaseHas('baby_medical_histories', $data);

        $response->assertRedirect(
            route('baby-medical-histories.edit', $babyMedicalHistory)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_baby_medical_history(): void
    {
        $babyMedicalHistory = BabyMedicalHistory::factory()->create();

        $response = $this->delete(
            route('baby-medical-histories.destroy', $babyMedicalHistory)
        );

        $response->assertRedirect(route('baby-medical-histories.index'));

        $this->assertModelMissing($babyMedicalHistory);
    }
}
