<?php

namespace App\Http\Controllers;

use App\Models\Prodi;//penting
use Illuminate\Http\Request;
use App\Models\Fakultas;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // panggil model prodi menggunakan eloquent
        $prodi = Prodi::all(); // perintah sql select * from prodi
        //dd($prodi);
        return view('prodi.index')->with('prodi',$prodi);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fakultas = Fakultas::all();
        return view('prodi.create', compact('fakultas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validasi input
        $input = $request->validate([
            'nama' => 'required|unique:prodi',
            'singkatan' => 'required|max:5',
            'kaprodi' => 'required',
            'sekretaris' => 'required',
            'fakultas_id' => 'required',
        ]);
        //simpan data ke tabel fakultas
        Prodi::create($input);

        return redirect()->route('prodi.index')->with('succes', 'Program Studi Berhasil Ditambahkan.');
    

    }

    /**
     * Display the specified resource.
     */
   public function show(Prodi $prodi)
    {
        //
       return view('prodi.show', compact('prodi')); // mengirimkan data prodi dan fakultas ke view prodi.show
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prodi $prodi)
    {
        $fakultas = Fakultas::all(); // ambil semua data fakultas
        return view('prodi.edit', compact('prodi','fakultas')); // mengirimkan data prodi dan fakultas ke view prodi.edit
        //mengubah data prodi dan fakultas
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prodi $prodi)
    {
        $input = $request->validate(
            [
                'nama' => 'required',
                'singkatan' => 'required|max:5',
                'kaprodi' => 'required',
                'sekretaris' => 'required',
                'fakultas_id' => 'required',
            ]
        );
        $prodi->update($input);
        // redirect ke route prodi.index
        return redirect()->route('prodi.index')->with('success', 'Prodi Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($prodi)
    {
        $prodi = Prodi ::findOrFail($prodi);
        //dd($prodi);

        //hapus data fakults
        $prodi -> delete();

        //redirect ke route fakultas index
        return redirect()->route('prodi.index')->with('success','Prodi berhasil dihapus');
    }
}
