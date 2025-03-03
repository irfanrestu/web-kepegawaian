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
        $dokumens = Dokumen::where('id_pegawai', auth()->user()->id_pegawai)
            ->with('kategoriDokumen')
            ->get();

        return view('dokumen_pendukung.index', compact('dokumens'));
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
        $dokumen = Dokumen::findOrFail($id);

        // Pastikan hanya pemilik dokumen yang bisa mengedit
        if ($dokumen->id_pegawai !== auth()->user()->id_pegawai) {
            abort(403, 'Anda tidak memiliki akses untuk mengedit dokumen ini.');
        }

        return view('dokumen_pendukung.edit', compact('dokumen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dokumen $dokumen, $id)
    {
        $dokumen = Dokumen::findOrFail($id);

        // Pastikan hanya pemilik dokumen yang bisa mengedit
        if ($dokumen->id_pegawai !== auth()->user()->id_pegawai) {
            abort(403, 'Anda tidak memiliki akses untuk mengedit dokumen ini.');
        }

        // Validasi hanya untuk file
        $request->validate([
            'file' => 'nullable|file|mimes:png,jpg,pdf|max:2048',
        ]);

        // Update file jika ada file baru diupload
        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            $oldFilePath = public_path($dokumen->file_dokumen);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath); // Hapus file dari storage
            }

            // Simpan file baru
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('dokumen'), $fileName);

            // Update path file di database
            $dokumen->update([
                'file_dokumen' => 'dokumen/' . $fileName,
            ]);
        }

        return redirect()->route('dokumen_pendukung.index')->with('success', 'Dokumen berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dokumen $dokumen)
    {
        //
    }
}
