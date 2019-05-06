@php
use carbon\carbon;
use App\produkPenawaran;
use App\Penawaran;
use App\rating;
@endphp
@extends('BackEnd.layout')
@section('title','Adhimix Vendor | Penawaran')
@section('content')
<style type="text/css">
.kuning{
	color: #d9ef11;
}
.kuning2{
	color: #d9ef11;
}
</style>
<div class="content-wrapper">
	<div class="content-header row">
		<div class="content-header-left col-md-6 col-xs-12 mb-1">
			<h2 class="content-header-title">
				Data Penawaran
			</h2>
		</div>
	</div>
	<div class="content-body">
		<!-- Basic example section start -->
		<section id="basic-examples">
			<div class="row">
				<div class="col-xs-12 mt-1 mb-3">
					<h4 class="">
						Penawaran
					</h4>
					<p>
						Admin dapat terima dan tolak penawaran
					</p>
					<hr>
				</div>
			</div>
			@if ($errors->any())
			@foreach ($errors->all() as $element)
			{{-- expr --}}
			<div class="alert alert-danger">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				{{ $element }}
			</div>
			@endforeach
			@endif
			@if (session('success'))
			{{-- expr --}}
			<div class="alert alert-success">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				{{ session('success') }}
			</div>
			@endif
			@if (session('rate'))
			<div class="alert alert-success" style="height: 50px;">
				<a href="#" class="close" data-dismiss="alert" aria-label="close" style="margin-top: 3px">&times;</a>
				Rating telah berhasil diberikan. 
				<a href="{{ url('batal-rate/'.session('rate')) }}" class="btn btn-outline-secondary pull-right" style="margin-right: 10px;margin-top: -2px">Batalkan Rating</a>
			</div>
			@endif

			@if (session('error'))
			{{-- expr --}}
			<div class="alert alert-danger">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				{{ session('error') }}
			</div>
			@endif
			<br>
			<link rel="stylesheet" type="text/css" href="{{ asset('public/backend/data-table/bootstrap.css') }}">
			<div class="row" style="margin-top: -30px;">
				<div class="col-12">
					<div class="card">
						<div class="container">
							<div class="card-body">
								<div class="table-responsive m-t-40" style="margin-bottom: 15px;">
									<table cellspacing="0" class="display nowrap table table-hover table-striped table-bordered tableku" width="100%">
										<thead>
											<tr>
												<th>
													#
												</th>
												<th>
													Judul Penawaran
												</th>
												<th>
													Tanggal Mulai
												</th>
												<th>
													Tanggal Akhir
												</th>
												<th>
													Perusahaan
												</th>
												<th class="text-center">
													Aksi
												</th>
											</tr>
										</thead>
										<tbody id="isi">
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Header footer section end -->
	</div>
</div>

