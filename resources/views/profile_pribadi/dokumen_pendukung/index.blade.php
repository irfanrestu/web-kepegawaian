<div class="tab-pane fade pt-3" id="dokumen-pendukung" role="tabpanel">
<h5 class="card-title">Upload Dokumen</h5>


@error('file')
    <span class="text-danger">{{ $message }}</span>
@enderror

<table class="table">
    <thead>
        <tr>
            <th>Kategori Dokumen</th>
            <th>File</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($kategoriDokumens as $kategori)
            <tr>
                <td>{{ $kategori->kategori_dokumen }}</td>
                <td>
                    @if (isset($uploadedDokumens[$kategori->kategori_dokumen_id]))
                        <a href="{{ asset($uploadedDokumens[$kategori->kategori_dokumen_id]) }}"
                            target="_blank">
                            {{ basename($uploadedDokumens[$kategori->kategori_dokumen_id]) }}
                        </a>
                    @else
                        <span class="text-muted">Belum ada file</span>
                    @endif
                </td>
                <td>
                    <form
                        action="{{ route('dokumen_pendukung.update', ['id' => $kategori->kategori_dokumen_id]) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="input-group">
                            <input type="file" name="file" class="form-control" required>
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>