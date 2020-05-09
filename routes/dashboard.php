<?php

use App\models\Index;
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

    Route::view('/create','backoffice.newsDashboard.create')->name('createNews')->middleware('can:store,App\models\Index');

    // updatesingle route view
    Route::get('/updateView','NewsController@updateView')->name('updateNews');

    Route::get('/manage','NewsController@manage')->name('manageNews');

    Route::post('/delete','NewsController@destroy')->name('deleteNews');

    //summernote store route
    Route::post('/create','NewsController@store')->name('createNewsPersist');

    // updatesingle route
    Route::post('/update','NewsController@update')->name('updateNewsPersist');
});

Route::prefix('/prodotti')->group(function () {

    Route::view('/create','backoffice.ProductDashboard.create')->name('createProduct')->middleware('can:store,App\models\Product');
    // updatesingle route view
    Route::get('/updateView','ProductController@updateView')->name('updateProduct');

    Route::get('/manage','ProductController@manage')->name('manageProduct');

    Route::post('/delete','ProductController@destroy')->name('deleteProduct');
    // store route
    Route::post('/create','ProductController@store')->name('createProductPersist');
    // updatesingle route
    Route::post('/update','ProductController@update')->name('updateProductPersist');
    
});

Route::prefix('/tecnologie')->group(function () {

    Route::view('/create','backoffice.TechnologyDashboard.create')->name('createTechnology')->middleware('can:store,App\models\Technology');
    // updatesingle route view
    Route::get('/updateView','TechnologyController@updateView')->name('updateTechnology');

    Route::get('/manage','TechnologyController@manage')->name('manageTechnology');

    Route::post('/delete','TechnologyController@destroy')->name('deleteTechnology');
    // store route
    Route::post('/create','TechnologyController@store')->name('createTechnologyPersist');
    // updatesingle route
    Route::post('/update','TechnologyController@update')->name('updateTechnologyPersist');
    
});

Route::prefix('/preventivi')->group(function () {

    Route::view('/create','backoffice.QuotationDashboard.create')->name('createQuotation')->middleware('can:store,App\models\Quotation');

    // updatesingle route view
    Route::get('/updateView','QuotationController@updateView')->name('updateQuotation');

    Route::get('/manage','QuotationController@manage')->name('manageQuotation');

    Route::post('/delete','QuotationController@destroy')->name('deleteQuotation');

    // store route
    Route::post('/create','QuotationController@store')->name('createQuotationPersist');

    // updatesingle route
    Route::post('/update','QuotationController@update')->name('updateQuotationPersist');
    
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

Route::prefix('/layout')->group(function () {

    // updatesingle route view
    Route::get('/updateView','LayoutController@updateView')->name('updateLayout');

    Route::get('/manage','LayoutController@manage')->name('manageLayout');

    Route::view('/create','backoffice.layoutDashboard.create')->name('createLayout')->middleware('can:store,App\models\Layout');
    
    Route::post('/create','LayoutController@store')->name('createLayoutPersist');

    Route::post('/delete','LayoutController@destroy')->name('deleteLayout');

    // updatesingle route
    Route::post('/update','LayoutController@update')->name('updateLayoutPersist');

    Route::get('/show','LayoutController@index')->name('showLayouts');

    Route::get('/showSingle','LayoutController@show')->name('showLayout');
    
    Route::post('/sendIntoProduction','LayoutController@sendIntoProduction')->name('sendIntoProduction');
    
});

Route::prefix('/group')->group(function () {

    // updatesingle route view
    Route::get('/groupView','GroupController@updateView')->name('updateGroup');

    Route::get('/manage','GroupController@index')->name('manageGroup');

    Route::get('/create','GroupController@create')->name('createGroup');
    
    Route::post('/create','GroupController@store')->name('createGroupPersist');

    Route::post('/delete','GroupController@destroy')->name('deleteGroup');

    // updatesingle route
    Route::post('/update','GroupController@update')->name('updateGroupPersist');
    
});

Route::prefix('/user')->group(function () {

    // updatesingle route view
    Route::get('/updateView','UserManageController@updateView')->name('updateUser');

    Route::get('/manage','UserManageController@index')->name('manageUser');

    Route::get('/create','UserManageController@create')->name('createUser');
    
    Route::post('/create','UserManageController@store')->name('createUserPersist');

    Route::post('/delete','UserManageController@destroy')->name('deleteUser');

    // updatesingle route
    Route::post('/update','UserManageController@update')->name('updateUserPersist');
    
});
Route::prefix('/factory')->group(function () {

    Route::get('/manage','FactoryController@index')->name('makeList');

    Route::post('/rollback','FactoryController@rollback')->name('rollbackProduct');

    Route::post('/tosend','FactoryController@toSend')->name('sendProduct');
    
});
Route::prefix('/order')->group(function () {

    Route::get('/','LayoutController@orderStateTot')->name('statusOrder');

    Route::get('/status','LayoutController@orderStateSingle')->name('statusOrderCustomer');
    
});
