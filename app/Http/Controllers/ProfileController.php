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
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        //Biodata/edit+password
        $user = Auth::user();
        $liststatuspegawai = StatusPegawais::all();
        $listagama = Agama::all();
        $rolelist = Role::all();

        //Riwayat Kepegawaian
         // Cek apakah user adalah Admin
        
            // Pegawai hanya bisa melihat data miliknya sendiri
            $riwayatKepegawaians = RiwayatKepegawaian::whereHas('riwayatJabatan', function ($query) use ($user) {
                $query->where('id_pegawai', $user->id_pegawai);
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

            $riwayatPendidikan = RiwayatPendidikan::where('id_pegawai', $user->id_pegawai)
                ->with('jenjangPendidikan', 'jurusan')
                ->get();
            $pegawais = null; // Tidak perlu data pegawai untuk role lain

        //Dokumen
        $kategoriDokumens = KategoriDokumen::all();

            // Ambil dokumen yang diunggah oleh pegawai yang login
            $uploadedDokumens = $user->pegawai->dokumens()
                ->pluck('file_dokumen', 'id_kategori_dokumen') // Gunakan 'file_dokumen', bukan 'file'
                ->toArray();
        
        return view('profile_pribadi.index', compact('user','liststatuspegawai','listagama','rolelist','riwayatKepegawaians', 'riwayatJabatans', 'jenisJabatans', 'riwayatGolongans', 'units','showForm', 'riwayatPendidikan', 'jenjangPendidikans', 'jurusans', 'pegawais','kategoriDokumens', 'uploadedDokumens'));
    }
}
