<x-layout>
  <x-slot:title>Tambah Kategori</x-slot:title>

  <div class="col-md-6 col-sm-8 col-12 offset-md-3 offset-sm-2">
    <form action="/kategori" method="POST">
      @include('kategori._form')
    </form>
  </div>
</x-layout>
