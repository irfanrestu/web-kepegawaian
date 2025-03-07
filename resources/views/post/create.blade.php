@extends('layouts.main')
@section('content')
<main id="main" class="main">

            <div class="pagetitle">
                <h1>Tambah Post Artikel</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Kelolah Post</a></li>
                        <li class="breadcrumb-item">Tambah Post</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->

                    <div class="container-fluid px-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Tambah Post Artikel
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
                                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row mb-3">
                                        <label for="thumbnail" class="col-md-4 col-lg-3 col-form-label">Thumbnail</label>
                                            <div class="col-md-8 col-lg-9">
                                                <!-- Thumbnail Preview -->
                                                <img id="thumbnail-preview" src="#" alt="Thumbnail Preview" style="display: none; max-width: 200px; margin-bottom: 10px;">
                                                <input type="file" class="form-control" id="thumbnail" name="thumbnail" onchange="previewThumbnail(event)">
                                            </div>
                                        </div>

                                        
                                        <div class="row mb-3">
                                            <label for="judul" class="col-md-4 col-lg-3 col-form-label">Judul</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="judul" type="text" class="form-control" id="judul"
                                                    value="{{ old('judul') }}">
                                            </div>
                                        </div>
                                       

                                        <div class="row mb-3">
                                            <label for="alamat_lengkap" class="col-md-4 col-lg-3 col-form-label">Isi Konten</label>
                                            <div class="col-md-8 col-lg-9">
                                                <textarea name="content" class="form-control" id="content"
                                                    style="height: 100px">{{ old('content') }}</textarea>
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

<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
<script>
    // Initialize CKEditor
    ClassicEditor
        .create(document.querySelector('#content'), {
            // CKEditor configuration options (optional)
            toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
        })
        .catch(error => {
            console.error(error);
        });

        // Thumbnail Preview Function
    function previewThumbnail(event) {
        const input = event.target;
        const preview = document.getElementById('thumbnail-preview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '#';
            preview.style.display = 'none';
        }
    }
</script>
@endsection