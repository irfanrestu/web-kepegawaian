@extends('layouts.main')

@section('title', 'Detail Riwayat Kepegawaian')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Detail Riwayat Kepegawaian</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('riwayat_kepegawaian.index') }}">Riwayat Kepegawaian</a></li>
                    <li class="breadcrumb-item active">Detail</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Detail Data</h5>

                            <!-- Informasi Pegawai (hanya untuk admin) -->
                            @if (auth()->user()->id_role == 1)
                                <div class="row">
                                    <label class="col-sm-3 col-form-label"><strong>Nama Pegawai</strong></label>
                                    <div class="col-sm-6">
                                        <p class="form-control-static"><strong>{{ $riwayatKepegawaian->pegawai->nama_lengkap ?? 'Tidak Diketahui' }}</strong></p>
                                    </div>
                                </div>
                            @endif

                            <!-- Jabatan -->
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Jenis Jabatan</label>
                                <div class="col-sm-6">
                                    <p class="form-control-static">{{ $riwayatKepegawaian->riwayatJabatan->jenisJabatan->jenis_jabatan }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Nama Jabatan</label>
                                <div class="col-sm-6">
                                    <p class="form-control-static">{{ $riwayatKepegawaian->riwayatJabatan->nama_jabatan }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">TMT Jabatan</label>
                                <div class="col-sm-6">
                                    <p class="form-control-static">{{ $riwayatKepegawaian->riwayatJabatan->tmt_jabatan }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Status Jabatan</label>
                                <div class="col-sm-6">
                                    <p class="form-control-static">{{ $riwayatKepegawaian->riwayatJabatan->status_jabatan }}</p>
                                </div>
                            </div>
                            @if ($riwayatKepegawaian->riwayatJabatan->dokumen_jabatan)
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">Dokumen Jabatan</label>
                                    <div class="col-sm-6">
                                        <a href="{{ asset($riwayatKepegawaian->riwayatJabatan->dokumen_jabatan) }}" target="_blank" class="btn btn-sm btn-info">Lihat Dokumen</a>
                                    </div>
                                </div>
                            @endif

                            <!-- Golongan -->
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Pangkat Golongan</label>
                                <div class="col-sm-6">
                                    <p class="form-control-static">{{ $riwayatKepegawaian->riwayatGolongan->pangkat_golongan }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Jenis Kenaikan</label>
                                <div class="col-sm-6">
                                    <p class="form-control-static">{{ $riwayatKepegawaian->riwayatGolongan->jenis_kenaikan }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Masa Kerja</label>
                                <div class="col-sm-6">
                                    <p class="form-control-static">{{ $riwayatKepegawaian->riwayatGolongan->masa_kerja_tahun }} Tahun, {{ $riwayatKepegawaian->riwayatGolongan->masa_kerja_bulan }} Bulan</p>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">TMT Awal</label>
                                <div class="col-sm-6">
                                    <p class="form-control-static">{{ $riwayatKepegawaian->riwayatGolongan->tmt_awal }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">TMT Akhir</label>
                                <div class="col-sm-6">
                                    <p class="form-control-static">{{ $riwayatKepegawaian->riwayatGolongan->tmt_akhir }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Perjanjian Ke-</label>
                                <div class="col-sm-6">
                                    <p class="form-control-static">{{ $riwayatKepegawaian->riwayatGolongan->perjanjian_ke }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Status Perjanjian</label>
                                <div class="col-sm-6">
                                    <p class="form-control-static">{{ $riwayatKepegawaian->riwayatGolongan->status_perjanjian }}</p>
                                </div>
                            </div>
                            @if ($riwayatKepegawaian->riwayatGolongan->dokumen_sk)
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">Dokumen SK</label>
                                    <div class="col-sm-6">
                                        <a href="{{ asset($riwayatKepegawaian->riwayatGolongan->dokumen_sk) }}" target="_blank" class="btn btn-sm btn-info">Lihat Dokumen</a>
                                    </div>
                                </div>
                            @endif
                            @if ($riwayatKepegawaian->riwayatGolongan->dokumen_perjanjian)
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">Dokumen Perjanjian</label>
                                    <div class="col-sm-6">
                                        <a href="{{ asset($riwayatKepegawaian->riwayatGolongan->dokumen_perjanjian) }}" target="_blank" class="btn btn-sm btn-info">Lihat Dokumen</a>
                                    </div>
                                </div>
                            @endif

                            <!-- Unit -->
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Nama Unit</label>
                                <div class="col-sm-6">
                                    <p class="form-control-static">{{ $riwayatKepegawaian->unit->nama_unit }}</p>
                                </div>
                            </div>
                           
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Alamat Unit</label>
                                <div class="col-sm-6">
                                    <p class="form-control-static">{{ $riwayatKepegawaian->unit->alamat_unit }}</p>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">Nomor Telepon Unit</label>
                                <div class="col-sm-6">
                                    <p class="form-control-static">{{ $riwayatKepegawaian->unit->telp_unit }}</p>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">Email Unit</label>
                                <div class="col-sm-6">
                                    <p class="form-control-static">{{ $riwayatKepegawaian->unit->email_unit }}</p>
                                </div>
                            </div>

                            <!-- Tombol Kembali -->
                            <div class="row mt-4">
                                <div class="col-sm-12 text-center">
                                    <a href="{{ route('riwayat_kepegawaian.index') }}" class="btn btn-secondary">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection