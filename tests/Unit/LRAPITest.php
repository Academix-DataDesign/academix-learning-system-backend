<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LRAPITest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function testRegisterApiRoute()
    {
        $userData = [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => 'password12345',
        ];

        $response = $this->post('/api/v1/register', $userData);

        $this->assertDatabaseHas('users', [
            'email' => 'johndoe@example.com',
        ]);
    }

    /** @test */
    public function testLoginApiRoute()
    {
        $userData = [
            'email' => 'johndoe@example.com',
            'password' => 'password12345',
        ];

        $response = $this->post('/api/v1/login', $userData);

        $response->assertJsonStructure([
            'status',
            'message',
            'token',
        ]);
    }
}
