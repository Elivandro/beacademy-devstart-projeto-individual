<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{

    public function test_login()
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email'     => $user->email,
            'password'  => 'password',
        ]);

        $this->actingAs($user);

        $response = $this->get('/dashboard');

        $response->assertStatus(200);
    }
}
