<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\RiwayatKepegawaian;

class RiwayatGolongan extends Model
{
    protected $table = 'riwayat_golongans';
    protected $primaryKey = 'riwayat_golongan_id';
    protected $fillable = [
        'pangkat_golongan',
        'jenis_kenaikan',
        'masa_kerja_tahun',
        'masa_kerja_bulan',
        'tmt_awal',
        'tmt_akhir',
        'perjanjian_ke',
        'status_perjanjian',
        'dokumen_sk',
        'dokumen_perjanjian',
    ];

    public function riwayatKepegawaian()
    {
        return $this->hasMany(RiwayatKepegawaian::class, 'id_riwayat_golongan', 'riwayat_golongan_id');
    }
}
