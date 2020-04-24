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

Route::get('/', 'IndexController@index')->name('index');

Route::get('/prodotti', 'ProductController@index')->name('prodotti');

Route::get('/tecnologie', 'TechnologyController@index')->name('tecnologie');

Route::get('/preventivi', 'QuotationController@index')->name('preventivi');

Route::get('/contatti', 'ContactController@index')->name('contatti');

Route::post('/contatta', 'ContactController@send')->name('contatta');

Route::get('/news', 'NewsController@index')->name('news.index');

Route::get('/news/{id}', 'NewsController@showSingle')->name('news.id');

Route::post('/filtro', 'NewsController@show_filter')->name('news.filter');

Route::get('/login', 'LoginController@index')->name('login');

Auth::routes();
