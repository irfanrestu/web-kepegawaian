<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\RiwayatKepegawaian;

class Unit extends Model
{
    protected $table = 'units';
    protected $primaryKey = 'unit_id';
    protected $fillable = [
        'nama_unit',
        'alamat_unit',
        'telp_unit',
        'email_unit',
    ];
    public function riwayatKepegawaian()
    {
        return $this->hasMany(RiwayatKepegawaian::class, 'id_unit', 'unit_id');
    }
}
