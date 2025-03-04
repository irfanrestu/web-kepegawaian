<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\RiwayatPendidikan;

class JenjangPendidikan extends Model
{
    protected $table = 'jenjang_pendidikans';
    protected $fillable = [
        'jenjang_pendidikan_id',
        'jenjang_pendidikan',
    ];
    public function riwayatPendidikan()
    {
        return $this->hasMany(RiwayatPendidikan::class, 'id_jenjang_pendidikan', 'jenjang_pendidikan_id');
    }
}
