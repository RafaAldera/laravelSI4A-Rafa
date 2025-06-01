<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jadwal extends Model
{
    protected $table = 'jadwal';

    protected $fillable = [
        'tahun_akademik',
        'kode_smt',
        'kelas',
        'sesi_id',
        'matakuliah_id',
    ];

    public function sesi()
    {
        return $this->belongsTo(Sesi::class);
    }

    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class);
    }
}
