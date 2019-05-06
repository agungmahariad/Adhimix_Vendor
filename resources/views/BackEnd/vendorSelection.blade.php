@php
use carbon\carbon;
@endphp
@extends('BackEnd.layout')
@section('title','Adhimix Vendor | Vendor Selection')
@section('content')
<div class="content-wrapper">
	<div class="content-header row">
		<div class="content-header-left col-md-6 col-xs-12 mb-1">
			<h2 class="content-header-title">
				Vendor Selection
			</h2>
		</div>
	</div>
	<div class="content-body">
		<!-- Basic example section start -->
		<section id="basic-examples">
			<div class="row">
				<div class="col-xs-12 mt-1 mb-3">
					<button class="btn btn-primary" data-toggle="collapse" data-target="#tambah" style="float: right;margin-right: 30px;"><i data-toggle="tooltip" class="fa fa-plus" title="Tambah Permintaan"></i></button>
					<h4 class="">
						Vendor Selection
					</h4>
					<p>
						Admin dapat menambahkan permintaan penawaran disini.
					</p>
					<hr>
				</hr>
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
		@if (session('error'))
		{{-- expr --}}
		<div class="alert alert-danger">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			{{ session('error') }}
		</div>
		@endif
		<div class="row">
			<div class="col-12">
				<div class="collapse" id="tambah">
					<div class="card">
						<div class="card-header" style="margin-bottom: -10px;background-color: #f2f4f8">
							<h3>Permintaan Penawaran</h3>
						</div>
						<div class="card-body" style="padding-bottom: 20px;overflow-x: scroll;">
							<div class="container" style=""><br>
								<div class="row">
									<div class="col-xs-12">
										<div class="form-group">
											<b style="font-size: 18px">No Permintaan</b>
											<input type="text" name="judul" id="judul" required="" placeholder="No Permintaan" class="form-control">
										</div>
									</div>
									<div class="col-xs-6">
										<div class="form-group">
											<b style="font-size: 18px">Tanggal Mulai</b>
											<input type="date" name="tgl_mulai" id="tgl_mulai" required="" class="form-control">
										</div>
									</div>
									<div class="col-xs-6">
										<div class="form-group">
											<b style="font-size: 18px">Tanggal Akhir</b>
											<input type="date" name="tgl_akhir" id="tgl_akhir" required="" class="form-control">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-6">	
										<table cellspacing="10">
											<tr>
												<td>
													<div class="form-group">
														<b style="font-size: 18px">Cari Produk</b>
														<select class="select2 form-control" id="nama_produk" required="" onchange="cariVendor()" style="width: 100%" name="nama_produk" >
															<option value="">Cari Produk</option>
															@php
															$produk = DB::table('produks')->groupBy('nama_produk')->get();
															@endphp
															@foreach ($produk as $p)
															<option value="{{ $p->nama_produk }}">{{ $p->nama_produk }}</option>
															@endforeach
														</select>
													</div>
												</td>
												<td>
													<div class="form-group">
														<b style="font-size: 18px">Spesifikasi</b>
														<input type="text" class="form-control" required="" placeholder="Spesifikasi" id="spesifikasi">
													</div>
												</td>
											</tr>
											<tr>

												<td>
													<div class="form-group">
														<b style="font-size: 18px">Merk</b>
														<input type="text" class="form-control" required="" placeholder="Merk" id="merk">
													</div>
												</td>
												<td>
													<div class="form-group">
														<b style="font-size: 18px">Kapasitas</b>
														<input type="text" class="form-control" required="" placeholder="Kapasitas"  id="kapasitas">
													</div>
												</td>
											</tr>
										</table>
									</div>
									<div class="col-xs-6">
										<div class="form-group">
											<b style="font-size: 18px">Tambah Pesan</b>
											<textarea class="form-control" id="pesan"  placeholder="Ketik [nama_perusahaan] untuk Nama Perusahaan" style="height: 130px; resize: none;"></textarea>
										</div>
									</div>
								</div>
								<div class="row" >
									<div class="col-xs-12" >
										<table cellspacing="0" style="overflow-x: scroll;" class="display nowrap table table-hover table-striped table-bordered" id="example22" width="100%">
											<thead>
												<tr>
													<th>#</th>
													<th>Nama Perusahaan</th>
													<th>Alamat</th>
													<th>Aksi</th>
												</tr>
											</thead>
											<tbody id="isivendor">
												@foreach ($data['perusahaan'] as $e)
												<tr>
													<td>{{ $loop->index + 1 }}</td>
													<td>{{ $e->nama_perusahaan }}</td>
													<td>{{ $e->alamat }}</td>
													<td><button onclick='kirim({{ $e->id_perusahaan }})' class='btn btn-primary'><i class='icon-send'></i> Kirim Permintaan</button></td>													
												</tr>
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br>
		<link rel="stylesheet" type="text/css" href="{{ asset('public/backend/data-table/bootstrap.css') }}">
		<div class="row" style="margin-top: -30px;">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3>List Permintaan</h3>
					</div>
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
												No Permintaan
											</th>
											<th>
												Vendor
											</th>
											<th>
												Produk
											</th>
											<th>
												Spek
											</th>
											<th>
												Merk
											</th>
											<th>
												Harga 
											</th>
											<th class="text-center">
												Status
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

<script>
	window.onload = function(){
		tampil();
		$("#isivendor").html('');
	}    

	function batal(id) {
		swal({
			title: "Batalkan permintaan?",
			text: "Klik 'yes' untuk konfirmasi!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {
				window.location.href="{{ url('batal-kirim/') }}/"+id;
			}
		});
	}
	function cariVendor() {
		if ($("#nama_produk").val()!=='') {

			$.ajax({
				type: "GET",
				url: "{{ url('api/get-vendor/') }}/"+$("#nama_produk").val(),
				success: function (data) {
					if (data!==null) {
						$("#isivendor").html(data);
					}else{
						$("#isivendor").html('');
					}
				}
			}); 
		}else{
			$("#isivendor").html('');
		}
	}

	function tampil() {
		$.ajax({
			type: "GET",
			url: "{{ url('api/get-permintaan/') }}",
			success: function (data) {
				$("#isi").html(data);
				// alert(data);
			}
		}); 
	}

	function kirim(id_perusahaan) {
		if ($("#nama_produk").val() !== '' && $("#merk").val() !== '' && $("#kapasitas").val() !== '' && $("#spesifikasi").val() !== ''  && $("#tgl_mulai").val() !== ''&& $("#tgl_akhir").val() !== ''&& $("#judul").val() !== '') {	
			var post_data = {
				'tgl_mulai': $("#tgl_mulai").val(),
				'tgl_akhir': $("#tgl_akhir").val(),
				'judul': $("#judul").val(),
				'spesifikasi': $("#spesifikasi").val(),
				'nama_produk': $("#nama_produk").val(),
				'kapasitas': $("#kapasitas").val(),
				'merk': $("#merk").val(),
				'pesan': $("#pesan").val(),
			};
			$.ajax({
				type: "POST",
				url: "{{ url('api/send-permintaan/') }}/"+id_perusahaan,
				data: post_data,
				success: function (data) {
					if(data!=='ga ada'){
						alert('Permintaan telah dikirim sebelumnya');
					}else{
						alert('berhasil dikirim');
						tampil();
					}
				}
			});
		}else{
			alert('isi semua data!');
		}
	}

</script>
@endsection