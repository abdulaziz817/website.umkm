<x-layout>
  <x-slot:title>Update Bagian</x-slot:title>

  <div class="col-md-6 col-sm-8 col-12 offset-md-3 offset-sm-2">
    <form action="{{ route('bagian.update', ['bagian' => $data]) }}" method="POST">
      @method('PATCH')
      @include('bagian._form')
    </form>
  </div>
</x-layout>
