<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('get-perusahaan/{cek}','FrontEnd@cekPerusahaan');
Route::get('get-email/{cek}','FrontEnd@cekEmail');
Route::get('get-username/{cek}','FrontEnd@cekUsername');
Route::get('get-produk/{cek}/{id_perusahaan}','FrontEnd@cekproduk');
Route::get('get-vendor/{cek}','BackEnd@cariVendor');
Route::post('send-permintaan/{cek}','BackEnd@kirimPermintaan');
Route::get('get-permintaan/','BackEnd@getPermintaan');
Route::get('get-penawaran/','BackEnd@getPenawaran');
Route::get('cari-produk/{id}','BackEnd@cariProduk');
Route::get('cari-produk-permintaan/{id}','BackEnd@cariProduk');
Route::get('get-row/{id}/{row}','FrontEnd@getRow');
Route::get('get-row-kirim/{id}','FrontEnd@getRowpengiriman');
