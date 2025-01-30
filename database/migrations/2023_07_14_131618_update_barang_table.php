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
      Schema::table('g_barang', function (Blueprint $table) {
          if (!Schema::hasColumn('g_barang', 'bagian_id')) {
              $table->foreignId('bagian_id')->constrained('g_bagian');
          }
      });
  }


  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('g_barang');
  }
};
