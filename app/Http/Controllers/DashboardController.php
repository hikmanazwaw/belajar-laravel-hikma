<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function product()
    {
        return view('product', ['products' => $this->products()]);
    }

    public function about()
    {
        return view('about');
    }

    public function detail(string $harga)
    {
        foreach ($this->products() as $product) {
            if ((string) $product['price'] === $harga) {
                return view('product-detail', ['product' => $product]);
            }
        }

        abort(404);
    }

    private function products(): array
    {
        return [
            ['name' => 'Sepatu', 'price' => 300000],
            ['name' => 'Baju', 'price' => 200000],
            ['name' => 'Celana', 'price' => 150000],
        ];
    }
}