@foreach ($data['penawaran'] as $e)
<div class="modal fade text-xs-left" id="detail{{ $e->id_penawaran }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="{{ url('kirim-respon/'.$e->id_penawaran) }}">
				@php
				$active = "";
				$penawaran = '';
				$produk    = '';
				if ($e->status !=0) {
					$active = "disabled";
					$penawaran = penawaran::where('id_penawaran',$e->id_penawaran)->get();
					$produk    = produkPenawaran::where('id_penawaran',$e->id_penawaran)->get(); 
				}
				@endphp
				@csrf 
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">{{ $e->nama_perusahaan }}</h4>
								</div>
								<div class="card-body">
									<div class="card-block">
										<ul class="nav nav-tabs">
											<li class="nav-item">
												<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home{{ $e->id_penawaran }}" aria-controls="home" aria-expanded="true">Penawaran</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile{{ $e->id_penawaran }}" aria-controls="profile" aria-expanded="false">Rating Perusahaan</a>
											</li>
										</ul>
										<div class="tab-content px-1 pt-1">
											<div role="tabpanel" class="tab-pane active" id="home{{ $e->id_penawaran }}" aria-labelledby="home-tab" aria-expanded="true">
												<br>
												<div class="row">
													<div class="col-md-6">

														<table>
															<tr>
																<td><b>Judul Penawaran</b></td>
																<td>:</td>
																<td>{{ $e->judul }}</td>
															</tr>
															<tr>
																<td><b>Tanggal Mulai</b></td>
																<td>:</td>
																<td>{{ carbon::parse($e->tgl_mulai)->format('l, d F Y') }}</td>
															</tr>

															<tr>
																<td><b>Tanggal Akhir</b></td>
																<td>:</td>
																<td>{{ carbon::parse($e->tgl_akhir)->format('l, d F Y') }}</td>
															</tr>
														</table>
													</div>
													<div class="col-md-6">

														<table>
															<tr>
																<td><b>Lama Bayar</b></td>
																<td>:</td>
																<td>{{ $e->lama_bayar }} Bulan</td>
															</tr>

															<tr>
																<td><b>Uang Muka</b></td>
																<td>:</td>
																<td>{{ $e->uang_muka }} %</td>
															</tr>

															<tr>
																<td><b>Status PPn</b></td>
																<td>:</td>
																<td>{{ $e->ppn }} </td>
															</tr>
														</table>
													</div>
												</div>
												<br>
												<div class="table-responsive" style="margin-bottom: 15px;">
													<table cellspacing="0" class="display nowrap  table table-hover table-striped table-bordered" width="100%">
														<thead>                                             
															<tr>
																<th>#</th>
																<th>Nama Produk</th>
																<th>Spesifikasi</th>
																<th>Merk</th>
																<th>Kapasitas</th>
																<th>Harga</th>
															</tr>
														</thead>
														<tbody>
															@php
															$no = 0;$total = 0;
															@endphp
															@foreach ($data['produk'] as $r)
															@if ($e->id_penawaran == $r->id_penawaran)
															@php
															$no++;
															$total = $total + $r->harga;
															@endphp
															<tr>
																<td>{{ $no }}</td>
																<td>{{ $r->nama_produk }}</td>
																<td>{{ $r->spesifikasi }}</td>
																<td>{{ $r->merk }}</td>
																<td>{{ $r->kapasitas }}</td>
																<td>{{ 'Rp'. number_format($r->harga) }}</td>
															</tr>
															@endif
															@endforeach
														</tbody>
														<tfoot>
															<tr>
																<th colspan="5"><p class="pull-right">Total</p></th>
																<td>Rp. {{ number_format($total) }}</td>
															</tr>
														</tfoot>
													</table>
												</div>
											</div>
											<div class="tab-pane fade" id="profile{{ $e->id_penawaran }}" role="tabpanel" aria-labelledby="profile-tab" aria-expanded="false">
												<div class="col-md-12" style="height:300px; overflow-y: scroll;">
													@php
													$number = 0;
													@endphp
													@foreach ($data['rating'] as $k)
													@if ($k->id_perusahaan==$e->id_perusahaan)
													@php
													$number++;
													@endphp
													<div class="card">
														<div class="card-body">
															<div class="card-block">
																<h5>{{ $k->pesan }}</h5>
															</div>
														</div>
														<div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
															<span class="float-xs-left" data-toggle="tooltip" title="{{ carbon::parse($k->created_at)->format('l, d F Y') }}">{{ carbon::parse($k->created_at)->diffForhumans() }}</span>
															<span class="float-xs-right">
																{{ $k->fullname }} : <i class="icon-star-o"></i> {{ $k->bintang }}
															</span>
														</div>
													</div>
													@endif
													@endforeach
													@if ($number == 0)
													<center><h3>Perusahaan belum di rating</h3></center>
													@endif
												</div>
												<div class="card">
													<div class="card-body">
														
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="card-footer">
									<a class="btn btn-outline-primary" onclick="return confirm('Terima Peanawaran?')" href="{{ url('terima-penawaran/'.$e->id_penawaran) }}">Terima Penawaran</a>
									<a class="btn btn-outline-danger" onclick="return confirm('Tolak Peanawaran?')" href="{{ url('tolak-penawaran/'.$e->id_penawaran) }}">Tolak Penawaran</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn grey btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</form>

		</div>
	</div>
