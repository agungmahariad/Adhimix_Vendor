@extends('FrontEnd.layout')
@section('title','Adhimix Vendor | Registrasi Produk')
@section('content')
<div class="container" style="margin-top: 100px">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="header1" style="margin-top: -40px; margin-bottom: 20px;color: #ad1948">
                List Produk
                <br/>
            </h1>
            <br>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="box wow" style="background-color: #6ea8af14">
                            <br>
                                <button class="btn btn-primary" data-target="#new" data-toggle="modal" style="margin-bottom: 10px;">
                                    Tambah Produk
                                </button>
                                <table data-pagination="true" data-search="true" data-select-item-name="toolbar1" data-show-columns="true" data-show-refresh="true" data-show-toggle="true" data-sort-name="name" data-sort-order="desc" data-toggle="table" data-url="tables/data1.json">
                                    <thead>
                                        <tr>
                                            <th data-sortable="true">
                                                No
                                            </th>
                                            <!-- <th  data-sortable="true">ID Barang</th> -->
                                            <th data-sortable="true">
                                                Nama Produk
                                            </th>
                                            <!-- <th data-sortable="true">Alamat</th> -->
                                            <th data-sortable="true">
                                                Spesifikasi
                                            </th>
                                            <th data-sortable="true">
                                                Merk
                                            </th>
                                            <th data-sortable="true">
                                                Kapasitas
                                            </th>
                                            <th data-sortable="true">
                                                Harga(pcs)
                                            </th>
                                            <th data-sortable="true">
                                                Pengaturan Produk
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data['produk'] as $e)
                                        <tr>
                                            <td>
                                                {{ $loop->index + 1 }}
                                            </td>
                                            <!-- <td>ID001</td> -->
                                            <td>
                                                {{ $e->nama_produk }}
                                            </td>
                                            <!-- <td>Graha Anugerah 3rd Floor Jl. Raya Ps. Minggu No. 17 A Pancoran Jakarta Selatan 12780 - Indonesia</td> -->
                                            <td>
                                                {{ $e->spesifikasi }}
                                            </td>
                                            <td>
                                                {{ $e->merk }}
                                            </td>
                                            <td>
                                                {{ $e->kapasitas }}
                                            </td>
                                            <td>
                                                {{ 'Rp.'.number_format($e->harga) }}
                                            </td>
                                            <td>
                                                <button class="btn btn-danger" onclick="confdel({{ $e->id_produk }})">
                                                    Hapus
                                                </button>
                                                <button class="btn btn-success" data-target="#update{{ $e->id_produk }}" data-toggle="modal">
                                                    Update
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </br>
                        </div>
                    </div>
                </div>
            </br>
        </div>
    </div>
