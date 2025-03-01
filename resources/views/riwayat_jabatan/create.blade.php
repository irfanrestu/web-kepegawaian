@extends('layouts.main')

@section('title', 'Membuat Riwayat Jabatan')

@section('content')
    <main id="main" class="main">
        <div class="container-fluid px-4">
            <h1 class="mt-4">Membuat Riwayat Jabatan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Riwayat Jabatan</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Tambah data
                </div>
                <div class="card-body">
                    <form action="{{ Route('riwayat_jabatan.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="satuan_kerja" class="col-md-2 col-form-label">Satuan Kerja:</label>
                            <input type="text" class="form-control @error('satuan_kerja') is-invalid @enderror"
                                id="satuan_kerja" name="satuan_kerja" value="{{ old('satuan_kerja') }}">
                            @error('satuan_kerja')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jenis_jabatan" class="col-md-2 col-form-label">Jenis Jabatan:</label>
                            <input type="text" class="form-control @error('jenis_jabatan') is-invalid @enderror"
                                id="jenis_jabatan" name="jenis_jabatan" value="{{ old('jenis_jabatan') }}">
                            @error('jenis_jabatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="file" class="col-md-2 col-form-label">Upload File</label>
                            <div class="col-md-8 custom-file">
                                <input autocomplete="off" id="file" type="file"
                                    class="custom-file-input @error('file') is-invalid @enderror" name="file">
                                <small class="text-muted">Format yang diperbolehkan hanya pdf. Ukuran maks 50mb.</small>
                                @error('file')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-4">
                            <a href="{{ route('riwayat_jabatan.index') }}" class="btn btn-default">Batal</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection