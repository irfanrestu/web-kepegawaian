@extends('layouts.main')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Edit Post Artikel</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Kelolah Post</a></li>
                <li class="breadcrumb-item">Edit Post</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="container-fluid px-4">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Edit Post Artikel
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
                <form action="{{ route('post.update', $post->post_id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <label for="thumbnail" class="col-md-4 col-lg-3 col-form-label">Thumbnail</label>
                        <div class="col-md-8 col-lg-9">
                            @if($post->thumbnail)
                                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Thumbnail" class="roundedthumb" style="width: 100px; height: auto;">
                            @else
                                <img src="{{ asset('image/nophoto.jpg') }}" alt="Thumbnail" class="roundedthumb" style="width: 100px; height: auto;">
                            @endif
                            <div class="pt-2">
                                <label for="thumbnail" class="btn btn-primary btn-sm" title="Upload new thumbnail">
                                    <i class="bi bi-upload"></i>
                                    <input type="file" class="form-control d-none" id="thumbnail" name="thumbnail" onchange="previewImage(event)">
                                </label>
                                <button type="button" class="btn btn-danger btn-sm" title="Remove thumbnail" onclick="removePhoto()">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <input type="hidden" name="remove_photo" id="remove_photo" value="0">
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="judul" class="col-md-4 col-lg-3 col-form-label">Judul</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="judul" type="text" class="form-control" id="judul" value="{{ $post->judul }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="content" class="col-md-4 col-lg-3 col-form-label">Isi Konten</label>
                        <div class="col-md-8 col-lg-9">
                            <textarea name="content" class="form-control" id="content" style="height: 100px">{{ $post->content }}</textarea>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>  
            </div>
        </div>
    </div>

</main>

<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#content'), {
            toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
        })
        .catch(error => {
            console.error(error);
        });

    function previewImage(event) {
        const reader = new FileReader();
        const imageElement = document.querySelector('img.roundedthumb');

        reader.onload = function() {
            if (reader.readyState === 2) {
                imageElement.src = reader.result;
            }
        };

        reader.readAsDataURL(event.target.files[0]);
    }

    function removePhoto() {
        document.getElementById('remove_photo').value = '1';
        const imageElement = document.querySelector('img.roundedthumb');
        imageElement.src = "{{ asset('image/nophoto.jpg') }}";
        const fileInput = document.getElementById('thumbnail');
        fileInput.value = '';
    }
</script>
@endsection