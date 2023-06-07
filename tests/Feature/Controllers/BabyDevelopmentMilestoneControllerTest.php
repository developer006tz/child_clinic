<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\BabyDevelopmentMilestone;

use App\Models\Baby;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BabyDevelopmentMilestoneControllerTest extends TestCase
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
    public function it_displays_index_view_with_baby_development_milestones(): void
    {
        $babyDevelopmentMilestones = BabyDevelopmentMilestone::factory()
            ->count(0)
            ->create();

        $response = $this->get(route('baby-development-milestones.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.baby_development_milestones.index')
            ->assertViewHas('babyDevelopmentMilestones');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_baby_development_milestone(): void
    {
        $response = $this->get(route('baby-development-milestones.create'));

        $response
            ->assertOk()
            ->assertViewIs('app.baby_development_milestones.create');
    }

    /**
     * @test
     */
    public function it_stores_the_baby_development_milestone(): void
    {
        $data = BabyDevelopmentMilestone::factory()
            ->make()
            ->toArray();

        $response = $this->post(
            route('baby-development-milestones.store'),
            $data
        );

        $this->assertDatabaseHas('baby_development_milestones', $data);

        $babyDevelopmentMilestone = BabyDevelopmentMilestone::latest(
            'id'
        )->first();

        $response->assertRedirect(
            route('baby-development-milestones.edit', $babyDevelopmentMilestone)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_baby_development_milestone(): void
    {
        $babyDevelopmentMilestone = BabyDevelopmentMilestone::factory()->create();

        $response = $this->get(
            route('baby-development-milestones.show', $babyDevelopmentMilestone)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.baby_development_milestones.show')
            ->assertViewHas('babyDevelopmentMilestone');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_baby_development_milestone(): void
    {
        $babyDevelopmentMilestone = BabyDevelopmentMilestone::factory()->create();

        $response = $this->get(
            route('baby-development-milestones.edit', $babyDevelopmentMilestone)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.baby_development_milestones.edit')
            ->assertViewHas('babyDevelopmentMilestone');
    }

    /**
     * @test
     */
    public function it_updates_the_baby_development_milestone(): void
    {
        $babyDevelopmentMilestone = BabyDevelopmentMilestone::factory()->create();

        $baby = Baby::factory()->create();

        $data = [
            'first_smile' => $this->faker->date(),
            'first_word' => $this->faker->date(),
            'first_step' => $this->faker->date(),
            'baby_id' => $baby->id,
        ];

        $response = $this->put(
            route(
                'baby-development-milestones.update',
                $babyDevelopmentMilestone
            ),
            $data
        );

        $data['id'] = $babyDevelopmentMilestone->id;

        $this->assertDatabaseHas('baby_development_milestones', $data);

        $response->assertRedirect(
            route('baby-development-milestones.edit', $babyDevelopmentMilestone)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_baby_development_milestone(): void
    {
        $babyDevelopmentMilestone = BabyDevelopmentMilestone::factory()->create();

        $response = $this->delete(
            route(
                'baby-development-milestones.destroy',
                $babyDevelopmentMilestone
            )
        );

        $response->assertRedirect(route('baby-development-milestones.index'));

        $this->assertModelMissing($babyDevelopmentMilestone);
    }
}
