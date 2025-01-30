<div class="card">
  <div class="card-header border-bottom">
    <h5 class="card-title">Form Bagian</h5>
  </div>
  <div class="card-body mt-3">
    @csrf
    <div class="form-group">
      <label class="form-label" for="nama">Nama Bagian</label>
      <input class="form-control" id="nama" name="nama" type="text"
        value="{{ isset($data) ? $data->nama : '' }}" required autofocus>
    </div>
    <div class="form-group">
      <label class="form-label" for="kepala">Kepala Bagian</label>
      <input class="form-control" id="kepala" name="kepala" type="text"
        value="{{ isset($data) ? $data->kepala : '' }}">
    </div>
    <div class="form-group">
      <label class="form-label" for="telp">Telepon</label>
      <input class="form-control" id="telp" name="telp" type="tel"
        value="{{ isset($data) ? $data->telp : '' }}">
    </div>
  </div>
  <div class="card-footer">
    <a class="btn btn-outline-danger" href="/bagian">Batal</a>
    <button class="btn btn-primary float-end" type="submit">Simpan</button>
  </div>
</div>
