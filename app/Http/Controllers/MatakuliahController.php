<?php

namespace App\Http\Controllers;

use App\Models\matakuliah;
use App\Models\Prodi;
use App\Models\Sesi;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matakuliah = MataKuliah::all();
        return view('matakuliah.index', compact('matakuliah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $matakuliah = MataKuliah::all();
        $prodi = Prodi::all();
        return view('matakuliah.create', compact('matakuliah', 'prodi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $input = $request->validate([
            'nama' => 'required|unique:matakuliah',
            'kode_mk' => 'required|max:10',
            'prodi_id' => 'required|exists:prodi,id',
        ]);

        MataKuliah::create($input);

        return redirect()->route('matakuliah.index')
            ->with('success', 'Mata Kuliah berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(MataKuliah $matakuliah)
    {
        $prodi = Prodi::all();
        return view('matakuliah.show', compact('matakuliah', 'prodi'));
    }





    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $matakuliah = MataKuliah::findOrFail($id);
        $sesi = Sesi::all();
        $matakuliahList = MataKuliah::all();

        return view('matakuliah.edit', compact('matakuliah', 'sesi', 'matakuliahList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MataKuliah $matakuliah)
    {
        $request->validate([
            'tahun_akademik' => 'required|string|max:10',
            'kode_smt' => 'required|string|max:5',
            'kelas' => 'required|string|max:5',
            'sesi_id' => 'required|exists:sesi,id',
            'matakuliah_id' => 'required|exists:matakuliah,id',
        ]);

        $matakuliah->update($request->all());

        return redirect()->route('matakuliah.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MataKuliah $matakuliah)
    {
        $matakuliah->delete();
        return redirect()->route('matakuliah.index')->with('success', 'Mata Kuliah berhasil dihapus.');
    }
}