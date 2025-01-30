<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('g_bagian', function (Blueprint $table) {
      $table->id();
      $table->string('nama', 45);
      $table->string('kepala', 45)->nullable();
      $table->string('telp', 45);
      $table->timestamps();
    });

    Schema::create('g_kategori', function (Blueprint $table) {
      $table->id();
      $table->string('nama', 45);
      $table->timestamps();
    });

    Schema::create('g_barang', function (Blueprint $table) {
      $table->id();
      $table->string('nama', 45);
      $table->string('satuan', 45)->nullable();
      $table->bigInteger('harga')->nullable();
      $table->integer('jumlah')->default(1);
      $table->string('kondisi');
      $table->dateTime('tanggal')->useCurrent();
      $table->foreignId('bagian_id')->references('id')->on('g_bagian');
      $table->foreignId('kategori_id')->references('id')->on('g_kategori');
      $table->timestamps();
    });

    Schema::create('g_petugas', function (Blueprint $table) {
      $table->id();
      $table->string('nama', 45);
      $table->string('password');
      $table->string('level', 20)->nullable();
      $table->string('telp', 15)->nullable();
      $table->string('alamat', 100)->nullable();
      $table->timestamps();
    });

    Schema::create('g_pengeluaran', function (Blueprint $table) {
      $table->id();
      $table->dateTime('tanggal')->useCurrent();
      $table->foreignId('bagian_id')->references('id')->on('g_bagian');
      $table->foreignId('petugas_id')->references('id')->on('g_petugas');
      $table->string('keterangan', 100)->nullable();
      $table->timestamps();
    });

    Schema::create('g_pengeluaran_has_barang', function (Blueprint $table) {
      $table->id();
      $table->foreignId('pengeluaran_id')->references('id')->on('g_pengeluaran');
      $table->foreignId('barang_id')->references('id')->on('g_barang');
      $table->integer('jumlah')->default(1);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::withoutForeignKeyConstraints(function () {
      Schema::dropIfExists('g_bagian');
      Schema::dropIfExists('g_kategori');
      Schema::dropIfExists('g_barang');
      Schema::dropIfExists('g_petugas');
      Schema::dropIfExists('g_pengeluaran');
    });
  }
};
