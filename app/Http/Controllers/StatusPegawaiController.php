<?php

namespace App\Http\Controllers;

use App\Models\StatusPegawais;
use Illuminate\Http\Request;

class StatusPegawaiController extends Controller
{
    public function index()
    {
        $statuspegawai = StatusPegawais::all(); // Fetch all status pegawai
        return view('/pegawai/biodata/create', compact('statuspegawai'));
    }
}
