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
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Table Post Artikel</h5>
                        <a href="{{Route('post.create')}}" class="btn btn-sm btn-primary">Tambah Artikel</a>
                        <!-- Table with hoverable rows -->
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="100px">Thumbnail</th>
                                    <th scope="col">Nama Pembuat</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Tanggal Post</th>
                                    <th scope="col">Action</th>
                                </tr>

                            </thead>
                            <tbody>
                              @foreach($posts as $po)
                                    <tr>
                                        <th scope="row">                    
                                        @if($po->thumbnail)
                                                    <img src="{{ asset('storage/' . $po->thumbnail) }}" alt="Thumbnail" class="rounded" style="width: 100px; height: auto;">
                                                @else
                                                    <img src="{{ asset('image/nophoto.jpg') }}" alt="Thumbnail" class="rounded" style="width: 100px; height: auto;">
                                                @endif
                                        </th>
                                        <td>{{ $po->user->name}}</td>
                                        <td>{{ $po->judul }}  </td>
                                        <td>{{ $po->created_at}}  </td>
                                        <td>
                                            <a href="{{Route('post.singlepost', $po->slug)}}"
                                                class="btn btn-sm btn-info">View</a>
                                            <a href="{{Route('post.edit', $po->post_id)}}"
                                                class="btn btn-sm btn-success">Edit</a>
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                Hapus
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus
                                                                Post</h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah anda yakin akan menghapus data 
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>

                                                            <form
                                                                action="{{ route('post.destroy', $po->post_id) }}"
                                                                method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-danger">Delete</button>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with hoverable rows -->



                    </div>
                </div>
            </div>
        </div>
</section>
</main>

@endsection