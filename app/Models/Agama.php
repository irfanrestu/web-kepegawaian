<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use illuminate\database\Eloquent\Relations\HasMany;

class Agama extends Model
{
    protected $table = 'agamas'; // Explicitly define the table name
    
    protected $primaryKey = 'agama_id';
    protected $fillable = [
        'agama_id',
        'nama_agama'
    ];

    public function pegawais(): HasMany
    {
        return $this->hasMany(Pegawai::class, 'id_agama','agama_id');
    }
}
