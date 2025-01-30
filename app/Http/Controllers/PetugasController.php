<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return view('petugas.index', ['data' => Petugas::select(['id', 'nama', 'level', 'telp'])->get()]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('petugas.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    Petugas::create($request->all());

    return redirect()->route('petugas.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(Petugas $petugas)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Petugas $petugas)
  {
    return view('petugas.update', ['data' => $petugas]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Petugas $petugas)
  {
    $petugas->update($request->only(['nama', 'password', 'level', 'telp', 'alamat']));
    return redirect()->route('petugas.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Petugas $petugas)
  {
    $petugas->delete();
    return redirect()->back();
  }
}
