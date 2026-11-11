@extends('layouts.olshop')

@section('title', 'Kalkulator Segitiga')

@section('content')
    <p class="eyebrow">Kalkulator</p>
    <h1>Luas Segitiga</h1>
    <p class="lead">Masukkan alas dan tinggi untuk menghitung luas segitiga.</p>

    <form class="form-card" method="POST" action="{{ route('kalkulator.segitiga.hitung') }}">
        @csrf
        <div class="form-field">
            <label for="alas">Alas</label>
            <input
                id="alas"
                name="alas"
                type="number"
                min="0.01"
                step="any"
                value="{{ old('alas', $alas ?? '') }}"
                required
                aria-describedby="alas-error"
            >
            @error('alas')
                <p class="field-error" id="alas-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-field">
            <label for="tinggi">Tinggi</label>
            <input
                id="tinggi"
                name="tinggi"
                type="number"
                min="0.01"
                step="any"
                value="{{ old('tinggi', $tinggi ?? '') }}"
                required
                aria-describedby="tinggi-error"
            >
            @error('tinggi')
                <p class="field-error" id="tinggi-error">{{ $message }}</p>
            @enderror
        </div>

        <button class="button" type="submit">Hitung Luas</button>
    </form>

    @isset($luas)
        <section class="result-card" aria-live="polite">
            <p class="eyebrow">Hasil perhitungan</p>
            <p>Luas = ½ × {{ $alas }} × {{ $tinggi }}</p>
            <p class="result-value">{{ number_format($luas, 2, ',', '.') }} satuan²</p>
        </section>
    @endisset
@endsection
