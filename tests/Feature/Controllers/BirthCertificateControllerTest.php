<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\BirthCertificate;

use App\Models\Baby;
use App\Models\Mother;
use App\Models\Father;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BirthCertificateControllerTest extends TestCase
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
    public function it_displays_index_view_with_birth_certificates(): void
    {
        $birthCertificates = BirthCertificate::factory()
            ->count(0)
            ->create();

        $response = $this->get(route('birth-certificates.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.birth_certificates.index')
            ->assertViewHas('birthCertificates');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_birth_certificate(): void
    {
        $response = $this->get(route('birth-certificates.create'));

        $response->assertOk()->assertViewIs('app.birth_certificates.create');
    }

    /**
     * @test
     */
    public function it_stores_the_birth_certificate(): void
    {
        $data = BirthCertificate::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('birth-certificates.store'), $data);

        $this->assertDatabaseHas('birth_certificates', $data);

        $birthCertificate = BirthCertificate::latest('id')->first();

        $response->assertRedirect(
            route('birth-certificates.edit', $birthCertificate)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_birth_certificate(): void
    {
        $birthCertificate = BirthCertificate::factory()->create();

        $response = $this->get(
            route('birth-certificates.show', $birthCertificate)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.birth_certificates.show')
            ->assertViewHas('birthCertificate');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_birth_certificate(): void
    {
        $birthCertificate = BirthCertificate::factory()->create();

        $response = $this->get(
            route('birth-certificates.edit', $birthCertificate)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.birth_certificates.edit')
            ->assertViewHas('birthCertificate');
    }

    /**
     * @test
     */
    public function it_updates_the_birth_certificate(): void
    {
        $birthCertificate = BirthCertificate::factory()->create();

        $baby = Baby::factory()->create();
        $mother = Mother::factory()->create();
        $father = Father::factory()->create();

        $data = [
            'date_of_birth' => $this->faker->date(),
            'Hospital' => $this->faker->text(255),
            'father_ocupation' => $this->faker->text(255),
            'Mother_ocupation' => $this->faker->text(255),
            'father_address' => $this->faker->text(255),
            'Mother_address' => $this->faker->text(255),
            'baby_id' => $baby->id,
            'mother_id' => $mother->id,
            'father_id' => $father->id,
        ];

        $response = $this->put(
            route('birth-certificates.update', $birthCertificate),
            $data
        );

        $data['id'] = $birthCertificate->id;

        $this->assertDatabaseHas('birth_certificates', $data);

        $response->assertRedirect(
            route('birth-certificates.edit', $birthCertificate)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_birth_certificate(): void
    {
        $birthCertificate = BirthCertificate::factory()->create();

        $response = $this->delete(
            route('birth-certificates.destroy', $birthCertificate)
        );

        $response->assertRedirect(route('birth-certificates.index'));

        $this->assertModelMissing($birthCertificate);
    }
}
