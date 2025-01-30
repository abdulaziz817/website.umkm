<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
  use HasFactory;

  protected $table = 'g_pengeluaran_has_barang';
  protected $fillable = ['tanggal', 'bagian_id', 'petugas_id', 'keterangan'];
}
