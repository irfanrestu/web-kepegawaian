@extends('layouts.main')

@section('title', 'Dokumen Pendukung')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Dokumen Pendukung</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">Dokumen Pendukung</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Upload Dokumen</h5>

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

                            @error('file')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Kategori Dokumen</th>
                                        <th>File</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kategoriDokumens as $kategori)
                                        <tr>
                                            <td>{{ $kategori->kategori_dokumen }}</td>
                                            <td>
                                                @if (isset($uploadedDokumens[$kategori->kategori_dokumen_id]))
                                                    <a href="{{ asset($uploadedDokumens[$kategori->kategori_dokumen_id]) }}"
                                                        target="_blank">
                                                        {{ basename($uploadedDokumens[$kategori->kategori_dokumen_id]) }}
                                                    </a>
                                                @else
                                                    <span class="text-muted">Belum ada file</span>
                                                @endif
                                            </td>
                                            <td>
                                                <form
                                                    action="{{ route('dokumen_pendukung.update', ['id' => $kategori->kategori_dokumen_id]) }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="input-group">
                                                        <input type="file" name="file" class="form-control" required>
                                                        <button type="submit" class="btn btn-primary">Upload</button>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection