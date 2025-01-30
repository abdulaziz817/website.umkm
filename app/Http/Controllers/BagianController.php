<?php

namespace App\Http\Controllers;

use App\Models\Bagian;
use Illuminate\Http\Request;

class BagianController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return view('bagian.index', ['data' => Bagian::select(['id', 'nama', 'kepala', 'telp'])->get()]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('bagian.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    Bagian::create($request->all());

    return redirect()->route('bagian.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(Bagian $bagian)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Bagian $bagian)
  {
    return view('bagian.update', ['data' => $bagian]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Bagian $bagian)
  {
    $bagian->update($request->only(['nama', 'kepala', 'telp']));
    return redirect()->route('bagian.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Bagian $bagian)
  {
    $bagian->delete();
    return redirect()->back();
  }
}
