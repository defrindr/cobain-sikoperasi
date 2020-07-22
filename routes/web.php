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

// Route::get('/home', 'HomeController@index')->name('home');



Route::group(['prefix' => 'auth','as' => 'auth.','namespace' => 'Auth'],function(){
	Route::get('/login', 'LoginController@showForm')->name('form');
	Route::post('/login', 'LoginController@login')->name('login');
	Route::get('/logout', 'LoginController@logout')->name('logout');
});


Route::group(['middleware' => 'auth'],function() {
	Route::get('/', 'ReporterController@index');


	Route::resource('anggota','AnggotaController',['parameters' => [
	    'anggota' => 'data'
	]]);


	Route::resource('tabungan','TabunganController',['parameters' => [
	    'tabungan' => 'data'
	],'except' => ['edit','update']]);


	Route::get('tabungan/{data}/transact','TabunganController@form_transact')->name('tabungan.form_transact');
	Route::post('tabungan/{data}/transact','TabunganController@transact')->name('tabungan.transact');


	Route::get('tabungan/{data}/riwayat','RiwayatController@index')->name('riwayat.list_transact');
	Route::get('tabungan/riwayat/{data}/detail','RiwayatController@detail')->name('riwayat.detail_transact');




	Route::resource('peminjaman','PeminjamanController',['parameters' => [
	    'peminjaman' => 'data'
	]]);


	Route::get('angsuran/{peminjaman}/list','AngsuranController@index')->name('peminjaman.list_angsuran');
	Route::get('angsuran/{peminjaman}/{data}/edit','AngsuranController@edit')->name('angsuran.edit');
	Route::put('angsuran/{peminjaman}/{data}/edit','AngsuranController@update')->name('angsuran.update');
	Route::get('setting','CmsController@edit')->name('cms.index');


	Route::get('change_password','Auth\AuthController@change_password_form')->name('auth.change_password.form');
	Route::post('change_password','Auth\AuthController@change_password')->name('auth.change_password');






	Route::resource('user','UserController',['parameters' => [
	    'user' => 'data'
	]]);
});

Route::group(['prefix' => 'reports'],function(){
	// Route::get('/anggota', 'AnggotaController@exportAnggota');
	// Route::get('/peminjaman', 'PeminjamanController@exportPeminjaman');
	Route::post('/tabungan/{tabungan}/history', 'TabunganController@exportHistory')->name("reports.tabungan.history");
});

