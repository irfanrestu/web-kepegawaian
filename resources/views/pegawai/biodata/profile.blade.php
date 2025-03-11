@extends('layouts.main')

@section('title', 'Edit Dokumen Pendukung')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Biodata</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item active">Data</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        @if(session('success'))
            <div class="alert alert-success">
            {{ session('success') }}
            </div>
            @endif

            @if($errors->any())
            <div class="alert alert-danger">
            <ul>
            @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
            @endforeach
                    </ul>
                </div>
            @endif

        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">
                
                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                            @empty($pegawai->file_foto)
                                <img src="{{url('image/nophoto.jpg')}}"
                                    alt="project-image" class="rounded" style="width: 100%; max-width: 100px; height: auto;">
                            @else
                                <img src="{{ asset('storage/' . $pegawai->file_foto) }}" alt="Foto Pegawai" class="rounded" style="width: 100%; max-width: 200px; height: auto;">
                            @endempty
                            
                            <h2>{{ $pegawai->nama_lengkap }}</h2>
                            <h3>{{ $pegawai->statuspegawai->status_pegawai }}</h3>
                            <div class="social-links mt-2">
                                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered" role="tablist">

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview"
                                        aria-selected="true" role="tab">Details</button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit"
                                        aria-selected="false" tabindex="-1" role="tab">Edit Profile</button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings"
                                        aria-selected="false" tabindex="-1" role="tab">Change Role</button>
                                </li>
                            <!--
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password"
                                        aria-selected="false" tabindex="-1" role="tab">Change Password</button>
                                </li>
                            -->

                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview"
                                    role="tabpanel">

                                    <h5 class="card-title">Profile Details</h5>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Name Lengkap</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $pegawai->nama_lengkap }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Gelar Depan</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $pegawai->gelar_depan }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Gelar Belakang</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $pegawai->gelar_belakang }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">NIP</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $pegawai->nip }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">NPWP</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $pegawai->npwp }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">No Kartu Pegawai</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $pegawai->no_karpeg }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">No BPJS</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $pegawai->no_bpjs }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">No Kartu Keluarga</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $pegawai->no_kartu_keluarga }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">NIK</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $pegawai->no_nik }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Status Pegawai</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $pegawai->statuspegawai->status_pegawai }}
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Tempat Lahir</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $pegawai->tempat_lahir }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Tanggal Lahir</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $pegawai->tanggal_lahir }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Jenis Kelamin</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $pegawai->jenis_kelamin }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Agama</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $pegawai->agama->nama_agama }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">No HP</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $pegawai->no_hp }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $pegawai->email }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Alamat</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $pegawai->alamat_lengkap }}</div>
                                        <div class="col-lg-3 col-md-4 label">RT</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $pegawai->rt }}</div>
                                        <div class="col-lg-3 col-md-4 label">RW</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $pegawai->rw }}</div>
                                        <div class="col-lg-3 col-md-4 label">Kelurahan</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $pegawai->kelurahan }}</div>
                                        <div class="col-lg-3 col-md-4 label">Kota/Kabupaten</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $pegawai->kota_kabupaten }}</div>
                                        <div class="col-lg-3 col-md-4 label">Kode Pos</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $pegawai->kode_pos }}</div>
                                        <div class="col-lg-3 col-md-4 label">Homebase</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $pegawai->homebase }}</div>
                                    </div>





                                </div>

                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit" role="tabpanel">

                                    <!-- Profile Edit Form -->
                                    <!-- Profile Edit Form -->
                                    <form action="{{ route('biodata.update', $pegawai->pegawai_id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="row mb-3">
                                            <label for="file_foto" class="col-md-4 col-lg-3 col-form-label">Foto Profile</label>
                                            <div class="col-md-8 col-lg-9">
                                            @if($pegawai->file_foto)
                                                    <img src="{{ asset('storage/' . $pegawai->file_foto) }}" alt="Profile" class="editrounded" style="width: 100px; height: auto;">
                                                @else
                                                    <img src="{{ asset('image/nophoto.jpg') }}" alt="Profile" class="editrounded" style="width: 100px; height: auto;">
                                                @endif
                                                <div class="pt-2">
                                                    <label for="file_foto" class="btn btn-outline-primary" title="Upload new profile image">
                                                        <i class="bi bi-upload"></i>
                                                        <input type="file" class="form-control d-none" id="file_foto" name="file_foto" onchange="previewImage(event)">
                                                    </label>
                                                    <button type="button" class="btn btn-danger btn-sm" title="Remove my profile image" onclick="removePhoto()">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Hidden input to indicate photo removal -->
                                        <input type="hidden" name="remove_photo" id="remove_photo" value="0">

                                        <div class="row mb-3">
                                            <label for="nama_lengkap" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="nama_lengkap" type="text" class="form-control" id="nama_lengkap" value="{{ $pegawai->nama_lengkap }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="gelar_depan" class="col-md-4 col-lg-3 col-form-label">Gelar Depan</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="gelar_depan" type="text" class="form-control" id="gelar_depan" value="{{ $pegawai->gelar_depan }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="gelar_belakang" class="col-md-4 col-lg-3 col-form-label">Gelar Belakang</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="gelar_belakang" type="text" class="form-control" id="gelar_belakang" value="{{ $pegawai->gelar_belakang }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="nip" class="col-md-4 col-lg-3 col-form-label">NIP</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="nip" type="text" class="form-control" id="nip" value="{{ $pegawai->nip }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="npwp" class="col-md-4 col-lg-3 col-form-label">NPWP</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="npwp" type="text" class="form-control" id="npwp" value="{{ $pegawai->npwp }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="no_karpeg" class="col-md-4 col-lg-3 col-form-label">No Kartu Pegawai</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="no_karpeg" type="text" class="form-control" id="no_karpeg" value="{{ $pegawai->no_karpeg }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="no_bpjs" class="col-md-4 col-lg-3 col-form-label">No BPJS</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="no_bpjs" type="text" class="form-control" id="no_bpjs" value="{{ $pegawai->no_bpjs }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="no_kartu_keluarga" class="col-md-4 col-lg-3 col-form-label">No Kartu Keluarga</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="no_kartu_keluarga" type="text" class="form-control" id="no_kartu_keluarga" value="{{ $pegawai->no_kartu_keluarga }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="no_nik" class="col-md-4 col-lg-3 col-form-label">NIK</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="no_nik" type="text" class="form-control" id="no_nik" value="{{ $pegawai->no_nik }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="id_status_pegawai" class="col-md-4 col-lg-3 col-form-label">Status Pegawai</label>
                                            <div class="col-md-8 col-lg-9">
                                                <select name="id_status_pegawai" id="id_status_pegawai" class="form-control">
                                                    @foreach($liststatuspegawai as $status)
                                                        <option value="{{ $status->status_pegawai_id }}" {{ $pegawai->id_status_pegawai == $status->status_pegawai_id ? 'selected' : '' }}>
                                                            {{ $status->status_pegawai }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="tempat_lahir" class="col-md-4 col-lg-3 col-form-label">Tempat Lahir</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="tempat_lahir" type="text" class="form-control" id="tempat_lahir" value="{{ $pegawai->tempat_lahir }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="tanggal_lahir" class="col-md-4 col-lg-3 col-form-label">Tanggal Lahir</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="tanggal_lahir" type="date" class="form-control" id="tanggal_lahir" value="{{ $pegawai->tanggal_lahir }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="jenis_kelamin" class="col-md-4 col-lg-3 col-form-label">Jenis Kelamin</label>
                                            <div class="col-md-8 col-lg-9">
                                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                                    <option value="Laki-laki" {{ $pegawai->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                                    <option value="Perempuan" {{ $pegawai->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="id_agama" class="col-md-4 col-lg-3 col-form-label">Agama</label>
                                            <div class="col-md-8 col-lg-9">
                                                <select name="id_agama" id="id_agama" class="form-control">
                                                    @foreach($listagama as $agama)
                                                        <option value="{{ $agama->agama_id }}" {{ $pegawai->id_agama == $agama->agama_id ? 'selected' : '' }}>
                                                            {{ $agama->nama_agama }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="no_hp" class="col-md-4 col-lg-3 col-form-label">No Hp</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="no_hp" type="text" class="form-control" id="no_hp" value="{{ $pegawai->no_hp }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="email" type="email" class="form-control" id="email" value="{{ $pegawai->email }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="alamat_lengkap" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                                            <div class="col-md-8 col-lg-9">
                                                <textarea name="alamat_lengkap" class="form-control" id="alamat_lengkap" style="height: 100px">{{ $pegawai->alamat_lengkap }}</textarea>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="rt" class="col-md-4 col-lg-3 col-form-label">RT</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="rt" type="text" class="form-control" id="rt" value="{{ $pegawai->rt }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="rw" class="col-md-4 col-lg-3 col-form-label">RW</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="rw" type="text" class="form-control" id="rw" value="{{ $pegawai->rw }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="kelurahan" class="col-md-4 col-lg-3 col-form-label">Kelurahan</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="kelurahan" type="text" class="form-control" id="kelurahan" value="{{ $pegawai->kelurahan }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="kecamatan" class="col-md-4 col-lg-3 col-form-label">Kecamatan</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="kecamatan" type="text" class="form-control" id="kecamatan" value="{{ $pegawai->kecamatan }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="kota_kabupaten" class="col-md-4 col-lg-3 col-form-label">Kabupaten/Kota</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="kota_kabupaten" type="text" class="form-control" id="kota_kabupaten" value="{{ $pegawai->kota_kabupaten }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="kode_pos" class="col-md-4 col-lg-3 col-form-label">Kode Pos</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="kode_pos" type="text" class="form-control" id="kode_pos" value="{{ $pegawai->kode_pos }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="homebase" class="col-md-4 col-lg-3 col-form-label">Homebase</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="homebase" type="text" class="form-control" id="homebase" value="{{ $pegawai->homebase }}">
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                    <!-- End Profile Edit Form -->

                                </div>

                                <div class="tab-pane fade pt-3" id="profile-settings" role="tabpanel">
                                

                                    <!-- Role Change Form -->
                                    <form action="{{ route('pegawai.change-role', $pegawai->pegawai_id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="row mb-3">
                                            <label for="role_id" class="col-md-4 col-lg-3 col-form-label">Select Role</label>
                                            <div class="col-md-8 col-lg-9">
                                                <select name="role_id" id="role_id" class="form-control" required>
                                                    @foreach($rolelist as $role)
                                                        <option value="{{ $role->role_id }}" {{ $pegawai->user->id_role == $role->role_id ? 'selected' : '' }}>
                                                            {{ $role->nama_role }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Change Role</button>
                                        </div>
                                    </form><!-- End Role Change Form -->

                                </div>

                                <div class="tab-pane fade pt-3" id="profile-change-password" role="tabpanel">
                                
                                     <!-- Change Password Form -->
                                    <form action="{{ route('pegawai.change-password') }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="row mb-3">
                                            <label for="current_password" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="current_password" type="password" class="form-control" id="current_password" required>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="new_password" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="new_password" type="password" class="form-control" id="new_password" required>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="new_password_confirmation" class="col-md-4 col-lg-3 col-form-label">Confirm New Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="new_password_confirmation" type="password" class="form-control" id="new_password_confirmation" required>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Change Password</button>
                                        </div>
                                    </form><!-- End Change Password Form -->

                                </div>

                            </div><!-- End Bordered Tabs -->

                        </div>
                    </div>

                </div>
            </div>
        </section>


    </main>

     <!-- untuk priview foto -->
  <script>
    function previewImage(event) {
        const reader = new FileReader();
        const imageElement = document.querySelector('img.editrounded');

        reader.onload = function() {
            if (reader.readyState === 2) {
                imageElement.src = reader.result;
            }
        };

        reader.readAsDataURL(event.target.files[0]);
    }

    function removeImage() {
        const imageElement = document.querySelector('img.editrounded');
        const fileInput = document.getElementById('file_foto');

        // Reset the file input
        fileInput.value = '';

        // Set the image back to the default or placeholder
        imageElement.src = "{{ asset('storage/' . $pegawai->file_foto) }}";
    }
</script>

<script>
    function removePhoto() {
        // Set the hidden input value to 1 (indicating photo removal)
        document.getElementById('remove_photo').value = '1';

        // Update the image preview to show a placeholder
        const imageElement = document.querySelector('img.editrounded');
        imageElement.src = "{{ asset('image/nophoto.jpg') }}";

        // Clear the file input (if any)
        const fileInput = document.getElementById('file_foto');
        fileInput.value = '';
    }
</script>
@endsection