</div>
@foreach ($data['produk'] as $e)
<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="update{{ $e->id_produk }}" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">
                    Update Item
                </h3>
                <button aria-label="Close" class="close" data-dismiss="modal" style="margin-top: -30px;" type="button">
                    <span aria-hidden="true">
                        ×
                    </span>
                </button>
            </div>
            <form action="{{ url('update-produk/'.$e->id_produk) }}" method="post">
                @csrf @method('patch')
                <div class="modal-body">
                    <div class="row">
                        <div class=" col-lg-12">
                            <div class="row">
                                <div class=" col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label>
                                            Nama Produk
                                        </label>
                                        <input autocomplete='off' class="form-control" name="nama_produk" placeholder="Nama Produk" required="" type="text" value="{{ $e->nama_produk }}">
                                        </input>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class=" col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>
                                            Spesifikasi
                                        </label>
                                        <input autocomplete='off' class="form-control" name="spesifikasi" placeholder="Spesifikasi" required="" type="text" value="{{ $e->spesifikasi }}">
                                        </input>
                                    </div>
                                </div>
                                <div class=" col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>
                                            Merk
                                        </label>
                                        <input autocomplete='off' class="form-control" name="merk" placeholder="Merk" required="" type="text" value="{{ $e->merk }}">
                                        </input>
                                    </div>
                                </div>
                                <div class=" col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>
                                            Kapasitas
                                        </label>
                                        <input autocomplete='off' class="form-control" name="kapasitas" placeholder="Kapasitas" required="" type="text" value="{{ $e->kapasitas }}">
                                        </input>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>
                                            Harga
                                        </label>
                                        <input autocomplete='off' class="form-control" name="harga" placeholder="Rp." required="" type="text" value="{{ $e->harga }}">
                                        </input>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" type="button">
                        Close
                    </button>
                    <button class="btn btn-primary" data-dismiss="update" type="submit">
                        Save & change
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="new" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">
                    Add new Item
                </h3>
                <button aria-label="Close" class="close" data-dismiss="modal" style="margin-top: -30px;" type="button">
                    <span aria-hidden="true">
                        ×
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('add-produk') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class=" col-lg-12">
                            <div class="row">
                                <div class=" col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label>
                                            Nama Produk
                                        </label>
                                        <input autocomplete='off' class="form-control" name="nama_produk" id="nama_produk" onkeyup="cariProduk({{ session('id_perusahaan') }})" placeholder="Nama Produk" required="" type="text" value="">
                                        </input>
                                        <small id="msgProduk" class="hide" style="color: red">Produk telah terdaftar</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class=" col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>
                                            Spesifikasi
                                        </label>
                                        <input autocomplete='off' class="form-control" name="spesifikasi" placeholder="Spesifikasi" required="" type="text" value="">
                                        </input>
                                    </div>
                                </div>
                                <div class=" col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>
                                            Merk 
                                        </label>
                                        <input autocomplete='off' class="form-control" name="merk" placeholder="Merk" required="" type="text" value="">
                                        </input>
                                    </div>
                                </div>
                                <div class=" col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>
                                            Kapasitas
                                        </label>
                                        <input autocomplete='off' class="form-control" name="kapasitas" placeholder="Kapasitas" required="" type="text" value="">
                                        </input>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>
                                            Harga
                                        </label>
                                        <input autocomplete='off' class="form-control" name="harga" placeholder="Rp." required="" type="number" value="">
                                        </input>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-dismiss="modal" type="button">
                                    Batal
                                </button>
                                <button id="tambah" class="btn btn-primary" data-dismiss="update" type="submit">
                                	Tambah Produk
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function confdel(id) {
		swal({
			title: "Hapus Produk?",
			text: "Klik 'yes' untuk konfirmasi penghapusan!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {
				swal("Produk berhasil dihapus!", {
					icon: "success",
				});
				window.location.href="{{ url('del-produk/') }}/"+id;
			}
		});
	}

function cariProduk(id_perusahaan) {
  if ($("#nama_produk").val()!=='') {

    $.ajax({
      type: "GET",
      url: "{{ url('api/get-produk/') }}/"+$("#nama_produk").val()+'/'+id_perusahaan,
      success: function (data) {
        if (data=='ada') {
          $("#tambah").prop('disabled',true);
          $("#msgProduk").removeClass('hide');
        }else{
          $("#tambah").prop('disabled',false);
          $("#msgProduk").addClass('hide');
        }
      }
    }); 
  }else{
    $("#tambah").prop('disabled',false);
    $("#msgProduk").addClass('hide');
  }
}

function cariProduk2(id_perusahaan,id_produk) {
  if ($("#nama_produk_edit").val()!==$("namaProduk"+id_produk.toString()).val()) {
    $.ajax({
      type: "GET",
      url: "{{ url('api/get-produk/') }}/"+$("#nama_produk").val()+'/'+id_perusahaan,
      success: function (data) {
        if (data=='ada') {
          $("#tambah").prop('disabled',true);
          $("#msgProduk").removeClass('hide');
        }else{
          $("#tambah").prop('disabled',false);
          $("#msgProduk").addClass('hide');
        }
      }
    }); 
  }
}
</script>
@endsection
