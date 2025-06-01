<?php

namespace App\Http\Controllers;

use App\Models\jadwal;
use App\Models\MataKuliah;
use App\Models\Sesi;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwal = Jadwal::all();
        return view('jadwal.index', compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jadwal = Jadwal::all();
        $matakuliah = MataKuliah::all();
        $sesi = Sesi::all();
        return view('jadwal.create', compact('jadwal', 'matakuliah', 'sesi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tahun_akademik' => 'required',
            'kode_smt' => 'required',
            'kelas' => 'required',
            'sesi_id' => 'required',
            'matakuliah_id' => 'required',
        ]);

        Jadwal::create([
            'tahun_akademik' => $request->tahun_akademik,
            'kode_smt' => $request->kode_smt,
            'kelas' => $request->kelas,
            'sesi_id' => $request->sesi_id,
            'matakuliah_id' => $request->matakuliah_id,
        ]);

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(jadwal $jadwal)
    {
        return view('jadwal.show', compact('jadwal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(jadwal $jadwal)
    {
        $matakuliah = MataKuliah::all();
        $sesi = Sesi::all();
        return view('jadwal.edit', compact('jadwal', 'matakuliah', 'sesi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, jadwal $jadwal)
    {
        $request->validate([
            'tahun_akademik' => 'required',
            'kode_smt' => 'required',
            'kelas' => 'required',
            'sesi_id' => 'required',
            'matakuliah_id' => 'required',
        ]);

        $jadwal->update([
            'tahun_akademik' => $request->tahun_akademik,
            'kode_smt' => $request->kode_smt,
            'kelas' => $request->kelas,
            'sesi_id' => $request->sesi_id,
            'matakuliah_id' => $request->matakuliah_id,
        ]);

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diupdate');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(jadwal $jadwal)
    {
        $jadwal = Jadwal::findOrFail($jadwal);
        $jadwal->delete();

        return redirect()->route('jadwal.index')
            ->with('success', 'Jadwal berhasil dihapus');
    }
}
