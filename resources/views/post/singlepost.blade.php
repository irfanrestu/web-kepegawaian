@extends('layouts.main')
@section('content')
<main id="main" class="main">

<section class="section blog-wrap bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
	<div class="col-lg-12 mb-5">
		<div class="single-blog-item">
			<img src="images/blog/2.jpg" alt="" class="img-fluid rounded">
			
			<div class="blog-item-content bg-white p-5">
    @empty($post->thumbnail)
        <!-- Centered No Photo Image -->
        <div style="display: flex; justify-content: center;">
            <img src="{{url('image/nophoto.jpg')}}"
                 alt="project-image" 
                 class="img-fluid rounded" 
                 style="width: 100%; max-width: 600px; height: auto;">
        </div>
    @else
        <!-- Centered Thumbnail Image -->
        <div style="display: flex; justify-content: center;">
            <img src="{{ asset('storage/' . $post->thumbnail) }}" 
                 alt="Foto thumbnail" 
                 class="rounded" 
                 style="width: 100%; max-width: 600px; height: auto;">
        </div>
    @endempty

    <div class="blog-item-meta bg-gray py-1 px-2">
        <span class="text-muted text-capitalize mr-3">
            <i class="bi bi-person"> {{$post->user->name}} </i>
        </span>
        <span class="text-muted text-capitalize mr-3">
            <i class="ti-comment mr-2"></i>{{$post->user->role->nama_role}}
        </span>
        <span class="text-black text-capitalize mr-3">
            <i class="ti-time mr-1"></i>{{ $post->created_at->format('d M Y') }}
        </span>
    </div>

    <h2 class="mt-3 mb-4">{{ $post->judul }}</h2>
    <p class="lead mb-4">{!! $post->content!!}</p>
</div>
		</div>
	</div>


	
</div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar-wrap">

	<div class="sidebar-widget card border-0 mb-3">
    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                            @empty($post->user->pegawai->file_foto)
                                <img src="{{url('image/nophoto.jpg')}}"
                                    alt="project-image" class="rounded" style="width: 100%; max-width: 100px; height: auto;">
                            @else
                                <img src="{{ asset('storage/' . $post->user->pegawai->file_foto) }}" alt="Foto Pegawai" class="rounded" style="width: 100%; max-width: 200px; height: auto;">
                            @endempty
                            
                            <h2>{{ $post->user->pegawai->nama_lengkap }}</h2>
                            <h3>{{ $post->user->pegawai->statuspegawai->status_pegawai }}</h3>
                            <div class="social-links mt-2">
                                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
	</div>

	
    </div>
            </div>   
        </div>
    </div>
</section>

</main>
@endsection