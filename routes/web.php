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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'Kategori_P@homepage');
// Route::get('/home','Kategori_P@homepage');

Route::get('/admin','Admin@index');
Route::get('/login','Admin@login');
Route::post('/login_auth','Admin@login_auth');
Route::get('/logout','Admin@logout');
Route::get('/index','Admin@index');
//Operator Admin
Route::get('/admin/operator','Admin@operator');
Route::get('/admin/tambah_operator','Admin@tambah_operator');
Route::post('/admin/input_operator','Admin@input_operator');
Route::get('/admin/edit_admin/{id_user}','Admin@edit_operator');
Route::put('/admin/update_operator/{id_user}','Admin@update_operator');
Route::get('/admin/delete_admin/{id_user}', 'Admin@delete_operator');
Route::get('/admin/cari','Admin@cari_operator');
//Kategori Yadnya
Route::get('/category/{id_kategori}','Kategori@detil_kategori');
Route::get('/kategori/tambah_kategori','Kategori@tambah_kategori');
Route::post('/kategori/input_kategori','Kategori@input_kategori');
Route::get('/kategori/detil_kategoriku','Kategori@kategoriku');
Route::get('/kategori/edit_kategoriku/{id_kategori}', 'Kategori@edit_kategoriku');
Route::put('/kategori/update_kategoriku/{id_kategori}','Kategori@update_kategoriku');
Route::get('/kategori/hapus_kategoriku/{id_kategori}', 'Kategori@delete_kategoriku');
Route::get('/kategori/tambah_post_kategori/{id_kategori}','Kategori@tambah_post_kategori');
Route::post('/kategori/input_post_kategori','Kategori@input_post_kategori');
Route::get('/kategori/edit_post_k/{id_post}','Kategori@edit_post_k');
Route::put('/kategori/update_post_k/{id_post}','Kategori@update_post_k');
Route::get('/kategori/cari_post_k','Kategori@cari_post_k');
Route::get('/kategori/delete_post_k/{id_post}','Kategori@delete_post_k');
Route::get('/kategori/detil_post_k/{id_post}','Kategori@detil_post_k');
Route::get('/kategori/detil_post_kp/{id_parent_post}/{id_post}/{id_tag}','Kategori@detil_post_kp');
Route::get('/kategori/list_tag','Kategori@list_tag');
Route::post('/kategori/input_list_kategoriku','Kategori@input_list_kategoriku');

//Tag
Route::get('/tags/{id_tag}','Tag@detil_tag');
Route::get('/tag/detil_tagku','Tag@tagku');
Route::get('/tag/edit_tagku/{id_tag}', 'Tag@edit_tagku');
Route::put('/tag/update_tagku/{id_tag}','Tag@update_tagku');
Route::get('/tag/tambah_tag','Tag@tambah_tag');
Route::post('/tag/input_tag','Tag@input_tag');
Route::get('/tag/hapus_tagku/{id_tag}','Tag@delete_tagku');
Route::post('/tag_d','Tag@tag_dinamis');
Route::get('/tag/tambah_post_tag/{id_tag}','Tag@tambah_post_tag');
Route::post('/tag/input_post_tag','Tag@input_post_tag');
Route::get('/tag/edit_post_t/{id_post}','Tag@edit_post_t');
Route::put('/tag/update_post_t/{id_post}','Tag@update_post_t');
Route::get('/tag/cari_post_t','Tag@cari_post_t');
Route::get('/tag/delete_post_t/{id_post}','Tag@delete_post_t');
Route::get('/tag/detil_post_t/{id_tag}/{id_post}','Tag@detil_post_t');
Route::get('/tag/drop_down_t/{id}','Tag@drop_down_tag');

//yuda list tag
Route::get('/tag/dropdown', 'Tag@list_tag');
Route::post('/tag/input_list_tagku','Tag@input_list_tagku');

// Route::get('/tag/tambah_detil_post_t/{id_post}','Tag@tambah_detil_post_t');
//Pengguna
Route::post('/pengguna/searching','Kategori_P@cari_p');
Route::get('/tag_pengguna/{id_tag}','Tag_P@index_p');
Route::get('/tag_pengguna/detil/{id_post}/{id_tag}','Tag_P@detail_post_t');
Route::get('/kategori_pengguna/{id_kategori}','Kategori_P@index_k');
Route::get('/kategori_pengguna/detil/{id_post}/{id_kategori}','Kategori_P@detail_post_k');