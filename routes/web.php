<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use Illuminate\Routing\RouteGroup;


Route::get('/', function () {
    return view('beranda');
});

Route::get('/beranda', 'App\Http\Controllers\BerandaController@index');

Route::get('/login', function () {
    return view('Pengguna.login');
})->name('login');

Route::post('/postlogin', 'App\Http\Controllers\LoginController@postlogin')->name('postlogin');
Route::get('/logout', 'App\Http\Controllers\LoginController@logout')->name('logout');

Route::group(['middleware' => ['auth','ceklevel:admin']], function (){
    route::get('/halaman-satu', 'App\Http\Controllers\BerandaController@halamansatu')->name('halaman-satu');
});

Route::group(['middleware' => ['auth','ceklevel:admin,user']], function (){
    route::get('/beranda', 'App\Http\Controllers\BerandaController@index');
    route::get('/halaman-dua', 'App\Http\Controllers\BerandaController@halamandua')->name('halaman-dua');
});


