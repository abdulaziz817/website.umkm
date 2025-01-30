<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bagian extends Model
{
  use HasFactory;

  protected $table = 'g_bagian';
  protected $fillable = ['nama', 'kepala', 'telp'];

  public function barang(): HasMany
  {
    return $this->hasMany(Barang::class);
  }
}
