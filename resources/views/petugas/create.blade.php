<x-layout>
  <x-slot:title>Tambah Petugas</x-slot:title>

  <div class="col-md-6 col-sm-8 col-12 offset-md-3 offset-sm-2">
    <form action="/petugas" method="POST">
      @include('petugas._form')
    </form>
  </div>
</x-layout>
