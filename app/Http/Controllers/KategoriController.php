<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return view('kategori.index', ['data' => Kategori::select(['id', 'nama'])->get()]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('kategori.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    Kategori::create($request->all());

    return redirect()->route('kategori.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(Kategori $kategori)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Kategori $kategori)
  {
    return view('kategori.update', ['data' => $kategori]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Kategori $kategori)
  {
    $kategori->update($request->only(['nama']));
    return redirect()->route('kategori.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Kategori $kategori)
  {
    $kategori->delete();
    return redirect()->back();
  }
}
