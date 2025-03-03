@extends('layouts.main')

@section('title', 'Mengupload Dokumen')

@section('content')
    <main id="main" class="main">
        <div class="container-fluid px-4">
            <h1 class="mt-4">Mengupload Dokumen</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dokumen Pendukung</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Tambah data
                </div>
                <div class="card-body">
                    <form action="{{ route('dokumen_pendukung.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group m-2">
                            <label>Kategori Dokumen</label>
                            <select name="id_kategori_dokumen"
                                class="form-control @error('id_kategori_dokumen') is-invalid @enderror" required>
                                @forelse ($kategoriDokumens as $kategori)
                                    <option value="{{ $kategori->kategori_dokumen_id }}">{{ $kategori->kategori_dokumen }}
                                    </option>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Semua dokumen sudah diisi.</td>
                                    </tr>
                                @endforelse
                            </select>
                            @error('id_kategori_dokumen')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group m-2">
                            <label>File Dokumen</label>
                            <input type="file" name="files[]" class="form-control @error('files') is-invalid @enderror"
                                multiple required>
                            <small class="form-text text-muted">
                                File yang diizinkan: PNG, JPG, PDF. Maksimal ukuran per file: 2MB.
                            </small>
                            @error('files')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <a href="{{ route('dokumen_pendukung.index') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection