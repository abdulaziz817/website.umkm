<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pengeluaran extends Model
{
  use HasFactory;

  protected $table = 'g_pengeluaran';
  protected $fillable = ['tanggal', 'bagian_id', 'petugas_id', 'keterangan'];

  public function barang(): BelongsToMany
  {
    return $this->belongsToMany(Barang::class, 'g_pengeluaran_has_barang', 'pengeluaran_id', 'barang_id')->withPivot('jumlah');
  }
}
