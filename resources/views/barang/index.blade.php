<x-layout>
  <x-slot:title>Barang</x-slot:title>

  <div class="col mx-auto">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center border-bottom">
        <h5 class="card-title mb-0">Data Barang</h5>
        <a class="btn icon btn-primary" href="/barang/create"><i class="bi bi-plus-circle"></i></a>
      </div>
      <div class="card-body mt-3">
        <table class="table table-bordered table-striped">
          <thead>
            <tr class="text-center">
              <th style="width: 1px">No</th>
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
          <tbody>
            @foreach ($data as $key => $row)
              <tr class="text-center align-middle">
                <th>{{ $key + 1 }}</th>
                <td>{{ $row->nama }}</td>
                <td>{{ $row->jumlah }} {{ $row->satuan }}</td>
                <td>Rp{{ number_format($row->harga, 0, '', '.') }}</td>
                <td>
                  @if ($row->kondisi === 'Baru')
                    <span class="badge bg-primary">{{ $row->kondisi }}</span>
                  @else
                    <span class="badge bg-danger">{{ $row->kondisi }}</span>
                  @endif
                </td>
                <td>{{ Illuminate\Support\Carbon::parse($row->tanggal)->format('d-m-Y') }}</td>
                <td>{{ $row->kategori }}</td>
                <td>{{ $row->bagian }}</td>
                <td>
                  <form class="btn-group" action="{{ route('barang.destroy', ['barang' => $row->id]) }}"
                    method="POST">
                    <a class="btn btn-sm btn-success" href="{{ route('barang.edit', ['barang' => $row->id]) }}"><i
                        class="bi bi-pencil-square"></i></a>
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" type="submit"><i class="bi bi-trash"></i></button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</x-layout>
