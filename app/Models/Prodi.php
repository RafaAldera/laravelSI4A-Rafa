<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    
    protected $table = 'prodi';//nama tabel jika tidak sesuai dengan nama model

    protected $fillable=
    ['nama','singkatan','kaprodi','sekretaris','fakultas_id'];

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class,'fakultas_id', 'id');
    }
    public function prodi()
    {
        return $this->hasMany(Mahasiswa::class,'prodi_id', 'id');
    }
}
