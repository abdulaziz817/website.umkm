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

    new Choices('#petugas')
    new Choices('#bagian')

    const hostApi = '{{ Request::root() }}/api/'

    const api = async (url) => {
      const response = await fetch(url, {
        headers: {
          "Content-Type": "application/json"
        },
      });

      return response.json();
    };


    const modal = document.getElementById('modal')
    modal.addEventListener('show.bs.modal', (e) => {
      if (document.querySelector('#modal tbody'))
        document.querySelector('#modal tbody').remove()

      let template = ''

      api(hostApi + 'barang')
        .then((result) => {
          result.forEach(element => {
            const harga = new Intl.NumberFormat("id-ID", {
              style: "currency",
              currency: "IDR"
            }).format(element.harga)

            const kondisi =
              `<span class="badge bg-${element.kondisi === 'Baru' ? 'primary' : 'danger'}">${element.kondisi}</span>`

            const date = new Date(element.tanggal)

            template += `
              <tr class="text-center align-middle">
                <td>${element.nama}</td>
                <td>${element.jumlah} ${element.satuan}</td>
                <td>${harga}</td>
                <td>${kondisi}</td>
                <td>${date.getDate()}-${date.getMonth()+1}-${date.getFullYear()}</td>
                <td>${element.kategori}</td>
                <td>${element.bagian}</td>
                <td>
                  <button onClick="eventBarang(${element.id}, 'add')" class="btn btn-sm btn-primary" type="button"><i class="bi bi-plus-circle"></i></button>
                </td>
              </tr>
            `
          });

          template = `<tbody>${template}</tbody>`
          document.querySelector('#modal table').insertAdjacentHTML('beforeend', template)
        }).catch((err) => {

        });
    })

    const eventBarang = (id, query) => {
      api(hostApi + `barang/${id}?${query}`)
        .then((result) => {
          if (query === 'add') {
            let jumlah = 1

            if (document.querySelectorAll('#selected-barang tr'))
              document.querySelectorAll('#selected-barang tr').forEach((element, key) => {
                if (element.getAttribute('data-id') == result.id)
                  jumlah = parseInt(element.childNodes[3].value) + jumlah
              });

            let tag = []

            if (result.kondisi)
              tag.push(result.kondisi)

            if (result.kategori)
              tag.push(result.kategori)

            if (result.bagian)
              tag.push(result.bagian)

            const harga = new Intl.NumberFormat("id-ID", {
              style: "currency",
              currency: "IDR"
            }).format(result.harga)

            const total = new Intl.NumberFormat("id-ID", {
              style: "currency",
              currency: "IDR"
            }).format(result.harga * jumlah)

            if (jumlah === 1) {
              let template = `
                <tr data-id="${result.id}" class="text-center align-middle">
                  <input type="hidden" name="barang_id[]" value="${result.id}"/>
                  <input type="hidden" name="jumlah[]" value="${jumlah}"/>
                  <td>${result.nama}</td>
                  <td>${tag.join(' | ')}</td>
                  <td>${harga}</td>
                  <td>${jumlah}</td>
                  <td>${total}</td>
                  <td>
                    <button onClick="eventBarang(${result.id} ,'jumlah=${jumlah}')" class="btn btn-sm btn-danger" type="button"><i class="bi bi-trash"></i></button>
                  </td>
                </tr>
            `

              document.querySelector('#selected-barang').insertAdjacentHTML('beforeend', template)
            } else {
              const rsId = document.querySelector(`tr[data-id="${result.id}"]`)
              rsId.childNodes[3].value = jumlah
              rsId.childNodes[9].innerText = harga
              rsId.childNodes[11].innerText = jumlah
              rsId.childNodes[13].innerText = total
              rsId.childNodes[15].innerHTML =
                `<button onClick="eventBarang(${result.id} ,'jumlah=${jumlah}')" class="btn btn-sm btn-danger" type="button"><i class="bi bi-trash"></i></button>`
            }
          } else {
            document.querySelector(`tr[data-id="${result.id}"]`).remove()
          }
        }).catch((err) => {

        });
    }
  </script>
@endpush

