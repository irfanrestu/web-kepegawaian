@extends('layouts.main')

@section('title', 'Dokumen Pendukung')

@section('content')

    <main id="main" class="main"> 
        <div class="pagetitle">
            <h1>Data Tables</h1>
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
                            <h1 class="mt-4">Dokumen Pendukung</h1>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                            <div class="row">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <a href="{{ route('dokumen_pendukung.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
                                    </div>
                                    <div class="card-body m-2">
                                        <table id="datatablesSimple">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Kategori Dokumen</th>
                                                    <th>File</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @forelse ($dokumens as $index => $dokumen)
                                                    <tr>
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>{{ $dokumen->kategoriDokumen->kategori_dokumen }}</td>
                                                        <td>
                                                            <a href="{{ asset($dokumen->file_dokumen) }}" target="_blank">
                                                                @if (Str::endsWith($dokumen->file_dokumen, '.pdf'))
                                                                    <i class="fas fa-file-pdf"></i> <!-- Icon PDF -->
                                                                @elseif (Str::endsWith($dokumen->file_dokumen, ['.png', '.jpg', '.jpeg']))
                                                                    <i class="fas fa-file-image"></i> <!-- Icon Gambar -->
                                                                @else
                                                                    <i class="fas fa-file"></i> <!-- Icon File Umum -->
                                                                @endif
                                                                {{ basename($dokumen->file_dokumen) }}
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('dokumen_pendukung.edit', $dokumen->dokumen_id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="4" class="text-center">Belum ada dokumen yang diunggah.</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
</main>@endsection