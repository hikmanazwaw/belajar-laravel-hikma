<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class MahasiswaController extends Controller
{
    public function index(): View
    {
        /** @var array<int, array{name: string, address: string, gender: string}> $mahasiswa */
        $mahasiswa = [
            ['name' => 'Anton', 'address' => 'Surabaya', 'gender' => 'L'],
            ['name' => 'Budi', 'address' => 'Kediri', 'gender' => 'L'],
            ['name' => 'Ani', 'address' => 'Malang', 'gender' => 'P'],
            ['name' => 'Sinta', 'address' => 'Surabaya', 'gender' => 'P'],
        ];

        return view('mahasiswa.index', ['mahasiswa' => $mahasiswa]);
    }
}
