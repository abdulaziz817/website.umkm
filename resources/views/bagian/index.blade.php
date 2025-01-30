<x-layout>
  <x-slot:title>Bagian</x-slot:title>

  <div class="col mx-auto">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center border-bottom">
        <h5 class="card-title mb-0">Data Bagian</h5>
        <a class="btn icon btn-primary" href="/bagian/create"><i class="bi bi-plus-circle"></i></a>
      </div>
      <div class="card-body mt-3">
        <table class="table table-bordered table-striped">
          <thead>
            <tr class="text-center">
              <th style="width: 1px">No</th>
              <th>Nama Bagian</th>
              <th>Kepala Bagian</th>
              <th>Telepon</th>
              <th style="width: 1px">#</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $key => $row)
              <tr class="text-center align-middle">
                <th>{{ $key + 1 }}</th>
                <td>{{ $row->nama }}</td>
                <td>{{ $row->kepala }}</td>
                <td>{{ $row->telp }}</td>
                <td>
                  <form class="btn-group" action="{{ route('bagian.destroy', ['bagian' => $row]) }}" method="POST">
                    <a class="btn btn-sm btn-success" href="{{ route('bagian.edit', ['bagian' => $row]) }}"><i
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
