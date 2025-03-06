<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\RiwayatJabatan;

class JenisJabatan extends Model
{
    protected $table = 'jenis_jabatans';
    protected $primaryKey = 'jenis_jabatan_id';
    protected $fillable = [
        'jenis_jabatan',
    ];

    public function riwayatJabatan()
    {
        return $this->hasMany(RiwayatJabatan::class, 'id_jenis_jabatan', 'jenis_jabatan_id');
    }
}
