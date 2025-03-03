<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Dokumen;

class KategoriDokumen extends Model
{
    protected $fillable = [
        'kategori_dokumen_id',
        'kategori_dokumen',
    ];
    public function dokumens()
    {
        return $this->hasMany(Dokumen::class, 'id_kategori_dokumen', 'kategori_dokumen_id');
    }
}
