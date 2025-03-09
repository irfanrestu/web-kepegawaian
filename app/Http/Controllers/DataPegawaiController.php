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
        $query = Pegawai::with(['user.role', 'statuspegawai'])
            ->whereHas('user', function ($query) {
                $query->where('id_role', '!=', 1);
            });

        if ($request->has('cari')) {
            $query->where('nama_lengkap', 'LIKE', '%' . $request->cari . '%');
        }

        $pegawai = $query->get();

        return view('data_pegawai.index', compact('pegawai'));
    }

    public function pengaturan(Pegawai $pegawai)
    {
        $pegawai->load([
            'user.role',
            'statuspegawai',
            'dokumens.kategoriDokumen',
            'riwayatKepegawaian.riwayatJabatan.jenisJabatan',
            'riwayatKepegawaian.riwayatGolongan',
            'riwayatKepegawaian.unit',
            'riwayatPendidikan.jenjangPendidikan',
            'riwayatPendidikan.jurusan'
        ]);

        // Fetch master data for forms
        $rolelist = Role::all();
        $userlist = User::all();
        $liststatuspegawai = StatusPegawais::all();
        $listagama = Agama::all();
        $jenisJabatans = JenisJabatan::all();
        $units = Unit::all();
        $jenjangPendidikans = JenjangPendidikan::all();
        $jurusans = Jurusan::all();
        $kategoriDokumens = KategoriDokumen::all();

        // Fetch specific history data for the selected employee
        $riwayatKepegawaians = RiwayatKepegawaian::where('id_pegawai', $pegawai->pegawai_id)
            ->with(['riwayatJabatan', 'riwayatGolongan', 'unit'])
            ->get();

        $riwayatPendidikan = RiwayatPendidikan::with(['jenjangPendidikan', 'jurusan'])
            ->where('id_pegawai', $pegawai->pegawai_id)
            ->get();

        return view('data_pegawai.pengaturan.index', compact(
            'pegawai',
            'rolelist',
            'userlist',
            'liststatuspegawai',
            'listagama',
            'jenisJabatans',
            'units',
            'jenjangPendidikans',
            'jurusans',
            'kategoriDokumens',
            'riwayatKepegawaians',
            'riwayatPendidikan'
        ));
    }
}
