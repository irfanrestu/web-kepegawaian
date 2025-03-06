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
                    <div class="col-lg-6 col-md-6 mb-5">
                        @foreach($posts as $post)
                        <div class="blog-item">
                            <img src="{{asset('blog1/images/blog/1.jpg')}}" alt="" class="img-fluid rounded">

                            <div class="blog-item-content bg-white p-5">
                                <div class="blog-item-meta bg-gray py-1 px-2">
                                    <span class="text-muted text-capitalize mr-3"><i class="bi bi-person"> {{$post->user->name}} </i></span>
                                    <span class="text-muted text-capitalize mr-3"><i class="ti-comment mr-2"></i>{{$post->user->role->nama_role}}</span>
                                    <span class="text-black text-capitalize mr-3"><i class="ti-time mr-1"></i>{{ $post->created_at->format('d M Y') }}</span>
                                </div> 

                                <h3 class="mt-3 mb-3"><a href="blog-single.html">{{$post->judul}}</a></h3>
                                <p class="mb-4">{{$post->content}}</p>

                                <a href="blog-single.html" class="btn btn-secondary rounded-pill">Learn More</a>
                            </div>
                        @endforeach
                        </div>
                    </div>

                    
                    <div class="col-lg-6 col-md-6 mb-5">
                        <div class="blog-item">
                            <img src="images/blog/4.jpg" alt="" class="img-fluid rounded">

                            <div class="blog-item-content bg-white p-5">
                                <div class="blog-item-meta bg-gray py-1 px-2">
                                    <span class="text-muted text-capitalize mr-3"><i class="ti-pencil-alt mr-2"></i>Marketing</span>
                                    <span class="text-muted text-capitalize mr-3"><i class="ti-comment mr-2"></i>5 Comments</span>
                                    <span class="text-black text-capitalize mr-3"><i class="ti-time mr-1"></i> 28th January</span>
                                </div>  

                                <h3 class="mt-3 mb-3"><a href="blog-single.html">Marketing Strategy to bring more affect</a></h3>
                                <p class="mb-4">Non illo quas blanditiis repellendus laboriosam minima animi. Consectetur accusantium pariatur repudiandae!</p>

                                <a href="blog-single.html" class="btn btn-secondary rounded-pill">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center mt-5">
                    <div class="col-lg-6 text-center">
                        <nav class="navigation pagination d-inline-block">
                            <div class="nav-links">
                                <a class="prev page-numbers" href="#">Prev</a>
                                <span aria-current="page" class="page-numbers current">1</span>
                                <a class="page-numbers" href="#">2</a>
                                <a class="next page-numbers" href="#">Next</a>
                            </div>
                        </nav>
                    </div>
                </div>
        </div>
    </section>
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>
                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>

                    <div class="card-body pb-0">
                        <h5 class="card-title">News &amp; Updates <span>| Today</span></h5>

                        <div class="news">
                            <div class="row">
                            <div class="col-lg-2 col-md-1 label"><img src="assets/img/news-1.jpg" alt="" style="width: 180px; height: auto;"></div>
                            <div class="col-lg-8 col-md-4 label"><h4><a href="#">Judul Berita</a></h4></div> </br>
                            <div class="col-lg-8 col-md-8"></div><p>Sit recusandae non aspernatur laboriosam. Quia enim eligendi sed ut harum...</p></div>
                            </div>
                            
                        </div><!-- End sidebar recent posts-->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection