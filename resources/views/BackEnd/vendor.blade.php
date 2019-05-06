@extends('BackEnd.layout')
@section('title','Adhimix Vendor | Data vendor')
@section('content')
<div class="content-wrapper">
	<div class="content-header row">
		<div class="content-header-left col-md-6 col-xs-12 mb-1">
			<h2 class="content-header-title">Data Vendor</h2>
		</div>
	</div>
	<div class="content-body"><!-- Basic example section start -->
		<section id="basic-examples">
			<div class="row">
				<div class="col-xs-12 mt-1 mb-3">
					<h4>Data vendor</h4>
					<p>Semua Vendor yang telah mendaftar akan terlihat di bagian ini. Disini admin dapat melihat data vendor serta produk apa saya yang mereka jual.</p>
					<hr>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
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
				</div>
			</div>
			<div class="row match-height">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<div class="card-block">
								<div class="table-responsive m-t-40" style="margin-bottom: 15px;">
									<table cellspacing="0" class="display nowrap table table-hover table-striped table-bordered tableku" width="100%">
										<thead>
											<tr>
												<th>
													#
												</th>
												<th>
													Nama Perusahaan
												</th>
												<th>
													Alamat
												</th>
												<th>
													Kota
												</th>
												<th>
													
												</th>
												<th class="text-center">
													Aksi
												</th>
											</tr>
										</thead>
										<tbody id="isi">
											@foreach ($data['vendor'] as $e)
											<td>{{ $loop->index + 1 }}</td>
											<td>{{ $e->nama_perusahaan }}</td>
											<td>{{ $e->alamat }}</td>
											<td>{{ $e->provinsi }}</td>
											<td>{{ $e->kota }}</td>
											<td>
												@if ($e->verified==0)
												<a onclick="return confirm('Verifikasi perusahaan?')" href="{{ url('verifikasi-vendor/'.$e->id_perusahaan) }}" class="btn btn-outline-success btn-block" style="bottom: 0px;position: relative;">Verifikasi</a>
												<a onclick="return confirm('Tolak perusahaan?')" href="{{ url('tolak-vendor/'.$e->id_perusahaan) }}" class="btn btn-outline-danger btn-block" style="bottom: 0px;position: relative;">Tolak</a>
												@else
												<button data-toggle="modal" data-target="#produk{{ $e->id_perusahaan }}" class="btn btn-outline-deep-orange btn-block" style="bottom: 0px;position: relative;">Lihat Produk</button>
												<button data-toggle="modal" data-target="#produk{{ $e->id_perusahaan }}" class="btn btn-outline-deep-orange btn-block" style="bottom: 0px;position: relative;">Data Vendor</button>
												@endif
											</td>
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
		<div class="row ">
			<div class="col-sm-12">
				{{ $data['vendor']->links() }}
			</div>
		</div>
	</section>
</div>
</div>
@foreach ($data['vendor'] as $e)
<div class="modal fade text-xs-left" id="produk{{ $e->id_perusahaan }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel1">{{ $e->nama_perusahaan }}</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12">
						<div class="table-responsive m-t-40" style="margin-bottom: 15px;">
							<table cellspacing="0" class="display nowrap tableku table table-hover table-striped table-bordered" width="100%">
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
									$no = 0;
									@endphp
									@foreach ($data['produk'] as $r)
									@if ($e->id_perusahaan == $r->id_perusahaan)
									@php
									$no++;
									@endphp
									<tr>
										<td>{{ $no }}</td>
										<td>{{ $r->nama_produk }}</td>
										<td>{{ $r->spesifikasi }}</td>
										<td>{{ $r->merk }}</td>
										<td>{{ $r->kapasitas }}</td>
										<td>{{'Rp.'.number_format($r->harga) }}</td>
									</tr>
									@endif
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
@endforeach
@endsection