<div class="card">
  <div class="card-header border-bottom">
    <h5 class="card-title">Form Kategori</h5>
  </div>
  <div class="card-body mt-3">
    @csrf
    <div class="form-group">
      <label class="form-label" for="nama">Nama Kategori</label>
      <input class="form-control" id="nama" name="nama" type="text"
        value="{{ isset($data) ? $data->nama : '' }}" required autofocus>
    </div>
  </div>
  <div class="card-footer">
    <a class="btn btn-outline-danger" href="/kategori">Batal</a>
    <button class="btn btn-primary float-end" type="submit">Simpan</button>
  </div>
</div>
