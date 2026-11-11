@extends('layouts.olshop')

@section('title', 'Home')

@section('content')
    <section class="hero">
        <p class="eyebrow">Selamat datang</p>
        <h1>Selamat Datang di Olshop Kami</h1>
        <p class="lead">Temukan pilihan produk favorit untuk menemani aktivitas Anda setiap hari.</p>
        <a class="button" href="{{ route('product') }}">Lihat Produk</a>
    </section>
@endsection
