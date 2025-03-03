<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dokumen;

class Pegawai extends Model
{

    use HasFactory;
    protected $fillable = [
        'pegawai_id',
        'nama',
        'pegawai_id',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'email',
        'no_tlp',
        'alamat',
        'foto'
    ];

    public function dokumens()
    {
        return $this->hasMany(Dokumen::class, 'id_pegawai', 'pegawai_id');
    }
}
