<x-layout>
  <x-slot:title>Petugas</x-slot:title>

  <div class="col mx-auto">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center border-bottom">
        <h5 class="card-title mb-0">Data Petugas</h5>
        <a class="btn icon btn-primary" href="/petugas/create"><i class="bi bi-plus-circle"></i></a>
      </div>
      <div class="card-body mt-3">
        <table class="table table-bordered table-striped">
          <thead>
            <tr class="text-center">
              <th style="width: 1px">No</th>
              <th>Nama Petugas</th>
              <th>Level</th>
              <th>Telepon</th>
              <th style="width: 1px">#</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $key => $row)
              <tr class="text-center align-middle">
                <th>{{ $key + 1 }}</th>
                <td>{{ $row->nama }}</td>
                <td>{{ $row->level }}</td>
                <td>{{ $row->telp }}</td>
                <td>
                  <form class="btn-group" action="{{ route('petugas.destroy', ['petugas' => $row]) }}" method="POST">
                    <a class="btn btn-sm btn-success" href="{{ route('petugas.edit', ['petugas' => $row]) }}"><i
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
