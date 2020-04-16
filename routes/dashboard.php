<?php
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register dashboard routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "auth" middleware group. 
|
*/


Route::get('/', 'HomeController@index')->name('dashboard');

Route::prefix('news')->group(function () {

    Route::view('/create','backoffice.newsDashboard.create')->name('createNews');

    //summernote store route
    Route::post('/create','NewsController@store')->name('createNewsPersist');
    
});


