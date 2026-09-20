<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Task;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->getJson('/api/tasks');

        $response->assertStatus(200);
    }
    public function test_route_login_returns_a_successful_response(): void
    {
        $response = $this->post('/Login');

        $response->assertStatus(200);
    }
}
