@push('style')
  <link href="{{ asset('assets/extensions/flatpickr/flatpickr.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/extensions/choices.js/public/assets/styles/choices.css') }}" rel="stylesheet">
@endpush

@push('script')
  <script src="{{ asset('assets/extensions/flatpickr/flatpickr.min.js') }}"></script>
  <script src="{{ asset('assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>

  <script>
    flatpickr('#tanggal', {
      enableTime: true,
      dateFormat: "Y-m-d H:i",
    })

    new Choices('#kategori')
    new Choices('#bagian')
  </script>
@endpush

<div class="card">
  <div class="card-header border-bottom">
    <h5 class="card-title">Form Barang</h5>
  </div>
  <div class="card-body mt-3">
    @csrf
    <div class="form-group">
      <label class="form-label" for="nama">Nama Barang</label>
      <input class="form-control" id="nama" name="nama" type="text"
        value="{{ isset($data) ? $data->nama : '' }}" required autofocus>
    </div>
    <div class="form-group">
      <label class="form-label" for="satuan">Satuan</label>
      <input class="form-control" id="satuan" name="satuan" type="text"
        value="{{ isset($data) ? $data->satuan : '' }}">
    </div>
    <div class="form-group">
      <label class="form-label" for="harga">Harga</label>
      <input class="form-control" id="harga" name="harga" type="number"
        value="{{ isset($data) ? $data->harga : '' }}">
        <div class="form-group">
          <label class="form-label" for="kondisi">Kondisi</label>
          <div class="form-check">
            <input class="form-check-input" id="tersedia" name="kondisi" type="radio" value="Tersedia"
              @checked(isset($data) && $data->kondisi === 'Tersedia') required>
            <label class="form-check-label" for="tersedia">Tersedia</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" id="kosong" name="kondisi" type="radio" value="Kosong"
              @checked(isset($data) && $data->kondisi === 'Kosong') required>
            <label class="form-check-label" for="kosong">Kosong</label>
          </div>
        </div>

    <div class="form-group">
      <label class="form-label" for="jumlah">Jumlah</label>
      <input class="form-control" id="jumlah" name="jumlah" type="number"
        value="{{ isset($data) ? $data->jumlah : '' }}" min="1" required>
    </div>
    <div class="form-group">
      <label class="form-label" for="tanggal">Tanggal</label>
      <input class="form-control" id="tanggal" name="tanggal" type="text"
        value="{{ isset($data) ? $data->tanggal : '' }}" required>
    </div>
    <div class="form-group">
      <label class="form-label" for="kategori">Kategori</label>
      <select class="form-select" id="kategori" name="kategori_id" required>
        <option value="" selected disabled hidden>-- Pilih Kategori --</option>
        @foreach ($kategori as $k)
          <option value="{{ $k->id }}" @selected(isset($data) && $data->kategori_id === $k->id)>{{ $k->nama }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label class="form-label" for="bagian">Bagian</label>
      <select class="form-select" id="bagian" name="bagian_id" required>
        <option value="" selected disabled hidden>-- Pilih Bagian --</option>
        @foreach ($bagian as $k)
          <option value="{{ $k->id }}" @selected(isset($data) && $data->bagian_id === $k->id)>
            {{ $k->nama }} {{ $k->kepala ? "| {$k->kepala}" : '' }}
          </option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="card-footer">
    <a class="btn btn-outline-danger" href="/barang">Batal</a>
    <button class="btn btn-primary float-end" type="submit">Simpan</button>
  </div>
</div>
