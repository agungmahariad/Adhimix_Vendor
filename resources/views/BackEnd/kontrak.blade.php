@php
	use carbon\carbon;
@endphp
@extends('BackEnd.layout')
@section('title','Adhimix Vendor | Kontrak')
@section('content')

<div class="content-wrapper">
	<div class="content-header row">
		<div class="content-header-left col-md-6 col-xs-12 mb-1">
			<h2 class="content-header-title">
				Data Kontrak
			</h2>
		</div>
	</div>
	<div class="content-body">
		<!-- Basic example section start -->
		<section id="basic-examples">
			<div class="row">
				<div class="col-xs-12 mt-1 mb-3">
					<h4 class="">
						Kontrak
					</h4>
					<p>
						Admin dapat mengirim kontrak di sini.
					</p>
					<hr>
				</div>
			</div>
			<link rel="stylesheet" type="text/css" href="{{ asset('public/backend/data-table/bootstrap.css') }}">
			<div class="row" style="margin-top: -30px;">
				<div class="col-12">
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
													Nama Perusahaan
												</th>
												<th >
													Status
												</th>
												<th class="text-center">
													Aksi
												</th>
											</tr>
										</thead>
										<tbody id="isi">
											@foreach ($data['kontrak'] as $e)
											<tr>
												<td>{{ $loop->index + 1 }}</td>
												<td>{{ $e->judul }}</td>
												<td>{{ $e->nama_perusahaan }}</td>
												<td>
													@if ($e->status==0)
													<span>Kontrak Belum Dikirim</span>
													@else
													<span>Kontrak telah dikirim</span>
													@endif
												</td>
												<td>
													@if ($e->status==0)
													<a class="btn btn-outline-primary btn-block" data-toggle="modal" data-target="#kirim{{ $e->id_kontrak }}">Kirim Kontrak</a>
													@else
													<span>{{carbon::parse($e->updated_at)->format('l, d F Y')}}</span>
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
		</section>
	</div>
</div>
@foreach ($data['kontrak'] as $r)
<div class="modal fade text-xs-left" id="kirim{{ $r->id_kontrak }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel4">Kirim Kontrak</h4>
			</div>
			<form enctype="multipart/form-data" action="{{ url('send-kontrak/'.$r->id_penawaran) }}" method="post" onsubmit="return confirm('Apa data sudah benar?')">
				@csrf
				<div class="modal-body">
					<div class="form-group">
						<label>Masukan PDF</label>
						<input type="file" class="dropify" required="" name="pdf">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-outline-primary">Kirim Kontrak</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endforeach
@endsection()