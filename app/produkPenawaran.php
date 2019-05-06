<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produkPenawaran extends Model
{
    protected $fillable=['id_produk','id_penawaran','spesifikasi','merk','kapasitas','harga'];
}