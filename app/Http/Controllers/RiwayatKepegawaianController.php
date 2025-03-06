<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $riwayatJabatans = RiwayatJabatan::all();
        $riwayatGolongans = RiwayatGolongan::all();
        $units = Unit::all();
        $jenisJabatans = JenisJabatan::all();
        $riwayatKepegawaians = RiwayatKepegawaian::where('id_pegawai', auth()->user()->id_pegawai)
            ->with('riwayatJabatan')
            ->with('riwayatGolongan')
            ->with('Unit')
            ->get();
        $riwayatJabatans = RiwayatJabatan::with('jenisJabatan')->get();
        return view('riwayat_kepegawaian.index', compact('riwayatKepegawaians', 'riwayatJabatans', 'jenisJabatans', 'riwayatGolongans', 'units'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenisJabatans = JenisJabatan::all();
        return view('riwayat_kepegawaian.create', compact('jenisJabatans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_jenis_jabatan' => 'required|exists:jenis_jabatans,jenis_jabatan_id',
            'nama_jabatan' => 'required|string|max:255',
            'tmt_jabatan' => 'required|date',
            'status_jabatan' => 'required|in:Aktif,Non-Aktif',
            'dokumen_jabatan' => 'nullable|file|mimes:pdf|max:2048', // Maksimal 2MB
        ]);

        // Simpan file dokumen jabatan jika ada
        $dokumenJabatanPath = null;
        if ($request->hasFile('dokumen_jabatan')) {
            $dokumenJabatanPath = $request->file('dokumen_jabatan')->store('dokumen_jabatan', 'public');
        }

        // Simpan data ke database
        RiwayatJabatan::create([
            'id_jenis_jabatan' => $request->id_jenis_jabatan,
            'nama_jabatan' => $request->nama_jabatan,
            'tmt_jabatan' => $request->tmt_jabatan,
            'status_jabatan' => $request->status_jabatan,
            'dokumen_jabatan' => $dokumenJabatanPath,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('riwayat_kepegawaian.index')->with('success', 'Data riwayat jabatan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $riwayatJabatans = RiwayatJabatan::findOrFail($id);
        $jenisJabatans = JenisJabatan::all(); // Untuk dropdown form

        return view('riwayat_kepegawaian.edit', compact('riwayatJabatans', 'jenisJabatans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
