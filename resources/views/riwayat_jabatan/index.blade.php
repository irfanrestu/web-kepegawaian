@extends('layouts.main')

@section('title', 'Riwayat Jabatan')

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
                            <h1 class="mt-4">Riwayat Jabatan</h1>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                            <div class="row">
                                <div class="card mb-4">
                                    <div class="card-header">

                                        <a href="{{ route('riwayat_jabatan.create') }}"
                                            class="btn btn-sm btn-primary">Tambah Data
                                        </a>

                                        <i class="fas fa-table me-1"></i>
                                        DataTable Example
                                    </div>
                                    <div class="card-body m-2">
                                        <table id="datatablesSimple">
                                            <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th>Nama</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Tempat Lahir</th>
                                                    <th>Tanggak Lahir</th>
                                                    <th>Email</th>
                                                    <th>No Telepon</th>
                                                    <th>Alamat</th>
                                                    <th width="280px">Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>

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