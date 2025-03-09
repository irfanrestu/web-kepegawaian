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
                            @empty($user->pegawai->file_foto)
                                <img src="{{url('image/nophoto.jpg')}}" alt="project-image" class="rounded"
                                    style="width: 100%; max-width: 100px; height: auto;">
                            @else
                                <img src="{{ asset('storage/' . $user->pegawai->file_foto) }}" alt="Foto Pegawai"
                                    class="rounded" style="width: 100%; max-width: 200px; height: auto;">
                            @endempty

                            <h2>{{ $user->pegawai->nama_lengkap }}</h2>
                            <h3>{{ $user->pegawai->statuspegawai->status_pegawai }}</h3>
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

                                @if (auth()->user()->id_role != 1)
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
                                @endif

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password"
                                        aria-selected="false" tabindex="-1" role="tab">Change Password</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">

                                @include('profile_pribadi.biodata.index')

                                @include('profile_pribadi.biodata.edit')

                                @include('profile_pribadi.biodata.password')

                                @include('profile_pribadi.riwayat_kepegawaian.index')

                                @include('profile_pribadi.riwayat_pendidikan.index')

                                @include('profile_pribadi.dokumen_pendukung.index')


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
            imageElement.src = "{{ asset('storage/' . $user->pegawai->file_foto) }}";
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