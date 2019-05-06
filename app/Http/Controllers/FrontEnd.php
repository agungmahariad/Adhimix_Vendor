<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perusahaan;
use App\Penawaran;
use App\pengiriman;
use App\do_pengiriman;
use App\produkPenawaran;
use DB;
use App\Produk;
use Illuminate\Support\Facades\Session;


class FrontEnd extends Controller
{
	function landing()
	{
		return view('FrontEnd.landing');
	}

	function cekPerusahaan($cek)
	{
		$cek = perusahaan::where('nama_perusahaan',str_replace('%20', ' ', $cek))->count();
		if ($cek > 0) {
			return "ada";
		}else{
			return "ga ada";
		}
	}	

	function cekEmail($cek)
	{
		$cek = perusahaan::where('email',str_replace('%20', ' ', $cek))->count();
		if ($cek > 0) {
			return "ada";
		}else{
			return "ga ada";
		}
	}	

	function cekUsername($cek)
	{
		$cek = perusahaan::where('username',str_replace('%20', ' ', $cek))->count();
		if ($cek > 0) {
			return "ada";
		}else{
			return "ga ada";
		}
	}	

	function signUp(Request $req)
	{
		perusahaan::create([
			'nama_perusahaan'	=> $req->nama_perusahaan,		'username'	=> $req->username,
			'alamat'			=> $req->alamat,				'password'	=> $req->password,
			'email'				=> $req->email_perusahaan,		'nama_admin'=> $req->nama_admin,
			'telp_perusahaan'	=> $req->telp_perusahaan,		'jabatan'	=> $req->jabatan,
			'rek_perusahaan'	=> $req->rek_perusahaan,		'telp_pic'	=> $req->telp_pic,
			'pict'				=> '-',							'provinsi'	=> $req->provinsi,
			'kota'				=> $req->kota,
		]);
		session::flash('success','success');
		return back();
	}

	function login(Request $req)
	{
		$cek = perusahaan::where(array('username'=> $req->username,'password'=> $req->password,'verified'=>'1'))->get();
		if ($cek->count() > 0 ) {
			session::put([
				'id_perusahaan'	=> $cek[0]->id_perusahaan
			]);
			return redirect('dashboard');
		}else{
			session::flash('error','Username atau password salah atau akun belum di verifikasi');
			return back();
		}
	}

	function logout()
	{
		session::forget('id_perusahaan');
		return redirect('');
	}

	function dashboard()
	{
		return view('FrontEnd.dashboard');
	}

	function produk()
	{
		$data['produk'] = produk::where('id_perusahaan',session('id_perusahaan'))->get();
		return view('FrontEnd.produk',compact('data'));
	}

	function cekproduk($cek,$id)
	{
		$cek = produk::where(array('nama_produk'=>str_replace('%20', ' ', $cek),'id_perusahaan'=>$id))->count();
		if ($cek > 0) {
			return "ada";
		}else{
			return session::get('id_perusahaan');
		}
	}	

	function addProduk(Request $req)
	{
		produk::create([
			'id_perusahaan'	=> session('id_perusahaan'),	'nama_produk'	=> $req->nama_produk,
			'spesifikasi'	=> $req->spesifikasi,			'merk'			=> $req->merk,
			'harga'			=> $req->harga,					'kapasitas'		=> $req->kapasitas
		]);
		session::flash('success','Produk telah ditambahkan!');
		return back();
	}

	function updateProduk(Request $req,$id)
	{
		$old = produk::where('id_produk', $id)->get();

		if ($req->nama_produk == $old[0]->nama_produk) {
			produk::where('id_produk', $id)->update([
				'nama_produk' => $req->nama_produk,
				'kapasitas'   => $req->kapasitas,
				'spesifikasi' => $req->spesifikasi,
				'merk'        => $req->merk,
				'harga'       => $req->harga,
			]);
			session::flash('success', 'Produk berhasil di update!');
			return back();
		} else {
			$cek = produk::where('id_perusahaan', session('id_perusahaan'))->where('nama_produk', $req->nama_produk)->get();

			if ($cek->count() > 0) {
				session::flash('error', 'Produk telah terdaftar');
				return back();
			} else {
				produk::where('id_produk', $id)->update([
					'nama_produk' => $req->nama_produk,
					'kapasitas'   => $req->kapasitas,
					'spesifikasi' => $req->spesifikasi,
					'merk'        => $req->merk,
					'harga'       => $req->harga,
				]);
				session::flash('success', 'Produk berhasil di update!');
				return back();
			}
		}
	}

