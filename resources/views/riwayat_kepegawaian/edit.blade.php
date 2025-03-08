@extends('layouts.main')

@section('title', 'Edit Riwayat Kepegawaian')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Edit Riwayat Kepegawaian</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('riwayat_kepegawaian.index') }}">Riwayat Kepegawaian</a>
                    </li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Data Kepegawaian</h5>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('riwayat_kepegawaian.update', $riwayatKepegawaians->riwayat_kepegawaian_id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    @if(auth()->user()->id_role == 1)
                                    <h5>Pegawai</h5>
                                    <div class="col-md-6">
                                        <div class="form-group m-3">
                                            <label for="nama_pegawai">Nama Pegawai</label>
                                            <input type="text" class="form-control" value="{{ $riwayatKepegawaians->pegawai->nama_lengkap ?? 'N/A' }}" readonly>
                                        </div>
                                    </div>
                                    @endif

                                    <h5>Jabatan</h5>
                                    <div class="col-md-6">
                                        <div class="form-group m-3">
                                            <label for="id_jenis_jabatan">Jenis Jabatan</label>
                                            <select name="id_jenis_jabatan" id="id_jenis_jabatan" class="form-control" required>
                                                <option value="">Pilih Jenis Jabatan</option>
                                                @foreach ($jenisJabatans as $jenisJabatan)
                                                    <option value="{{ $jenisJabatan->jenis_jabatan_id }}" 
                                                            {{ old('id_jenis_jabatan', $riwayatKepegawaians->riwayatJabatan->id_jenis_jabatan) == $jenisJabatan->jenis_jabatan_id ? 'selected' : '' }}>
                                                        {{ $jenisJabatan->jenis_jabatan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group m-3">
                                            <label for="nama_jabatan">Nama Jabatan</label>
                                            <input type="text" name="nama_jabatan" id="nama_jabatan" class="form-control" 
                                                   value="{{ old('nama_jabatan', $riwayatKepegawaians->riwayatJabatan->nama_jabatan) }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group m-3">
                                            <label for="tmt_jabatan">TMT Jabatan</label>
                                            <input type="date" name="tmt_jabatan" id="tmt_jabatan" class="form-control" 
                                                   value="{{ old('tmt_jabatan', $riwayatKepegawaians->riwayatJabatan->tmt_jabatan) }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group m-3">
                                            <label for="status_jabatan">Status Jabatan</label>
                                            <select name="status_jabatan" id="status_jabatan" class="form-control" required>
                                                <option value="Aktif" {{ old('status_jabatan', $riwayatKepegawaians->riwayatJabatan->status_jabatan) == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                                <option value="Non-Aktif" {{ old('status_jabatan', $riwayatKepegawaians->riwayatJabatan->status_jabatan) == 'Non-Aktif' ? 'selected' : '' }}>Non-Aktif</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group m-3">
                                            <label for="dokumen_jabatan">Dokumen Jabatan</label>
                                            <input type="file" name="dokumen_jabatan" id="dokumen_jabatan" class="form-control">
                                            @if($riwayatKepegawaians->riwayatJabatan->dokumen_jabatan)
                                                <small class="form-text text-muted">File saat ini: {{ $riwayatKepegawaians->riwayatJabatan->dokumen_jabatan }}</small>
                                            @endif
                                        </div>
                                    </div>
                            
                                    <h5>Golongan</h5>
                                    <div class="col-md-6">
                                        <div class="form-group m-3">
                                            <label for="pangkat_golongan">Pangkat Golongan</label>
                                            <input type="text" name="pangkat_golongan" id="pangkat_golongan" class="form-control" 
                                                   value="{{ old('pangkat_golongan', $riwayatKepegawaians->riwayatGolongan->pangkat_golongan) }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group m-3">
                                            <label for="jenis_kenaikan">Jenis Kenaikan</label>
                                            <input type="text" name="jenis_kenaikan" id="jenis_kenaikan" class="form-control" 
                                                   value="{{ old('jenis_kenaikan', $riwayatKepegawaians->riwayatGolongan->jenis_kenaikan) }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group m-3">
                                            <label for="masa_kerja_tahun">Masa Kerja (Tahun)</label>
                                            <input type="number" name="masa_kerja_tahun" id="masa_kerja_tahun" class="form-control" 
                                                   value="{{ old('masa_kerja_tahun', $riwayatKepegawaians->riwayatGolongan->masa_kerja_tahun) }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group m-3">
                                            <label for="masa_kerja_bulan">Masa Kerja (Bulan)</label>
                                            <input type="number" name="masa_kerja_bulan" id="masa_kerja_bulan" class="form-control" 
                                                   value="{{ old('masa_kerja_bulan', $riwayatKepegawaians->riwayatGolongan->masa_kerja_bulan) }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group m-3">
                                            <label for="tmt_awal">TMT Awal</label>
                                            <input type="date" name="tmt_awal" id="tmt_awal" class="form-control" 
                                                   value="{{ old('tmt_awal', $riwayatKepegawaians->riwayatGolongan->tmt_awal) }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group m-3">
                                            <label for="tmt_akhir">TMT Akhir</label>
                                            <input type="date" name="tmt_akhir" id="tmt_akhir" class="form-control" 
                                                   value="{{ old('tmt_akhir', $riwayatKepegawaians->riwayatGolongan->tmt_akhir) }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group m-3">
                                            <label for="perjanjian_ke">Perjanjian Ke</label>
                                            <input type="number" name="perjanjian_ke" id="perjanjian_ke" class="form-control" 
                                                   value="{{ old('perjanjian_ke', $riwayatKepegawaians->riwayatGolongan->perjanjian_ke) }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group m-3">
                                            <label for="status_perjanjian">Status Perjanjian</label>
                                            <select name="status_perjanjian" id="status_perjanjian" class="form-control" required>
                                                <option value="Aktif" {{ old('status_perjanjian', $riwayatKepegawaians->riwayatGolongan->status_perjanjian) == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                                <option value="Non-Aktif" {{ old('status_perjanjian', $riwayatKepegawaians->riwayatGolongan->status_perjanjian) == 'Non-Aktif' ? 'selected' : '' }}>Non-Aktif</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group m-3">
                                            <label for="dokumen_sk">Dokumen SK</label>
                                            <input type="file" name="dokumen_sk" id="dokumen_sk" class="form-control">
                                            @if($riwayatKepegawaians->riwayatGolongan->dokumen_sk)
                                                <small class="form-text text-muted">File saat ini: {{ $riwayatKepegawaians->riwayatGolongan->dokumen_sk }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group m-3">
                                            <label for="dokumen_perjanjian">Dokumen Perjanjian</label>
                                            <input type="file" name="dokumen_perjanjian" id="dokumen_perjanjian" class="form-control">
                                            @if($riwayatKepegawaians->riwayatGolongan->dokumen_perjanjian)
                                                <small class="form-text text-muted">File saat ini: {{ $riwayatKepegawaians->riwayatGolongan->dokumen_perjanjian }}</small>
                                            @endif
                                        </div>
                                    </div>
                            
                                    <h5>Unit</h5>
                                    <div class="col-md-6">
                                        <div class="form-group m-3">
                                            <label for="id_unit">Unit</label>
                                            <select name="id_unit" id="id_unit" class="form-control" required>
                                                <option value="">Pilih Unit</option>
                                                @foreach ($units as $unit)
                                                    <option value="{{ $unit->unit_id }}" 
                                                            {{ old('id_unit', $riwayatKepegawaians->id_unit) == $unit->unit_id ? 'selected' : '' }}>
                                                        {{ $unit->nama_unit }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                            
                                    <div class="col-md-12 text-center mt-4">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection