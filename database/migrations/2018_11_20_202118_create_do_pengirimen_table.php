<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoPengirimenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('do_pengirimen', function (Blueprint $table) {
            $table->increments('id_do_pengiriman');
            $table->string('id_pengiriman');
            $table->string('po');
            $table->string('do');
            $table->string('tgl');
            $table->string('jam');
            $table->string('no_pol');
            $table->string('driver');
            $table->string('produk');
            $table->string('kirim');
            $table->string('terima');
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
        Schema::dropIfExists('do_pengirimen');
    }
}
