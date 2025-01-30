<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kategori extends Model
{
  use HasFactory;

  protected $table = 'g_kategori';
  protected $fillable = ['nama'];

  public function barang(): HasMany
  {
    return $this->hasMany(Barang::class);
  }
}
