<div class="card">
                <div class="card-body">
                <h5 class="card-title">Table Biodata Pegawai</h5>

                <!-- Table with hoverable rows -->
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Tempat Lahir</th>
                            <th scope="col">Tanggak Lahir</th>
                            <th scope="col">Email</th>
                            <th scope="col">No Telepon</th>
                            <th scope="col">Alamat</th>
                            <th scope="col" width="280px">Action</th>
                        </tr>
                    
                    </thead>
                    <tbody>
                        @foreach ($pegawai as $p )
                        <tr>
                            <th scope="row"> {{ $loop->iteration }} </th>
                            <td><a href="/pegawai/{{$p->id}}/profile">{{ $p->nama }}</a> </td>
                            <td> {{ $p->jenis_kelamin }} </td>
                            <td> {{ $p->tempat_lahir }} </td>
                            <td> {{ $p->tanggal_lahir }} </td>
                            <td> {{ $p->email }} </td>
                            <td> {{ $p->no_tlp }} </td>
                            <td> {{ $p->alamat }} </td>
                            <td>
                                                <a href="{{ route('biodata.profile', $p->id) }}" class="btn btn-sm btn-info">Profile</a>
                                                <a href="{{ route('biodata.edit', $p->id) }}" class="btn btn-sm btn-success">edit</a>
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

                                                        <form action="{{ route('biodata.destroy', $p->id) }}" method="POST" style="display:inline;">
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