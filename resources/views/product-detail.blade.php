@extends('layouts.olshop')

@section('title', 'Detail Produk')

@section('content')
    <p class="eyebrow">Detail produk</p>
    <h1>{{ $product['name'] }}</h1>
    <section class="detail-card" aria-label="Harga produk">
        <p class="price">Harga</p>
        <p class="detail-price">Rp {{ number_format($product['price'], 0, ',', '.') }}</p>
        <a class="text-link" href="{{ route('product') }}">&larr; Kembali ke produk</a>
    </section>
@endsection
