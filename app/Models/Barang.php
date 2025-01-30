<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Barang extends Model
{
  use HasFactory;

  protected $table = 'g_barang';
  protected $fillable = ['nama', 'satuan', 'harga', 'jumlah', 'kondisi', 'tanggal', 'kategori_id', 'bagian_id'];

  public function kategori(): BelongsTo
  {
    return $this->belongsTo(Kategori::class, 'kategori_id');
  }

  public function bagian(): BelongsTo
  {
    return $this->belongsTo(Bagian::class, 'bagian_id');
  }

  public function pengeluaran(): BelongsToMany
  {
    return $this->belongsToMany(Pengeluaran::class, 'g_pengeluaran_has_barang', 'barang_id', 'pengeluaran_id');
  }

  public function scopeWithRelation(Builder $query, string $orderBy = null, string $direction = 'asc')
  {
    $relation = DB::table($this->table)
      ->select(["{$this->table}.id", "{$this->table}.nama", "{$this->table}.satuan", "{$this->table}.harga", "{$this->table}.jumlah", "{$this->table}.kondisi", "{$this->table}.tanggal", DB::raw('g_kategori.nama AS kategori'), DB::raw('g_bagian.nama AS bagian')])
      ->join('g_kategori', 'g_kategori.id', "{$this->table}.kategori_id")
      ->join('g_bagian', 'g_bagian.id', "{$this->table}.bagian_id");

    if ($orderBy)
      $relation->orderBy(Str::start($orderBy, 'g_'), $direction);

    return $relation->get();
  }

  public function scopeWithKategori(Builder $query, string $orderBy = null, string $direction = 'asc')
  {
    $relation = DB::table($this->table)
      ->select(["{$this->table}.id", "{$this->table}.nama", "{$this->table}.satuan", "{$this->table}.harga", "{$this->table}.jumlah", "{$this->table}.kondisi", "{$this->table}.tanggal", DB::raw('g_kategori.nama AS kategori')])
      ->join('g_kategori', 'g_kategori.id', "{$this->table}.kategori_id");

    if ($orderBy)
      $relation->orderBy(Str::start($orderBy, 'g_'), $direction);

    return $relation->get();
  }
}
