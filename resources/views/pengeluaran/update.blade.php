<x-layout>
  <x-slot:title>Update Pengeluaran</x-slot:title>

  <div class="col-12">
    <form action="{{ route('pengeluaran.update', ['pengeluaran' => $data]) }}" method="POST">
      @method('PATCH')
      @include('pengeluaran._form')
    </form>
  </div>
</x-layout>
