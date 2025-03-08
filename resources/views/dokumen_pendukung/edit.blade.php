@extends('layouts.main')

@section('title', 'Edit Dokumen Pendukung')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Edit Dokumen Pendukung</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                    <li class="breadcrumb-item">Dokumen Pendukung</li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Dokumen untuk {{ $pegawai->nama_lengkap }}</h5>

                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <form action="{{ route('dokumen_pendukung.update', $pegawai->pegawai_id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Kategori Dokumen</th>
                                            <th>File Saat Ini</th>
                                            <th>Unggah File Baru</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kategoriDokumens as $kategori)
                                            <tr>
                                                <td>{{ $kategori->kategori_dokumen }}</td>
                                                <td class="text-center">
                                                    @if (isset($uploadedDokumens[$kategori->kategori_dokumen_id]))
                                                        <a href="{{ asset($uploadedDokumens[$kategori->kategori_dokumen_id]) }}"
                                                            target="_blank"
                                                            class="btn btn-sm btn-outline-primary d-flex justify-content-center align-items-center">
                                                            @if (Str::endsWith($uploadedDokumens[$kategori->kategori_dokumen_id], '.pdf'))
                                                                <i class="bi bi-file-earmark"></i>
                                                            @endif
                                                        </a>
                                                    @else
                                                        <span class="text-muted">-</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <input type="file" name="file_dokumen[{{ $kategori->kategori_dokumen_id }}]"
                                                        class="form-control">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection