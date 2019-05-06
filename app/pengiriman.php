<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengiriman extends Model
{
    protected $fillable=['id_perusahaan','no_invoice','no_faktur','total','tgl_faktur'];
}