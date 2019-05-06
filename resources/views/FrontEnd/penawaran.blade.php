@php
use carbon\carbon;
use App\produkPenawaran;
use App\Penawaran;
@endphp
@extends('FrontEnd.layout')
@section('title','Adhimix Vendor | Penawaran')
@section('content')
<div class="container" style="margin-top: 100px">
    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-block">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1" aria-expanded="true">Permintaan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2" aria-expanded="false">Penawaran</a>
                                </li>
                            </ul>
                            <div class="tab-content px-1 pt-1">
                                <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="box wow" style="background-color: #6ea8af14">
                                                <br>
                                                <h3>List Permintaan</h3>
                                                <table data-pagination="true" data-search="true" data-select-item-name="toolbar1" data-show-columns="true" data-show-refresh="true" data-show-toggle="true" data-sort-name="name" data-sort-order="desc" data-toggle="table" data-url="tables/data1.json">
                                                    <thead>
                                                        <tr>
                                                            <th data-sortable="true">
                                                                No 
                                                            </th>
                                                            <!-- <th  data-sortable="true">ID Barang</th> -->
                                                            <th data-sortable="true">
                                                                Nomor Penawaran
                                                            </th>
                                                            <!-- <th data-sortable="true">Alamat</th> -->
                                                            <th data-sortable="true">
                                                                Tanggal Mulai
                                                            </th>
                                                            <th data-sortable="true">
                                                                Tanggal Akhir
                                                            </th>
                                                            <th data-sortable="true">
                                                                Aksi
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($data['penawaran'] as $e)
                                                        @if ($e->status==0)

                                                        <tr>
                                                            <td>
                                                                {{ $loop->index + 1 }}
                                                            </td>
                                                            <!-- <td>ID001</td> -->
                                                            <td>
                                                                {{ $e->judul }}
                                                            </td>
                                                            <!-- <td>Graha Anugerah 3rd Floor Jl. Raya Ps. Minggu No. 17 A Pancoran Jakarta Selatan 12780 - Indonesia</td> -->
                                                            <td>
                                                                {{ carbon::parse($e->tgl_mulai)->format('d-m-Y') }}
                                                            </td>
                                                            <td>
                                                                {{ carbon::parse($e->tgl_akhir)->format('d-m-Y') }}
                                                            </td>
                                                            <td>
                                                                @if ($e->status!==0)
                                                                <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#detail{{ $e->id_penawaran }}">
                                                                    <span data-toggle="tooltip" title="{{ carbon::parse($e->updated_at)->format('d-m-Y') }}">Detail</span>
                                                                </button>
                                                                @else
                                                                <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#respon{{ $e->id_penawaran }}">
                                                                    Kirim Penawaran
                                                                </button>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab2" aria-labelledby="base-tab2">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="box wow" style="background-color: #6ea8af14">
                                                <br>
                                                <button class="btn btn-primary pull-right" data-target="#new" data-toggle="modal" style="margin-bottom: 10px;">
                                                    Tambah Penawaran
                                                </button>
                                                <h3>List penawaran</h3>
                                                <table data-pagination="true" data-search="true" data-select-item-name="toolbar1" data-show-columns="true" data-show-refresh="true" data-show-toggle="true" data-sort-name="name" data-sort-order="desc" data-toggle="table" data-url="tables/data1.json">
                                                    <thead>
                                                        <tr>
                                                            <th data-sortable="true">
                                                                No 
                                                            </th>
                                                            <!-- <th  data-sortable="true">ID Barang</th> -->
                                                            <th data-sortable="true">
                                                                Nomor Penawaran
                                                            </th>
                                                            <!-- <th data-sortable="true">Alamat</th> -->
                                                            <th data-sortable="true">
                                                                Tanggal Mulai
                                                            </th>
                                                            <th data-sortable="true">
                                                                Tanggal Akhir
                                                            </th>
                                                            <th data-sortable="true">
                                                                Aksi
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($data['penawaran'] as $e)
                                                        @if ($e->status!==0)

                                                        <tr>
                                                            <td>
                                                                {{ $loop->index + 1 }}
                                                            </td>
                                                            <!-- <td>ID001</td> -->
                                                            <td>
                                                                {{ $e->judul }}
                                                            </td>
                                                            <!-- <td>Graha Anugerah 3rd Floor Jl. Raya Ps. Minggu No. 17 A Pancoran Jakarta Selatan 12780 - Indonesia</td> -->
                                                            <td>
                                                                {{ carbon::parse($e->tgl_mulai)->format('d-m-Y') }}
                                                            </td>
                                                            <td>
                                                                {{ carbon::parse($e->tgl_akhir)->format('d-m-Y') }}
                                                            </td>
                                                            <td>
                                                                @if ($e->status!==0)
                                                                <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#detail{{ $e->id_penawaran }}">
                                                                    <span data-toggle="tooltip" title="{{ carbon::parse($e->updated_at)->format('d-m-Y') }}">Detail</span>
                                                                </button>
                                                                @else
                                                                <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#respon{{ $e->id_penawaran }}">
                                                                    Kirim Penawaran
                                                                </button>
                                                                @endif
                                                            </td>
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
                </div>
            </div>
            <br>
            
        </div>
    </div>
