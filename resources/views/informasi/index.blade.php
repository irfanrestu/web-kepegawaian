@extends('layouts.main')
@section('content')

      
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Post Artikel</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Post Artikel</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="main-wrapper ">
                        <section class="page-title bg-1">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="block text-center">                            
                                            <h1 class="text-capitalize mb-4 text-lg">Blog articles</h1>                          
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>    
                        <section class="section blog-wrap bg-gray">
                            <div class="card-body">
                                <div class="row">
                                    @foreach($posts as $post)
                                    <div class="col-lg-6 col-md-6 mb-5">
                                        <div class="blog-item">
                                            <div class="blog-item-content bg-white p-5">
                                                @empty($post->thumbnail)
                                                    <img src="{{url('image/nophoto.jpg')}}"
                                                        alt="project-image" class="rounded" style="width: 100%; max-width: 360px; height: auto;">
                                                @else
                                                    <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Foto Pegawai" class="rounded" style="width: 100%; max-width: 400px; height: auto;">
                                                @endempty
                                                    <div class="blog-item-meta bg-gray py-1 px-2">
                                                        <span class="text-muted text-capitalize mr-3"><i class="bi bi-person"> {{$post->user->name}} </i></span>
                                                        <span class="text-muted text-capitalize mr-3"><i class="ti-comment mr-2"></i>|{{$post->user->role->nama_role}}|</span>
                                                        <span class="text-black text-capitalize mr-3"><i class="ti-time mr-1"></i>{{ $post->created_at->format('d M Y') }}</span>
                                                    </div> 
                                                <div class="blog-item-content1">
                                                    <h3 class="mt-3 mb-3"><a href="blog-single.html">{{$post->judul}}</a></h3>
                                                    <p class="mb-4">{!!$post->content!!}</p>
                                                </div>
                                                    <a href="{{Route('post.singlepost', $post->slug)}}" class="btn btn-secondary rounded-pill">Learn More</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                   
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>    
</main>

@endsection