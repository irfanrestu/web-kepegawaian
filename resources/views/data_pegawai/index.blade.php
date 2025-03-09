@extends('layouts.main')
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

    <section class="section">
    <div class="row">
      <div class="col-lg-12">
      <div class="card">
        <div class="card">
        <div class="card-body">
          <h5 class="card-title">Table Biodata Pegawai</h5>
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
          <a href="{{ route('biodata.create') }}" class="btn btn-sm btn-primary">Tambah data</a>
          <!-- Table with hoverable rows -->
          <table class="table table-hover">
          <thead>
            <tr>
            <th scope="col" width="100px">Foto</th>
            <th scope="col">Nama Lengkap</th>
            <th scope="col">NIP</th>
            <th scope="col">NIK</th>
            <th scope="col">Status Pegawai</th>
            <th scope="col">Alamat</th>
            <th scope="col">Email</th>
            <th scope="col">No Telepon</th>
            <th scope="col">Action</th>
            </tr>

          </thead>
          <tbody>
            @foreach ($pegawai as $p)
          <tr>
          <th scope="row">
            @empty($p->file_foto)
        <img src="{{url('image/nophoto.jpg')}}" alt="project-image" class="rounded"
        style="width: 100%; max-width: 100px; height: auto;">
      @else
    <img src="{{ asset('storage/' . $p->file_foto) }}" alt="Foto Pegawai" class="rounded"
    style="width: 100%; max-width: 100px; height: auto;">
  @endempty
          </th>
          <td>{{ $p->nama_lengkap }}</td>
          <td> {{ $p->nip }} </td>
          <td> {{ $p->no_nik }} </td>
          <td> {{ $p->statuspegawai->status_pegawai }} </td>
          <td> {{ $p->alamat_lengkap }} </td>
          <td> {{ $p->email }} </td>
          <td> {{ $p->no_hp }} </td>
          <td>
            <a href="{{ route('data_pegawai.pegaturan', $p->pegawai_id) }}"
            class="btn btn-sm btn-info">Pengaturan</a>
            <!-- <a href="{{ route('biodata.edit', $p->pegawai_id, ) }}"
        class="btn btn-sm btn-success">edit</a> -->
            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
            data-bs-target="#exampleModal{{$p->pegawai_id}}">
            Hapus
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal{{$p->pegawai_id}}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus
              Pegawai</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal"
              aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Apakah anda yakin akan menghapus data {{$p->nama_lengkap}}
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

              <form action="{{ route('biodata.destroy', $p->pegawai_id) }}" method="POST"
              style="display:inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Delete</button>
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