	function delProduk($id)
	{
		produk::where('id_produk',$id)->delete();
		session::flash('success','Produk berhasil di hapus!');
		return back();
	}

	function penawaran()
	{
		$data['penawaran'] = DB::table('penawarans')->where('penawarans.id_perusahaan',session('id_perusahaan'))->orderBy('id_penawaran','DESC')
		->join('perusahaans', 'perusahaans.id_perusahaan', '=', 'penawarans.id_perusahaan')
		->select('perusahaans.nama_perusahaan','penawarans.*')
		->get();
		$data['produk'] = DB::table('produk_penawarans')
		->join('produks', 'produks.id_produk', '=', 'produk_penawarans.id_produk')
		->select('produk_penawarans.*','produks.nama_produk')
		->get();
		return view('FrontEnd.penawaran',compact('data'));
	}

	function kirimRespon(Request $req,$id)
	{
		penawaran::where('id_penawaran',$id)->update([
			'uang_muka'		=> $req->uang_muka,
			'lama_bayar'	=> $req->lama_bayar,
			'ppn'			=> $req->ppn,
			'status'		=> 1	
		]);
		foreach (produkPenawaran::where('id_penawaran',$id)->get() as $key ) {
			produkPenawaran::where('id_produk_penawaran',$key->id_produk_penawaran)->update([
				'harga'	=> $_POST['harga'.$key->id_produk_penawaran]
			]);
		}
		session::flash('success','Penawaran telah diajukan');
		return back();
	}

	function getRow($id,$idp)
	{
		$data['produk'] = produk::where('id_perusahaan',$idp)->get();
		$html           = "<tr id='tr" . $id . "'>
		<td>
		<select class='form-control' required='' name='produk" . $id . "'>
		<option value=''>Pilih Produk</option>";
		foreach ($data['produk'] as $e) {
			$html .= "<option value='" . $e->id_produk . "'>" . $e->nama_produk . "</option>";
		}
		$html .= "
		</select>
		</td>
		<td><input type='input' class='form-control' required='' name='spesifikasi" . $id . "' placeholder='Spesifikasi' ></td>
		<td><input type='input' class='form-control' required='' name='merk" . $id . "' placeholder='Merk' ></td>
		<td><input type='input' class='form-control' required='' name='kapasitas" . $id . "' placeholder='Kapasitas' ></td>
		<td><input type='number' class='form-control' required='' name='harga" . $id . "' placeholder='Harga' ></td>
		<td><button class='btn btn-danger' onclick='hapus(" . $id . ")'><i class='fa fa-trash'></i></button></td>
		</tr>";
		echo $html;
	}

	function addPenawaran(Request $req)
	{
		penawaran::create([
			'id_perusahaan'	=> session('id_perusahaan'),
			'judul'			=> $req->judul,
			'tgl_mulai'		=> $req->tgl_mulai,
			'tgl_akhir'		=> $req->tgl_akhir,
			'uang_muka'		=> $req->uang_muka,
			'lama_bayar'		=> $req->lama_bayar,
			'ppn'		=> $req->ppn,
			'pesan'		=> '-',
			'status'		=> 1,
		]);
		for ($i=1; $i <=100 ; $i++) { 
			if (isset($_POST['produk'.$i])) {

				produkPenawaran::create([
					'id_produk'		=> $_POST['produk'.$i],
					'id_penawaran'	=> penawaran::max('id_penawaran'),
					'spesifikasi'	=> $_POST['spesifikasi'.$i],
					'merk'	=> $_POST['merk'.$i],
					'kapasitas'	=> $_POST['kapasitas'.$i],
					'harga'	=> $_POST['harga'.$i],
				]);
			}
		}
		session::flash('success','Penawaran berhasil dikirim');
		return back();
	}
	function kontrak()
	{
		$data['kontrak'] = DB::table('kontraks')->orderBy('id_kontrak','DESC')->where('kontraks.id_perusahaan',session('id_perusahaan'))->where('kontraks.status',1)
		->join('penawarans', 'penawarans.id_penawaran', '=', 'kontraks.id_penawaran')
		->join('perusahaans', 'perusahaans.id_perusahaan', '=', 'penawarans.id_perusahaan')
		->select('perusahaans.nama_perusahaan','penawarans.judul','kontraks.*')
		->get();
		return view('FrontEnd.kontrak',compact('data'));
	}

