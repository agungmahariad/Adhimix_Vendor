<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class do_pengiriman extends Model
{
    protected $fillable=['id_pengiriman','po','do','tgl','jam','no_pol','driver','produk','kirim','terima'];
}