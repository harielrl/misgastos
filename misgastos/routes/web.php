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

Route::get('/', function () {
    return view('contenido/contenido');
});

Route::get('/rubro','RubroController@index');
Route::post('/rubro/registrar','RubroController@store');
Route::put('/rubro/actualizar','RubroController@update');
Route::put('/rubro/desactivar','RubroController@desactivar');
Route::put('/rubro/activar','RubroController@activar');
Route::get('/rubro/selectrubro','RubroController@selectrubro');

Route::get('/subrubro','SubRubroController@index');
Route::post('/subrubro/registrar','SubRubroController@store');
Route::put('/subrubro/actualizar','SubRubroController@update');
Route::put('/subrubro/desactivar','SubRubroController@desactivar');
Route::put('/subrubro/activar','SubRubroController@activar');

/*

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
*/