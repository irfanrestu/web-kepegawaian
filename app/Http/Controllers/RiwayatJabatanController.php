<?php

namespace App\Http\Controllers;

use App\Models\RiwayatJabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RiwayatJabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view("riwayat_jabatan.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('riwayat_jabatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        if (request()->file('file')) {
            $file = request()->file('file');
            $fileUrl = $file->storeAs("pdf/riwayat_jabatan", Str::slug($input['title']) . "-" . time() . ".{$file->extension()}");
        } else {
            $fileUrl = NULL;
        }
        $input['file'] = $fileUrl;
    }

    /**
     * Display the specified resource.
     */
    public function show(RiwayatJabatan $riwayatJabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RiwayatJabatan $riwayatJabatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RiwayatJabatan $riwayatJabatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RiwayatJabatan $riwayatJabatan)
    {
        //
    }
}