</div>
<div class="modal fade text-xs-left" id="rating{{ $e->id_penawaran }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel4">Rating Perusahaan</h4>
			</div>
			<form action="{{ url('give-rate/'.$e->id_penawaran) }}" method="post">
				@csrf
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<CENTER>
								<div class="form-group text-center">
									<i class="icon-star-o ha{{ $e->id_penawaran }} ke1{{ $e->id_penawaran }} bintang{{ $e->id_penawaran }}" data-toggle="tooltip" title="Bintang 1" id="ke1{{ $e->id_penawaran }}" onmouseenter="color(1,{{ $e->id_penawaran }})" onmouseleave="delcolor({{ $e->id_penawaran }})" onclick="pilih(1,{{ $e->id_penawaran }})" style="font-size: 40px;"></i>
									<i class="icon-star-o ha{{ $e->id_penawaran }} ke2{{ $e->id_penawaran }} bintang{{ $e->id_penawaran }}" data-toggle="tooltip" title="Bintang 2" id="ke2{{ $e->id_penawaran }}" onmouseenter="color(2,{{ $e->id_penawaran }})" onmouseleave="delcolor({{ $e->id_penawaran }})" onclick="pilih(2,{{ $e->id_penawaran }})" style="font-size: 40px;"></i>
									<i class="icon-star-o ha{{ $e->id_penawaran }} ke3{{ $e->id_penawaran }} bintang{{ $e->id_penawaran }}" data-toggle="tooltip" title="Bintang 3" id="ke3{{ $e->id_penawaran }}" onmouseenter="color(3,{{ $e->id_penawaran }})" onmouseleave="delcolor({{ $e->id_penawaran }})" onclick="pilih(3,{{ $e->id_penawaran }})" style="font-size: 40px;"></i>
									<i class="icon-star-o ha{{ $e->id_penawaran }} ke4{{ $e->id_penawaran }} bintang{{ $e->id_penawaran }}" data-toggle="tooltip" title="Bintang 4" id="ke4{{ $e->id_penawaran }}" onmouseenter="color(4,{{ $e->id_penawaran }})" onmouseleave="delcolor({{ $e->id_penawaran }})" onclick="pilih(4,{{ $e->id_penawaran }})" style="font-size: 40px;"></i>
									<i class="icon-star-o ha{{ $e->id_penawaran }} ke5{{ $e->id_penawaran }} bintang{{ $e->id_penawaran }}" data-toggle="tooltip" title="Bintang 5" id="ke5{{ $e->id_penawaran }}" onmouseenter="color(5,{{ $e->id_penawaran }})" onmouseleave="delcolor({{ $e->id_penawaran }})" onclick="pilih(5,{{ $e->id_penawaran }})" style="font-size: 40px;"></i>
									<input type="hidden" id="rate{{ $e->id_penawaran }}" name="rate">
								</div>
							</CENTER>
							<div class="form-group">
								<textarea class="form-control" required="" style="height: 120px;" name="komentar" placeholder="Masukan Komentar"></textarea>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-outline-primary">Beri Rating</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endforeach
<script>
	window.onload = function(){
		tampil();
	}
	function color(ke,id) {
		for (var i = 0 ; i <=ke; i++) {
			$(".ke"+i.toString()+id.toString()).addClass('kuning');
		}
	}
	function pilih(ke,id) {
		for (var i = 0 ; i <=ke; i++) {
			$(".ke"+i.toString()+id.toString()).addClass('kuning2');
		}	
		for (var j = i ; j <= 5; j++) {
			$(".ke"+j.toString()+id.toString()).removeClass('kuning2');			
		}
		$("#rate"+id).val(ke);
	}
	function delcolor(id) {
		$(".ha"+id.toString()).removeClass('kuning');
	}
	function tampil() {
		$.ajax({
			type: "GET",
			url: "{{ url('api/get-penawaran/') }}",
			success: function (data) {
				$("#isi").html(data);
				// alert(data);
			},
			error:function(){
				tampil();
			}
		}); 
	}
</script>
@endsection