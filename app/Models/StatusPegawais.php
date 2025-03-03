<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use illuminate\database\Eloquent\Relations\HasMany;
use App\Models\Pegawai;

class StatusPegawais extends Model
{
   
    protected $fillable = [
        'status_pegawai_id',
        'status_pegawai'
    ];

    public function pegawais(): HasMany
    {
        return $this->hasMany(Pegawai::class, 'status_pegawai_id','status_pegawai_id');
    }
}
 