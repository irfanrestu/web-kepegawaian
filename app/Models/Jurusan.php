<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\RiwayatPendidikan;

class Jurusan extends Model
{
    protected $table = 'jurusans';
    protected $fillable = [
        'jurusan_id',
        'nama_jurusan',
    ];
    public function riwayatPendidikan()
    {
        return $this->hasMany(RiwayatPendidikan::class, 'id_jurusan', 'jurusan_id');
    }
}
