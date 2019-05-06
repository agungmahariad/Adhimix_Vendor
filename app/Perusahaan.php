<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
	protected $fillable=['nama_perusahaan','alamat','email','telp_perusahaan','rek_perusahaan','nama_admin','username','password','telp_pic','jabatan','pict','provinsi','kota'];
}