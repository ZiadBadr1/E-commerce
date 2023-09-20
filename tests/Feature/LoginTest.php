<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */

    // Happy path
    public function test_user_can_view_login_form()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertViewIs('auth.login');
    }

    public function test_user_logged_in_successfully(): void
    {
        $user = User::factory()->create(['password' => 'password']);

        $response = $this->withoutMiddleware()->post('login' , [
            'email' => $user->email,
            'password' => 'password'
        ])
        ->assertRedirect(route('dashboard.index'));

        $this->assertAuthenticatedAs($user);
    }

    // Sad path
    public function test_user_cannot_login_with_un_correct_credintials()
    {
        $user = User::factory()->create(['password' => 'password']);

        $response = $this->withoutMiddleware()->post('login' , [
            'email' => $user->email,
            'password' => 'wrongPassword'
        ])
        ->assertStatus(302)
        ->assertSessionHas('failed');

        $this->assertGuest();
    }

    public function test_that_validation_works()
    {

        $response = $this->withoutMiddleware()->post('login' , [
            'password' => 'wrongPassword'
        ])
        ->assertStatus(302)
        ->assertSessionHasErrors();

    }
}

