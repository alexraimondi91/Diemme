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



Route::get('', 'HomeController@index')->name('dashboard');

Route::prefix('news')->group(function () {

    Route::view('/create','backoffice.newsDashboard.create')->name('createNews');

    Route::get('/manage','NewsController@manage')->name('manageNews');

    Route::post('/delete','NewsController@destroy')->name('deleteNews');

    //summernote store route
    Route::post('/create','NewsController@store')->name('createNewsPersist');

    
});

Route::prefix('/prodotti')->group(function () {

    Route::view('/create','backoffice.ProductDashboard.create')->name('createProduct');

    Route::get('/manage','ProductController@manage')->name('manageProduct');

    Route::post('/delete','ProductController@destroy')->name('deleteProduct');

    // store route
    Route::post('/create','ProductController@store')->name('createProductPersist');
    
});

Route::prefix('/tecnologie')->group(function () {

    Route::view('/create','backoffice.TechnologyDashboard.create')->name('createTechnology');


    Route::get('/manage','TechnologyController@manage')->name('manageTechnology');

    Route::post('/delete','TechnologyController@destroy')->name('deleteTechnology');

    // store route
    Route::post('/create','TechnologyController@store')->name('createTechnologyPersist');
    
});

Route::prefix('/preventivi')->group(function () {

    Route::view('/create','backoffice.QuotationDashboard.create')->name('createQuotation');


    Route::get('/manage','QuotationController@manage')->name('manageQuotation');

    Route::post('/delete','QuotationController@destroy')->name('deleteQuotation');

    // store route
    Route::post('/create','QuotationController@store')->name('createQuotationPersist');
    
});

Route::prefix('/contatti')->group(function () {

    Route::get('/update','ContactController@backofficeContact')->name('updateContact');
    
    Route::post('/update','ContactController@store')->name('updateContactPersist');
    
});

Route::prefix('/profile')->group(function () {

    Route::get('/','UpdateProfileController@updateView')->name('profile');
    
    Route::post('/updateCredentialPassword','UpdateProfileController@updateCredentialPassword')->name('updateCredentialPasswordPersist');

    Route::post('/updateCredentialEmail','UpdateProfileController@updateCredentialEmail')->name('updateCredentialEmailPersist');

    Route::post('/updateProfile','UpdateProfileController@updateProfile')->name('updateProfilePersist');
    
});

Route::prefix('/progetti')->group(function () {

    Route::view('/create','backoffice.layoutDashboard.create')->name('createLayout');
    
    Route::post('/create','LayoutController@store')->name('createLayoutPersist');
    
});
