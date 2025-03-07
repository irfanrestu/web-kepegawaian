<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\RiwayatKepegawaian;
use App\Models\JenisJabatan;

class RiwayatJabatan extends Model
{
    protected $table = 'riwayat_jabatans';
    protected $primaryKey = 'riwayat_jabatan_id';
    protected $fillable = [
        'id_jenis_jabatan',
        'nama_jabatan',
        'tmt_jabatan',
        'status_jabatan',
        'dokumen_jabatan',
    ];
    public function jenisJabatan()
    {
        return $this->belongsTo(JenisJabatan::class, 'id_jenis_jabatan', 'jenis_jabatan_id');
    }
    public function riwayatKepegawaian()
    {
        return $this->hasMany(RiwayatKepegawaian::class, 'id_riwayat_jabatan', 'riwayat_jabatan_id');
    }
}
