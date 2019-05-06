<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'FrontEnd@landing');
Route::post('sign-up', 'FrontEnd@signUp');
Route::post('login', 'FrontEnd@login');
Route::get('logout','FrontEnd@logout');
Route::get('dashboard','FrontEnd@dashboard');
Route::post('add-penawaran','FrontEnd@addPenawaran');

Route::get('registrasi-produk','FrontEnd@produk');
Route::get('del-produk/{id}','FrontEnd@delProduk');
Route::post('add-produk','FrontEnd@addProduk');
Route::patch('update-produk/{id}','FrontEnd@updateProduk');
Route::get('penawaran','FrontEnd@penawaran');
Route::get('kontrak','FrontEnd@kontrak');
Route::get('kontrak-pdf/{id}','FrontEnd@download');
Route::post('kirim-respon/{id}','FrontEnd@kirimRespon');
Route::get('pengiriman','FrontEnd@pengiriman');
Route::post('add-pengiriman','FrontEnd@addPengiriman');

Route::get('admin-auth','BackEnd@login');
Route::post('login-admin','BackEnd@dologin');
Route::get('logout-admin','BackEnd@dologout');

Route::get('dashboard-admin','BackEnd@dashboard');
Route::get('data-vendor','BackEnd@vendor');
Route::get('verifikasi-vendor/{id}','BackEnd@verifikasi');


Route::get('vendor-selection','BackEnd@vendorSelection');
Route::get('batal-kirim/{id}','BackEnd@batalKirim');

Route::get('admin-penawaran','BackEnd@penawaran');
Route::get('terima-penawaran/{id}','BackEnd@terimaPenawaran');
Route::get('tolak-penawaran/{id}','BackEnd@tolakPenawaran');
Route::post('give-rate/{id}','BackEnd@beriRating');
Route::get('batal-rate/{id}','BackEnd@batalRate');

Route::get('admin-kontrak','BackEnd@kontrak');
Route::get('tolak-vendor/{id}','BackEnd@tolakVendor');
Route::post('send-kontrak/{id}','BackEnd@sendKontrak');

Route::get('permintaan-penawaran','BackEnd@Permintaan');
Route::post('kirim-permintaan','BackEnd@kirimVendor');
