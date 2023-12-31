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
    public function test_user_can_view_login_form()
    {
        $response = $this->get(route('register.index'));

        $response->assertStatus(200);
        $response->assertViewIs('auth.register');
    }

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

        $this->withoutMiddleware()->post(route('register.index'), $user)
            ->assertRedirect(route('dashboard.index'));

        $this->assertDatabaseCount('users', 1);
    }

    public function test_that_validation_works()
    {
        $user = [
            'name' => 'shehab',
            'type' => 'user',
            'password' => 'password',
            'password_confirmation' => 'password',
        ];

        $this->withoutMiddleware()->post(route('register.index'), $user)
            ->assertStatus(302)
            ->assertSessionHasErrors();

        $this->assertDatabaseEmpty('users');
    }
}
