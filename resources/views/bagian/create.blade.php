<x-layout>
  <x-slot:title>Tambah Bagian</x-slot:title>

  <div class="col-md-6 col-sm-8 col-12 offset-md-3 offset-sm-2">
    <form action="/bagian" method="POST">
      @include('bagian._form')
    </form>
  </div>
</x-layout>
