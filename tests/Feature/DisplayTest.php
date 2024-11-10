<?php


use App\Models\Display;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DisplayTest extends TestCase
{
    use DatabaseMigrations;

    public function test_it_loads_the_list(): void
    {
        $response = $this->get(route('displays.index'))->assertStatus(200);
    }

    public function test_it_loads_an_empty_form(): void
    {
        $response = $this->get(route('displays.form'))->assertStatus(200);
    }

    public function test_it_loads_a_form(): void
    {
        $display = Display::factory()->create();

        $response = $this->get(route('displays.form', ['id' => $display->id]))->assertStatus(200);
    }

    public function test_it_returns_404_on_missing_model(): void
    {
        $response = $this->get(route('displays.form', ['id' => 1]))->assertStatus(404);
    }
}
