<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\ComposeSms;

use App\Models\MessageTemplate;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ComposeSmsControllerTest extends TestCase
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
    public function it_displays_index_view_with_all_compose_sms(): void
    {
        $allComposeSms = ComposeSms::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('all-compose-sms.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.all_compose_sms.index')
            ->assertViewHas('allComposeSms');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_compose_sms(): void
    {
        $response = $this->get(route('all-compose-sms.create'));

        $response->assertOk()->assertViewIs('app.all_compose_sms.create');
    }

    /**
     * @test
     */
    public function it_stores_the_compose_sms(): void
    {
        $data = ComposeSms::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('all-compose-sms.store'), $data);

        $this->assertDatabaseHas('compose_sms', $data);

        $composeSms = ComposeSms::latest('id')->first();

        $response->assertRedirect(route('all-compose-sms.edit', $composeSms));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_compose_sms(): void
    {
        $composeSms = ComposeSms::factory()->create();

        $response = $this->get(route('all-compose-sms.show', $composeSms));

        $response
            ->assertOk()
            ->assertViewIs('app.all_compose_sms.show')
            ->assertViewHas('composeSms');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_compose_sms(): void
    {
        $composeSms = ComposeSms::factory()->create();

        $response = $this->get(route('all-compose-sms.edit', $composeSms));

        $response
            ->assertOk()
            ->assertViewIs('app.all_compose_sms.edit')
            ->assertViewHas('composeSms');
    }

    /**
     * @test
     */
    public function it_updates_the_compose_sms(): void
    {
        $composeSms = ComposeSms::factory()->create();

        $messageTemplate = MessageTemplate::factory()->create();

        $data = [
            'custom_message' => $this->faker->sentence(20),
            'message_template_id' => $messageTemplate->id,
        ];

        $response = $this->put(
            route('all-compose-sms.update', $composeSms),
            $data
        );

        $data['id'] = $composeSms->id;

        $this->assertDatabaseHas('compose_sms', $data);

        $response->assertRedirect(route('all-compose-sms.edit', $composeSms));
    }

    /**
     * @test
     */
    public function it_deletes_the_compose_sms(): void
    {
        $composeSms = ComposeSms::factory()->create();

        $response = $this->delete(
            route('all-compose-sms.destroy', $composeSms)
        );

        $response->assertRedirect(route('all-compose-sms.index'));

        $this->assertModelMissing($composeSms);
    }
}
