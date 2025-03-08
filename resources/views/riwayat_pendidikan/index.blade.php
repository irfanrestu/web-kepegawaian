@extends('layouts.main')

@section('title', 'Riwayat Pendidikan')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Riwayat Pendidikan</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
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
                            <h5 class="card-title mt-4">Detail Riwayat Pendidikan</h5>
                            <div class="row">
                                <div class="card">
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="card-body m-2">
                                        <table id="datatablesSimple" class="table table-bordered table-striped p-4 mt-4">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" style="width: 5%;">No.</th>
                                                    @if(auth()->user()->id_role == 1)
                                                        <th class="text-center" style="width: 15%;">Nama Pegawai</th>
                                                    @endif
                                                    <th class="text-center" style="width: 15%;">Jenjang Pendidikan</th>
                                                    <th class="text-center" style="width: 20%;">Jurusan</th>
                                                    <th class="text-center" style="width: 25%;">Nama Sekolah</th>
                                                    <th class="text-center" style="width: 5%;">Ijazah</th>
                                                    <th class="text-center" style="width: 5%;">Transkrip</th>
                                                    <th class="text-center" style="width: 10%;">Tahun Lulus</th>
                                                    <th class="text-center" style="width: 20%;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($riwayatPendidikan as $index => $pendidikan)
                                                    <tr>
                                                        <td class="text-center">{{ $index + 1 }}</td>
                                                        @if(auth()->user()->id_role == 1)
                                                            <td class="text-center">{{ $pendidikan->pegawai->nama_lengkap }}</td>
                                                        @endif
                                                        <td class="text-center">
                                                            {{ $pendidikan->jenjangPendidikan->jenjang_pendidikan }}
                                                        </td>
                                                        <td class="text-center">{{ $pendidikan->jurusan->nama_jurusan }}</td>
                                                        <td class="text-center">{{ $pendidikan->nama_sekolah }}</td>
                                                        <td class="text-center">
                                                            <a href="{{ asset($pendidikan->file_ijazah) }}" target="_blank"
                                                                class="btn btn-sm btn-outline-primary">
                                                                @if (Str::endsWith($pendidikan->file_ijazah, '.pdf'))
                                                                    <i class="bi bi-file-earmark"></i>
                                                                @endif
                                                            </a>
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="{{ asset($pendidikan->file_transkrip) }}" target="_blank"
                                                                class="btn btn-sm btn-outline-primary">
                                                                @if (Str::endsWith($pendidikan->file_transkrip, '.pdf'))
                                                                    <i class="bi bi-file-earmark"></i>
                                                                @endif
                                                            </a>
                                                        </td>
                                                        <td class="text-center">{{ $pendidikan->tahun_lulus }}</td>
                                                        <td class="text-center">
                                                            <a href="{{ route('riwayat_pendidikan.edit', $pendidikan->riwayat_pendidikan_id) }}"
                                                                class="btn btn-sm btn-warning"><i
                                                                    class="bi bi-pencil-square"></i></a>
                                                            <button type="button" class="btn btn-danger btn-sm"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#deleteModal{{ $pendidikan->riwayat_pendidikan_id }}">
                                                                <i class="bi bi-trash"></i>
                                                            </button>

                                                            <!-- Modal Delete -->
                                                            <div class="modal fade"
                                                                id="deleteModal{{ $pendidikan->riwayat_pendidikan_id }}"
                                                                tabindex="-1"
                                                                aria-labelledby="deleteModalLabel{{ $pendidikan->riwayat_pendidikan_id }}"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h1 class="modal-title fs-5"
                                                                                id="deleteModalLabel{{ $pendidikan->riwayat_pendidikan_id }}">
                                                                                Hapus Riwayat
                                                                                Pendidikan</h1>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            Apakah Anda yakin akan menghapus data riwayat
                                                                            pendidikan untuk jenjang
                                                                            "{{ $pendidikan->jenjangPendidikan->jenjang_pendidikan }}"
                                                                            dengan jurusan
                                                                            "{{ $pendidikan->jurusan->nama_jurusan }}"?
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Close</button>
                                                                            <form
                                                                                action="{{ route('riwayat_pendidikan.destroy', $pendidikan->riwayat_pendidikan_id) }}"
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
                                                @empty
                                                    <tr>
                                                        <td colspan="{{ auth()->user()->id_role == 1 ? 9 : 8 }}"
                                                            class="text-center">Belum ada data yang tersedia.</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                    @if (auth()->user()->id_role != 1)
                                        <div class="row m-3">
                                            <div class="card p-2">
                                                @include('riwayat_pendidikan.create')
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection