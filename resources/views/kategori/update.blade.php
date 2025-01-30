<x-layout>
  <x-slot:title>Update Kategori</x-slot:title>

  <div class="col-md-6 col-sm-8 col-12 offset-md-3 offset-sm-2">
    <form action="{{ route('kategori.update', ['kategori' => $data]) }}" method="POST">
      @method('PATCH')
      @include('kategori._form')
    </form>
  </div>
</x-layout>
