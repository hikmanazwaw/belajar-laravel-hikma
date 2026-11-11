@extends('layouts.olshop')

@section('title', 'Product')

@section('content')
    <p class="eyebrow">Koleksi kami</p>
    <h1>Product</h1>
    <p class="lead">Pilih produk untuk melihat detail harganya.</p>

    <div class="product-grid">
        @foreach ($products as $product)
            <article class="product-card">
                <h2>{{ $product['name'] }}</h2>
                <p class="price">Rp {{ number_format($product['price'], 0, ',', '.') }}</p>
                <a
                    class="text-link"
                    href="{{ route('product.detail', ['harga' => $product['price']]) }}"
                >Lihat detail &rarr;</a>
            </article>
        @endforeach
    </div>
@endsection
