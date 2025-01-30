<x-layout>
  <x-slot:title>Tambah Pengeluaran</x-slot:title>

  <div class="col-12">
    <form action="/pengeluaran" method="POST">
      @include('pengeluaran._form')
    </form>
  </div>
</x-layout>
