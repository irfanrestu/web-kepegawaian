<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Pegawai;
use App\Models\RiwayatJabatan;
use App\Models\RiwayatGolongan;
use App\Models\Unit;

class RiwayatKepegawaian extends Model
{

    protected $primaryKey = 'riwayat_kepegawaian_id';
    protected $fillable = [
        'id_pegawai',
        'id_riwayat_jabatan',
        'id_riwayat_golongan',
        'id_unit',
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai', 'pegawai_id');
    }

    public function riwayatJabatan()
    {
        return $this->belongsTo(RiwayatJabatan::class, 'id_riwayat_jabatan', 'riwayat_jabatan_id');
    }

    public function riwayatGolongan()
    {
        return $this->belongsTo(RiwayatGolongan::class, 'id_riwayat_golongan', 'riwayat_golongan_id');
    }

    public function Unit()
    {
        return $this->belongsTo(Unit::class, 'id_unit', 'unit_id');
    }
}
