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
				<div class="blog-item-meta bg-gray py-1 px-2">
                <span class="text-muted text-capitalize mr-3"><i class="bi bi-person"> {{$post->user->name}} </i></span>
                                    <span class="text-muted text-capitalize mr-3"><i class="ti-comment mr-2"></i>{{$post->user->role->nama_role}}</span>
                                    <span class="text-black text-capitalize mr-3"><i class="ti-time mr-1"></i>{{ $post->created_at->format('d M Y') }}</span>
				</div> 

				<h2 class="mt-3 mb-4">{{ $post->judul }}</h2>
				<p class="lead mb-4">{{ $post->content}}</p>

				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus natus, consectetur? Illum libero vel nihil nisi quae, voluptatem, sapiente necessitatibus distinctio voluptates, iusto qui. Laboriosam autem, nam voluptate in beatae.</p>

				<h3 class="quote">A brand for a company is like a reputation for a person. You earn reputation by trying to do hard things well.</h3>
				
				<p class="lead mb-4 font-weight-normal text-black">The same is true as we experience the emotional sensation of stress from our first instances of social rejection ridicule. We quickly learn to fear and thus automatically.</p>

				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste, rerum beatae repellat tenetur incidunt quisquam libero dolores laudantium. Nesciunt quis itaque quidem, voluptatem autem eos animi laborum iusto expedita sapiente.</p>

				<div class="tag-option mt-5 clearfix">
				    <ul class="float-left list-inline"> 
				    	<li>Tags:</li> 
				    	<li class="list-inline-item"><a href="#" rel="tag">Advancher</a></li>
				    	<li class="list-inline-item"><a href="#" rel="tag">Landscape</a></li>
				    	<li class="list-inline-item"><a href="#" rel="tag">Travel</a></li>
				   	</ul>        

				    <ul class="float-right list-inline">
				        <li class="list-inline-item"> Share: </li>
				        <li class="list-inline-item"><a href="#" target="_blank"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
				        <li class="list-inline-item"><a href="#" target="_blank"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
				        <li class="list-inline-item"><a href="#" target="_blank"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a></li>
				        <li class="list-inline-item"><a href="#" target="_blank"><i class="fab fa-google-plus" aria-hidden="true"></i></a></li>
				    </ul>
			    </div>
			</div>
		</div>
	</div>


	<div class="col-lg-12 mb-5">
		<div class="posts-nav bg-white p-5 d-lg-flex d-md-flex justify-content-between ">
			<a class="post-prev align-items-center" href="#">
				<div class="posts-prev-item mb-4 mb-lg-0">
					<span class="nav-posts-desc text-color">- Previous Post</span>
					<h6 class="nav-posts-title mt-1">
						Donec consectetuer ligula <br>vulputate sem tristique.
					</h6>
				</div>
			</a>
			<div class="border"></div>
			<a class="posts-next" href="#">
				<div class="posts-next-item pt-4 pt-lg-0">
					<span class="nav-posts-desc text-lg-right text-md-right text-color d-block">- Next Post</span>
					<h6 class="nav-posts-title mt-1">
						Ut aliquam sollicitudin leo.
					</h6>
				</div>
			</a>
		</div>
	</div>

	<div class="col-lg-12 mb-5">
		<div class="comment-area card border-0 p-5">
			<h4 class="mb-4">2 Comments</h4>
			<ul class="comment-tree list-unstyled">
				<li class="mb-5">
					<div class="comment-area-box">
						<img alt="" src="images/blog/test1.jpg" class="img-fluid float-left mr-3 mt-2">

						<h5 class="mb-1">Philip W</h5>
						<span>United Kingdom</span>

						<div class="comment-meta mt-4 mt-lg-0 mt-md-0 float-lg-right float-md-right">
							<a href="#"><i class="icofont-reply mr-2 text-muted"></i>Reply |</a>
							<span class="date-comm">Posted October 7, 2018 </span>
						</div>

						<div class="comment-content mt-3">
							<p>Some consultants are employed indirectly by the client via a consultancy staffing company, a company that provides consultants on an agency basis. </p>
						</div>
					</div>
				</li>

				<li>
					<div class="comment-area-box">
						<img alt="" src="images/blog/test2.jpg" class="mt-2 img-fluid float-left mr-3">

						<h5 class="mb-1">Philip W</h5>
						<span>United Kingdom</span>

						<div class="comment-meta mt-4 mt-lg-0 mt-md-0 float-lg-right float-md-right">
							<a href="#"><i class="icofont-reply mr-2 text-muted"></i>Reply |</a>
							<span class="date-comm">Posted October 7, 2018</span>
						</div>

						<div class="comment-content mt-3">
							<p>Some consultants are employed indirectly by the client via a consultancy staffing company, a company that provides consultants on an agency basis. </p>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>

	<div class="col-lg-12">
		<form class="contact-form bg-white rounded p-5" id="comment-form">
			<h4 class="mb-4">Write a comment</h4>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<input class="form-control" type="text" name="name" id="name" placeholder="Name:">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<input class="form-control" type="text" name="mail" id="mail" placeholder="Email:">
					</div>
				</div>
			</div>


			<textarea class="form-control mb-3" name="comment" id="comment" cols="30" rows="5" placeholder="Comment"></textarea>

			<input class="btn btn-main btn-round-full" type="submit" name="submit-contact" id="submit_contact" value="Submit Message">
		</form>
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