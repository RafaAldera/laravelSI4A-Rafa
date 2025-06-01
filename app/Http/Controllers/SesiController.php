<?php

namespace App\Http\Controllers;

use App\Models\sesi;
use Illuminate\Http\Request;

class SesiController extends Controller
{
    public function index()
    {
        $sesi = Sesi::all();
        return view('sesi.index', compact('sesi'));
    }

    public function create()
    {
        return view('sesi.create');
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'nama' => 'required'
        ]);

        Sesi::create($input);

        return redirect()->route('sesi.index')
            ->with('success', 'Sesi berhasil ditambahkan');
    }

    public function show($sesi)
    {
        $sesi = Sesi::findOrFail($sesi);
        return view('sesi.show', compact('sesi'));
    }


    public function edit(Sesi $sesi)
    {
        return view('sesi.edit', compact('sesi'));
    }

    public function update(Request $request, Sesi $sesi)
    {
        $input = $request->validate(['nama' => 'required']);
        $sesi->update($input);

        return redirect()->route('sesi.index')
            ->with('success', 'Sesi berhasil diupdate');
    }

    public function destroy($sesi)
    {
        $sesi = Sesi::findorfail($sesi);
        //dd($sesi);

        $sesi->delete();

        return redirect()->route('sesi.index')
            ->with('success', 'Sesi berhasil dihapus');
    }
}
