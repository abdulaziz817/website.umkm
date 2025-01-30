<x-layout>
  <x-slot:title>Update Petugas</x-slot:title>
  <div class="col-md-6 col-sm-8 col-12 offset-md-3 offset-sm-2">
    <form action="{{ route('petugas.update', ['petugas' => $data]) }}" method="POST">
      @method('PATCH')
      @include('petugas._form')
    </form>
  </div>
</x-layout>
