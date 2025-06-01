<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = mahasiswa::all();//perintah sql select * from maha
        // dd($mahasiswa);//dump and die
        return view('mahasiswa.index')->with('mahasiwa',$mahasiswa);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $prodi = Prodi::all(); // ambil semua data prodi
        return view('mahasiswa.create',compact('prodi'));// mengirimkan data prodi ke view mahasiswa.create
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate(
        [
            'npm' => 'required|unique:mahasiswa',
            'nama' => 'required',
            'jk' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'asal_sma' => 'required',
            'prodi_id' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->file('foto')) {
            $file = $request->file('foto');// ambil file foto
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);// simpan file ke folder images
            $input['foto'] = $filename;// simpan nama file ke database
        }

        Mahasiswa::create($input);
        // redirect ke route mahasiswa.index
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa Berhasil Ditambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.show', compact('mahasiswa'));
    }

   public function edit(Mahasiswa $mahasiswa)
    {
        $prodi = Prodi::all(); // ambil semua data prodi
        return view('mahasiswa.edit', compact('mahasiswa', 'prodi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        //
        $input = $request->validate([
            'npm' => 'required|unique:mahasiswa,npm,' . $mahasiswa->id,
            'nama' => 'required',
            'jk' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'asal_sma' => 'required',
            'prodi_id' => 'required',
        ]);
        if ($request->file('foto')) {
            // jika ada file foto yang diupload
            if ($mahasiswa->foto) {
                // jika mahasiswa sudah memiliki foto, hapus foto lama
                $fotoPath = public_path('images/' . $mahasiswa->foto);
                if (file_exists($fotoPath)) {
                    unlink($fotoPath);
                }
            }
            $file = $request->file('foto'); // ambil file foto
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename); // simpan file ke folder images
            $input['foto'] = $filename; // simpan nama file ke database
        }

        $mahasiswa->update($input);
        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diupdate!');
    }

    public function destroy($mahasiswa)
    {
        $mahasiswa=Mahasiswa::findOrFail($mahasiswa);
        // dd($mahasiswa);

        if ($mahasiswa->foto) {
            $fotoPath = public_path('image/' .
            $mahasiswa->foto);
            if (file_exists($fotoPath)) {
                unlink($fotoPath);
            }
        }

        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil dihapus');
    }
}
