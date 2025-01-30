<div class="card">
  <div class="card-header border-bottom">
    <h5 class="card-title">Form Petugas</h5>
  </div>
  <div class="card-body mt-3">
    @csrf
    <div class="form-group">
      <label class="form-label" for="nama">Nama Petugas</label>
      <input class="form-control" id="nama" name="nama" type="text"
        value="{{ isset($data) ? $data->nama : '' }}" required autofocus>
    </div>
    <div class="form-group">
      <label class="form-label" for="password">Password</label>
      <input class="form-control" id="password" name="password" type="password"
        value="{{ isset($data) ? $data->password : '' }}">
    </div>
    <div class="form-group">
      <label class="form-label" for="telp">Telepon</label>
      <input class="form-control" id="telp" name="telp" type="tel"
        value="{{ isset($data) ? $data->telp : '' }}">
    </div>
    <div class="form-group">
      <label class="form-label" for="level">Level</label>
      <select class="form-select" id="level" name="level">
        <option value="" selected disabled hidden>-- Pilih Level --</option>
        <option value="Admin" @selected(isset($data) && $data->level === 'Admin')>Admin</option>
        <option value="Gudang" @selected(isset($data) && $data->level === 'Gudang')>Gudang</option>
        <option value="Manager" @selected(isset($data) && $data->level === 'Manager')>Manager</option>
      </select>
    </div>
    <div class="form-group">
      <label class="form-label" for="alamat">Alamat</label>
      <textarea class="form-control" id="alamat" name="alamat">{{ isset($data) ? $data->alamat : '' }}</textarea>
    </div>
  </div>
  <div class="card-footer">
    <a class="btn btn-outline-danger" href="/petugas">Batal</a>
    <button class="btn btn-primary float-end" type="submit">Simpan</button>
  </div>
</div>
