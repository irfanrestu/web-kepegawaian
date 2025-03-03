<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\KategoriDokumen;
use App\Models\Pegawai;

class Dokumen extends Model
{
    protected $primaryKey = 'dokumen_id';
    protected $fillable = [
        'id_pegawai',
        'id_kategori_dokumen',
        'file_dokumen',
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai', 'pegawai_id');
    }

    public function kategoriDokumen()
    {
        return $this->belongsTo(KategoriDokumen::class, 'id_kategori_dokumen', 'kategori_dokumen_id');
    }

    public function takePdf()
    {
        return "/storage/" . $this->file_dokumen;
        // return $this->file;
    }
}
