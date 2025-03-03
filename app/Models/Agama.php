<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use illuminate\database\Eloquent\Relations\HasMany;

class Agama extends Model
{
    protected $fillable = [
        'status_pegawai_id',
        'status_pegawai'
    ];

    public function pegawais(): HasMany
    {
        return $this->hasMany(Pegawai::class, 'id_agama','agama_id');
    }
}
