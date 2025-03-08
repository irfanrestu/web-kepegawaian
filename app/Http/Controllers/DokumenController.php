<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\KategoriDokumen;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = auth()->user();
        // Ambil semua kategori dokumen
        $kategoriDokumens = KategoriDokumen::all();

        if ($user->id_role == 1) { // Admin
            // Ambil semua pegawai beserta dokumen yang sudah diunggah
            $pegawais = Pegawai::with([
                'dokumens' => function ($query) {
                    $query->with('kategoriDokumen');
                }
            ])->get();

            return view('dokumen_pendukung.admin', compact('kategoriDokumens', 'pegawais'));
        } else { // Pegawai
            // Ambil dokumen yang diunggah oleh pegawai yang login
            $uploadedDokumens = $user->pegawai->dokumens()
                ->pluck('file_dokumen', 'id_kategori_dokumen') // Gunakan 'file_dokumen', bukan 'file'
                ->toArray();
            return view('dokumen_pendukung.index', compact('kategoriDokumens', 'uploadedDokumens'));
        }
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Dokumen $dokumen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dokumen $dokumen, $id)
    {
        $user = auth()->user();
        $pegawai = Pegawai::findOrFail($id);

        // Cek otorisasi: Admin bisa mengedit semua data, pegawai hanya bisa mengedit data miliknya
        if ($user->id_role != 1 && $pegawai->pegawai_id != $user->id_pegawai) {
            return redirect()->route('dokumen_pendukung.index')
                ->with('error', 'Anda tidak memiliki akses untuk mengedit data ini.');
        }

        // Ambil dokumen yang diunggah oleh pegawai tertentu
        $uploadedDokumens = $pegawai->dokumens()
            ->pluck('file_dokumen', 'id_kategori_dokumen')
            ->toArray();

        $kategoriDokumens = KategoriDokumen::all();

        return view('dokumen_pendukung.edit', compact('pegawai', 'kategoriDokumens', 'uploadedDokumens'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dokumen $dokumen, $id)
    {
        $validator = \Validator::make($request->all(), [
            'file' => [
                'required',
                'file',
                'mimes:png,jpg,pdf',
                function ($attribute, $value, $fail) {
                    $maxSize = ($value->getMimeType() === 'application/pdf') ? 3072 : 2048;
                    if ($value->getSize() > $maxSize * 1024) {
                        $fail('Ukuran file terlalu besar. Maksimum ' . ($maxSize / 1024) . ' MB untuk ' . ($maxSize === 3072 ? 'PDF' : 'foto') . '.');
                    }
                },
            ],
        ], [
            'file.mimes' => 'File yang dapat diupload hanya JPG, PNG, dan PDF.',
        ]);

        if ($validator->fails()) {
            return redirect()->route('dokumen_pendukung.index')
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $dokumen = Dokumen::where('id_pegawai', auth()->user()->id_pegawai)
                ->where('id_kategori_dokumen', $id)
                ->first();

            if ($dokumen && $dokumen->file_dokumen) {
                $oldFilePath = public_path($dokumen->file_dokumen);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }

            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('dokumen'), $fileName);

            Dokumen::updateOrCreate(
                [
                    'id_pegawai' => auth()->user()->id_pegawai,
                    'id_kategori_dokumen' => $id,
                ],
                [
                    'file_dokumen' => 'dokumen/' . $fileName,
                ]
            );

            return redirect()->route('dokumen_pendukung.index')
                ->with('success', 'File berhasil diupload!');
        } catch (\Exception $e) {
            return redirect()->route('dokumen_pendukung.index')
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dokumen $dokumen)
    {
        //
    }
}
