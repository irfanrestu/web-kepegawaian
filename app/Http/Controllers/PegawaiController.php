<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\StatusPegawais;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $pegawai = Pegawai::where('nama', 'LIKE', '%' . $request->cari . '%')->get();
        } else {
        
        if($request->has('cari')){
            $pegawai = Pegawai::where('nama_lengkap','LIKE','%'.$request->cari.'%')->get();
        }else{
            $pegawai = Pegawai::all();
        }


        return view('pegawai.biodata.index', compact('pegawai'));
    }

    public function create()
    {

        return view('pegawai.biodata.create');

    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required|string|max:225',
                'jenis_kelamin' => 'required|string|max:225',
                'tempat_lahir' => 'required|string|max:225',
                'tanggal_lahir' => 'required|string|max:225',
                'email' => 'required|string|max:225',
                'no_tlp' => 'required|string|max:225',
                'alamat' => 'required|string|max:225',
            ],
            [
                'nama.required' => 'Nama Wajib diisi',
                'nama.max' => 'Nama maksimal 45 karakter',
                'jenis_kelamin.required' => 'Nama Wajib diisi',
                'jenis_kelamin.max' => 'Nama maksimal 45 karakter',
                'tempat_lahir.required' => 'Nama Wajib diisi',
                'tempat_lahir.max' => 'Nama maksimal 45 karakter',
                'tanggal_lahir.required' => 'Nama Wajib diisi',
                'tanggal_lahir.max' => 'Nama maksimal 45 karakter',
                'email.required' => 'Nama Wajib diisi',
                'email.max' => 'Nama maksimal 45 karakter',
                'no_tlp.required' => 'Nama Wajib diisi',
                'no.tlp.max' => 'Nama maksimal 45 karakter',
                'alamat.required' => 'Nama Wajib diisi',
                'alamat.max' => 'Nama maksimal 45 karakter',
            ]
        );

        Pegawai::create($request->all());

        return redirect('/pegawai/biodata')->with('status', 'Pegawai berhasil dibuat');
    }


    public function edit(Pegawai $pegawai_id)
    {

        return view('pegawai.biodata.edit', compact('id'));

        return view('pegawai.biodata.edit', compact('pegawai_id')); 
        
    }

    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'nama' => 'required|string|max:225',
                'jenis_kelamin' => 'required|string|max:225',
                'tempat_lahir' => 'required|string|max:225',
                'tanggal_lahir' => 'required|string|max:225',
                'email' => 'required|string|max:225',
                'no_tlp' => 'required|string|max:225',
                'alamat' => 'required|string|max:225',
            ],
            [
                'nama.required' => 'Nama Wajib diisi',
                'nama.max' => 'Nama maksimal 45 karakter',
                'jenis_kelamin.required' => 'Nama Wajib diisi',
                'jenis_kelamin.max' => 'Nama maksimal 45 karakter',
                'tempat_lahir.required' => 'Nama Wajib diisi',
                'tempat_lahir.max' => 'Nama maksimal 45 karakter',
                'tanggal_lahir.required' => 'Nama Wajib diisi',
                'tanggal_lahir.max' => 'Nama maksimal 45 karakter',
                'email.required' => 'Nama Wajib diisi',
                'email.max' => 'Nama maksimal 45 karakter',
                'no_tlp.required' => 'Nama Wajib diisi',
                'no.tlp.max' => 'Nama maksimal 45 karakter',
                'alamat.required' => 'Nama Wajib diisi',
                'alamat.max' => 'Nama maksimal 45 karakter',
            ]
        );

        DB::table('pegawai')->where('id', $id)->update([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'email' => $request->email,
            'no_tlp' => $request->no_tlp,
            'alamat' => $request->alamat,
        DB::table('pegawai')->where('pegawai_id',$id)->update([
            'nama'=>$request->nama,
            'jenis_kelamin'=>$request->jenis_kelamin,
            'tempat_lahir'=>$request->tempat_lahir,
            'tanggal_lahir'=>$request->tanggal_lahir,
            'email'=>$request->email,
            'no_tlp'=>$request->no_tlp,
            'alamat'=>$request->alamat,
        ]);

        return redirect()->route('biodata.index');
    }

    public function destroy(Pegawai $id)
    {
        $id->delete();

        return redirect()->route('biodata.index')
            ->with('success', 'Data berhasil di hapus');

    }

    public function profile($id)
    {
        return view('pegawai.biodata.profile');
    }

    //Bagian Data_pegawai Tabs
    public function index1(Request $request)
    {
        if ($request->has('cari')) {
            $pegawai = Pegawai::where('nama', 'LIKE', '%' . $request->cari . '%')->get();
        } else {
            $pegawai = Pegawai::all();
        }


        return view('data_pegawai.index', compact('pegawai'));
    }

    public function index2()
    {
        //
    }


}
