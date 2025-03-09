<div class="tab-pane fade pt-3" id="riwayar-kepegawaian" role="tabpanel">                               
                            <!-- Tabel Riwayat Kepegawaian -->
                            <h5 class="card-title mt-4">Tabel Riwayat Kepegawaian</h5>
                            <div class="row">
                                <div class="card">
                                    <div class="card-body m-2">
                                        <table id="datatablesSimple" class="table table-bordered table-striped p-4 mt-4">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" style="width: 5%;">No.</th>
                                                    @if (auth()->user()->id_role == 1)
                                                        <th class="text-center" style="width: 15%;">Nama Pegawai</th>
                                                    @endif
                                                    <th class="text-center" style="width: 15%;">Nama Jabatan</th>
                                                    <th class="text-center" style="width: 15%;">Pangkat Golongan</th>
                                                    <th class="text-center" style="width: 35%;">Unit</th>
                                                    <th class="text-center" style="width: 15%;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($riwayatKepegawaians as $index => $riwayatKepegawaian)
                                                    <tr>
                                                        <td class="text-center">{{ $index + 1 }}</td>
                                                        @if (auth()->user()->id_role == 1)
                                                            <td class="text-center">
                                                                {{ $riwayatKepegawaian->pegawai->nama_lengkap ?? 'Pegawai Tidak Diketahui' }}
                                                            </td>
                                                        @endif
                                                        <td class="text-center">
                                                            {{ $riwayatKepegawaian->riwayatJabatan->jenisJabatan->jenis_jabatan }}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $riwayatKepegawaian->riwayatGolongan->pangkat_golongan }}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $riwayatKepegawaian->unit->nama_unit }}
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="{{ route('riwayat_kepegawaian.show', $riwayatKepegawaian->riwayat_kepegawaian_id) }}"
                                                                class="btn btn-sm btn-primary">
                                                                <i class="bi bi-eye"></i>
                                                            </a>
                                                            <a href="{{ route('riwayat_kepegawaian.edit', $riwayatKepegawaian->riwayat_kepegawaian_id) }}"
                                                                class="btn btn-sm btn-warning">
                                                                <i class="bi bi-pencil-square"></i>
                                                            </a>
                                                            <form
                                                                action="{{ route('riwayat_kepegawaian.destroy', $riwayatKepegawaian->riwayat_kepegawaian_id) }}"
                                                                method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-danger"
                                                                    onclick="return confirm('Yakin ingin menghapus?')">
                                                                    <i class="bi bi-trash"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="{{ auth()->user()->id_role == 1 ? 6 : 5 }}"
                                                            class="text-center">Belum ada data yang tersedia.</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                             <!-- Form Tambah Data -->
                             <div class="card mt-4">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="card-title mb-0">Tambah Riwayat Kepegawaian</h5>
                                        <button class="btn btn-sm btn-primary" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#formInput" aria-expanded="true" aria-controls="formInput">
                                            <i class="fas fa-minus"></i> Minimize
                                        </button>
                                    </div>
                                    <div id="formInput" class="collapse show">
                                        <div class="card-body">
                                            @if (session('success'))
                                                <div class="alert alert-success">{{ session('success') }}</div>
                                            @endif
                                            @if (session('error'))
                                                <div class="alert alert-danger">{{ session('error') }}</div>
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
                                            @include('riwayat_kepegawaian.create')
                                        </div>
                                    </div>
                                </div>
</div>