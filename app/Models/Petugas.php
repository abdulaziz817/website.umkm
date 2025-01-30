<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Petugas extends Model
{
  use HasFactory;

  protected $table = 'g_petugas';
  protected $fillable = ['nama', 'password', 'level', 'telp', 'alamat'];

  // public function barang(): HasMany
  // {
  //   return $this->hasMany(Barang::class);
  // }
}
