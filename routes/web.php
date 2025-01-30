<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BagianController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PengeluaranController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::resource('kategori', KategoriController::class)->except('show');
Route::resource('bagian', BagianController::class)->except('show');
Route::resource('barang', BarangController::class)->except('show');
Route::resource('pengeluaran', PengeluaranController::class)->except('show');

Route::controller(PetugasController::class)->prefix('petugas')->group(function () {
  Route::get('', 'index')->name('petugas.index');
  Route::post('', 'store')->name('petugas.store');
  Route::get('create', 'create')->name('petugas.create');
  Route::match(['put', 'patch'], '{petugas}', 'update')->name('petugas.update');
  Route::delete('{petugas}', 'destroy')->name('petugas.destroy');
  Route::get('{petugas}/edit', 'edit')->name('petugas.edit');
});
