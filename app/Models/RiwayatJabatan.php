<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatJabatan extends Model
{
    public function takePdf()
    {
        return "/storage/" . $this->file;
        // return $this->file;
    }
}
