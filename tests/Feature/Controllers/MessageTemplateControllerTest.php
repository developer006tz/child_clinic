<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\MessageTemplate;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MessageTemplateControllerTest extends TestCase
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
    public function it_displays_index_view_with_message_templates(): void
    {
        $messageTemplates = MessageTemplate::factory()
            ->count(0)
            ->create();

        $response = $this->get(route('message-templates.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.message_templates.index')
            ->assertViewHas('messageTemplates');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_message_template(): void
    {
        $response = $this->get(route('message-templates.create'));

        $response->assertOk()->assertViewIs('app.message_templates.create');
    }

    /**
     * @test
     */
    public function it_stores_the_message_template(): void
    {
        $data = MessageTemplate::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('message-templates.store'), $data);

        $this->assertDatabaseHas('message_templates', $data);

        $messageTemplate = MessageTemplate::latest('id')->first();

        $response->assertRedirect(
            route('message-templates.edit', $messageTemplate)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_message_template(): void
    {
        $messageTemplate = MessageTemplate::factory()->create();

        $response = $this->get(
            route('message-templates.show', $messageTemplate)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.message_templates.show')
            ->assertViewHas('messageTemplate');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_message_template(): void
    {
        $messageTemplate = MessageTemplate::factory()->create();

        $response = $this->get(
            route('message-templates.edit', $messageTemplate)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.message_templates.edit')
            ->assertViewHas('messageTemplate');
    }

    /**
     * @test
     */
    public function it_updates_the_message_template(): void
    {
        $messageTemplate = MessageTemplate::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'body' => $this->faker->text(),
        ];

        $response = $this->put(
            route('message-templates.update', $messageTemplate),
            $data
        );

        $data['id'] = $messageTemplate->id;

        $this->assertDatabaseHas('message_templates', $data);

        $response->assertRedirect(
            route('message-templates.edit', $messageTemplate)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_message_template(): void
    {
        $messageTemplate = MessageTemplate::factory()->create();

        $response = $this->delete(
            route('message-templates.destroy', $messageTemplate)
        );

        $response->assertRedirect(route('message-templates.index'));

        $this->assertModelMissing($messageTemplate);
    }
}
