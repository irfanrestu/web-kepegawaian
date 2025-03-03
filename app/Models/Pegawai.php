<?php

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\database\Eloquent\Relations\BelongsTo;

use App\Models\StatusPegawais;

class Pegawai extends Model
{
    protected $primaryKey = 'pegawai_id';
    use HasFactory;
    protected $fillable = [
        'pegawai_id',
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
        return $this->belongsTo(StatusPegawais::class,'status_pegawai_id','status_pegawai_id');
    }
}
