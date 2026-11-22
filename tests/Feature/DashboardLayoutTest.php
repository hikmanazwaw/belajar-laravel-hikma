<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardLayoutTest extends TestCase
{
    use RefreshDatabase;

    public function test_dashboard_uses_header_sidebar_and_content_layout(): void
    {
        $this->actingAs(User::factory()->create())
            ->get(route('dashboard'))
            ->assertOk()
            ->assertSee('Hikma Town')
            ->assertSee('Navigasi utama')
            ->assertSee('Menu utama')
            ->assertSee('Dashboard Hikma Town')
            ->assertSee(route('product'));
    }
}
