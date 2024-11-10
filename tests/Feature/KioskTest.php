<?php


use App\Models\Display;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class KioskTest extends TestCase
{
    use DatabaseMigrations;

    public function test_it_loads_a_kiosk(): void
    {
        $display = Display::factory()->create();

        $response = $this->get(route('kiosks.show', ['id' => $display->id]))->assertStatus(200);
    }

    public function test_it_returns_404_on_missing_model(): void
    {
        $response = $this->get(route('kiosks.show', ['id' => 1]))->assertStatus(404);
    }

    public function test_it_loads_empty_kiosk_schedules(): void
    {
        $display = Display::factory()->create();

        $response = $this->get(route('kiosks.schedules', ['id' => $display->id]))->assertStatus(200)
            ->assertJson(['data' => []]);
    }

    public function test_it_errors_on_invalid_kiosk_schedules(): void
    {
        $response = $this->get(route('kiosks.schedules', ['id' => 1]))->assertStatus(404);
    }

    public function test_it_returns_active_schedules_for_display(): void
    {
        $display = Display::factory()->createOne();
        $schedule = \App\Models\Schedule::factory()->createOne();

        $schedule->displays()->save($display);

        $response = $this->get(route('kiosks.schedules', ['id' => $display->id]))->assertStatus(200);

        $response->assertJsonCount(1, 'data');
    }
}
