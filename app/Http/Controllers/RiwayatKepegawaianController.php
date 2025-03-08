<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\RiwayatKepegawaian;
use App\Models\RiwayatJabatan;
use App\Models\JenisJabatan;
use App\Models\RiwayatGolongan;
use App\Models\Unit;
use App\Models\Pegawai;

class RiwayatKepegawaianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user(); // Ambil user yang sedang login

        // Cek apakah user adalah Admin
        if ($user->id_role == 1) { // Ganti 'role' dengan nama kolom peran Anda
            // Admin bisa melihat semua data riwayat kepegawaian
            $riwayatKepegawaians = RiwayatKepegawaian::with('riwayatJabatan', 'riwayatGolongan', 'unit')->get();
            $pegawais = Pegawai::all();
            $showForm = false;
        } else {
            // Pegawai hanya bisa melihat data miliknya sendiri
            $riwayatKepegawaians = RiwayatKepegawaian::where('id_pegawai', $user->id_pegawai)
                ->with('riwayatJabatan', 'riwayatGolongan', 'unit')
                ->get();
            $showForm = true;
            $pegawais = null;
        }

        $riwayatJabatans = RiwayatJabatan::all();
        $riwayatGolongans = RiwayatGolongan::all();
        $units = Unit::all();
        $jenisJabatans = JenisJabatan::all();
        $riwayatJabatans = RiwayatJabatan::with('jenisJabatan')->get();

        return view('riwayat_kepegawaian.index', compact('riwayatKepegawaians', 'riwayatJabatans', 'jenisJabatans', 'riwayatGolongans', 'units', 'pegawais', 'showForm'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();

        $validator = \Validator::make($request->all(), [
            'id_jenis_jabatan' => 'required|exists:jenis_jabatans,jenis_jabatan_id',
            'nama_jabatan' => 'required|string|max:255',
            'tmt_jabatan' => 'required|date',
            'status_jabatan' => 'required|in:Aktif,Non-Aktif',
            'dokumen_jabatan' => 'nullable|file|mimes:pdf|max:2048',
            'pangkat_golongan' => 'required|string|max:255',
            'jenis_kenaikan' => 'required|string|max:255',
            'masa_kerja_tahun' => 'required|numeric',
            'masa_kerja_bulan' => 'required|numeric',
            'tmt_awal' => 'required|date',
            'tmt_akhir' => 'required|date',
            'perjanjian_ke' => 'required|numeric',
            'status_perjanjian' => 'required|in:Aktif,Non-Aktif',
            'dokumen_sk' => 'nullable|file|mimes:pdf|max:2048',
            'dokumen_perjanjian' => 'nullable|file|mimes:pdf|max:2048',
            'id_unit' => 'required|exists:units,unit_id',
            'id_pegawai' => $user->id_role == 1 ? 'required|exists:pegawais,id_pegawai' : 'nullable',
        ], [
            'dokumen_jabatan.mimes' => 'File dokumen jabatan harus berupa PDF.',
            'dokumen_sk.mimes' => 'File SK harus berupa PDF.',
            'dokumen_perjanjian.mimes' => 'File perjanjian harus berupa PDF.',
            'dokumen_jabatan.max' => 'Ukuran file dokumen jabatan maksimum 2MB.',
            'dokumen_sk.max' => 'Ukuran file SK maksimum 2MB.',
            'dokumen_perjanjian.max' => 'Ukuran file perjanjian maksimum 2MB.',
        ]);

        if ($validator->fails()) {
            return redirect()->route('riwayat_kepegawaian.index')
                ->withErrors($validator)
                ->withInput();
        }

        try {
            DB::beginTransaction();

            // Simpan file jika ada
            $dokumenJabatanPath = $request->hasFile('dokumen_jabatan')
                ? $request->file('dokumen_jabatan')->move(public_path('dokumen'), time() . '_' . $request->file('dokumen_jabatan')->getClientOriginalName())
                : null;
            $dokumenSkPath = $request->hasFile('dokumen_sk')
                ? $request->file('dokumen_sk')->move(public_path('dokumen'), time() . '_' . $request->file('dokumen_sk')->getClientOriginalName())
                : null;
            $dokumenPerjanjianPath = $request->hasFile('dokumen_perjanjian')
                ? $request->file('dokumen_perjanjian')->move(public_path('dokumen'), time() . '_' . $request->file('dokumen_perjanjian')->getClientOriginalName())
                : null;

            // Simpan data Riwayat Jabatan
            $riwayatJabatan = new RiwayatJabatan();
            $riwayatJabatan->id_jenis_jabatan = $request->id_jenis_jabatan;
            $riwayatJabatan->nama_jabatan = $request->nama_jabatan;
            $riwayatJabatan->tmt_jabatan = $request->tmt_jabatan;
            $riwayatJabatan->status_jabatan = $request->status_jabatan;
            $riwayatJabatan->dokumen_jabatan = $dokumenJabatanPath ? 'dokumen/' . basename($dokumenJabatanPath) : null;
            $riwayatJabatan->save();

            // Gunakan riwayat_jabatan_id, bukan id
            if (!$riwayatJabatan->riwayat_jabatan_id) {
                throw new \Exception('Gagal menyimpan data riwayat jabatan. riwayat_jabatan_id tidak dihasilkan.');
            }

            // Simpan data Riwayat Golongan
            $riwayatGolongan = new RiwayatGolongan();
            $riwayatGolongan->pangkat_golongan = $request->pangkat_golongan;
            $riwayatGolongan->jenis_kenaikan = $request->jenis_kenaikan;
            $riwayatGolongan->masa_kerja_tahun = $request->masa_kerja_tahun;
            $riwayatGolongan->masa_kerja_bulan = $request->masa_kerja_bulan;
            $riwayatGolongan->tmt_awal = $request->tmt_awal;
            $riwayatGolongan->tmt_akhir = $request->tmt_akhir;
            $riwayatGolongan->perjanjian_ke = $request->perjanjian_ke;
            $riwayatGolongan->status_perjanjian = $request->status_perjanjian;
            $riwayatGolongan->dokumen_sk = $dokumenSkPath ? 'dokumen/' . basename($dokumenSkPath) : null;
            $riwayatGolongan->dokumen_perjanjian = $dokumenPerjanjianPath ? 'dokumen/' . basename($dokumenPerjanjianPath) : null;
            $riwayatGolongan->save();

            if (!$riwayatGolongan->riwayat_golongan_id) {
                throw new \Exception('Gagal menyimpan data riwayat golongan. ID tidak dihasilkan.');
            }

            // Tentukan id_pegawai berdasarkan role
            $idPegawai = $user->id_role == 1 && $request->has('id_pegawai')
                ? $request->id_pegawai
                : $user->id_pegawai;

            // Simpan data Riwayat Kepegawaian
            $riwayatKepegawaian = new RiwayatKepegawaian();
            $riwayatKepegawaian->id_pegawai = $idPegawai;
            $riwayatKepegawaian->id_riwayat_jabatan = $riwayatJabatan->riwayat_jabatan_id; // Gunakan riwayat_jabatan_id
            $riwayatKepegawaian->id_riwayat_golongan = $riwayatGolongan->riwayat_golongan_id;
            $riwayatKepegawaian->id_unit = $request->id_unit;
            $riwayatKepegawaian->save();

            if (!$riwayatKepegawaian->riwayat_kepegawaian_id) { // Asumsi primary key default 'id' untuk RiwayatKepegawaian
                throw new \Exception('Gagal menyimpan data riwayat kepegawaian. ID tidak dihasilkan.');
            }

            DB::commit();
            return redirect()->route('riwayat_kepegawaian.index')
                ->with('success', 'Data riwayat kepegawaian berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollBack();

            // Hapus file jika ada
            if (isset($dokumenJabatanPath) && file_exists(public_path($dokumenJabatanPath))) {
                unlink(public_path($dokumenJabatanPath));
            }
            if (isset($dokumenSkPath) && file_exists(public_path($dokumenSkPath))) {
                unlink(public_path($dokumenSkPath));
            }
            if (isset($dokumenPerjanjianPath) && file_exists(public_path($dokumenPerjanjianPath))) {
                unlink(public_path($dokumenPerjanjianPath));
            }

            return redirect()->route('riwayat_kepegawaian.index')
                ->with('error', 'Terjadi kesalahan saat menambah data: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = auth()->user();
        $riwayatKepegawaian = RiwayatKepegawaian::with('riwayatJabatan.jenisJabatan', 'riwayatGolongan', 'unit', 'pegawai')
            ->findOrFail($id);

        // Cek otorisasi: Pegawai hanya bisa melihat data miliknya
        if ($user->id_role !== 1 && $riwayatKepegawaian->id_pegawai !== $user->id_pegawai) {
            return redirect()->route('riwayat_kepegawaian.index')
                ->with('error', 'Anda tidak memiliki akses untuk melihat data ini.');
        }

        return view('riwayat_kepegawaian.show', compact('riwayatKepegawaian'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = auth()->user();
        $riwayatKepegawaians = RiwayatKepegawaian::with('riwayatJabatan', 'riwayatGolongan', 'unit', 'pegawai')->findOrFail($id);

        if ($user->id_role !== 1 && $riwayatKepegawaians->id_pegawai !== $user->id_pegawai) {
            return redirect()->route('riwayat_kepegawaian.index')
                ->with('error', 'Anda tidak memiliki akses untuk mengedit data ini.');
        }

        $jenisJabatans = JenisJabatan::all();
        $units = Unit::all();
        $pegawais = $user->id_role == 1 ? Pegawai::all() : null;

        return view('riwayat_kepegawaian.edit', compact('riwayatKepegawaians', 'jenisJabatans', 'units', 'pegawais'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = auth()->user();
        $riwayatKepegawaian = RiwayatKepegawaian::findOrFail($id);

        if ($user->id_role !== 1 && $riwayatKepegawaian->id_pegawai !== $user->id_pegawai) {
            \Log::warning("Akses update ditolak untuk user ID: {$user->id}, role: {$user->id_role}");
            return redirect()->route('riwayat_kepegawaian.index')
                ->with('error', 'Anda tidak memiliki akses untuk mengedit data ini.');
        }

        $validator = \Validator::make($request->all(), [
            'id_jenis_jabatan' => 'required|exists:jenis_jabatans,jenis_jabatan_id',
            'nama_jabatan' => 'required|string|max:255',
            'tmt_jabatan' => 'required|date',
            'status_jabatan' => 'required|in:Aktif,Non-Aktif',
            'dokumen_jabatan' => 'nullable|file|mimes:pdf|max:2048',
            'pangkat_golongan' => 'required|string|max:255',
            'jenis_kenaikan' => 'required|string|max:255',
            'masa_kerja_tahun' => 'required|numeric',
            'masa_kerja_bulan' => 'required|numeric',
            'tmt_awal' => 'required|date',
            'tmt_akhir' => 'required|date',
            'perjanjian_ke' => 'required|numeric',
            'status_perjanjian' => 'required|in:Aktif,Non-Aktif',
            'dokumen_sk' => 'nullable|file|mimes:pdf|max:2048',
            'dokumen_perjanjian' => 'nullable|file|mimes:pdf|max:2048',
            'id_unit' => 'required|exists:units,unit_id',
            'id_pegawai' => $user->id_role == 1 ? 'required|exists:pegawais,id_pegawai' : 'nullable',
        ], [
            'dokumen_jabatan.mimes' => 'File dokumen jabatan harus berupa PDF.',
            'dokumen_sk.mimes' => 'File SK harus berupa PDF.',
            'dokumen_perjanjian.mimes' => 'File perjanjian harus berupa PDF.',
            'dokumen_jabatan.max' => 'Ukuran file dokumen jabatan maksimum 2MB.',
            'dokumen_sk.max' => 'Ukuran file SK maksimum 2MB.',
            'dokumen_perjanjian.max' => 'Ukuran file perjanjian maksimum 2MB.',
        ]);

        if ($validator->fails()) {
            return redirect()->route('riwayat_kepegawaian.index')
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $riwayatJabatan = RiwayatJabatan::findOrFail($riwayatKepegawaian->id_riwayat_jabatan);
            $riwayatGolongan = RiwayatGolongan::findOrFail($riwayatKepegawaian->id_riwayat_golongan);

            $jabatanData = [
                'id_jenis_jabatan' => $request->id_jenis_jabatan,
                'nama_jabatan' => $request->nama_jabatan,
                'tmt_jabatan' => $request->tmt_jabatan,
                'status_jabatan' => $request->status_jabatan,
            ];

            $golonganData = [
                'pangkat_golongan' => $request->pangkat_golongan,
                'jenis_kenaikan' => $request->jenis_kenaikan,
                'masa_kerja_tahun' => $request->masa_kerja_tahun,
                'masa_kerja_bulan' => $request->masa_kerja_bulan,
                'tmt_awal' => $request->tmt_awal,
                'tmt_akhir' => $request->tmt_akhir,
                'perjanjian_ke' => $request->perjanjian_ke,
                'status_perjanjian' => $request->status_perjanjian,
            ];

            $kepegawaianData = [
                'id_unit' => $request->id_unit,
            ];

            if ($request->hasFile('dokumen_jabatan')) {
                if ($riwayatJabatan->dokumen_jabatan && file_exists(public_path($riwayatJabatan->dokumen_jabatan))) {
                    unlink(public_path($riwayatJabatan->dokumen_jabatan));
                }
                $dokumenJabatan = $request->file('dokumen_jabatan');
                $dokumenJabatanName = time() . '_' . $dokumenJabatan->getClientOriginalName();
                $dokumenJabatan->move(public_path('dokumen'), $dokumenJabatanName);
                $jabatanData['dokumen_jabatan'] = 'dokumen/' . $dokumenJabatanName;
            }

            if ($request->hasFile('dokumen_sk')) {
                if ($riwayatGolongan->dokumen_sk && file_exists(public_path($riwayatGolongan->dokumen_sk))) {
                    unlink(public_path($riwayatGolongan->dokumen_sk));
                }
                $dokumenSk = $request->file('dokumen_sk');
                $dokumenSkName = time() . '_' . $dokumenSk->getClientOriginalName();
                $dokumenSk->move(public_path('dokumen'), $dokumenSkName);
                $golonganData['dokumen_sk'] = 'dokumen/' . $dokumenSkName;
            }

            if ($request->hasFile('dokumen_perjanjian')) {
                if ($riwayatGolongan->dokumen_perjanjian && file_exists(public_path($riwayatGolongan->dokumen_perjanjian))) {
                    unlink(public_path($riwayatGolongan->dokumen_perjanjian));
                }
                $dokumenPerjanjian = $request->file('dokumen_perjanjian');
                $dokumenPerjanjianName = time() . '_' . $dokumenPerjanjian->getClientOriginalName();
                $dokumenPerjanjian->move(public_path('dokumen'), $dokumenPerjanjianName);
                $golonganData['dokumen_perjanjian'] = 'dokumen/' . $dokumenPerjanjianName;
            }

            $riwayatJabatan->update($jabatanData);
            $riwayatGolongan->update($golonganData);
            $riwayatKepegawaian->update($kepegawaianData);

            return redirect()->route('riwayat_kepegawaian.index')
                ->with('success', 'Data riwayat kepegawaian berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->route('riwayat_kepegawaian.edit')
                ->with('error', 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $user = auth()->user();
            $riwayatKepegawaian = RiwayatKepegawaian::findOrFail($id);

            if ($user->id_role !== 1 && $riwayatKepegawaian->id_pegawai !== $user->id_pegawai) {
                return redirect()->route('riwayat_kepegawaian.index')
                    ->with('error', 'Anda tidak memiliki akses untuk menghapus data ini.');
            }

            $riwayatJabatan = RiwayatJabatan::findOrFail($riwayatKepegawaian->id_riwayat_jabatan);
            $riwayatGolongan = RiwayatGolongan::findOrFail($riwayatKepegawaian->id_riwayat_golongan);

            if ($riwayatJabatan->dokumen_jabatan && file_exists(public_path($riwayatJabatan->dokumen_jabatan))) {
                unlink(public_path($riwayatJabatan->dokumen_jabatan));
            }
            if ($riwayatGolongan->dokumen_sk && file_exists(public_path($riwayatGolongan->dokumen_sk))) {
                unlink(public_path($riwayatGolongan->dokumen_sk));
            }
            if ($riwayatGolongan->dokumen_perjanjian && file_exists(public_path($riwayatGolongan->dokumen_perjanjian))) {
                unlink(public_path($riwayatGolongan->dokumen_perjanjian));
            }

            $riwayatJabatan->delete();
            $riwayatGolongan->delete();
            $riwayatKepegawaian->delete();

            return redirect()->route('riwayat_kepegawaian.index')
                ->with('success', 'Data riwayat kepegawaian berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('riwayat_kepegawaian.index')
                ->with('error', 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage());
        }
    }
}
