@extends('layouts.main')

@section('title', 'Edit Riwayat Pendidikan')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Edit Riwayat Pendidikan</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('riwayat_pendidikan.index') }}">Riwayat Pendidikan</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Data Pendidikan</h5>
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <form action="{{ route('riwayat_pendidikan.update', $riwayatPendidikan->riwayat_pendidikan_id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group m-3">
                                            <label>Jenjang Pendidikan</label>
                                            <select name="id_jenjang_pendidikan" class="form-control @error('id_jenjang_pendidikan') is-invalid @enderror" required>
                                                @forelse ($jenjangPendidikans as $jenjang)
                                                    <option value="{{ $jenjang->jenjang_pendidikan_id }}" {{ old('id_jenjang_pendidikan', $riwayatPendidikan->id_jenjang_pendidikan) == $jenjang->jenjang_pendidikan_id ? 'selected' : '' }}>
                                                        {{ $jenjang->jenjang_pendidikan }}
                                                    </option>
                                                @empty
                                                    <option value="">Tidak ada pilihan.</option>
                                                @endforelse
                                            </select>
                                            @error('id_jenjang_pendidikan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group m-3">
                                            <label>Jurusan</label>
                                            <select name="id_jurusan" class="form-control @error('id_jurusan') is-invalid @enderror" required>
                                                @forelse ($jurusans as $jurusan)
                                                    <option value="{{ $jurusan->jurusan_id }}" {{ old('id_jurusan', $riwayatPendidikan->id_jurusan) == $jurusan->jurusan_id ? 'selected' : '' }}>
                                                        {{ $jurusan->nama_jurusan }}
                                                    </option>
                                                @empty
                                                    <option value="">Tidak ada pilihan.</option>
                                                @endforelse
                                            </select>
                                            @error('id_jurusan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group m-3">
                                            <label>Nama Sekolah</label>
                                            <input autocomplete="off" type="text" name="nama_sekolah" class="form-control @error('nama_sekolah') is-invalid @enderror" value="{{ old('nama_sekolah', $riwayatPendidikan->nama_sekolah) }}" required>
                                            @error('nama_sekolah')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group m-3">
                                            <label>Tahun Lulus</label>
                                            <input autocomplete="off" type="number" name="tahun_lulus" class="form-control @error('tahun_lulus') is-invalid @enderror" value="{{ old('tahun_lulus', $riwayatPendidikan->tahun_lulus) }}"
                                                oninput="this.value=this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" min="1900" max="{{ date('Y') }}" required>
                                            @error('tahun_lulus')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group m-3">
                                            <label>Ijazah</label>
                                            <input type="file" name="file_ijazah" class="form-control @error('file_ijazah') is-invalid @enderror">
                                            <small class="form-text text-muted">File yang diizinkan: PDF. Maksimal ukuran: 2MB. Kosongkan jika tidak ingin mengganti.</small>
                                            @if($riwayatPendidikan->file_ijazah)
                                                <p class="mt-2">File saat ini: <a href="{{ asset($riwayatPendidikan->file_ijazah) }}" target="_blank">Lihat Ijazah</a></p>
                                            @endif
                                            @error('file_ijazah')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group m-3">
                                            <label>Transkrip</label>
                                            <input type="file" name="file_transkrip" class="form-control @error('file_transkrip') is-invalid @enderror">
                                            <small class="form-text text-muted">File yang diizinkan: PDF. Maksimal ukuran: 2MB. Kosongkan jika tidak ingin mengganti.</small>
                                            @if($riwayatPendidikan->file_transkrip)
                                                <p class="mt-2">File saat ini: <a href="{{ asset($riwayatPendidikan->file_transkrip) }}" target="_blank">Lihat Transkrip</a></p>
                                            @endif
                                            @error('file_transkrip')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 text-center mt-4">
                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                        <a href="{{ route('riwayat_pendidikan.index') }}" class="btn btn-secondary">Kembali</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection