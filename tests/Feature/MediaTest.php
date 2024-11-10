<?php


use App\Models\ay;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MediaTest extends TestCase
{
    use DatabaseMigrations;

    public function test_it_loads_the_list(): void
    {
        $response = $this->get(route('media_contents.index'))->assertStatus(200);
    }

    public function test_it_loads_an_empty_form(): void
    {
        $response = $this->get(route('media_contents.form'))->assertStatus(200);
    }

    public function test_it_loads_a_form(): void
    {
        $mediaContent = \App\Models\MediaContent::factory()->create();

        $response = $this->get(route('media_contents.form', ['id' => $mediaContent->id]))->assertStatus(200);
    }

    public function test_it_returns_404_on_missing_model(): void
    {
        $response = $this->get(route('media_contents.form', ['id' => 1]))->assertStatus(404);
    }
}
