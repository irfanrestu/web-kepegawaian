@extends('layouts.main')

@section('title', 'Dokumen Pendukung - Admin')

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
                            <h5 class="card-title">Daftar Pegawai dan Dokumen</h5>

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

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Pegawai</th>
                                        @foreach ($kategoriDokumens as $kategori)
                                            <th>{{ $kategori->kategori_dokumen }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pegawais as $index => $pegawai)
                                                                <tr>
                                                                    <td class="text-center">{{ $index + 1 }}</td>
                                                                    <td>{{ $pegawai->nama_lengkap }}</td>
                                                                    @foreach ($kategoriDokumens as $kategori)
                                                                                                    <td class="text-center">
                                                                                                        @php
                                                                                                            $dokumen = $pegawai->dokumens
                                                                                                                ->where('id_kategori_dokumen', $kategori->kategori_dokumen_id)
                                                                                                                ->first();
                                                                                                        @endphp
                                                                                                        @if ($dokumen)
                                                                                                            <a href="{{ asset($dokumen->file_dokumen) }}" target="_blank"
                                                                                                                class="btn btn-sm btn-outline-primary d-flex justify-content-center align-items-center">
                                                                                                                <i class="bi bi-file-earmark"></i>
                                                                                                            </a>
                                                                                                        @else
                                                                                                            <span class="text-muted">-</span>
                                                                                                        @endif
                                                                                                    </td>
                                                                    @endforeach
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