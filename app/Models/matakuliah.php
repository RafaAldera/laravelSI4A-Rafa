<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class matakuliah extends Model
{
    protected $table = 'matakuliah';

    protected $fillable = ['nama', 'kode_mk', 'prodi_id'];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }
}
