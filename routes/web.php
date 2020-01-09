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

Route::get('/', 'landingpage@home');
Route::get('/admin', function () {return view('myadmin/content/dashboard');});
Route::post('/login', 'user@login');
Route::get('/logout', 'user@logout');
Route::get('/user','user@home');
Route::post('/user/tambah', 'user@add');
Route::post('/user/edit', 'user@edit');
Route::post('/user/hapus', 'user@delete');
Route::get('/fasilitas','fasilitas@home');
Route::post('/fasilitas/tambah','fasilitas@add');
Route::post('/fasilitas/edit','fasilitas@edit');
Route::post('/fasilitas/hapus','fasilitas@delete');
Route::get('/penunjang','penunjang@home');
Route::post('/penunjang/tambah','penunjang@add');
Route::post('/penunjang/edit','penunjang@edit');
Route::post('/penunjang/hapus','penunjang@delete');
Route::get('/penunjang_fasilitas','penunjang_fasilitas@home');
Route::post('/penunjang_fasilitas/tambah','penunjang_fasilitas@add');
Route::post('/penunjang_fasilitas/edit','penunjang_fasilitas@edit');
Route::post('/penunjang_fasilitas/hapus','penunjang_fasilitas@delete');
Route::get('/penilaian','penilaian@home');
Route::post('/penilaian/tambah','penilaian@add');
Route::post('/penilaian/edit','penilaian@edit');
Route::post('/penilaian/hapus','penilaian@delete');
Route::get('/kuisoner','kuisoner@home');
Route::post('/kuisoner/tambah','kuisoner@add');
Route::post('/kuisoner/edit','kuisoner@edit');
Route::post('/kuisoner/hapus','kuisoner@delete');
Route::get('/presentasi','presentasi@home');
