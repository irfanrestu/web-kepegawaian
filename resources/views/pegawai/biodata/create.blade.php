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

                                    <!-- Profile Edit Form 
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
                                            <input name="id_status_pegawai" type="text" class="form-control" id="id_status_pegawai"
                                            value="{{ old('id_status_pegawai') }}">
                                            <select name="id_status_pegawai" id="id_status_pegawai">
                                                    <option value="1">CPNS</option>
                                                    <option value="2">PNS</option>
                                                    <option value="3">PPPK</option>
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
                                                <input name="tanggal_lahir" type="text" class="form-control" id="tanggal_lahir"
                                                    value="{{ old('tanggal_lahir') }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="jenis_kelamin" class="col-md-4 col-lg-3 col-form-label">Jenis Kelamin</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="jenis_kelamin" type="text" class="form-control" id="jenis_kelamin"
                                                    value="{{ old('jenis_kelamin') }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="id_agama" class="col-md-4 col-lg-3 col-form-label">Agama</label>
                                            <div class="col-md-8 col-lg-9">
                                                
                                            <select name="id_agama" id="id_agama">
                                                    <option value="1">Islam</option>
                                                    <option value="2">Kristen</option>
                                                    <option value="3">Katholik</option>
                                                    <option value="4">Hindu</option>
                                                    <option value="5">Buddha</option>
                                                    <option value="6">Khonghuchu</option>
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
                                    </form>  -->
                                    <!-- End Profile Edit Form -->


                                    
                                    <form action="{{ Route('biodata.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="nama_lengkap">Nama Lengkap:</label>
        <input type="text" name="nama_lengkap" id="nama_lengkap" required><br>

        <label for="gelar_depan">Gelar Depan:</label>
        <input type="text" name="gelar_depan" id="gelar_depan"><br>

        <label for="gelar_belakang">Gelar Belakang:</label>
        <input type="text" name="gelar_belakang" id="gelar_belakang"><br>

        <label for="file_foto">File Foto:</label>
        <input type="text" name="file_foto" id="file_foto"><br>

        <label for="nip">NIP:</label>
        <input type="text" name="nip" id="nip" required><br>

        <label for="npwp">NPWP:</label>
        <input type="text" name="npwp" id="npwp"><br>

        <label for="no_karpeg">No. Karpeg:</label>
        <input type="text" name="no_karpeg" id="no_karpeg"><br>

        <label for="no_bpjs">No. BPJS:</label>
        <input type="text" name="no_bpjs" id="no_bpjs"><br>

        <label for="no_kartu_keluarga">No. Kartu Keluarga:</label>
        <input type="text" name="no_kartu_keluarga" id="no_kartu_keluarga"><br>

        <label for="no_nik">No. NIK:</label>
        <input type="text" name="no_nik" id="no_nik" required><br>

        <label for="id_status_pegawai">Status Pegawai:</label>
        <input type="number" name="id_status_pegawai" id="id_status_pegawai" required><br>

        <label for="tempat_lahir">Tempat Lahir:</label>
        <input type="text" name="tempat_lahir" id="tempat_lahir" required><br>

        <label for="tanggal_lahir">Tanggal Lahir:</label>
        <input type="date" name="tanggal_lahir" id="tanggal_lahir" required><br>

        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <input type="text" name="jenis_kelamin" id="jenis_kelamin" required><br>

        <label for="id_agama">Agama:</label>
        <input type="number" name="id_agama" id="id_agama" required><br>

        <label for="no_hp">No. HP:</label>
        <input type="text" name="no_hp" id="no_hp" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>

        <label for="alamat_lengkap">Alamat Lengkap:</label>
        <textarea name="alamat_lengkap" id="alamat_lengkap" required></textarea><br>

        <label for="rt">RT:</label>
        <input type="text" name="rt" id="rt" required><br>

        <label for="rw">RW:</label>
        <input type="text" name="rw" id="rw" required><br>

        <label for="kelurahan">Kelurahan:</label>
        <input type="text" name="kelurahan" id="kelurahan" required><br>

        <label for="kecamatan">Kecamatan:</label>
        <input type="text" name="kecamatan" id="kecamatan" required><br>

        <label for="kota_kabupaten">Kota/Kabupaten:</label>
        <input type="text" name="kota_kabupaten" id="kota_kabupaten" required><br>

        <label for="kode_pos">Kode Pos:</label>
        <input type="text" name="kode_pos" id="kode_pos" required><br>

        <label for="homebase">Homebase:</label>
        <input type="text" name="homebase" id="homebase" required><br>

        <button type="submit">Simpan</button>
    </form>



                            </div>
                        </div>
                    </div>




</main>
@endsection