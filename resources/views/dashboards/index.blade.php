@extends('layouts.main')
@section('content')
<main id="main" class="main">
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


        <section class="section dashboard">
                  <div class="row">

                    <!-- Left side columns -->
                    <div class="col-lg-8">
                      <div class="row">

                        <!-- Post Count Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown">
                                        <i class="bi bi-three-dots"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>
                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Artikel <span>| Total</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-newspaper"></i>
                                        </div>
                                        <div class="ps-3">
                                          <h6>{{ $postCount }}</h6>
                                          @if($percentageChange >= 0)
                                              <span class="text-success small pt-1 fw-bold">{{ number_format($percentageChange, 2) }}%</span>
                                              <span class="text-muted small pt-2 ps-1">increase</span>
                                          @else
                                              <span class="text-danger small pt-1 fw-bold">{{ number_format(abs($percentageChange), 2) }}%</span>
                                              <span class="text-muted small pt-2 ps-1">decrease</span>
                                          @endif
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Post Count Card -->

                      <!-- Pegawai Status Card -->
                        <div class="col-xxl-4 col-xl-12">
                            <div class="card info-card customers-card">
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown">
                                        <i class="bi bi-three-dots"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>
                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Pegawai Status <span>| This Year</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                          @foreach($pegawaiCounts as $status)
                                              <h6>{{ $status->status_pegawai }}: {{ $status->count }}</h6>
                                              @if($status->percentageChange >= 0)
                                                  <span class="text-success small pt-1 fw-bold">{{ number_format($status->percentageChange, 2) }}%</span>
                                                  <span class="text-muted small pt-2 ps-1">increase</span>
                                              @else
                                                  <span class="text-danger small pt-1 fw-bold">{{ number_format(abs($status->percentageChange), 2) }}%</span>
                                                  <span class="text-muted small pt-2 ps-1">decrease</span>
                                              @endif
                                          @endforeach
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Pegawai Status Card -->

                        <!-- Pegawai Card -->
                          <div class="col-xxl-4 col-xl-12">
                              <div class="card info-card customers-card">
                                  <div class="filter">
                                      <a class="icon" href="#" data-bs-toggle="dropdown">
                                          <i class="bi bi-three-dots"></i>
                                      </a>
                                      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                          <li class="dropdown-header text-start">
                                              <h6>Filter</h6>
                                          </li>
                                          <li><a class="dropdown-item" href="#">Today</a></li>
                                          <li><a class="dropdown-item" href="#">This Month</a></li>
                                          <li><a class="dropdown-item" href="#">This Year</a></li>
                                      </ul>
                                  </div>

                                  <div class="card-body">
                                      <h5 class="card-title">Pegawai <span>| Total</span></h5>

                                      <div class="d-flex align-items-center">
                                          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                              <i class="bi bi-people"></i>
                                          </div>
                                          <div class="ps-3">
                                                <h6>{{ $pegawaiCount }}</h6>
                                                @if($percentageChange >= 0)
                                                    <span class="text-success small pt-1 fw-bold">{{ number_format($percentageChange, 2) }}%</span>
                                                    <span class="text-muted small pt-2 ps-1">increase</span>
                                                @else
                                                    <span class="text-danger small pt-1 fw-bold">{{ number_format(abs($percentageChange), 2) }}%</span>
                                                    <span class="text-muted small pt-2 ps-1">decrease</span>
                                                @endif
                                            </div>
                                      </div>
                                  </div>
                              </div>
                          </div><!-- End Pegawai Card -->

                          <!-- News & Updates Card -->
                          <div class="card">
                              <div class="filter">
                                  <a class="icon" href="#" data-bs-toggle="dropdown">
                                      <i class="bi bi-three-dots"></i>
                                  </a>
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
                                  <h5 class="card-title">News & Updates <span>| Today</span></h5>

                                  <div class="news">
                                      @foreach($posts as $post)
                                          <div class="post-item clearfix">
                                              <!-- Display the post thumbnail -->
                                              @if($post->thumbnail)
                                                  <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->judul }}">
                                              @else
                                                  <img src="{{ asset('image/nophoto.jpg') }}" alt="No Thumbnail">
                                              @endif

                                              <!-- Display the post title and content -->
                                              <h4><a href="{{Route('post.singlepost', $post->slug)}}">{{ $post->judul }}</a></h4>
                                              <p>{{ Str::limit($post->content, 100) }}</p> <!-- Limit content to 100 characters -->
                                          </div>
                                      @endforeach
                                  </div><!-- End sidebar recent posts -->
                              </div>
                          </div><!-- End News & Updates Card -->


                      </div>
                    </div><!-- End Left side columns -->

                    <div class="col-lg-4">

                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <h3>{{ $user->role->nama_role }}</h3>
                        @empty($user->pegawai->file_foto)
                            <a href="{{ route('profile.index') }}">
                                <img src="{{ url('image/nophoto.jpg') }}" alt="project-image" class="rounded" style="width: 100%; max-width: 100px; height: auto;">
                            </a>
                        @else
                            <a href="{{ route('profile.index') }}">
                                <img src="{{ asset('storage/' . $user->pegawai->file_foto) }}" alt="Foto Pegawai" class="rounded" style="width: 100%; max-width: 200px; height: auto;">
                            </a>
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

                  </div>
                </section>

  </main>
      
                <script src="https://code.highcharts.com/highcharts.js"></script>
@endsection