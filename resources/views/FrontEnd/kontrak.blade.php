@php
    use carbon\carbon;
@endphp
@extends('FrontEnd.layout')
@section('title','Adhimix Vendor | Kontrak')
@section('content')
<div class="container" style="margin-top: 100px">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="header1" style="margin-top: -40px; margin-bottom: 20px;color: #ad1948">
                List Kontrak
                <br/>
            </h1>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <div class="box wow" style="background-color: #6ea8af14">
                        <br>
                        <table data-pagination="true" data-search="true" data-select-item-name="toolbar1" data-show-columns="true" data-show-refresh="true" data-show-toggle="true" data-sort-name="name" data-sort-order="desc" data-toggle="table" data-url="tables/data1.json">
                            <thead>
                                <tr>
                                    <th data-sortable="true">
                                        No
                                    </th>
                                    <!-- <th  data-sortable="true">ID Barang</th> -->
                                    <th data-sortable="true">
                                        Judul Kontrak
                                    </th>
                                    <!-- <th data-sortable="true">Alamat</th> -->
                                    <th data-sortable="true">
                                        Tanggal Pengiriman
                                    </th>
                                    <th data-sortable="true">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['kontrak'] as $e)
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
                                        {{carbon::parse($e->updated_at)->format('l, d F Y')}}
                                    </td>
                                    <td>
                                        <a href="{{ url('kontrak-pdf/'.$e->id_kontrak) }}" class="btn btn-outline-danger" target="__blank">Donwload PDF</a>
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
@endsection