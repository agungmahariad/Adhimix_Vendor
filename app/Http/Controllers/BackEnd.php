<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perusahaan;
use App\Produk;
use App\Admin;
use App\rating;
use App\produkPenawaran;
use carbon\carbon;
use App\kontrak;
use DB;
use App\penawaran;
use Illuminate\Support\Facades\Session;

class BackEnd extends Controller
{
	function login()
	{
		return view('BackEnd.login');
	}

	function dologin(Request $req)
	{
		$cek = admin::where('username',$req->username)->where('password',$req->password)->get();
		if ($cek->count() > 0) {
			session::put('id_admin',$cek[0]->id_admin);
			return redirect('dashboard-admin');
		}else{
			session::flash('error','Username atau password salah');
			return back();
		}
	}

	function dologout()
	{
		session::flush();
		return redirect('admin-auth');
	}

	function dashboard()
	{
		return view('BackEnd.dashboard');
	}

	function vendor()
	{
		$data['vendor'] = perusahaan::paginate(8);
		$data['produk'] = produk::paginate(8);
		return view('BackEnd.vendor',compact('data'));
	}

	function vendorSelection()
	{
		$data['penawaran'] =  DB::table('penawarans')->orderBy('id_penawaran','DESC')
		->join('perusahaans', 'perusahaans.id_perusahaan', '=', 'penawarans.id_perusahaan')
		->select('perusahaans.nama_perusahaan','penawarans.*')
		->get();
		$data['perusahaan']	= perusahaan::all();
		return view('BackEnd.vendorSelection',compact('data'));
	}

	function cariVendor($cek)
	{
		$produk = produk::where('nama_produk',str_replace('%20', ' ', $cek))->get();
		$html="<tr>";
		$no = 0;
		foreach ($produk as $key) {
			$perusahaan = perusahaan::where('id_perusahaan',$key->id_perusahaan)->get();
			foreach ($perusahaan as $e) {
				$no++;
				$html.="<td>".$no."</td><td>".$e->nama_perusahaan."</td><td>".$e->alamat."</td><td><button onclick='kirim(".$e->id_perusahaan.")' class='btn btn-primary'><i class='icon-send'></i> Kirim Permintaan</button></td></tr>";
			}
		}
		return $html;
	}

	function verifikasi($id)
	{
		perusahaan::where('id_perusahaan',$id)->update([
			'verified'=>1]);
		session::flash('success','Perusahaan berhasil di verifikasi');
		return back();
	}

	function kirimPermintaan(Request $req,$id_perusahaan)
	{
		$cek = penawaran::where('judul',$req->judul)->where('id_perusahaan',$id_perusahaan)->where('status',0)->get();
		$produk = produk::where('nama_produk','nama produk')->get();
		if ($cek->count() > 0) {
			return "ada";
		}else{
			penawaran::create([
				'id_perusahaan'	=> $id_perusahaan,	'judul'	=> $req->judul,
				'tgl_mulai'	=> $req->tgl_mulai,		'tgl_akhir'	=> $req->tgl_akhir,
				'uang_muka'	=> '-',					'lama_bayar'	=> 0,
				'pesan'	=> $req->pesan,				'status'	=> 0,
			]);
			produkPenawaran::create([
				'id_penawaran'	=> penawaran::max('id_penawaran'),
				'id_produk'		=> $produk[0]->id_produk,
				'spesifikasi'	=> $req->spesifikasi,
				'merk'	=> $req->merk,
				'kapasitas'	=> $req->kapasitas,
				'harga'=> 0 
			]);
			return "ga ada";
		}
	}

	function getPermintaan()
	{
		$html = "";
		$no = 0;
		$penawaran =  DB::table('penawarans')->orderBy('id_penawaran','DESC')->where('status',0)
		->join('perusahaans', 'perusahaans.id_perusahaan', '=', 'penawarans.id_perusahaan')
		->select('perusahaans.nama_perusahaan','penawarans.*')
		->get();
		foreach ($penawaran as $key) {
			$produk = produkPenawaran::where('id_penawaran',$key->id_penawaran)->get();
			$dataproduk = produk::where('id_produk',$produk[0]->id_produk)->get();
			$no++;
			$html.="<tr><td>".$no."</td>
			<td>".$key->judul."</td>
			<td>".$key->nama_perusahaan."</td>
			<td>".$dataproduk[0]->nama_produk."</td>
			<td>".$dataproduk[0]->spesifikasi."</td>
			<td>".$dataproduk[0]->merk."</td>
			<td> Rp.".number_format($dataproduk[0]->harga)."</td>";
			if ($key->status=="1") {
				$html.="<td><span data-toggle='tooltip' title='".carbon::parse($key->updated_at)->format('l, d F Y')."'>Telah direspon</span></td></tr>";
			}else{
				$html.="
				<td class='text-center'>
				<button style='float:left;' class='btn btn-primary waves-effect btn-block' data-toggle='modal' data-target='#modal".$key->id_penawaran."'><i style='font-size:15px;' class='icon-search' data-toggle='tooltip' title='Detail Permintaan'></i></button></td></tr>
				";
			}
		}
		return $html;
	}

