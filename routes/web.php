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

/* Route::get('/', function () {
    return view('index');
}); */

Route::get('/', 'IndexController@show');

Route::get('/prodotti', 'ProdottiController@show');

Route::get('/tecnologie', 'TecnologieController@show');

Route::get('/preventivi', 'PreventiviController@show');

Route::get('/contatti', 'ContattiController@show');


