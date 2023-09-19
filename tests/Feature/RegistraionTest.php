<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistraionTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_user_register_successfully(): void
    {
        $user = [
            'name' => 'shehab',
            'email' => 'shehab@gmail.com',
            'phone_number' => '010000000000',
            'type' => 'user',
            'password' => 'password',
            'password_confirmation' => 'password',
        ];

        $this->withoutMiddleware()->post('/register', $user)
            ->assertRedirect(route('dashboard.index'));

        $this->assertDatabaseCount('users', 1);
    }

    public function test_validation_failed()
    {
        $user = [
            'name' => 'shehab',
            'phone_number' => '010000000000',
            'password' => 'password',
            'password_confirmation' => 'password',
        ];

        $this->withoutMiddleware()->post('/register', $user)
            ->assertStatus(302)
            ->assertSessionHasErrors(['email', 'type']);

        $this->assertDatabaseEmpty('users');
    }
}