</div>
<div class="modal fade text-xs-left" id="new" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{ url('add-penawaran/') }}">
                @csrf
                <div class="modal-body">
                    <div class="container" style=""><br>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <b style="font-size: 18px">Judul Penawaran</b>
                                        <input type="text" name="judul" id="judul" required="" placeholder="Judul Penawaran" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b style="font-size: 18px">Tanggal Mulai</b>
                                        <input type="date" name="tgl_mulai" id="tgl_mulai" required="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b style="font-size: 18px">Tanggal Akhir</b>
                                        <input type="date" name="tgl_akhir" id="tgl_akhir" required="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b style="font-size: 18px">Lama bayar</b>
                                        <select class="form-control" name="lama_bayar" required="">
                                            <option value="">Pilih Lama Bayar</option>
                                            @for ($i = 1; $i <= 12 ; $i++)
                                            <option value="{{ $i }}" >{{ $i }} Bulan</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b style="font-size: 18px">Uang muka (%)</b>
                                        <input type="number" name="uang_muka" min="0" max="100" placeholder="Masukan Uang Muka" id="tgl_akhir" required="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <b style="font-size: 18px">Status PPN</b>
                                        <select class="form-control" name="ppn">
                                            <option>Include</option>
                                            <option>Exclude</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" style="overflow-x: scroll;">
                                    <button class="btn btn-primary" type="button" onclick="tambah()" style="margin-bottom: 10px;">Tambah</button>
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th width="200">Produk</th>
                                                <th>Spesifikasi</th>
                                                <th>Merk</th>
                                                <th>Kapasitas</th>
                                                <th>Harga</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <br>
                                        <tbody id="isi">
                                            <tr id="tr1">
                                                <td>
                                                    <select class="form-control" required="" name="produk1">
                                                        <option value="">Pilih Produk</option>
                                                        @foreach (DB::table('produks')->where('id_perusahaan',session('id_perusahaan'))->get() as $e)
                                                        @if ($e->id_perusahaan==session('id_perusahaan'))
                                                        {{-- expr --}}
                                                        <option value="{{ $e->id_produk }}">{{ $e->nama_produk }}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td><input type="input" required="" class="form-control" name="spesifikasi1" placeholder="Spesifikasi" ></td>
                                                <td><input type="input" required="" class="form-control" name="merk1" placeholder="Merk" ></td>
                                                <td><input type="input" required="" class="form-control" name="kapasitas1" placeholder="Kapasitas" ></td>
                                                <td><input type="number" required="" class="form-control" name="harga1" placeholder="Harga" ></td>
                                                <td><button disabled=""  class="btn btn-danger" onclick="hapus()"><i class='fa fa-trash'></i></button></td>
                                            </tr>
                                        </tbody>
                                        <input type="hidden" name="jumlah" value="1" id="jumlah">
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Kirim Respon</button>
                </div>
            </form>

        </div>
    </div>
</div>
@foreach ($data['penawaran'] as $e)
@if ($e->status==0)

