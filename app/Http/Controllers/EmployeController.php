<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    public function index(): View
    {
        return view('employes.index', [
            'employes' => Employe::query()->orderBy('nama')->paginate(10),
        ]);
    }

    public function create(): View
    {
        return view('employes.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Employe::create($request->validate($this->rules()));

        return redirect()
            ->route('employes.index')
            ->with('status', 'Data pegawai berhasil ditambahkan.');
    }

    public function show(Employe $employe): View
    {
        return view('employes.show', ['employe' => $employe]);
    }

    public function edit(Employe $employe): View
    {
        return view('employes.edit', ['employe' => $employe]);
    }

    public function update(Request $request, Employe $employe): RedirectResponse
    {
        $employe->update($request->validate($this->rules()));

        return redirect()
            ->route('employes.index')
            ->with('status', 'Data pegawai berhasil diperbarui.');
    }

    public function destroy(Employe $employe): RedirectResponse
    {
        $employe->delete();

        return redirect()
            ->route('employes.index')
            ->with('status', 'Data pegawai berhasil dihapus.');
    }

    /**
     * @return array<string, list<string>>
     */
    private function rules(): array
    {
        return [
            'nama' => ['required', 'string', 'max:30'],
            'alamat' => ['required', 'string'],
            'gender' => ['required', 'in:L,P'],
            'gaji' => ['required', 'integer', 'min:0', 'max:2147483647'],
        ];
    }
}
