<?php

namespace App\Http\Controllers;

use App\Models\RiwayatPendidikan;
use App\Models\Pegawai;
use App\Models\JenjangPendidikan;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RiwayatPendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $jenjangPendidikans = JenjangPendidikan::all();
        $jurusans = Jurusan::all();
        $riwayatPendidikan = RiwayatPendidikan::where('id_pegawai', auth()->user()->id_pegawai)
            ->with('jenjangPendidikan')
            ->with('jurusan')
            ->get();

        return view('riwayat_pendidikan.index', compact('riwayatPendidikan', 'jenjangPendidikans', 'jurusans'));
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
        $validator = \Validator::make($request->all(), [
            'id_jenjang_pendidikan' => 'required|exists:jenjang_pendidikans,jenjang_pendidikan_id',
            'id_jurusan' => 'required|exists:jurusans,jurusan_id',
            'nama_sekolah' => 'required',
            'tahun_lulus' => 'required|numeric|digits:4',
            'file_ijazah' => 'required|file|mimes:pdf|max:2048',
            'file_transkrip' => 'required|file|mimes:pdf|max:2048',
        ], [
            'file_ijazah.mimes' => 'File ijazah harus berupa PDF.',
            'file_transkrip.mimes' => 'File transkrip harus berupa PDF.',
            'file_ijazah.max' => 'Ukuran file ijazah maksimum 2MB.',
            'file_transkrip.max' => 'Ukuran file transkrip maksimum 2MB.',
        ]);

        if ($validator->fails()) {
            return redirect()->route('riwayat_pendidikan.index')
                ->withErrors($validator)
                ->withInput();
        }

        $ijazahFile = $request->file('file_ijazah');
        $ijazahFileName = time() . '_' . $ijazahFile->getClientOriginalName();
        $ijazahFile->move(public_path('dokumen'), $ijazahFileName);

        $transkripFile = $request->file('file_transkrip');
        $transkripFileName = time() . '_' . $transkripFile->getClientOriginalName();
        $transkripFile->move(public_path('dokumen'), $transkripFileName);

        RiwayatPendidikan::create([
            'id_pegawai' => auth()->user()->id_pegawai,
            'id_jenjang_pendidikan' => $request->id_jenjang_pendidikan,
            'id_jurusan' => $request->id_jurusan,
            'nama_sekolah' => $request->nama_sekolah,
            'file_ijazah' => 'dokumen/' . $ijazahFileName,
            'file_transkrip' => 'dokumen/' . $transkripFileName,
            'tahun_lulus' => $request->tahun_lulus,
        ]);

        return redirect()->route('riwayat_pendidikan.index')->with('success', 'Data berhasil diunggah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(RiwayatPendidikan $riwayatPendidikan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $riwayatPendidikan = RiwayatPendidikan::findOrFail($id);

        if ($riwayatPendidikan->id_pegawai !== auth()->user()->id_pegawai) {
            return redirect()->route('riwayat_pendidikan.index')->with('error', 'Anda tidak memiliki akses untuk mengedit data ini.');
        }

        $jenjangPendidikans = JenjangPendidikan::all();
        $jurusans = Jurusan::all();
        return view('riwayat_pendidikan.edit', compact('riwayatPendidikan', 'jenjangPendidikans', 'jurusans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RiwayatPendidikan $riwayatPendidikan, $id)
    {
        $riwayatPendidikan = RiwayatPendidikan::findOrFail($id);

        if ($riwayatPendidikan->id_pegawai !== auth()->user()->id_pegawai) {
            return redirect()->route('riwayat_pendidikan.index')->with('error', 'Anda tidak memiliki akses untuk mengedit data ini.');
        }
        $validator = \Validator::make($request->all(), [
            'id_jenjang_pendidikan' => 'required|exists:jenjang_pendidikans,jenjang_pendidikan_id',
            'id_jurusan' => 'required|exists:jurusans,jurusan_id',
            'nama_sekolah' => 'required',
            'tahun_lulus' => 'required|numeric|digits:4',
            'file_ijazah' => 'nullable|file|mimes:pdf|max:2048',
            'file_transkrip' => 'nullable|file|mimes:pdf|max:2048',
        ], [
            'file_ijazah.mimes' => 'File ijazah harus berupa PDF.',
            'file_transkrip.mimes' => 'File transkrip harus berupa PDF.',
            'file_ijazah.max' => 'Ukuran file ijazah maksimum 2MB.',
            'file_transkrip.max' => 'Ukuran file transkrip maksimum 2MB.',
        ]);

        if ($validator->fails()) {
            return redirect()->route('riwayat_pendidikan.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $data = [
                'id_jenjang_pendidikan' => $request->id_jenjang_pendidikan,
                'id_jurusan' => $request->id_jurusan,
                'nama_sekolah' => $request->nama_sekolah,
                'tahun_lulus' => $request->tahun_lulus,
            ];

            if ($request->hasFile('file_ijazah')) {
                // Hapus file lama jika ada
                if ($riwayatPendidikan->file_ijazah && file_exists(public_path($riwayatPendidikan->file_ijazah))) {
                    unlink(public_path($riwayatPendidikan->file_ijazah));
                }

                $ijazahFile = $request->file('file_ijazah');
                $ijazahFileName = time() . '_' . $ijazahFile->getClientOriginalName();
                $ijazahFile->move(public_path('dokumen'), $ijazahFileName);
                $data['file_ijazah'] = 'dokumen/' . $ijazahFileName;
            }

            if ($request->hasFile('file_transkrip')) {
                if ($riwayatPendidikan->file_transkrip && file_exists(public_path($riwayatPendidikan->file_transkrip))) {
                    unlink(public_path($riwayatPendidikan->file_transkrip));
                }

                $transkripFile = $request->file('file_transkrip');
                $transkripFileName = time() . '_' . $transkripFile->getClientOriginalName();
                $transkripFile->move(public_path('dokumen'), $transkripFileName);
                $data['file_transkrip'] = 'dokumen/' . $transkripFileName;
            }

            $riwayatPendidikan->update($data);

            return redirect()->route('riwayat_pendidikan.index')
                ->with('success', 'Data berhasil diperbarui!');

        } catch (\Exception $e) {
            $jenjangPendidikans = JenjangPendidikan::all();
            $jurusans = Jurusan::all();

            return redirect()->route('riwayat_pendidikan.edit', $id)
                ->with('error', 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $riwayatPendidikan = RiwayatPendidikan::findOrFail($id);

            if ($riwayatPendidikan->id_pegawai !== auth()->user()->id_pegawai) {
                return redirect()->route('riwayat_pendidikan.index')
                    ->with('error', 'Anda tidak memiliki akses untuk menghapus data ini.');
            }

            if ($riwayatPendidikan->file_ijazah && file_exists(public_path($riwayatPendidikan->file_ijazah))) {
                unlink(public_path($riwayatPendidikan->file_ijazah));
            }

            if ($riwayatPendidikan->file_transkrip && file_exists(public_path($riwayatPendidikan->file_transkrip))) {
                unlink(public_path($riwayatPendidikan->file_transkrip));
            }

            $riwayatPendidikan->delete();

            return redirect()->route('riwayat_pendidikan.index')
                ->with('success', 'Data riwayat pendidikan berhasil dihapus!');

        } catch (\Exception $e) {
            return redirect()->route('riwayat_pendidikan.index')
                ->with('error', 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage());
        }
    }
}
