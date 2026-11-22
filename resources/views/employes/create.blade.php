@extends('layouts.dashboard')

@section('title', 'Tambah Pegawai')

@section('content')
    <div class="page-heading">
        <div>
            <h1>Tambah Pegawai</h1>
            <p>Masukkan informasi pegawai baru.</p>
        </div>
        <a class="button button-secondary" href="{{ route('employes.index') }}">Kembali</a>
    </div>

    @include('employes._form', [
        'action' => route('employes.store'),
        'employe' => null,
        'editing' => false,
    ])
@endsection
