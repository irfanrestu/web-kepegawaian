@extends('layouts.main')

@section('title', 'Riwayat Kepegawaian')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Riwayat Kepegawaian</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item active">Data</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="container-fluid px-4">
                            <h5 class="card-title mt-4">Detail Riwayat Kepegawaian</h5>
                            <div class="row">
                                <div class="card">
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="card-body m-2">
                                        <table id="datatablesSimple" class="table table-bordered table-striped p-4 mt-4">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" style="width: 10%;">No.</th>
                                                    <th class="text-center" style="width: 20%;">Jenis Jabatan</th>
                                                    <th class="text-center" style="width: 25%;">Nama Jabatan</th>
                                                    <th class="text-center" style="width: 10%;">TMT</th>
                                                    <th class="text-center" style="width: 15%;">Status</th>
                                                    <th class="text-center" style="width: 10%;">Dokumen Jabatan</th>
                                                    <th class="text-center" style="width: 10%;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($riwayatJabatans as $index => $riwayatJabatan)
                                                    <tr>
                                                        <td class="text-center">{{ $index + 1 }}</td>
                                                        <td class="text-center">
                                                            {{ $riwayatJabatan->jenisJabatan->jenis_jabatan }}
                                                        </td>
                                                        <td class="text-center">{{ $riwayatJabatan->nama_jabatan }}</td>
                                                        <td class="text-center">{{ $riwayatJabatan->tmt_jabatan }}</td>
                                                        <td class="text-center">{{ $riwayatJabatan->status_jabatan }}</td>
                                                        <td class="text-center">
                                                            <a href="{{ asset($riwayatJabatan->dokumen_jabatan) }}"
                                                                target="_blank" class="btn btn-sm btn-outline-primary">
                                                                @if (Str::endsWith($riwayatJabatan->dokumen_jabatan, '.pdf'))
                                                                    <i class="fas fa-file-pdf"></i> PDF
                                                                @else
                                                                    <i class="fas fa-file"></i> File
                                                                @endif
                                                            </a>
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="{{ route('riwayat_kepegawaian.edit', $riwayatJabatan->riwayat_jabatan_id) }}"
                                                                class="btn btn-sm btn-warning">
                                                                <i class="fas fa-edit"></i> Edit
                                                            </a>

                                                            <form
                                                                action="{{ }}"
                                                                method="POST" style="display: inline-block;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-danger"
                                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                                    <i class="fas fa-trash"></i> Hapus
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="6" class="text-center">Belum ada data yang tersedia.</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Form Tambah Data -->
                            <div class="row mt-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Tambah Riwayat Jabatan</h5>
                                        <form action="{{ route('riwayat_kepegawaian.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row mb-3">
                                                <label for="id_jenis_jabatan" class="col-sm-2 col-form-label">Jenis
                                                    Jabatan</label>
                                                <div class="col-sm-10">
                                                    <select name="id_jenis_jabatan" id="id_jenis_jabatan"
                                                        class="form-control" required>
                                                        <option value="">Pilih Jenis Jabatan</option>
                                                        @foreach ($jenisJabatans as $jenisJabatan)
                                                            <option value="{{ $jenisJabatan->jenis_jabatan_id }}">
                                                                {{ $jenisJabatan->jenis_jabatan }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="nama_jabatan" class="col-sm-2 col-form-label">Nama
                                                    Jabatan</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="nama_jabatan" id="nama_jabatan"
                                                        class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="tmt_jabatan" class="col-sm-2 col-form-label">TMT Jabatan</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="tmt_jabatan" id="tmt_jabatan"
                                                        class="form-control" placeholder="YYYY-MM-DD" required>
                                                    <small class="text-muted">Format: YYYY-MM-DD (contoh:
                                                        2023-10-25)</small>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="status_jabatan" class="col-sm-2 col-form-label">Status
                                                    Jabatan</label>
                                                <div class="col-sm-10">
                                                    <select name="status_jabatan" id="status_jabatan" class="form-control"
                                                        required>
                                                        <option value="Aktif">Aktif</option>
                                                        <option value="Non-Aktif">Non-Aktif</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="dokumen_jabatan" class="col-sm-2 col-form-label">Dokumen
                                                    Jabatan</label>
                                                <div class="col-sm-10">
                                                    <input type="file" name="dokumen_jabatan" id="dokumen_jabatan"
                                                        class="form-control">
                                                    <small class="text-muted">Format file: PDF. Maksimal ukuran:
                                                        2MB.</small>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-sm-10 offset-sm-2">
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                    <a href="{{ route('riwayat_kepegawaian.index') }}"
                                                        class="btn btn-secondary">Batal</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection