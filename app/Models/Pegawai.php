<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\database\Eloquent\Relations\BelongsTo;

use App\Models\StatusPegawais;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Dokumen;
use App\Models\RiwayatPendidikan;
use App\Models\RiwayatJabatan;

class Pegawai extends Model
{

    use HasFactory;
    protected $table = 'pegawais';
    protected $primaryKey = 'pegawai_id';

    protected $fillable = [
        'nama_lengkap',
        'gelar_depan',
        'gelar_belakang',
        'file_foto',
        'nip',
        'npwp',
        'no_karpeg',
        'no_bpjs',
        'no_kartu_keluarga',
        'no_nik',
        'id_status_pegawai',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'id_agama',
        'no_hp',
        'jenis_kelamin',
        'id_agama',
        'no_hp',
        'email',
        'alamat_lengkap',
        'rt',
        'rw',
        'kelurahan',
        'kecamatan',
        'kota_kabupaten',
        'kode_pos',
        'homebase',
    ];

    public function statuspegawai(): BelongsTo
    {
        return $this->belongsTo(StatusPegawais::class, 'id_status_pegawai', 'status_pegawai_id');
    }

    public function agama(): BelongsTo
    {
        return $this->belongsTo(Agama::class, 'id_agama', 'agama_id');
    }

    public function dokumens()
    {
        return $this->hasMany(Dokumen::class, 'id_pegawai', 'pegawai_id');
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id_pegawai', 'pegawai_id');
    }

    public function riwayatPendidikan()
    {
        return $this->hasMany(RiwayatPendidikan::class, 'id_pegawai', 'pegawai_id');
    }
}
