<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\MotherMedicalHistory;

use App\Models\Mother;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MotherMedicalHistoryControllerTest extends TestCase
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
    public function it_displays_index_view_with_mother_medical_histories(): void
    {
        $motherMedicalHistories = MotherMedicalHistory::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('mother-medical-histories.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.mother_medical_histories.index')
            ->assertViewHas('motherMedicalHistories');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_mother_medical_history(): void
    {
        $response = $this->get(route('mother-medical-histories.create'));

        $response
            ->assertOk()
            ->assertViewIs('app.mother_medical_histories.create');
    }

    /**
     * @test
     */
    public function it_stores_the_mother_medical_history(): void
    {
        $data = MotherMedicalHistory::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('mother-medical-histories.store'), $data);

        $this->assertDatabaseHas('mother_medical_histories', $data);

        $motherMedicalHistory = MotherMedicalHistory::latest('id')->first();

        $response->assertRedirect(
            route('mother-medical-histories.edit', $motherMedicalHistory)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_mother_medical_history(): void
    {
        $motherMedicalHistory = MotherMedicalHistory::factory()->create();

        $response = $this->get(
            route('mother-medical-histories.show', $motherMedicalHistory)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.mother_medical_histories.show')
            ->assertViewHas('motherMedicalHistory');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_mother_medical_history(): void
    {
        $motherMedicalHistory = MotherMedicalHistory::factory()->create();

        $response = $this->get(
            route('mother-medical-histories.edit', $motherMedicalHistory)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.mother_medical_histories.edit')
            ->assertViewHas('motherMedicalHistory');
    }

    /**
     * @test
     */
    public function it_updates_the_mother_medical_history(): void
    {
        $motherMedicalHistory = MotherMedicalHistory::factory()->create();

        $mother = Mother::factory()->create();

        $data = [
            'illnes' => 'Other',
            'Description' => $this->faker->sentence(15),
            'date' => $this->faker->date(),
            'status' => 'Cured',
            'mother_id' => $mother->id,
        ];

        $response = $this->put(
            route('mother-medical-histories.update', $motherMedicalHistory),
            $data
        );

        $data['id'] = $motherMedicalHistory->id;

        $this->assertDatabaseHas('mother_medical_histories', $data);

        $response->assertRedirect(
            route('mother-medical-histories.edit', $motherMedicalHistory)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_mother_medical_history(): void
    {
        $motherMedicalHistory = MotherMedicalHistory::factory()->create();

        $response = $this->delete(
            route('mother-medical-histories.destroy', $motherMedicalHistory)
        );

        $response->assertRedirect(route('mother-medical-histories.index'));

        $this->assertModelMissing($motherMedicalHistory);
    }
}
