@extends('layouts.main')

@section('title', 'Edit Dokumen Pendukung')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Edit Dokumen</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                    <li class="breadcrumb-item">Dokumen</li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Form Edit Dokumen</h5>

                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <form action="{{ route('dokumen_pendukung.update', $dokumen->dokumen_id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Tampilkan kategori dokumen sebagai teks biasa -->
                                <div class="mb-3">
                                    <label for="kategori_dokumen" class="form-label">Kategori Dokumen</label>
                                    <input type="text" class="form-control"
                                        value="{{ $dokumen->kategoriDokumen->kategori_dokumen }}" readonly>
                                </div>

                                <!-- Input untuk file baru -->
                                <div class="mb-3">
                                    <label for="file" class="form-label">File Dokumen (Biarkan kosong jika tidak ingin
                                        mengganti)</label>
                                    <input type="file" name="file" id="file" class="form-control">
                                    <small>File saat ini: <a href="{{ asset($dokumen->file_dokumen) }}"
                                            target="_blank">{{ basename($dokumen->file_dokumen) }}</a></small>
                                    @error('file')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Tombol Submit dan Batal -->
                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    <a href="{{ route('dokumen_pendukung.index') }}" class="btn btn-secondary">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection