@extends('layouts.main')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Tables</h1>
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
          <div class="container-fluid px-4">
                        <h1 class="mt-4">Data Pegawai</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="card mb-4">
                            <div class="card-header">

                            <a href="{{ route('index.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
                            
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggak Lahir</th>
                                            <th>Email</th>
                                            <th>No Telepon</th>
                                            <th>Alamat</th>
                                            <th width="280px">Action</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        @foreach ($pegawai as $p )
                                        <tr>
                                            <td> {{ $loop->iteration }} </td>
                                            <td><a href="/pegawai/{{$p->id}}/profile">{{ $p->nama }}</a> </td>
                                            <td> {{ $p->jenis_kelamin }} </td>
                                            <td> {{ $p->tempat_lahir }} </td>
                                            <td> {{ $p->tanggal_lahir }} </td>
                                            <td> {{ $p->email }} </td>
                                            <td> {{ $p->no_tlp }} </td>
                                            <td> {{ $p->alamat }} </td>
                                            <td>
                                                <a href="/pegawai/{{$p->id}}/profile" class="btn btn-sm btn-info">Profile</a>
                                                <a href="{{ route('index.edit', $p->id) }}" class="btn btn-sm btn-success">edit</a>
                                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{$p->id}}">
                                                Hapus
                                                </button>
                                                
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal{{$p->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Pegawai</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah anda yakin akan menghapus data {{$p->nama}}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                                        <form action="{{ route('index.destroy', $p->id) }}" method="POST" style="display:inline;">
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
                            </div>
                        </div>
                    </div>
          </div>

        </div>
      </div>
    </section>

  </main>@endsection