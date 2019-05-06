<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable=['id_perusahaan','rater','bintang','pesan','id_penawaran'];
}
