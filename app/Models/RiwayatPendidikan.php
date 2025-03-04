<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pegawai;
use App\Models\JenjangPendidikan;
use App\Models\Jurusan;

class RiwayatPendidikan extends Model
{
    protected $primaryKey = 'riwayat_pendidikan_id';
    protected $fillable = [
        'id_pegawai',
        'id_jenjang_pendidikan',
        'id_jurusan',
        'nama_sekolah',
        'file_ijazah',
        'file_transkrip',
        'tahun_lulus',
    ];
    public function getRouteKeyName()
    {
        return 'riwayat_pendidikan_id';
    }
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai', 'pegawai_id');
    }

    public function jenjangPendidikan()
    {
        return $this->belongsTo(JenjangPendidikan::class, 'id_jenjang_pendidikan', 'jenjang_pendidikan_id');
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan', 'jurusan_id');
    }
}
