<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\BabyMedicalHostory;

use App\Models\Desease;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BabyMedicalHostoryControllerTest extends TestCase
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
    public function it_displays_index_view_with_baby_medical_hostories(): void
    {
        $babyMedicalHostories = BabyMedicalHostory::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('baby-medical-hostories.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.baby_medical_hostories.index')
            ->assertViewHas('babyMedicalHostories');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_baby_medical_hostory(): void
    {
        $response = $this->get(route('baby-medical-hostories.create'));

        $response
            ->assertOk()
            ->assertViewIs('app.baby_medical_hostories.create');
    }

    /**
     * @test
     */
    public function it_stores_the_baby_medical_hostory(): void
    {
        $data = BabyMedicalHostory::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('baby-medical-hostories.store'), $data);

        $this->assertDatabaseHas('baby_medical_hostories', $data);

        $babyMedicalHostory = BabyMedicalHostory::latest('id')->first();

        $response->assertRedirect(
            route('baby-medical-hostories.edit', $babyMedicalHostory)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_baby_medical_hostory(): void
    {
        $babyMedicalHostory = BabyMedicalHostory::factory()->create();

        $response = $this->get(
            route('baby-medical-hostories.show', $babyMedicalHostory)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.baby_medical_hostories.show')
            ->assertViewHas('babyMedicalHostory');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_baby_medical_hostory(): void
    {
        $babyMedicalHostory = BabyMedicalHostory::factory()->create();

        $response = $this->get(
            route('baby-medical-hostories.edit', $babyMedicalHostory)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.baby_medical_hostories.edit')
            ->assertViewHas('babyMedicalHostory');
    }

    /**
     * @test
     */
    public function it_updates_the_baby_medical_hostory(): void
    {
        $babyMedicalHostory = BabyMedicalHostory::factory()->create();

        $desease = Desease::factory()->create();

        $data = [
            'level_of_illness' => 'normal',
            'description' => $this->faker->sentence(15),
            'date' => $this->faker->date(),
            'desease_id' => $desease->id,
        ];

        $response = $this->put(
            route('baby-medical-hostories.update', $babyMedicalHostory),
            $data
        );

        $data['id'] = $babyMedicalHostory->id;

        $this->assertDatabaseHas('baby_medical_hostories', $data);

        $response->assertRedirect(
            route('baby-medical-hostories.edit', $babyMedicalHostory)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_baby_medical_hostory(): void
    {
        $babyMedicalHostory = BabyMedicalHostory::factory()->create();

        $response = $this->delete(
            route('baby-medical-hostories.destroy', $babyMedicalHostory)
        );

        $response->assertRedirect(route('baby-medical-hostories.index'));

        $this->assertModelMissing($babyMedicalHostory);
    }
}
