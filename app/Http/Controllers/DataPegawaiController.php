<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\JenisJabatan;
use App\Models\JenjangPendidikan;
use App\Models\Jurusan;
use App\Models\KategoriDokumen;
use App\Models\Pegawai;
use App\Models\RiwayatGolongan;
use App\Models\RiwayatJabatan;
use App\Models\RiwayatKepegawaian;
use App\Models\RiwayatPendidikan;
use App\Models\Role;
use App\Models\StatusPegawais;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;

class DataPegawaiController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $pegawai = Pegawai::where('nama', 'LIKE', '%' . $request->cari . '%')->get();
        } else {
            $pegawai = Pegawai::all();
        }

        return view('data_pegawai.index', compact('pegawai'));
    }

    public function pengaturan(Pegawai $pegawai) 
    {
        $rolelist = Role::all();
        $userlist = User::all();
        $liststatuspegawai = StatusPegawais::all();
        $listagama = Agama::all();

        //Riwayat Kepegawaian
         // Cek apakah user adalah Admin
        
            // Pegawai hanya bisa melihat data miliknya sendiri
            $riwayatKepegawaians = RiwayatKepegawaian::whereHas('riwayatJabatan', function ($query) use ($pegawai) {
                $query->where('id_pegawai', $pegawai->pegawai_id);
            })
            ->with(['riwayatJabatan', 'riwayatGolongan', 'unit'])
            ->get();
            $showForm = true;
            $pegawais = null;
        

        $riwayatJabatans = RiwayatJabatan::all();
        $riwayatGolongans = RiwayatGolongan::all();
        $units = Unit::all();
        $jenisJabatans = JenisJabatan::all();
        $riwayatJabatans = RiwayatJabatan::with('jenisJabatan')->get();

        //Riwayat Pendidikan
        $jenjangPendidikans = JenjangPendidikan::all();
        $jurusans = Jurusan::all();

            $riwayatPendidikan = RiwayatPendidikan::where('id_pegawai', $pegawai->pegawai_id)
                ->with('jenjangPendidikan', 'jurusan')
                ->get();
            $pegawais = null; // Tidak perlu data pegawai untuk role lain

        //Dokumen
        $kategoriDokumens = KategoriDokumen::all();

            // Ambil dokumen yang diunggah oleh pegawai yang login
            $uploadedDokumens = $pegawai->dokumens()
                ->pluck('file_dokumen', 'id_kategori_dokumen') // Gunakan 'file_dokumen', bukan 'file'
                ->toArray();
        return view('data_pegawai.pengaturan.index', compact('pegawai', 'rolelist','userlist','liststatuspegawai','listagama','liststatuspegawai','listagama','rolelist','riwayatKepegawaians', 'riwayatJabatans', 'jenisJabatans', 'riwayatGolongans', 'units','showForm', 'riwayatPendidikan', 'jenjangPendidikans', 'jurusans', 'pegawais','kategoriDokumens', 'uploadedDokumens'));
    }
}
