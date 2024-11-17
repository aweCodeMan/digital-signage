<?php


use App\Models\Schedule;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ScheduleTest extends TestCase
{
    use DatabaseMigrations;

    public function test_it_loads_the_list(): void
    {
        $response = $this->get(route('schedules.index'))->assertStatus(200);
    }

    public function test_it_loads_an_empty_form(): void
    {
        $response = $this->get(route('schedules.form'))->assertStatus(200);
    }

    public function test_it_loads_a_form(): void
    {
        $schedule = Schedule::factory()->create();

        $response = $this->get(route('schedules.form', ['id' => $schedule->id]))->assertStatus(200);
    }

    public function test_it_returns_404_on_missing_model(): void
    {
        $response = $this->get(route('schedules.form', ['id' => 1]))->assertStatus(404);
    }
}
