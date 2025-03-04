<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use illuminate\database\Eloquent\Relations\HasMany;
use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StatusPegawais extends Model
{
    use HasFactory;

    protected $table = 'status_pegawais'; 
    
    protected $primaryKey = 'status_pegawai_id';
    protected $fillable = [
        'status_pegawai_id',
        'status_pegawai'
    ];

    public function pegawais(): HasMany
    {
        return $this->hasMany(Pegawai::class,'id_status_pegawai', 'status_pegawai_id');
    }
}
 