<div class="card">
  <div class="card-header border-bottom">
    <h5 class="card-title">Form Pengeluaran</h5>
  </div>
  <div class="card-body mt-3">
    @csrf
    <div class="row">
      <div class="col-md-6 col-12">
        <div class="form-group">
          <label class="form-label" for="tanggal">Tanggal</label>
          <input class="form-control" id="tanggal" name="tanggal" type="text"
            value="{{ isset($data) ? $data->tanggal : '' }}" required>
        </div>
      </div>
      <div class="col-md-6 col-12">
        <div class="form-group">
          <label class="form-label" for="keterangan">Keterangan</label>
          <textarea class="form-control" id="keterangan" name="keterangan">
            {{ isset($data) ? $data->keterangan : '' }}
          </textarea>
        </div>
      </div>
      <div class="col-md-6 col-12">
        <div class="form-group">
          <label class="form-label" for="petugas">Petugas</label>
          <select class="form-select" id="petugas" name="petugas_id" required>
            <option value="" selected disabled hidden>-- Pilih Petugas --</option>
            @foreach ($petugas as $k)
              <option value="{{ $k->id }}" @selected(isset($data) && $data->petugas_id === $k->id)>
                {{ $k->nama }}
              </option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-md-6 col-12">
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
    </div>
  </div>
</div>

<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center border-bottom">
    <h5 class="card-title mb-0">Barang</h5>
    <button class="btn icon btn-primary" data-bs-target="#modal" data-bs-toggle="modal" type="button">
      <i class="bi bi-plus-circle"></i> Tambah Barang</button>
  </div>
  <div class="card-body mt-3">
    <table class="table table-bordered table-striped">
      <thead>
        <tr class="text-center">
          <th>Nama Barang</th>
          <th>Tag</th>
          <th>Harga</th>
          <th>Jumlah</th>
          <th>Sub Total</th>
          <th style="width: 1px">#</th>
        </tr>
      </thead>
      <tbody id="selected-barang">
        @isset($data)

          @foreach ($data->barang as $row)
            @php
              $tag = [];

              $tag = collect($tag)
                  ->push($row->kondisi)
                  ->all();

              if ($row->kategori) {
                  $tag = collect($tag)
                      ->push($row->kategori->nama)
                      ->all();
              }

              if ($row->bagian) {
                  $tag = collect($tag)
                      ->push($row->bagian->nama)
                      ->all();
              }
            @endphp
            <tr class="text-center align-middle" data-id="{{ $data->id }}">
              <input name="barang_id[]" type="hidden" value="{{ $data->id }}" />
              <input name="jumlah[]" type="hidden" value="{{ $row->pivot->jumlah }}" />
              <td>{{ $row->nama }}</td>
              <td>{{ \Arr::join($tag, ' | ') }}</td>
              <td>Rp {{ number_format($row->harga, 2, ',', '.') }}</td>
              <td>{{ $row->pivot->jumlah }}</td>
              <td>Rp {{ number_format($row->harga * $row->pivot->jumlah, 2, ',', '.') }}</td>
              <td>
                <button class="btn btn-sm btn-danger" type="button"
                  onClick="eventBarang({{ $data->id }} ,'jumlah={{ $row->pivot->jumlah }}')"><i
                    class="bi bi-trash"></i></button>
              </td>
            </tr>
          @endforeach
        @endisset
      </tbody>
    </table>
  </div>
</div>

<div class="card">
  <div class="card-body">
    <a class="btn btn-outline-danger" href="/pengeluaran">Batal</a>
    <button class="btn btn-primary float-end" type="submit">Simpan</button>
  </div>
</div>

<div class="modal fade" id="modal" role="dialog" aria-labelledby="modalTitle" aria-modal="true" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle">
          Data Barang
        </h5>
        <button class="close" data-bs-dismiss="modal" type="button" aria-label="Close">
          <svg class="feather feather-x" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
          </svg>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered table-striped">
          <thead>
            <tr class="text-center">
              <th>Nama Barang</th>
              <th>Jumlah</th>
              <th>Harga</th>
              <th>Kondisi</th>
              <th>Tanggal Masuk</th>
              <th>Kategori</th>
              <th>Bagian</th>
              <th style="width: 1px">#</th>
            </tr>
          </thead>
        </table>
      </div>
      <div class="modal-footer">
        <button class="btn btn-outline-danger" data-bs-dismiss="modal" type="button">
          <i class="bx bx-x d-block d-sm-none"></i>
          <span class="d-none d-sm-block">Batal</span>
        </button>
      </div>
    </div>
  </div>
</div>
