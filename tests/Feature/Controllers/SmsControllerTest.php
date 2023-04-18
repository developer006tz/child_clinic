<?php

namespace Tests\Feature\Controllers;

use App\Models\Sms;
use App\Models\User;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SmsControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_all_sms(): void
    {
        $allSms = Sms::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('all-sms.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.all_sms.index')
            ->assertViewHas('allSms');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_sms(): void
    {
        $response = $this->get(route('all-sms.create'));

        $response->assertOk()->assertViewIs('app.all_sms.create');
    }

    /**
     * @test
     */
    public function it_stores_the_sms(): void
    {
        $data = Sms::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('all-sms.store'), $data);

        $this->assertDatabaseHas('sms', $data);

        $sms = Sms::latest('id')->first();

        $response->assertRedirect(route('all-sms.edit', $sms));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_sms(): void
    {
        $sms = Sms::factory()->create();

        $response = $this->get(route('all-sms.show', $sms));

        $response
            ->assertOk()
            ->assertViewIs('app.all_sms.show')
            ->assertViewHas('sms');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_sms(): void
    {
        $sms = Sms::factory()->create();

        $response = $this->get(route('all-sms.edit', $sms));

        $response
            ->assertOk()
            ->assertViewIs('app.all_sms.edit')
            ->assertViewHas('sms');
    }

    /**
     * @test
     */
    public function it_updates_the_sms(): void
    {
        $sms = Sms::factory()->create();

        $data = [
            'body' => $this->faker->text(),
            'phone' => $this->faker->phoneNumber(),
            'status' => '0',
        ];

        $response = $this->put(route('all-sms.update', $sms), $data);

        $data['id'] = $sms->id;

        $this->assertDatabaseHas('sms', $data);

        $response->assertRedirect(route('all-sms.edit', $sms));
    }

    /**
     * @test
     */
    public function it_deletes_the_sms(): void
    {
        $sms = Sms::factory()->create();

        $response = $this->delete(route('all-sms.destroy', $sms));

        $response->assertRedirect(route('all-sms.index'));

        $this->assertModelMissing($sms);
    }
}
