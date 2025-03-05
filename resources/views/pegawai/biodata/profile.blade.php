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
                            @empty($pegawai_id->file_foto)
                                <img src="{{url('image/nophoto.jpg')}}"
                                    alt="project-image" class="rounded" style="width: 100%; max-width: 100px; height: auto;">
                            @else
                                <img src="{{ asset('storage/' . $pegawai_id->file_foto) }}" alt="Foto Pegawai" class="rounded" style="width: 100%; max-width: 200px; height: auto;">
                            @endempty
                            
                            <h2>{{ $pegawai_id->nama_lengkap }}</h2>
                            <h3>{{ $pegawai_id->statuspegawai->status_pegawai }}</h3>
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
                                        aria-selected="false" tabindex="-1" role="tab">Settings</button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password"
                                        aria-selected="false" tabindex="-1" role="tab">Change Password</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview"
                                    role="tabpanel">

                                    <h5 class="card-title">Profile Details</h5>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Name Lengkap</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $pegawai_id->nama_lengkap }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Gelar Depan</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $pegawai_id->gelar_depan }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Gelar Belakang</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $pegawai_id->gelar_belakang }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">NIP</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $pegawai_id->nip }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">NPWP</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $pegawai_id->npwp }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">No Kartu Pegawai</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $pegawai_id->no_karpeg }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">No BPJS</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $pegawai_id->no_bpjs }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">No Kartu Keluarga</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $pegawai_id->no_kartu_keluarga }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">NIK</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $pegawai_id->no_nik }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Status Pegawai</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $pegawai_id->statuspegawai->status_pegawai }}
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Tempat Lahir</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $pegawai_id->tempat_lahir }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Tanggal Lahir</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $pegawai_id->tanggal_lahir }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Jenis Kelamin</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $pegawai_id->jenis_kelamin }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Agama</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $pegawai_id->agama->nama_agama }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">No HP</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $pegawai_id->no_hp }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $pegawai_id->email }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Alamat</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $pegawai_id->alamat_lengkap }}</div>
                                        <div class="col-lg-3 col-md-4 label">RT</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $pegawai_id->rt }}</div>
                                        <div class="col-lg-3 col-md-4 label">RW</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $pegawai_id->rw }}</div>
                                        <div class="col-lg-3 col-md-4 label">Kelurahan</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $pegawai_id->kelurahan }}</div>
                                        <div class="col-lg-3 col-md-4 label">Kota/Kabupaten</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $pegawai_id->kota_kabupaten }}</div>
                                        <div class="col-lg-3 col-md-4 label">Kode Pos</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $pegawai_id->kode_pos }}</div>
                                        <div class="col-lg-3 col-md-4 label">Homebase</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $pegawai_id->homebase }}</div>
                                    </div>





                                </div>

                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit" role="tabpanel">

                                    <!-- Profile Edit Form -->
                                    <form>
                                        <div class="row mb-3">
                                            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile
                                                Image</label>
                                            <div class="col-md-8 col-lg-9">
                                                <img src="assets/img/profile-img.jpg" alt="Profile">
                                                <div class="pt-2">
                                                    <a href="#" class="btn btn-primary btn-sm"
                                                        title="Upload new profile image"><i class="bi bi-upload"></i></a>
                                                    <a href="#" class="btn btn-danger btn-sm"
                                                        title="Remove my profile image"><i class="bi bi-trash"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="fullName" type="text" class="form-control" id="fullName"
                                                    value="Kevin Anderson">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                                            <div class="col-md-8 col-lg-9">
                                                <textarea name="about" class="form-control" id="about"
                                                    style="height: 100px">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</textarea>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="company" class="col-md-4 col-lg-3 col-form-label">Company</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="company" type="text" class="form-control" id="company"
                                                    value="Lueilwitz, Wisoky and Leuschke">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="job" type="text" class="form-control" id="Job"
                                                    value="Web Designer">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="country" type="text" class="form-control" id="Country"
                                                    value="USA">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="address" type="text" class="form-control" id="Address"
                                                    value="A108 Adam Street, New York, NY 535022">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="phone" type="text" class="form-control" id="Phone"
                                                    value="(436) 486-3538 x29071">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="email" type="email" class="form-control" id="Email"
                                                    value="k.anderson@example.com">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter
                                                Profile</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="twitter" type="text" class="form-control" id="Twitter"
                                                    value="https://twitter.com/#">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook
                                                Profile</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="facebook" type="text" class="form-control" id="Facebook"
                                                    value="https://facebook.com/#">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram
                                                Profile</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="instagram" type="text" class="form-control" id="Instagram"
                                                    value="https://instagram.com/#">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin
                                                Profile</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="linkedin" type="text" class="form-control" id="Linkedin"
                                                    value="https://linkedin.com/#">
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form>
                                    <!-- End Profile Edit Form -->

                                </div>

                                <div class="tab-pane fade pt-3" id="profile-settings" role="tabpanel">

                                    <!-- Settings Form -->
                                    <form>

                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email
                                                Notifications</label>
                                            <div class="col-md-8 col-lg-9">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="changesMade"
                                                        checked="">
                                                    <label class="form-check-label" for="changesMade">
                                                        Changes made to your account
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="newProducts"
                                                        checked="">
                                                    <label class="form-check-label" for="newProducts">
                                                        Information on new products and services
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="proOffers">
                                                    <label class="form-check-label" for="proOffers">
                                                        Marketing and promo offers
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="securityNotify"
                                                        checked="" disabled="">
                                                    <label class="form-check-label" for="securityNotify">
                                                        Security alerts
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form><!-- End settings Form -->

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
@endsection