	function batalKirim($id)
	{
		penawaran::where('id_penawaran',$id)->delete();
		session::flash('success','Permintaan berhasil di batalkan');
		return back();
	}

	function penawaran()
	{
		$data['penawaran']= DB::table('penawarans')->orderBy('id_penawaran','DESC')->where('status','!=',0)
		->join('perusahaans', 'perusahaans.id_perusahaan', '=', 'penawarans.id_perusahaan')
		->select('perusahaans.nama_perusahaan','perusahaans.id_perusahaan','penawarans.*')
		->get();
		$data['rating']= DB::table('ratings')->orderBy('id','DESC')
		->join('admins', 'admins.id_admin', '=', 'ratings.rater')
		->select('admins.fullname','ratings.*')
		->get();
		$data['produk']= DB::table('produk_penawarans')
		->join('produks', 'produks.id_produk', '=', 'produk_penawarans.id_produk')
		->select('produk_penawarans.*','produks.nama_produk')
		->get();
		return view('BackEnd.penawaran',compact('data'));
	}

	function getPenawaran()
	{
		$html = "";
		$no = 0;
		$penawaran =  DB::table('penawarans')->orderBy('id_penawaran','DESC')->where('status','!=',0)->where('status','!=',3)
		->join('perusahaans', 'perusahaans.id_perusahaan', '=', 'penawarans.id_perusahaan')
		->select('perusahaans.nama_perusahaan','perusahaans.id_perusahaan','penawarans.*')
		->get();
		foreach ($penawaran as $key) {
			$no++;
			$html.="<tr><td>".$no."</td>
			<td>".$key->judul."</td>
			<td>".carbon::parse($key->tgl_mulai)->format('l, d F Y')."</td>
			<td>".carbon::parse($key->tgl_akhir)->format('l, d F Y')."</td>
			<td><b data-toggle='tooltip' title='".carbon::parse($key->updated_at)->format('l, d F Y')."'>".$key->nama_perusahaan."</b></td>";
			if ($key->status=="1") {
				$html.="<td><button class='btn btn-outline-warning' data-toggle='modal' data-target='#detail".$key->id_penawaran."'><i class='icon-search' data-toggle='tooltip' title='Detail Penawaran'></i></button></td></tr>";
			}else{
				$html.="
				<td class='text-center'>
				<button class='btn btn-outline-primary' data-target='#rating".$key->id_penawaran."' data-toggle='modal'><i class='icon-star-o' data-toggle='tooltip' title='Beri Rating'></i></button>
				</td></tr>
				";
			}
		}
		return $html;
	}


	function terimaPenawaran($id_penawaran)
	{
		$cek = penawaran::where('id_penawaran',$id_penawaran)->get();
		penawaran::where('judul',$cek[0]->judul)->update([
			'status'	=> 3
		]);
		penawaran::where('id_penawaran',$id_penawaran)->update([
			'status'	=> 2
		]);
		kontrak::create([
			'id_penawaran'	=> $id_penawaran,
			'pdf'			=> '-',
			'status'		=> 0,
			'id_perusahaan'	=> $cek[0]->id_perusahaan
		]);
		session::flash('success','Penawaran telah di setujui, silahkan beri rating dan kirim kontrak di menu kontrak');
		return back();
	}

	function tolakPenawaran($id)
	{
		penawaran::where('id_penawaran',$id)->update([
			'status'	=> 3
		]);
		session::flash('success','Penawaran berhasil di tolak');
		return back();
	}

	function beriRating(Request $req, $id)
	{
		$cek = penawaran::where('id_penawaran',$id)->update([
			'status'	=> 3
		]);
		$old = penawaran::where('id_penawaran',$id)->get();
		rating::create([
			'id_perusahaan'		=> $old[0]->id_perusahaan,
			'id_penawaran'		=> $id,
			'bintang'			=> $req->rate,
			'pesan'				=> $req->komentar,
			'rater'				=> session('id_admin'),
			'rated'				=> 1
		]);
		session::flash('rate',$id);
		return back();	
	}

