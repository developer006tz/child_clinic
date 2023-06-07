<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\BabyProgressHealthReport;

use App\Models\Baby;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BabyProgressHealthReportControllerTest extends TestCase
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
    public function it_displays_index_view_with_baby_progress_health_reports(): void
    {
        $babyProgressHealthReports = BabyProgressHealthReport::factory()
            ->count(0)
            ->create();

        $response = $this->get(route('baby-progress-health-reports.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.baby_progress_health_reports.index')
            ->assertViewHas('babyProgressHealthReports');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_baby_progress_health_report(): void
    {
        $response = $this->get(route('baby-progress-health-reports.create'));

        $response
            ->assertOk()
            ->assertViewIs('app.baby_progress_health_reports.create');
    }

    /**
     * @test
     */
    public function it_stores_the_baby_progress_health_report(): void
    {
        $data = BabyProgressHealthReport::factory()
            ->make()
            ->toArray();

        $response = $this->post(
            route('baby-progress-health-reports.store'),
            $data
        );

        $this->assertDatabaseHas('baby_progress_health_reports', $data);

        $babyProgressHealthReport = BabyProgressHealthReport::latest(
            'id'
        )->first();

        $response->assertRedirect(
            route(
                'baby-progress-health-reports.edit',
                $babyProgressHealthReport
            )
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_baby_progress_health_report(): void
    {
        $babyProgressHealthReport = BabyProgressHealthReport::factory()->create();

        $response = $this->get(
            route(
                'baby-progress-health-reports.show',
                $babyProgressHealthReport
            )
        );

        $response
            ->assertOk()
            ->assertViewIs('app.baby_progress_health_reports.show')
            ->assertViewHas('babyProgressHealthReport');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_baby_progress_health_report(): void
    {
        $babyProgressHealthReport = BabyProgressHealthReport::factory()->create();

        $response = $this->get(
            route(
                'baby-progress-health-reports.edit',
                $babyProgressHealthReport
            )
        );

        $response
            ->assertOk()
            ->assertViewIs('app.baby_progress_health_reports.edit')
            ->assertViewHas('babyProgressHealthReport');
    }

    /**
     * @test
     */
    public function it_updates_the_baby_progress_health_report(): void
    {
        $babyProgressHealthReport = BabyProgressHealthReport::factory()->create();

        $baby = Baby::factory()->create();

        $data = [
            'current_height' => $this->faker->randomNumber(1),
            'current_weight' => $this->faker->randomNumber(1),
            'current_health_status' => 'Normal',
            'bmi' => $this->faker->randomNumber(1),
            'baby_id' => $baby->id,
        ];

        $response = $this->put(
            route(
                'baby-progress-health-reports.update',
                $babyProgressHealthReport
            ),
            $data
        );

        $data['id'] = $babyProgressHealthReport->id;

        $this->assertDatabaseHas('baby_progress_health_reports', $data);

        $response->assertRedirect(
            route(
                'baby-progress-health-reports.edit',
                $babyProgressHealthReport
            )
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_baby_progress_health_report(): void
    {
        $babyProgressHealthReport = BabyProgressHealthReport::factory()->create();

        $response = $this->delete(
            route(
                'baby-progress-health-reports.destroy',
                $babyProgressHealthReport
            )
        );

        $response->assertRedirect(route('baby-progress-health-reports.index'));

        $this->assertModelMissing($babyProgressHealthReport);
    }
}
