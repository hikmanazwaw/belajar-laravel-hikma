<?php

namespace Tests\Feature;

use Tests\TestCase;

class DashboardLayoutTest extends TestCase
{
    public function test_dashboard_uses_header_sidebar_and_content_layout(): void
    {
        $this->get(route('dashboard'))
            ->assertOk()
            ->assertSee('Hikma Town')
            ->assertSee('Navigasi utama')
            ->assertSee('Menu utama')
            ->assertSee('Dashboard Hikma Town')
            ->assertSee(route('product'));
    }
}
