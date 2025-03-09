<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\Pegawai;
use App\Models\Role;
use App\Models\StatusPegawais;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $liststatuspegawai = StatusPegawais::all();
        $listagama = Agama::all();
        $rolelist = Role::all();
        return view('profile_pribadi.index', compact('user','liststatuspegawai','listagama','rolelist'));
    }
}
