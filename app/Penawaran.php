<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penawaran extends Model
{
	protected $fillable=['id_perusahaan','rated','pesan','tgl_mulai','tgl_akhir','uang_muka','status','judul','lama_bayar','ppn'];
}
