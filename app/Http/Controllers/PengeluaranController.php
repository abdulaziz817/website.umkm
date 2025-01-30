<?php

namespace App\Http\Controllers;

use App\Models\Bagian;
use App\Models\Barang;
use App\Models\Pengeluaran;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengeluaranController extends Controller
{
  protected $model;
  protected $table;

  public function __construct()
  {
    $this->model = new Pengeluaran();
    $this->table = $this->model->getTable();
  }

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $pengeluaran = DB::table('g_pengeluaran')
      ->leftJoin('g_pengeluaran_has_barang', 'g_pengeluaran.id', 'g_pengeluaran_has_barang.pengeluaran_id')
      ->join('g_barang', 'g_barang.id', 'g_pengeluaran_has_barang.barang_id')
      ->join('g_bagian', 'g_bagian.id', 'g_pengeluaran.bagian_id')
      ->join('g_petugas', 'g_petugas.id', 'g_pengeluaran.petugas_id')
      ->select(['g_pengeluaran.id', 'g_pengeluaran.tanggal', DB::raw('COUNT(g_pengeluaran_has_barang.id) AS jumlah_item'), DB::raw('SUM(g_pengeluaran_has_barang.jumlah) AS total_item'), DB::raw('g_bagian.nama AS bagian'), DB::raw('g_petugas.nama AS petugas')])
      ->groupBy('g_pengeluaran.id', 'g_pengeluaran.tanggal', 'g_bagian.nama', 'g_petugas.nama')
      ->get();

    return view('pengeluaran.index', ['data' => $pengeluaran]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $petugas = Petugas::orderBy('nama')->get(['id', 'nama']);
    $bagian = Bagian::orderBy('nama')->get(['id', 'nama', 'kepala']);

    return view('pengeluaran.create', compact('petugas', 'bagian'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $pengeluaran = Pengeluaran::create($request->all());

    for ($i = 0; $i < count($request->barang_id); $i++) {
      $pengeluaran->barang()->attach($request->barang_id[$i], ['jumlah' => $request->jumlah[$i]]);
    }

    return redirect()->route('pengeluaran.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(Pengeluaran $pengeluaran)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Pengeluaran $pengeluaran)
  {
    $petugas = Petugas::orderBy('nama')->get(['id', 'nama']);
    $bagian = Bagian::orderBy('nama')->get(['id', 'nama', 'kepala']);
    $data = $pengeluaran;

    return view('pengeluaran.update', compact('data', 'petugas', 'bagian'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Pengeluaran $pengeluaran)
  {
    $pengeluaran->update($request->only(['tanggal', 'bagian_id', 'petugas_id']));

    $pengeluaran->barang()->detach();

    for ($i = 0; $i < count($request->barang_id); $i++) {
      $pengeluaran->barang()->attach($request->barang_id[$i], ['jumlah' => $request->jumlah[$i]]);
    }

    return redirect()->route('pengeluaran.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Pengeluaran $pengeluaran)
  {
    $pengeluaran->barang()->detach();
    $pengeluaran->delete();

    return redirect()->back();
  }
}
