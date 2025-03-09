<div class="tab-pane fade show active profile-overview" id="profile-overview"
                                    role="tabpanel">

                                    <h5 class="card-title">Profile Details</h5>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Name Lengkap</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $user->pegawai->nama_lengkap }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Gelar Depan</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $user->pegawai->gelar_depan }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Gelar Belakang</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $user->pegawai->gelar_belakang }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">NIP</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $user->pegawai->nip }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">NPWP</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $user->pegawai->npwp }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">No Kartu Pegawai</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $user->pegawai->no_karpeg }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">No BPJS</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $user->pegawai->no_bpjs }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">No Kartu Keluarga</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $user->pegawai->no_kartu_keluarga }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">NIK</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $user->pegawai->no_nik }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Status Pegawai</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $user->pegawai->statuspegawai->status_pegawai }}
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Tempat Lahir</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $user->pegawai->tempat_lahir }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Tanggal Lahir</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $user->pegawai->tanggal_lahir }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Jenis Kelamin</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $user->pegawai->jenis_kelamin }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Agama</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $user->pegawai->agama->nama_agama }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">No HP</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $user->pegawai->no_hp }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $user->pegawai->email }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Alamat</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $user->pegawai->alamat_lengkap }}</div>
                                        <div class="col-lg-3 col-md-4 label">RT</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $user->pegawai->rt }}</div>
                                        <div class="col-lg-3 col-md-4 label">RW</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $user->pegawai->rw }}</div>
                                        <div class="col-lg-3 col-md-4 label">Kelurahan</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $user->pegawai->kelurahan }}</div>
                                        <div class="col-lg-3 col-md-4 label">Kota/Kabupaten</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $user->pegawai->kota_kabupaten }}</div>
                                        <div class="col-lg-3 col-md-4 label">Kode Pos</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $user->pegawai->kode_pos }}</div>
                                        <div class="col-lg-3 col-md-4 label">Homebase</div>
                                        <div class="col-lg-1 col-md-4 label">:</div>
                                        <div class="col-lg-8 col-md-8">{{ $user->pegawai->homebase }}</div>
                                    </div>
</div>