<?php

namespace Tests\Feature;

use Tests\TestCase;

class OlshopPagesTest extends TestCase
{
    public function test_home_page_displays_welcome_message(): void
    {
        $this->get('/home')
            ->assertOk()
            ->assertSee('Selamat Datang di Olshop Kami');
    }

    public function test_product_page_links_to_each_product_detail(): void
    {
        $this->get('/product')
            ->assertOk()
            ->assertSee('Sepatu')
            ->assertSee('Baju')
            ->assertSee('Celana')
            ->assertSee('/produk/detail/300000')
            ->assertSee('/produk/detail/200000')
            ->assertSee('/produk/detail/150000');
    }

    public function test_product_detail_displays_selected_product_and_price(): void
    {
        $this->get('/produk/detail/200000')
            ->assertOk()
            ->assertSee('Baju')
            ->assertSee('Rp 200.000');
    }

    public function test_unknown_product_price_returns_not_found(): void
    {
        $this->get('/produk/detail/999999')
            ->assertNotFound();
    }

    public function test_about_page_displays_lorem_content(): void
    {
        $this->get('/about')
            ->assertOk()
            ->assertSee('Lorem ipsum dolor sit amet');
    }
}
