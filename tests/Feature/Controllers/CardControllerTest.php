<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Card;

use App\Models\Baby;
use App\Models\BloodType;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CardControllerTest extends TestCase
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
    public function it_displays_index_view_with_cards(): void
    {
        $cards = Card::factory()
            ->count(0)
            ->create();

        $response = $this->get(route('cards.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.cards.index')
            ->assertViewHas('cards');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_card(): void
    {
        $response = $this->get(route('cards.create'));

        $response->assertOk()->assertViewIs('app.cards.create');
    }

    /**
     * @test
     */
    public function it_stores_the_card(): void
    {
        $data = Card::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('cards.store'), $data);

        $this->assertDatabaseHas('cards', $data);

        $card = Card::latest('id')->first();

        $response->assertRedirect(route('cards.edit', $card));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_card(): void
    {
        $card = Card::factory()->create();

        $response = $this->get(route('cards.show', $card));

        $response
            ->assertOk()
            ->assertViewIs('app.cards.show')
            ->assertViewHas('card');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_card(): void
    {
        $card = Card::factory()->create();

        $response = $this->get(route('cards.edit', $card));

        $response
            ->assertOk()
            ->assertViewIs('app.cards.edit')
            ->assertViewHas('card');
    }

    /**
     * @test
     */
    public function it_updates_the_card(): void
    {
        $card = Card::factory()->create();

        $bloodType = BloodType::factory()->create();
        $baby = Baby::factory()->create();

        $data = [
            'issue_number' => $this->faker->text(255),
            'weight' => $this->faker->randomFloat(2, 0, 9999),
            'height' => $this->faker->randomFloat(2, 0, 9999),
            'head_circumference' => $this->faker->randomNumber(1),
            'apgar_score' => $this->faker->randomNumber(0),
            'birth_defects' => $this->faker->text(255),
            'blood_type_id' => $bloodType->id,
            'baby_id' => $baby->id,
        ];

        $response = $this->put(route('cards.update', $card), $data);

        $data['id'] = $card->id;

        $this->assertDatabaseHas('cards', $data);

        $response->assertRedirect(route('cards.edit', $card));
    }

    /**
     * @test
     */
    public function it_deletes_the_card(): void
    {
        $card = Card::factory()->create();

        $response = $this->delete(route('cards.destroy', $card));

        $response->assertRedirect(route('cards.index'));

        $this->assertModelMissing($card);
    }
}