	function batalRate($id)
	{
		penawaran::where('id_penawaran',$id)->update([
			'status'	=> 2
		]);
		rating::where('id_penawaran',$id)->delete();
		return back();
	}

	function kontrak()
	{
		$data['kontrak'] = DB::table('kontraks')->orderBy('id_kontrak','DESC')
		->join('penawarans', 'penawarans.id_penawaran', '=', 'kontraks.id_penawaran')
		->join('perusahaans', 'perusahaans.id_perusahaan', '=', 'penawarans.id_perusahaan')
		->select('perusahaans.nama_perusahaan','penawarans.judul','kontraks.*')
		->get();
		return view('BackEnd.kontrak',compact('data'));
	}

	function sendKontrak(Request $req,$id)
	{
		$this->validate($req, [
			'pdf' => 'mimes:pdf',
		],
		$messages = [
			'mimes' => 'Ekstensi yang di perbolehkan hanya pdf.'
		]);

		$pdf    = $req->file('pdf');
		$name   ='PDF_'.time().'.'.$pdf->getClientOriginalExtension();
		$folder = public_path('kontrak/');
		$pdf->move($folder,$name);
		$cek = penawaran::where('id_penawaran',$id)->get();
		Kontrak::insert([
			'id_penawaran'  => $id,
			'pdf'           => $name,
			'id_perusahaan'	=> $cek[0]->id_perusahaan,
			'status'		=> 1
		]);
        // penawaran::where('id_penawaran',$id)->update([
        //     'status'        => '2',
        // ]);
		session::flash('success','Kontrak Dikirim!');
		return back();
	}

	function tolakVendor($id){
		perusahaan::where('id_perusahaan',$id)->delete();
		session::flash('success','Vendor berhasil di tolak');
		return back();
	}

	function permintaan(){
		$data['penawaran'] =  DB::table('penawarans')->orderBy('id_penawaran','DESC')
		->join('perusahaans', 'perusahaans.id_perusahaan', '=', 'penawarans.id_perusahaan')
		->select('perusahaans.nama_perusahaan','penawarans.*')
		->get();
		$data['perusahaan']	= perusahaan::all();
		$data['produk']	= perusahaan::all();
		return view('BackEnd.permintaan',compact('data'));
	}

	function cariProduk($id){
		$produk = produk::where('id_perusahaan',$id)->get();
		$vendor = perusahaan::where('id_perusahaan',$id)->get()[0]->nama_perusahaan;
		$html='';
		$no = 0;
		foreach ($produk as $key) {
			$no++;
			$html.= "<tr><td>$no</td><td>$vendor</td><td>$key->nama_produk</td><td>$key->spesifikasi</td><td>$key->merk</td><td>$key->kapasitas</td><td>Rp.".number_format($key->harga)."</td><td><fieldset class='form-group row'>
			<div class='col-md-6 col-xs-12 text-xs-center text-md-left'>
			<fieldset>
			<input type='checkbox' name='produk[]' value='$key->id_produk' id='produk$key->id_produk' class='chk-remember'>
			<label for='produk$key->id_produk'></label>
			</fieldset>
			</div>
			</fieldset></td></tr>";
		}
		return $html;
	}

	function kirimVendor(Request $req)
	{
		if ($req->produk!==null) {
			penawaran::create([
				'id_perusahaan'	=> session('id_perusahaan'),
				'judul'			=> $req->judul,
				'tgl_mulai'		=> $req->tgl_mulai,
				'tgl_akhir'		=> $req->tgl_akhir,
				'uang_muka'		=> '-',
				'lama_bayar'	=> 0,
				'ppn'			=> $req->ppn,
				'pesan'			=> '-',
				'status'		=> 0,
			]);
			foreach ($req->produk as $key) {
				$produk = produk::where('id_produk',$key)->get();
				produkPenawaran::create([
					'id_penawaran'	=> penawaran::max('id_penawaran'),
					'id_produk'		=> $produk[0]->id_produk,
					'spesifikasi'	=> $produk[0]->spesifikasi,
					'merk'	=> $produk[0]->merk,
					'kapasitas'	=> $produk[0]->kapasitas,
					'harga'=> 0 
				]);
			}
			session::flash('success','Permintaan berhasil di kirim');
			return back();
		}else{
			session::flash('error','Pilih setidaknya satu produk');
			return back();
		}
	}
}