<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdukPenawaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk_penawarans', function (Blueprint $table) {
            $table->increments('id_produk_penawaran');
            $table->integer('id_produk');
            $table->integer('id_penawaran');
            $table->string('spesifikasi');
            $table->string('merk');
            $table->string('kapasitas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk_penawarans');
    }
}