	function download($id)
	{
		$data['kontrak'] = DB::table('kontraks')->orderBy('id_kontrak','DESC')->where('kontraks.id_perusahaan',session('id_perusahaan'))
		->join('penawarans', 'penawarans.id_penawaran', '=', 'kontraks.id_penawaran')
		->join('perusahaans', 'perusahaans.id_perusahaan', '=', 'penawarans.id_perusahaan')
		->select('perusahaans.nama_perusahaan','penawarans.judul','kontraks.*')
		->get();

		return view('FrontEnd.download',compact('data'));
	}

	function pengiriman()
	{
		$data['pengiriman'] = pengiriman::where('id_perusahaan',session('id_perusahaan'))->get();
		$data['do']			= do_pengiriman::get();
		return view('FrontEnd.pengiriman',compact('data'));
	}

	function getrowpengiriman($i)
	{
		$html = "<tr id='row" . $i . "'>";
		$html .= "
		<td><input type='input' class='form-control' placeholder='013455' name='po" . $i . "'></td>
		<td><input type='input' class='form-control' placeholder='2345' name='do" . $i . "'></td>
		<td><input type='input' class='form-control' placeholder='17 - 11 - 18' name='tgl" . $i . "'></td>
		<td><input type='input' class='form-control' placeholder='18.30' name='jam" . $i . "'></td>
		<td><input type='input' class='form-control' placeholder='B3200GEC' name='no_pol".$i."'></td>
		<td><input type='input' class='form-control' placeholder='Parjo' name='driver" . $i . "'></td>
		<td><input type='input' class='form-control' placeholder='Semen' name='produk" . $i . "'></td>
		<td><input type='input' class='form-control' placeholder='100kg' name='kirim" . $i . "'></td>
		<td><input type='input' class='form-control' placeholder='30kg' name='terima" . $i . "'></td>
		<td><button class='btn btn-danger' type='button' onclick='hapus(".$i.")' data-toggle='tooltip' title='Hapus'><i class='fa fa-trash'></i></button></td>
		</tr>";
		echo $html;
	}


	function addPengiriman(Request $req)
	{
		pengiriman::create([
			'id_perusahaan' 	=> session('id_perusahaan'),
			'no_invoice' 		=> $req->no_invoice,
			'no_faktur'      	=> $req->no_faktur,
			'total'            	=> $req->total,
			'tgl_faktur'       	=> $req->tgl_faktur, 
		]);
		for ($i = 1; $i <= 100; $i++) {
			if (isset($_POST['po' . $i])) {
				do_pengiriman::create([
					'id_pengiriman'   => pengiriman::max('id_pengiriman'),
					'po' => $_POST['po' . $i],
					'do' => $_POST['do' . $i],
					'tgl'   => $_POST['tgl' . $i],
					'jam'        => $_POST['jam' . $i],
					'no_pol'        => $_POST['no_pol' . $i],
					'driver'        => $_POST['driver' . $i],
					'produk'        => $_POST['produk' . $i],
					'kirim'        => $_POST['kirim' . $i],
					'terima'        => $_POST['terima' . $i],
				]);
			}
		}
		session::flash('success', 'Penawaran telah dibuat');
		return back();
	}
}