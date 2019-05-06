<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
	protected $fillable=['id_perusahaan','nama_produk','spesifikasi','merk','kapasitas','harga'];
}