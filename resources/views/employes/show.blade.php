@extends('layouts.dashboard')

@section('title', 'Detail Pegawai')

@section('content')
//membuat show data CRUD
    <div class="page-heading">
        <div>
            <h1>Detail Pegawai</h1>
            <p>Informasi lengkap {{ $employe->nama ?? 'pegawai' }}.</p>
        </div>
        <div class="actions">
            <a class="button button-secondary" href="{{ route('employes.index') }}">Kembali</a>
            <a class="button" href="{{ route('employes.edit', $employe) }}">Ubah</a>
        </div>
    </div>

    <section class="detail-card" aria-label="Informasi pegawai">
        <dl class="detail-list">
            <dt>Nama</dt>
            <dd>{{ $employe->nama ?? '-' }}</dd>

            <dt>Alamat</dt>
            <dd>{{ $employe->alamat ?? '-' }}</dd>

            <dt>Gender</dt>
            <dd>
                @switch($employe->gender)
                    @case('L')
                        Laki-laki
                        @break
                    @case('P')
                        Perempuan
                        @break
                    @default
                        -
                @endswitch
            </dd>

            <dt>Gaji</dt>
            <dd>
                @if (is_null($employe->gaji))
                    -
                @else
                    Rp {{ number_format($employe->gaji, 0, ',', '.') }}
                @endif
            </dd>
        </dl>
    </section>
@endsection
