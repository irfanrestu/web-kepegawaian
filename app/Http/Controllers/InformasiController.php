<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\Pegawai;
use App\Models\Post;
use App\Models\Role;
use App\Models\StatusPegawais;
use App\Models\User;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $role = Role::all();
        $user = User::all();
        $statuspegawai = StatusPegawais::all();
        $agama = Agama::all();
        $pegawai = Pegawai::all();
        return view('informasi.index', compact('posts', 'role','user','statuspegawai','pegawai'));
    }
}
