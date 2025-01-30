<x-layout>
  @push('style')
    <style>
      .stats-icon>i {
        speak: never;
        font-style: normal;
        font-weight: 400;
        font-variant: normal;
        text-transform: none;
        line-height: 1;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
      }

      .bi {
        width: auto !important;
        height: auto !important;
      }
    </style>
  @endpush
  <x-slot:title>Home</x-slot:title>

  <div class="row">
    <div class="col-6 col-lg-3 col-md-6">
      <div class="card">
        <div class="card-body px-4 py-4-5">
          <div class="row">
            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
              <div class="stats-icon purple mb-2">
                <i class="bi bi-box-seam-fill"></i>
              </div>
            </div>
            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
              <h6 class="text-muted font-semibold">Barang</h6>
              <h6 class="font-extrabold mb-0">{{ $barang }}</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-6 col-lg-3 col-md-6">
      <div class="card">
        <div class="card-body px-4 py-4-5">
          <div class="row">
            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
              <div class="stats-icon blue mb-2">
                <i class="bi bi-intersect"></i>
              </div>
            </div>
            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
              <h6 class="text-muted font-semibold">Bagian</h6>
              <h6 class="font-extrabold mb-0">{{ $bagian }}</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-6 col-lg-3 col-md-6">
      <div class="card">
        <div class="card-body px-4 py-4-5">
          <div class="row">
            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
              <div class="stats-icon green mb-2">
                <i class="bi bi-stack"></i>
              </div>
            </div>
            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
              <h6 class="text-muted font-semibold">Kategori</h6>
              <h6 class="font-extrabold mb-0">{{ $kategori }}</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-6 col-lg-3 col-md-6">
      <div class="card">
        <div class="card-body px-4 py-4-5">
          <div class="row">
            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
              <div class="stats-icon red mb-2">
                <i class="bi bi-people-fill"></i>
              </div>
            </div>
            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
              <h6 class="text-muted font-semibold">Petugas</h6>
              <h6 class="font-extrabold mb-0">{{ $petugas }}</h6>
            </div>
          </div>
        </div>
      </div>
    </div>


    //MASIH ERROR

    {{-- <div class="col-6 col-lg-3 col-md-6">
      <div class="card">
        <div class="card-body px-4 py-4-5">
          <div class="row">
            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
              <div class="stats-icon blue mb-2">
                <i class="bi bi-file-earmark-bar-graph-fill"></i>
              </div>
            </div>
            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
              <h6 class="text-muted font-semibold">Pengeluaran</h6>
              <h6 class="font-extrabold mb-0">{{ $pengeluaran }}</h6>
            </div>
          </div>
        </div>
      </div> --}}
    </div>
  </div>
</x-layout>
