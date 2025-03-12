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
                            <h3>{{ $pegawai->user->role->nama_role }}</h3>
                            @empty($pegawai->file_foto)
                                <img src="{{url('image/nophoto.jpg')}}" alt="project-image" class="rounded"
                                    style="width: 100%; max-width: 100px; height: auto;">
                            @else
                                <img src="{{ asset('storage/' . $pegawai->file_foto) }}" alt="Foto Pegawai" class="rounded"
                                    style="width: 100%; max-width: 200px; height: auto;">
                            @endempty

                            <h2>{{ $pegawai->nama_lengkap }}</h2>
                            <h3>{{ $pegawai->statuspegawai->status_pegawai }}</h3>
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
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#riwayar-kepegawaian"
                                        aria-selected="false" tabindex="-1" role="tab">Riwayat Kepegawaian</button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#riwayat-pendidikan"
                                        aria-selected="false" tabindex="-1" role="tab">Riwayat Pendidikan</button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#dokumen-pendukung"
                                        aria-selected="false" tabindex="-1" role="tab">Dokumen Pendukung</button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings"
                                        aria-selected="false" tabindex="-1" role="tab">Change Role</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">

                                @include('data_pegawai.pengaturan.biodata.index')

                                @include('data_pegawai.pengaturan.biodata.edit')

                                @include('data_pegawai.pengaturan.riwayat_kepegawaian.index')

                                @include('data_pegawai.pengaturan.riwayat_pendidikan.index')

                                @include('data_pegawai.pengaturan.dokumen_pendukung.index')


                                <div class="tab-pane fade pt-3" id="profile-settings" role="tabpanel">


                                    <!-- Role Change Form -->
                                    <form action="{{ route('pegawai.change-role', $pegawai->pegawai_id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="row mb-3">
                                            <label for="role_id" class="col-md-4 col-lg-3 col-form-label">Select
                                                Role</label>
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
                                            <label for="current_password" class="col-md-4 col-lg-3 col-form-label">Current
                                                Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="current_password" type="password" class="form-control"
                                                    id="current_password" required>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="new_password" class="col-md-4 col-lg-3 col-form-label">New
                                                Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="new_password" type="password" class="form-control"
                                                    id="new_password" required>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="new_password_confirmation"
                                                class="col-md-4 col-lg-3 col-form-label">Confirm New Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="new_password_confirmation" type="password" class="form-control"
                                                    id="new_password_confirmation" required>
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

            reader.onload = function () {
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