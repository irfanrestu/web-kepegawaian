<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\Post;
use App\Models\Role;
use App\Models\StatusPegawais;
use App\Models\User;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function index(Post $post)
    {
        $rolelist = Role::all();
        $userlist = User::all();
        $liststatuspegawai = StatusPegawais::all();
        $listagama = Agama::all();
        return view('informasi.index', compact('post', 'rolelist','userlist','liststatuspegawai','listagama'));
    }
}
