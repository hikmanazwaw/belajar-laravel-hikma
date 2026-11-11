<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class KalkulatorController extends Controller
{
    public function segitiga(): View
    {
        return view('kalkulator.segitiga');
    }

    public function hitungSegitiga(Request $request): View
    {
        $validated = $request->validate([
            'alas' => ['required', 'numeric', 'gt:0'],
            'tinggi' => ['required', 'numeric', 'gt:0'],
        ], [
            'alas.required' => 'Alas wajib diisi.',
            'alas.numeric' => 'Alas harus berupa angka.',
            'alas.gt' => 'Alas harus lebih besar dari 0.',
            'tinggi.required' => 'Tinggi wajib diisi.',
            'tinggi.numeric' => 'Tinggi harus berupa angka.',
            'tinggi.gt' => 'Tinggi harus lebih besar dari 0.',
        ]);

        $alas = (float) $validated['alas'];
        $tinggi = (float) $validated['tinggi'];

        return view('kalkulator.segitiga', [
            'alas' => $alas,
            'tinggi' => $tinggi,
            'luas' => ($alas * $tinggi) / 2,
        ]);
    }
}