<div class="modal fade text-xs-left" id="respon{{ $e->id_penawaran }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
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
                                    <h4 class="card-title">Detail Penawaran</h4>
                                </div>
                                <div class="card-body">
                                    <div class="card-block">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home{{ $e->id_penawaran }}" aria-controls="home" aria-expanded="true">Penawaran</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile{{ $e->id_penawaran }}" aria-controls="profile" aria-expanded="false">Pesan Adhimix</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content px-1 pt-1">
                                            <div role="tabpanel" class="tab-pane active" id="home{{ $e->id_penawaran }}" aria-labelledby="home-tab" aria-expanded="true">
                                                <br>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label>Status PPN</label>
                                                            <select name="ppn" class="form-control">
                                                                <option>Include</option>
                                                                <option>Exclude</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Lama Bayar</label>
                                                            <select class="form-control" {{ $active }} name="lama_bayar" required="">
                                                                <option value="">Pilih Lama Bayar</option>
                                                                @for ($i = 1; $i <= 12 ; $i++)
                                                                <option value="{{ $i }}" >{{ $i }} Bulan</option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Uang Muka (%)</label>
                                                            <input type="number" min="0" max="100" {{ $active }} required="" class="form-control" placeholder="Masukan Uang Muka" name="uang_muka">
                                                        </div>
                                                    </div>
                                                </div>
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
                                                            $no = 0;
                                                            @endphp
                                                            @foreach ($data['produk'] as $r)
                                                            @if ($e->id_penawaran == $r->id_penawaran)
                                                            @php
                                                            $no++;
                                                            @endphp
                                                            <tr>
                                                                <td>{{ $no }}</td>
                                                                <td>{{ $r->nama_produk }}</td>
                                                                <td>{{ $r->spesifikasi }}</td>
                                                                <td>{{ $r->merk }}</td>
                                                                <td>{{ $r->kapasitas }}</td>
                                                                <td><input type="number" class="form-control" {{ $active }} placeholder="Masukan Harga" name="harga{{ $r->id_produk_penawaran }}"></td>
                                                            </tr>
                                                            @endif
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="profile{{ $e->id_penawaran }}" role="tabpanel" aria-labelledby="profile-tab" aria-expanded="false">
                                                <div class="card">
                                                    <div class="card-body">
                                                        @php
                                                        echo nl2br(str_replace('[nama_perusahaan]','<b>'.$e->nama_perusahaan.'</b>',$e->pesan));
                                                        @endphp
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Kirim Respon</button>
                </div>
            </form>

        </div>
    </div>
</div>
@else
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
                                    <h4 class="card-title">Detail Penawaran</h4>
                                </div>
                                <div class="card-body">
                                    <div class="card-block">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab{{ $e->id_penawaran }}" data-toggle="tab" href="#detailhome{{ $e->id_penawaran }}" aria-controls="home" aria-expanded="true">Penawaran</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab{{ $e->id_penawaran }}" data-toggle="tab" href="#detailprofile{{ $e->id_penawaran }}" aria-controls="profile" aria-expanded="false">Pesan Adhimix</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content px-1 pt-1">
                                            <div role="tabpanel" class="tab-pane active" id="detailhome{{ $e->id_penawaran }}" aria-labelledby="home-tab" aria-expanded="true">
                                                <br>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Lama Bayar</label>
                                                            <select class="form-control" {{ $active }} name="lama_bayar" required="">
                                                                <option value="">Pilih Lama Bayar</option>
                                                                @for ($i = 1; $i <= 12 ; $i++)
                                                                <option value="{{ $i }}" @if ($e->lama_bayar==$i)
                                                                    selected="" 
                                                                    @endif>{{ $i }} Bulan</option>
                                                                    @endfor
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label>Uang Muka (%)</label>
                                                                <input type="number" min="0" max="100" value="{{ $e->uang_muka }}" {{ $active }} required="" class="form-control" placeholder="Masukan Uang Muka" name="uang_muka">
                                                            </div>
                                                        </div>
                                                    </div>
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
                                                                $no = 0;
                                                                @endphp
                                                                @foreach ($data['produk'] as $r)
                                                                @if ($e->id_penawaran == $r->id_penawaran)
                                                                @php
                                                                $no++;
                                                                @endphp
                                                                <tr>
                                                                    <td>{{ $no }}</td>
                                                                    <td>{{ $r->nama_produk }}</td>
                                                                    <td>{{ $r->spesifikasi }}</td>
                                                                    <td>{{ $r->merk }}</td>
                                                                    <td>{{ $r->kapasitas }}</td>
                                                                    <td><input type="number" class="form-control" {{ $active }} placeholder="Masukan Harga" value="{{ $r->harga }}" name="harga{{ $r->id_produk_penawaran }}"></td>
                                                                </tr>
                                                                @endif
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="detailprofile{{ $e->id_penawaran }}" role="tabpanel" aria-labelledby="profile-tab" aria-expanded="false">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            @php
                                                            echo nl2br(str_replace('[nama_perusahaan]','<b>'.$e->nama_perusahaan.'</b>',$e->pesan));
                                                            @endphp
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
    @endif
    @endforeach
    @endsection
    <script>
        function tambah() {
            var i = parseInt($("#jumlah").val()) + 1;
            $.ajax({
                type: "GET",
                url: "{{ url('api/get-row/') }}/"+i+'/'+{{ session('id_perusahaan') }},
                success: function (data) {
                    $("#isi").append(data);
                }
            });
            $("#jumlah").val(i);
        }

        function hapus(id) {
            $("#tr"+id).remove();
        }
    </script>