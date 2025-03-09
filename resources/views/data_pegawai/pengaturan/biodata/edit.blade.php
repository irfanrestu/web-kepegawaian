<div class="tab-pane fade profile-edit pt-3" id="profile-edit" role="tabpanel">

                                    <!-- Profile Edit Form -->
                                    <!-- Profile Edit Form -->
                                    <form action="{{ route('biodata.update', $pegawai->pegawai_id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="row mb-3">
                                            <label for="file_foto" class="col-md-4 col-lg-3 col-form-label">Foto Profile</label>
                                            <div class="col-md-8 col-lg-9">
                                            @if($pegawai->file_foto)
                                                    <img src="{{ asset('storage/' . $pegawai->file_foto) }}" alt="Profile" class="editrounded" style="width: 100px; height: auto;">
                                                @else
                                                    <img src="{{ asset('image/nophoto.jpg') }}" alt="Profile" class="editrounded" style="width: 100px; height: auto;">
                                                @endif
                                                <div class="pt-2">
                                                    <label for="file_foto" class="btn btn-outline-primary" title="Upload new profile image">
                                                        <i class="bi bi-upload"></i>
                                                        <input type="file" class="form-control d-none" id="file_foto" name="file_foto" onchange="previewImage(event)">
                                                    </label>
                                                    <button type="button" class="btn btn-danger btn-sm" title="Remove my profile image" onclick="removePhoto()">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Hidden input to indicate photo removal -->
                                        <input type="hidden" name="remove_photo" id="remove_photo" value="0">

                                        <div class="row mb-3">
                                            <label for="nama_lengkap" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="nama_lengkap" type="text" class="form-control" id="nama_lengkap" value="{{ $pegawai->nama_lengkap }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="gelar_depan" class="col-md-4 col-lg-3 col-form-label">Gelar Depan</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="gelar_depan" type="text" class="form-control" id="gelar_depan" value="{{ $pegawai->gelar_depan }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="gelar_belakang" class="col-md-4 col-lg-3 col-form-label">Gelar Belakang</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="gelar_belakang" type="text" class="form-control" id="gelar_belakang" value="{{ $pegawai->gelar_belakang }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="nip" class="col-md-4 col-lg-3 col-form-label">NIP</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="nip" type="text" class="form-control" id="nip" value="{{ $pegawai->nip }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="npwp" class="col-md-4 col-lg-3 col-form-label">NPWP</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="npwp" type="text" class="form-control" id="npwp" value="{{ $pegawai->npwp }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="no_karpeg" class="col-md-4 col-lg-3 col-form-label">No Kartu Pegawai</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="no_karpeg" type="text" class="form-control" id="no_karpeg" value="{{ $pegawai->no_karpeg }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="no_bpjs" class="col-md-4 col-lg-3 col-form-label">No BPJS</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="no_bpjs" type="text" class="form-control" id="no_bpjs" value="{{ $pegawai->no_bpjs }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="no_kartu_keluarga" class="col-md-4 col-lg-3 col-form-label">No Kartu Keluarga</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="no_kartu_keluarga" type="text" class="form-control" id="no_kartu_keluarga" value="{{ $pegawai->no_kartu_keluarga }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="no_nik" class="col-md-4 col-lg-3 col-form-label">NIK</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="no_nik" type="text" class="form-control" id="no_nik" value="{{ $pegawai->no_nik }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="id_status_pegawai" class="col-md-4 col-lg-3 col-form-label">Status Pegawai</label>
                                            <div class="col-md-8 col-lg-9">
                                                <select name="id_status_pegawai" id="id_status_pegawai" class="form-control">
                                                    @foreach($liststatuspegawai as $status)
                                                        <option value="{{ $status->status_pegawai_id }}" {{ $pegawai->id_status_pegawai == $status->status_pegawai_id ? 'selected' : '' }}>
                                                            {{ $status->status_pegawai }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="tempat_lahir" class="col-md-4 col-lg-3 col-form-label">Tempat Lahir</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="tempat_lahir" type="text" class="form-control" id="tempat_lahir" value="{{ $pegawai->tempat_lahir }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="tanggal_lahir" class="col-md-4 col-lg-3 col-form-label">Tanggal Lahir</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="tanggal_lahir" type="date" class="form-control" id="tanggal_lahir" value="{{ $pegawai->tanggal_lahir }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="jenis_kelamin" class="col-md-4 col-lg-3 col-form-label">Jenis Kelamin</label>
                                            <div class="col-md-8 col-lg-9">
                                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                                    <option value="Laki-laki" {{ $pegawai->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                                    <option value="Perempuan" {{ $pegawai->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="id_agama" class="col-md-4 col-lg-3 col-form-label">Agama</label>
                                            <div class="col-md-8 col-lg-9">
                                                <select name="id_agama" id="id_agama" class="form-control">
                                                    @foreach($listagama as $agama)
                                                        <option value="{{ $agama->agama_id }}" {{ $pegawai->id_agama == $agama->agama_id ? 'selected' : '' }}>
                                                            {{ $agama->nama_agama }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="no_hp" class="col-md-4 col-lg-3 col-form-label">No Hp</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="no_hp" type="text" class="form-control" id="no_hp" value="{{ $pegawai->no_hp }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="email" type="email" class="form-control" id="email" value="{{ $pegawai->email }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="alamat_lengkap" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                                            <div class="col-md-8 col-lg-9">
                                                <textarea name="alamat_lengkap" class="form-control" id="alamat_lengkap" style="height: 100px">{{ $pegawai->alamat_lengkap }}</textarea>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="rt" class="col-md-4 col-lg-3 col-form-label">RT</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="rt" type="text" class="form-control" id="rt" value="{{ $pegawai->rt }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="rw" class="col-md-4 col-lg-3 col-form-label">RW</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="rw" type="text" class="form-control" id="rw" value="{{ $pegawai->rw }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="kelurahan" class="col-md-4 col-lg-3 col-form-label">Kelurahan</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="kelurahan" type="text" class="form-control" id="kelurahan" value="{{ $pegawai->kelurahan }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="kecamatan" class="col-md-4 col-lg-3 col-form-label">Kecamatan</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="kecamatan" type="text" class="form-control" id="kecamatan" value="{{ $pegawai->kecamatan }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="kota_kabupaten" class="col-md-4 col-lg-3 col-form-label">Kabupaten/Kota</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="kota_kabupaten" type="text" class="form-control" id="kota_kabupaten" value="{{ $pegawai->kota_kabupaten }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="kode_pos" class="col-md-4 col-lg-3 col-form-label">Kode Pos</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="kode_pos" type="text" class="form-control" id="kode_pos" value="{{ $pegawai->kode_pos }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="homebase" class="col-md-4 col-lg-3 col-form-label">Homebase</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="homebase" type="text" class="form-control" id="homebase" value="{{ $pegawai->homebase }}">
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                    <!-- End Profile Edit Form -->

                                </div>