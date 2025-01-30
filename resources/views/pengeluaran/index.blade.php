<x-layout>
  <x-slot:title>Pengeluaran</x-slot:title>

  <div class="col mx-auto">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center border-bottom">
        <h5 class="card-title mb-0">Data Pengeluaran</h5>
        <a class="btn icon btn-primary" href="/pengeluaran/create"><i class="bi bi-plus-circle"></i></a>
      </div>
      <div class="card-body mt-3">
        <table class="table table-bordered table-striped">
          <thead>
            <tr class="text-center">
              <th style="width: 1px">No</th>
              <th>Petugas</th>
              <th>Bagian</th>
              <th>Tanggal</th>
              <th>Jml Item</th>
              <th>Total Item</th>
              <th style="width: 1px">#</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $key => $row)
              <tr class="text-center align-middle">
                <th>{{ $key + 1 }}</th>
                <td>{{ $row->petugas }}</td>
                <td>{{ $row->bagian }}</td>
                <td>{{ Illuminate\Support\Carbon::parse($row->tanggal)->format('d-m-Y') }}</td>
                <td>{{ $row->jumlah_item }}</td>
                <td>{{ $row->total_item }}</td>
                <td>
                  <form class="btn-group" action="{{ route('pengeluaran.destroy', ['pengeluaran' => $row->id]) }}"
                    method="POST">
                    <a class="btn btn-sm btn-success"
                      href="{{ route('pengeluaran.edit', ['pengeluaran' => $row->id]) }}"><i
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
