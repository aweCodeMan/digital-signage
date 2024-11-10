<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use DatabaseMigrations;

    public function test_it_loads_the_dashboard(): void
    {
        $response = $this->get(route('dashboard'))->assertStatus(200);
    }
}
