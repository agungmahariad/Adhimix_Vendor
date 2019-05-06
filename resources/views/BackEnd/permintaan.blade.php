@php
use carbon\carbon;
@endphp
@extends('BackEnd.layout')
@section('title','Adhimix Vendor | Permintaan Penawaran')
@section('content')
<div class="content-wrapper">
	<div class="content-header row">
		<div class="content-header-left col-md-6 col-xs-12 mb-1">
			<h2 class="content-header-title">
				Permintaan penawaran
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
						Permintaan penawaran
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
							<form action="{{ url('kirim-permintaan') }}" method="post">
								@csrf()
								<div class="container" style=""><br>
									<div class="row">
										<div class="col-xs-12">
											<div class="form-group">
												<b style="font-size: 18px">Judul Penawaran</b>
												<input type="text" name="judul" id="judul" required="" placeholder="Judul Penawaran" class="form-control">
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
											<div class="form-group">
												<b style="font-size: 18px">Pilih Vendor</b>
												<select class="select2 form-control" onchange="cariproduk()" id="id_perusahaan" required="" style="width: 100%" name="id_perusahaan" >
													<option value="">Cari Vendor</option>
													@php
													$produk = DB::table('perusahaans')->get();
													@endphp
													@foreach ($produk as $p)
													<option value="{{ $p->id_perusahaan }}">{{ $p->nama_perusahaan }}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="col-xs-6">
											<div class="form-group">
												<b style="font-size: 18px">Tambah Pesan </b>
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
														<th>Vendor</th>
														<th>Nama Produk</th>
														<th>Spesifikasi</th>
														<th>Merk</th>
														<th>Kapasitas</th>
														<th>Kapasitas</th>
														<th>Pilih </th>
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
											<button class="btn btn-outline-primary pull-right" id="btnkirim">Kirim Permintaan</button>
										</div>
									</div>
								</form>
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
						<h3 class="card-title">List Permintaan</h3>
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

<script>
	window.onload = function(){
		tampil();
		$("#isivendor").html('');
		$("#btnkirim").addClass('hide');
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
	function cariproduk() {
		if ($("#id_perusahaan").val()!=='') {

			$.ajax({
				type: "GET",
				url: "{{ url('api/cari-produk-permintaan/') }}/"+$("#id_perusahaan").val(),
				success: function (data) {
					if (data!==null) {
						$("#isivendor").html(data);
						$("#btnkirim").removeClass('hide');
					}else{
						$("#isivendor").html('');
						$("#btnkirim").addClass('hide');

					}
				}
			}); 
		}else{
			$("#isivendor").html('');
			$("#btnkirim").addClass('hide');
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