@extends('layouts.main')
@section('content')
<main id="main" class="main">

            <div class="pagetitle">
                <h1>Tambah Data Pegawai</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Data Pegawai</a></li>
                        <li class="breadcrumb-item">Biodata</li>
                        <li class="breadcrumb-item active">Tambah Data Pegawai</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->

                    <div class="container-fluid px-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Tambah data
                            </div>
                            <div class="card-body">
                            @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                                    
                                    <form action="{{ Route('biodata.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row mb-3">
                                            <label for="file_foto" class="col-md-4 col-lg-3 col-form-label">Foto Profile</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input type="file" class="form-control" id="file_foto" name="file_foto">
                                        
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="nama_lengkap" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="nama_lengkap" type="text" class="form-control" id="nama_lengkap"
                                                    value="{{ old('nama_lengkap') }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="gelar_depan" class="col-md-4 col-lg-3 col-form-label">Gelar Depan</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="gelar_depan" type="text" class="form-control" id="gelar_depan"
                                                    value="{{ old('gelar_depan') }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="gelar_belakang" class="col-md-4 col-lg-3 col-form-label">Gelar Belakang</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="gelar_belakang" type="text" class="form-control" id="gelar_belakang"
                                                    value="{{ old('gelar_belakang') }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="nip" class="col-md-4 col-lg-3 col-form-label">NIP</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="nip" type="text" class="form-control" id="nip"
                                                    value="{{ old('nip') }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="NPWP" class="col-md-4 col-lg-3 col-form-label">NPWP</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="npwp" type="text" class="form-control" id="npwp"
                                                    value="{{ old('npwp') }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="no_karpeg" class="col-md-4 col-lg-3 col-form-label">No Kartu Pegawai</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="no_karpeg" type="text" class="form-control" id="no_karpeg"
                                                    value="{{ old('no_karpeg') }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="no_bpjs" class="col-md-4 col-lg-3 col-form-label">No BPJS</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="no_bpjs" type="text" class="form-control" id="no_bpjs"
                                                    value="{{ old('no_bpjs') }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="no_kartu_keluarga" class="col-md-4 col-lg-3 col-form-label">No Kartu Keluarga</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="no_kartu_keluarga" type="text" class="form-control" id="no_kartu_keluarga"
                                                    value="{{ old('no_kartu_keluarga') }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="no_nik" class="col-md-4 col-lg-3 col-form-label">NIK</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="no_nik" type="text" class="form-control" id="no_nik"
                                                    value="{{ old('no_nik') }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="id_status_pegawai" class="col-md-4 col-lg-3 col-form-label">Status Pegawai</label>
                                            <div class="col-md-8 col-lg-9">
                                                <select name="id_status_pegawai" id="id_status_pegawai" class="form-control">
                                                    @foreach($liststatuspegawai as $status)
                                                        <option value="{{ $status->status_pegawai_id }}">
                                                            {{ $status->status_pegawai }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="tempat_lahir" class="col-md-4 col-lg-3 col-form-label">Tempat Lahir</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="tempat_lahir" type="text" class="form-control" id="tempat_lahir"
                                                    value="{{ old('tempat_lahir') }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="tanggal_lahir" class="col-md-4 col-lg-3 col-form-label">Tanggal Lahir</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="tanggal_lahir" type="date" class="form-control" id="tanggal_lahir"
                                                    value="{{ old('tanggal_lahir') }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="jenis_kelamin" class="col-md-4 col-lg-3 col-form-label">Jenis Kelamin</label>
                                            <div class="col-md-8 col-lg-9">
                                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                                    <option value="Laki-laki">Laki-laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="id_agama" class="col-md-4 col-lg-3 col-form-label">Agama</label>
                                            <div class="col-md-8 col-lg-9">
                                                <select name="id_agama" id="id_agama" class="form-control">
                                                    @foreach($listagama as $agama)
                                                        <option value="{{ $agama->agama_id }}">
                                                            {{ $agama->nama_agama }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-3">
                                            <label for="no_hp" class="col-md-4 col-lg-3 col-form-label">No Hp</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="no_hp" type="text" class="form-control" id="no_hp"
                                                    value="{{ old('no_hp') }}">
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-3">
                                            <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="email" type="email" class="form-control" id="email"
                                                    value="{{ old('email') }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="alamat_lengkap" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                                            <div class="col-md-8 col-lg-9">
                                                <textarea name="alamat_lengkap" class="form-control" id="alamat_lengkap"
                                                    style="height: 100px">{{ old('alamat_lengkap') }}</textarea>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="rt" class="col-md-4 col-lg-3 col-form-label">RT</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="rt" type="text" class="form-control" id="rt"
                                                    value="{{ old('rt') }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="rw" class="col-md-4 col-lg-3 col-form-label">RW</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="rw" type="text" class="form-control" id="rw"
                                                    value="{{ old('rw') }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="kelurahan" class="col-md-4 col-lg-3 col-form-label">Kelurahan</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="kelurahan" type="text" class="form-control" id="kelurahan"
                                                    value="{{ old('kelurahan') }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="kecamatan" class="col-md-4 col-lg-3 col-form-label">Kecamatan</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="kecamatan" type="text" class="form-control" id="kecamatan"
                                                    value="{{ old('kecamatan') }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="kota_kabupaten" class="col-md-4 col-lg-3 col-form-label">Kabupaten/Kota</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="kota_kabupaten" type="text" class="form-control" id="kota_kabupaten"
                                                    value="{{ old('kota_kabupaten') }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="kode_pos" class="col-md-4 col-lg-3 col-form-label">Kode Pos</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="kode_pos" type="text" class="form-control" id="kode_pos"
                                                    value="{{ old('kode_pos') }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="homebase" class="col-md-4 col-lg-3 col-form-label">Homebase</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="homebase" type="text" class="form-control" id="homebase"
                                                    value="{{ old('homebase') }}">
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>  
                                    <!-- End Create Profile Form -->


                            </div>
                        </div>
                    </div>




</main>
@endsection