<x-layout>
  <x-slot:title>Update Barang</x-slot:title>

  <div class="col-md-6 col-sm-8 col-12 offset-md-3 offset-sm-2">
    <form action="{{ route('barang.update', ['barang' => $data]) }}" method="POST">
      @method('PATCH')
      @include('barang._form')
    </form>
  </div>
</x-layout>
