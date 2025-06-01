<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa'; // nama tabel jika tidak sesuai dengan nama model
    public function prodi()
    {
        return $this->belongsTo(Prodi::class,'prodi_id', 'id');
    }

    protected $fillable = [
        'npm',
        'nama',
        'jk',
        'tanggal_lahir',
        'tempat_lahir',
        'asal_sma',
        'prodi_id',
        'foto',
    ];
}

