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


Route::group(['middleware'=>'auth','web'],function(){
    Route::resource('operator','OperatorController');
    Route::resource('barangkeluar','BarangKeluarController');
    Route::resource('barangmasuk','BarangMasukController');
    Route::group(['middleware'=>['admin']],function (){
        Route::resource('admin','AdminController');
        Route::resource('stok','BarangController');
        Route::resource('akun','AkunController');
        Route::post('akun/cari','AkunController@cari')->name('cariakun');
        Route::get('akun/{id}/delete','AkunController@destroy')->name('hapusakun');
    });
});


Auth::routes();
Route::get('/', function () {
    return redirect()->route('login');
});

//Route::get('/home', 'HomeController@index')->name('home');
