<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerusahaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perusahaans', function (Blueprint $table) {
            $table->increments('id_perusahaan');
            $table->string('nama_perusahaan');
            $table->text('alamat');
            $table->string('email');
            $table->string('telp_perusahaan');
            $table->string('rek_perusahaan');
            $table->string('nama_admin');
            $table->string('username');
            $table->string('password');
            $table->string('telp_pic');
            $table->string('jabatan');
            $table->string('pict');
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
        Schema::dropIfExists('perusahaans');
    }
}
