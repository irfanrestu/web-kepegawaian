<div class="card-body">
    <form action="{{ route('riwayat_pendidikan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group m-3">
                    <label>Jenjang Pendidikan</label>
                    <select name="id_jenjang_pendidikan"
                        class="form-control @error('id_jenjang_pendidikan') is-invalid @enderror" required>
                        @forelse ($jenjangPendidikans as $jenjang)
                            <option value="{{ $jenjang->jenjang_pendidikan_id }}" {{ old('id_jenjang_pendidikan') == $jenjang->jenjang_pendidikan_id ? 'selected' : '' }}>
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
                            <option value="{{ $jurusan->jurusan_id }}" {{ old('id_jurusan') == $jurusan->jurusan_id ? 'selected' : '' }}>
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
                    <input autocomplete="off" type="text" name="nama_sekolah"
                        class="form-control @error('nama_sekolah') is-invalid @enderror"
                        value="{{ old('nama_sekolah') }}" required>
                    @error('nama_sekolah')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group m-3">
                    <label>Tahun Lulus</label>
                    <input autocomplete="off" type="number" name="tahun_lulus"
                        class="form-control @error('tahun_lulus') is-invalid @enderror" value="{{ old('tahun_lulus') }}"
                        oninput="this.value=this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                        min="1900" max="{{ date('Y') }}" required>
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
                    <input type="file" name="file_ijazah"
                        class="form-control @error('file_ijazah') is-invalid @enderror" required>
                    <small class="form-text text-muted">File yang diizinkan: PDF. Maksimal ukuran: 2MB.</small>
                    @error('file_ijazah')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group m-3">
                    <label>Transkrip</label>
                    <input type="file" name="file_transkrip"
                        class="form-control @error('file_transkrip') is-invalid @enderror" required>
                    <small class="form-text text-muted">File yang diizinkan: PDF. Maksimal ukuran: 2MB.</small>
                    @error('file_transkrip')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 text-center mt-4">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>