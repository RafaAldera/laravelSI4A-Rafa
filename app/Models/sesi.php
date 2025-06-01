<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class sesi extends Model
{
    protected $table = 'sesi';
    protected $fillable = ['nama'];

    public function jadwal(): HasMany
    {
        return $this->hasMany(Jadwal::class);
    }
}
