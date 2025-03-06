<!-- Form Tambah Data -->
<div class="row mt-4">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Tambah Riwayat Jabatan</h5>
            <form action="{{ route('riwayat_kepegawaian.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label for="id_jenis_jabatan" class="col-sm-2 col-form-label">Jenis
                        Jabatan</label>
                    <div class="col-sm-10">
                        <select name="id_jenis_jabatan" id="id_jenis_jabatan" class="form-control" required>
                            <option value="">Pilih Jenis Jabatan</option>
                            @foreach ($jenisJabatans as $jenisJabatan)
                                <option value="{{ $jenisJabatan->jenis_jabatan_id }}">
                                    {{ $jenisJabatan->jenis_jabatan }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="nama_jabatan" class="col-sm-2 col-form-label">Nama
                        Jabatan</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama_jabatan" id="nama_jabatan" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="tmt_jabatan" class="col-sm-2 col-form-label">TMT Jabatan</label>
                    <div class="col-sm-10">
                        <input type="text" name="tmt_jabatan" id="tmt_jabatan" class="form-control"
                            placeholder="DD-MM-YYYY" required>
                        <small class="text-muted">Format: DD-MM-YYYY (contoh:
                            2023-10-25)</small>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="status_jabatan" class="col-sm-2 col-form-label">Status
                        Jabatan</label>
                    <div class="col-sm-10">
                        <select name="status_jabatan" id="status_jabatan" class="form-control" required>
                            <option value="Aktif">Aktif</option>
                            <option value="Non-Aktif">Non-Aktif</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="dokumen_jabatan" class="col-sm-2 col-form-label">Dokumen
                        Jabatan</label>
                    <div class="col-sm-10">
                        <input type="file" name="dokumen_jabatan" id="dokumen_jabatan" class="form-control">
                        <small class="text-muted">Format file: PDF. Maksimal ukuran:
                            2MB.</small>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-10 offset-sm-2">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('riwayat_kepegawaian.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>