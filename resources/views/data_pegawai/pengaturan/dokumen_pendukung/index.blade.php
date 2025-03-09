<div class="tab-pane fade pt-3" id="dokumen-pendukung" role="tabpanel">
    <h5 class="card-title">Dokumen Pendukung - {{ $pegawai->nama_lengkap }}</h5>

    @error('file')
        <span class="text-danger">{{ $message }}</span>
    @enderror

    <div class="row">
        <div class="col-lg-12">
            @foreach ($kategoriDokumens as $kategori)
                        <div class="mb-3">
                            <label class="fw-bold">{{ $kategori->kategori_dokumen }}</label>
                            <div>
                                @php
                                    $dokumen = $pegawai->dokumens
                                        ->where('id_kategori_dokumen', $kategori->kategori_dokumen_id)
                                        ->first();
                                @endphp
                                @if ($dokumen)
                                    <a href="{{ asset($dokumen->file_dokumen) }}" target="_blank"
                                        class="btn btn-sm btn-outline-primary d-flex justify-content-center align-items-center">
                                        <i class="bi bi-file-earmark"></i> Lihat File
                                    </a>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </div>
                        </div>
            @endforeach
        </div>
    </div>
</div>