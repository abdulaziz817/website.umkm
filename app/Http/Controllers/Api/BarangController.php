<?php

namespace App\Http\Controllers\Api;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BarangController extends Controller
{
  protected $model;
  protected $table;
  protected $query;

  public function __construct()
  {
    $this->model = new Barang();
    $this->table = $this->model->getTable();
    $this->query = DB::table($this->table)
      ->select(["{$this->table}.id", "{$this->table}.nama", "{$this->table}.satuan", "{$this->table}.harga", "{$this->table}.jumlah", "{$this->table}.kondisi", "{$this->table}.tanggal", DB::raw('g_kategori.nama AS kategori'), DB::raw('g_bagian.nama AS bagian')])
      ->join('g_kategori', 'g_kategori.id', "{$this->table}.kategori_id")
      ->join('g_bagian', 'g_bagian.id', "{$this->table}.bagian_id")
      ->where("{$this->table}.jumlah", '>', 0);
  }

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return response($this->query->get());
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(Barang $barang)
  {
    $data = $this->query
      ->where("{$this->table}.id", $barang->id)
      ->first();

    return response((array)$data);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Barang $barang)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Barang $barang)
  {
    //
  }
}
