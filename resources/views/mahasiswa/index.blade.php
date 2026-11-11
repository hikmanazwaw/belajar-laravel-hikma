@extends('layouts.olshop')

@section('title', 'Daftar Mahasiswa')

@section('content')
    <p class="eyebrow">Data akademik</p>
    <h1>Daftar Mahasiswa</h1>
    <p class="lead">Daftar mahasiswa beserta alamat dan gender.</p>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Gender</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswa as $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['address'] }}</td>
                        <td>{{ $item['gender'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
