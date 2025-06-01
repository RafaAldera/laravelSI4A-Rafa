<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        //sql query untuk mengambil data dari tabel mahasiswa
        $mahasiswaprodi = DB::select('
        SELECT prodi.nama,COUNT(*) as jumlah 
        FROM mahasiswa
        JOIN prodi On mahasiswa.prodi_id = prodi.id
        GROUP BY prodi.nama;
        ');
        return view('dashboard.index', compact('mahasiswaprodi'));
    }
}
