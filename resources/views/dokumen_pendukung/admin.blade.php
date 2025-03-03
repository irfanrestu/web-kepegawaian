<form>
    <div class="row mb-4">
        <label for="photo" class="col-md-4 col-lg-3 col-form-label">Upload Foto</label>
        <div class="col-md-8 col-lg-9 custom-file">
            <input autocomplete="off" id="file" type="file"
                class="custom-file-input @error('file') is-invalid @enderror" name="photo">
            @error('file')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    <div class="row mb-4">
        <label for="file" class="col-md-4 col-lg-3 col-form-label">Upload File Akta Kelahiran</label>
        <div class="col-md-8 col-lg-9 custom-file">
            <input autocomplete="off" id="file" type="file"
                class="custom-file-input @error('file') is-invalid @enderror" name="file">
            @error('file')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    <div class="row mb-4">
        <label for="ijazah" class="col-md-4 col-lg-3 col-form-label">Upload File Ijazah</label>
        <div class="col-md-8 col-lg-9 custom-file">
            <input type="hidden" name="id_kategori_dokumen[]" value="3"> <!-- ID kategori untuk Ijazah -->
            <input autocomplete="off" id="ijazah" type="file"
                class="custom-file-input @error('ijazah') is-invalid @enderror" name="file[]">
            @error('ijazah')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </div>
</form>