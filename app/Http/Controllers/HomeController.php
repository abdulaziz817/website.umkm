<?php

namespace App\Http\Controllers;

use App\Models\Bagian;
use App\Models\Barang;
use App\Models\Petugas;
use App\Models\Kategori;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $bagian = Bagian::count();
    $barang = Barang::count();
    $kategori = Kategori::count();
    $pengeluaran = Pengeluaran::count();
    $petugas = Petugas::count();

    return view('home.index', compact('bagian', 'barang', 'kategori', 'pengeluaran', 'petugas'));
  }
}
