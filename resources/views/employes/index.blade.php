@extends('layouts.dashboard')

@section('title', 'Data Pegawai')

@section('content')
    <div class="page-heading">
        <div>
            <h1>Data Pegawai</h1>
            <p>Daftar pegawai beserta alamat, gender, dan gaji.</p>
        </div>
        <a class="button" href="{{ route('employes.create') }}">Tambah Pegawai</a>
    </div>

    @if (session('status'))
        <p class="status-message" role="status">{{ session('status') }}</p>
    @endif

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Gaji</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($employes as $employe)
                    <tr>
                        <td>{{ $employe->nama ?? '-' }}</td>
                        <td>{{ $employe->alamat ?? '-' }}</td>
                        <td>{{ $employe->gender ?? '-' }}</td>
                        <td>
                            @if (is_null($employe->gaji))
                                -
                            @else
                                Rp {{ number_format($employe->gaji, 0, ',', '.') }}
                            @endif
                        </td>
                        <td>
                            <div class="actions">
                                <a class="button button-secondary" href="{{ route('employes.show', $employe) }}">Detail</a>
                                <a class="button button-secondary" href="{{ route('employes.edit', $employe) }}">Ubah</a>
                                <form method="POST" action="{{ route('employes.destroy', $employe) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="button button-danger" type="submit">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Belum ada data pegawai.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination">{{ $employes->links() }}</div>
@endsection
