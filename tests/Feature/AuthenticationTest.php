<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_sees_the_login_form_at_the_root_url(): void
    {
        $this->get(route('login'))
            ->assertOk()
            ->assertSee('Login Users')
            ->assertSee(route('login.store'));
    }

    public function test_guest_is_redirected_from_dashboard_and_employee_pages(): void
    {
        $this->get(route('dashboard'))
            ->assertRedirectToRoute('login');

        $this->get(route('employes.index'))
            ->assertRedirectToRoute('login');

        $this->get(route('home'))
            ->assertRedirectToRoute('login');
    }

    public function test_valid_credentials_start_a_session_and_open_dashboard(): void
    {
        $user = User::factory()->create([
            'email' => 'login@example.test',
            'password' => 'a-strong-test-password',
        ]);

        $this->post(route('login.store'), [
            'email' => 'login@example.test',
            'password' => 'a-strong-test-password',
        ])
            ->assertRedirectToRoute('dashboard');

        $this->assertAuthenticatedAs($user);

        $this->get(route('dashboard'))
            ->assertOk()
            ->assertHeader('Cache-Control');
    }

    public function test_invalid_credentials_do_not_authenticate_the_user(): void
    {
        User::factory()->create([
            'email' => 'login@example.test',
            'password' => 'correct-password',
        ]);

        $this->from(route('login'))
            ->post(route('login.store'), [
                'email' => 'login@example.test',
                'password' => 'wrong-password',
            ])
            ->assertRedirectToRoute('login')
            ->assertSessionHasErrors(['email']);

        $this->assertGuest();
    }

    public function test_logout_invalidates_the_session_and_restricts_future_requests(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post(route('logout'))
            ->assertRedirectToRoute('login');

        $this->assertGuest();
        $this->get(route('dashboard'))
            ->assertRedirectToRoute('login');
    }
}
