@extends('FrontEnd.layout')
@section('title','Adhimix Vendor | Pengiriman')
@section('content')
<main id="main">
  <div class="container" style="margin-top: 100px">
   <div class="row">
    <div class="col-lg-12">
      <h1 class="header1" style="margin-top: -40px; margin-bottom: 20px;color: #ad1948">Pengiriman<br></h1>
      <br> 
      <div class="row">
        <div class="col-lg-12">
          <div class="box wow" style="background-color: #6ea8af14">
            <button class="btn btn-primary" data-toggle="modal" data-target="#new" style="margin-bottom: 10px;">Tambah Pengiriman</button>
            <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
              <thead>
                <tr>
                  <th  data-sortable="true">No</th>
                  <th  data-sortable="true">PO</th>                
                  <th data-sortable="true">Tgl PO</th>
                  <th data-sortable="true">Vol PO</th>
                  <th data-sortable="true">Realisasi</th>
                  <th data-sortable="true">Sisa PO</th>
                  <th data-sortable="true">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data['pengiriman'] as $e)
                @php
                  $total = 0;
                  $kirim  = 0;
                @endphp
                @foreach ($data['do'] as $row)
                @if ($row->id_pengiriman==$e->id_pengiriman)
                  @php
                    $total = $total + $row->kirim;
                    $kirim = $kirim + $row->terima;
                  @endphp
                @endif
                @endforeach
                <tr>
                  <td>{{ $loop->index + 1 }}</td>             
                  <td>{{ "10101010" }}</td>
                  <td>{{ $e->tgl_faktur }}</td>
                  <td>{{ $total }}</td>
                  <td>{{ $kirim }}</td>
                  <td>{{ $total - $kirim }}</td>
                  <td>
                    <button class="btn btn-success" data-toggle="modal" data-target="#d{{ $e->id_pengiriman }}">Detail</button>
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
</main>
@foreach ($data['pengiriman'] as $e)
<div class="modal fade" id="d{{ $e->id_pengiriman }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg"  role="document">
    <div class="modal-content" style="width: 1000px;margin-left: -100px;">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Tambah pengiriman</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -30px;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ url('add-pengiriman') }}">
        @csrf
        <div class="row">
          <div class=" col-lg-12">
            <div class="row">
              <div class=" col-md-12 col-lg-12"> 
                <div class="form-group">
                  <label>No Invoice</label>
                  <input type="text" name="no_invoice" value="{{ $e->no_invoice }}" class="form-control" readonly="">
                </div>
              </div>
            </div>
            <div class="row">
              <div class=" col-md-6 col-lg-6"> 
                <div class="form-group">
                  <label>No Faktur</label>
                  <input type="text" name="no_faktur" value="{{ $e->no_faktur }}"  class="form-control" readonly="">
                </div>
              </div>
              <div class=" col-md-6 col-lg-6"> 
                <div class="form-group">
                  <label>Tanggal</label>
                  <input type="date" name="tgl_faktur" value="{{ $e->tgl_faktur }}" class="form-control" readonly="">
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label>Total</label>
                  <input type="text" name="total" value="{{ $e->total }}" class="form-control" readonly="">
                </div>
              </div>
              <div class="col-md-12" style="overflow-x: scroll;">
                <br>
                <table class="table table-striped table-bordered table-hover" style="width: 1000px;">
                  <thead>
                    <tr>
                      <th>PO</th>
                      <th>DO</th>
                      <th>Tgl</th>
                      <th>Jam</th>
                      <th>No Pol</th>
                      <th>Driver</th>
                      <th>Produk</th>
                      <th>Volume Kirim</th>
                      <th>Volume Terima</th>
                      {{-- <th>Aksi</th> --}}
                    </tr>
                  </thead>
                  <br>
                  <tbody>
                    @foreach ($data['do'] as $r)
                    @if ($r->id_pengiriman==$e->id_pengiriman)
                    <tr>
                      <td><input type="input" class="form-control" readonly="" value="{{ $r->po }}" placeholder="013455" name="po1"></td>
                      <td><input type="input" class="form-control" readonly="" value="{{ $r->do }}" placeholder="2345" name="do1"></td>
                      <td><input type="input" class="form-control" readonly="" value="{{ $r->tgl }}" placeholder="17-11-18" name="tgl1"></td>
                      <td><input type="input" class="form-control" readonly="" value="{{ $r->jam }}" placeholder="18.30" name="jam1"></td>
                      <td><input type="input" class="form-control" readonly="" value="{{ $r->no_pol }}" placeholder="B 3200 GEC" name="no_pol1"></td>
                      <td><input type="input" class="form-control" readonly="" value="{{ $r->driver }}" placeholder="Parjo" name="driver1"></td>
                      <td><input type="input" class="form-control" readonly="" value="{{ $r->produk }}" placeholder="Semen" name="produk1"></td>
                      <td><input type="input" class="form-control" readonly="" value="{{ $r->kirim }}" placeholder="100 kg" name="kirim1"></td>
                      <td><input type="input" class="form-control" readonly="" value="{{ $r->terima }}" placeholder="30 kg" name="terima1"></td>
                      {{-- <td><button class="btn btn-danger" data-toggle="tooltip" title="Hapus"disabled><i class="fa fa-trash"></i></button></td> --}}
                    </tr>
                    @endif
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach
<div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg"  role="document">
    <div class="modal-content" style="width: 1000px;margin-left: -100px;">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Tambah pengiriman</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -30px;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ url('add-pengiriman') }}">
        @csrf
        <div class="row">
          <div class=" col-lg-12">
            <div class="row">
              <div class=" col-md-12 col-lg-12"> 
                <div class="form-group">
                  <label>No Invoice</label>
                  <input type="text" name="no_invoice"  class="form-control">
                </div>
              </div>
            </div>
            <div class="row">
              <div class=" col-md-6 col-lg-6"> 
                <div class="form-group">
                  <label>No Faktur</label>
                  <input type="text" name="no_faktur"  class="form-control">
                </div>
              </div>
              <div class=" col-md-6 col-lg-6"> 
                <div class="form-group">
                  <label>Tanggal</label>
                  <input type="date" name="tgl_faktur" class="form-control">
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label>Total</label>
                  <input type="text" name="total" class="form-control">
                </div>
              </div>
              <div class="col-md-12" style="overflow-x: scroll;">
                <button class="btn btn-primary" onclick="tambah()" type="button">Tambah</button>
                <br>
                <table class="table table-striped table-bordered table-hover" style="width: 1000px;">
                  <thead>
                    <tr>
                      <th>PO</th>
                      <th>DO</th>
                      <th>Tgl</th>
                      <th>Jam</th>
                      <th>No Pol</th>
                      <th>Driver</th>
                      <th>Produk</th>
                      <th>Volume Kirim</th>
                      <th>Volume Terima</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <br>
                  <tbody id="isi">
                    <tr id="row1">
                      <td><input type="input" class="form-control" placeholder="013455" name="po1"></td>
                      <td><input type="input" class="form-control" placeholder="2345" name="do1"></td>
                      <td><input type="input" class="form-control" placeholder="17-11-18" name="tgl1"></td>
                      <td><input type="input" class="form-control" placeholder="18.30" name="jam1"></td>
                      <td><input type="input" class="form-control" placeholder="B 3200 GEC" name="no_pol1"></td>
                      <td><input type="input" class="form-control" placeholder="Parjo" name="driver1"></td>
                      <td><input type="input" class="form-control" placeholder="Semen" name="produk1"></td>
                      <td><input type="input" class="form-control" placeholder="100 kg" name="kirim1"></td>
                      <td><input type="input" class="form-control" placeholder="30 kg" name="terima1"></td>
                      <td><button class="btn btn-danger" data-toggle="tooltip" title="Hapus"disabled><i class="fa fa-trash"></i></button></td>
                    </tr>
                  </tbody>
                </table>
                <input type="hidden" value="1" id="jumlah" name="">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button class="btn btn-secondary" type="submit">Tambah</button>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
<script>
  function tambah() {
    var i = parseInt($("#jumlah").val()) + 1;
    $.ajax({
      type: "GET",
      url: "{{ url('api/get-row-kirim/') }}/"+i,
      success: function (data) {
        $("#isi").append(data);
      }
    });
    $("#jumlah").val(i);
  }

  function hapus(id) {
    $("#row"+id).remove();
  }
</script>
@endsection