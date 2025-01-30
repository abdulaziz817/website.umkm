<?php

namespace App\Http\Controllers;

use App\Models\Bagian;
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BarangController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return view('barang.index', ['data' => Barang::withRelation()]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $kategori = Kategori::orderBy('nama')->get(['id', 'nama']);
    $bagian = Bagian::orderBy('nama')->get(['id', 'nama', 'kepala']);

    return view('barang.create', compact('kategori', 'bagian'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    Barang::create($request->all());

    return redirect()->route('barang.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(Barang $barang)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Barang $barang)
  {
    $kategori = Kategori::orderBy('nama')->get(['id', 'nama']);
    $bagian = Bagian::orderBy('nama')->get(['id', 'nama', 'kepala']);
    $data = $barang;

    return view('barang.update', compact('data', 'kategori', 'bagian'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Barang $barang)
  {
    $barang->update($request->except(['_token']));
    return redirect()->route('barang.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Barang $barang)
  {
    $barang->delete();
    return redirect()->back();
  }
}
