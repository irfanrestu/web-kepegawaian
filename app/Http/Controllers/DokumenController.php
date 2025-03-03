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
        // Ambil semua kategori dokumen
        $kategoriDokumens = KategoriDokumen::all();

        // Ambil dokumen yang sudah diupload oleh pengguna yang sedang login
        $uploadedDokumens = Dokumen::where('id_pegawai', auth()->user()->id_pegawai)
            ->pluck('file_dokumen', 'id_kategori_dokumen')
            ->toArray();

        return view('dokumen_pendukung.index', compact('kategoriDokumens', 'uploadedDokumens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil ID kategori yang sudah pernah digunakan oleh pengguna yang sedang login
        $usedKategoriIds = Dokumen::where('id_pegawai', auth()->user()->id_pegawai)
            ->pluck('id_kategori_dokumen')
            ->unique()
            ->toArray();

        // Ambil hanya kategori yang belum digunakan oleh pengguna yang sedang login
        $kategoriDokumens = KategoriDokumen::whereNotIn('kategori_dokumen_id', $usedKategoriIds)->get();

        return view('dokumen_pendukung.create', compact('kategoriDokumens'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_kategori_dokumen' => [
                'required',
                'exists:kategori_dokumens,kategori_dokumen_id', // Perbaikan di sini
                function ($attribute, $value, $fail) {
                    if (
                        Dokumen::where('id_pegawai', auth()->user()->id_pegawai)
                            ->where('id_kategori_dokumen', $value)
                            ->exists()
                    ) {
                        $fail('Kategori yang sudah diupload, tidak dapat dibuat lagi.');
                    }
                },
            ],
            'files' => 'required',
            'files.*' => 'file|mimes:png,jpg,pdf|max:2048',
        ]);

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('dokumen'), $fileName);

                Dokumen::create([
                    'id_pegawai' => auth()->user()->id_pegawai,
                    'id_kategori_dokumen' => $request->id_kategori_dokumen,
                    'file_dokumen' => 'dokumen/' . $fileName,
                ]);
            }
        }

        return redirect()->route('dokumen_pendukung.index')->with('success', 'Dokumen berhasil diunggah!');
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
        //
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
