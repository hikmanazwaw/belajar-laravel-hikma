@extends('layouts.dashboard')

@section('title', 'Ubah Pegawai')

@section('content')
//membuat edit data CRUD
    <div class="page-heading">
        <div>
            <h1>Ubah Data Pegawai</h1>
            <p>Perbarui informasi {{ $employe->nama }}.</p>
        </div>
        <a class="button button-secondary" href="{{ route('employes.index') }}">Kembali</a>
    </div>

    @include('employes._form', [
        'action' => route('employes.update', $employe),
        'employe' => $employe,
        'editing' => true,
    ])
@endsection
