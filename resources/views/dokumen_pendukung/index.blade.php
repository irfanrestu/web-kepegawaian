@extends('layouts.main')

@section('title', 'Dokumen Pendukung')

@section('content')
    <main id="main" class="main">
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dokumen Pendukung</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dokumen Pendukung</li>
            </ol>

            <div class="card mb-4">
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="file" class="col-md-2 col-form-label">Upload Foto</label>
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
                        <div class="form-group">
                            <label for="file" class="col-md-2 col-form-label">Upload File Akta Kelahiran</label>
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
                        <div class="form-group">
                            <label for="file" class="col-md-2 col-form-label">Upload File Kartu Tanda Penduduk</label>
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
                        <div class="form-group">
                            <label for="file" class="col-md-2 col-form-label">Upload File Kartu Keluarga</label>
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
                        <div class="form-group">
                            <label for="file" class="col-md-2 col-form-label">Upload File KARPEG</label>
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
                        <div class="form-group">
                            <label for="file" class="col-md-2 col-form-label">Upload File BPJS</label>
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
                        <div class="form-group">
                            <label for="file" class="col-md-2 col-form-label">Upload File TASPEN</label>
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
                        <div class="form-group">
                            <label for="file" class="col-md-2 col-form-label">Upload File KARIS/KARSU</label>
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
                        <div class="form-group">
                            <label for="file" class="col-md-2 col-form-label">Upload File NPWP</label>
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
                        <div class="form-group">
                            <label for="file" class="col-md-2 col-form-label">Upload File Sumpah PNS</label>
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
                        <div class="form-group">
                            <label for="file" class="col-md-2 col-form-label">Upload File Keputusan NIP BKN</label>
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
                        <div class="form-group">
                            <label for="file" class="col-md-2 col-form-label">Upload File SPMT CPNS</label>
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
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection