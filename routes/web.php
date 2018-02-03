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
    return redirect()->route('login');
})->name('home');;

/* Routers Auth Login */
Route::group(['namespace' => 'Auth'], function () {
    // Login
    Route::get('/login', 'LoginController@getLogin');
    Route::post('/login', 'LoginController@checkAuth')->name('login');
//    Route::post('/login', ['as' => 'login', 'uses' => 'LoginController@checkAuth']);
//    // Logout
    Route::get('/logout', 'LoginController@getLogout')->name('logout');
//    // Register
//    Route::get('/activation/{token}', ['as' => 'user.activate', 'uses' => 'RegisterController@activateUser']);
    Route::get('e', 'LoginController@getLogin')->name('password.request');

});

//Route::get('/home', 'HomeController@index')->name('home');

/* Routers Page Client*/
Route::group(['prefix' => 'client', 'namespace' => 'Client'], function () {
    Route::get('/', 'DashboardController@index');
    Route::get('/dashboard', 'DashboardController@index')->name('client.dashboard');
    Route::get('/galleries', 'GalleryController@gallery')->name('client.galleries');
    Route::get('/gallery/photos/{galleryID}', 'GalleryController@photos')->name('client.photo');
    Route::get('/gallery/photos/{galleryID}/get', 'GalleryController@getPhotos')->name('client.getPhotos');
    Route::post('/gallery/photos/{galleryID}', 'GalleryController@savePhotos')->name('client.savePhoto');
    Route::get('/contract', 'ContractController@index')->name('client.contract');

});
Route::group(['prefix' => 'panel', 'namespace' => 'Panel'], function () {
    Route::get('/', 'DashboardController@index');
    Route::get('/dashboard', 'DashboardController@index')->name('panel.dashboard');
    Route::get('/clients', 'ClientController@index')->name('panel.clients');
    Route::get('/client/new', 'ClientController@create')->name('panel.clientNew');
    Route::post('/client/new', 'ClientController@store')->name('panel.clientStore');
    Route::get('/client/view/{clientID}', 'ClientController@show')->name('panel.clientView');
    Route::get('/client/edit/{clientID}', 'ClientController@edit')->name('panel.clientEdit');
    Route::put('/client/edit/{clientID}', 'ClientController@update')->name('panel.clientUpdate');
    Route::delete('/client/destroy', 'ClientController@destroy')->name('panel.clientDestroy');
    Route::get('/client/{clientID}/contracts', 'ClientController@contractIndex')->name('panel.clientContract');

    Route::group(['prefix' => 'contracts'], function () {
        Route::get('/', 'ContractController@index')->name('panel.contracts');
        Route::get('/new', 'ContractController@create')->name('panel.contractNew');
        Route::post('/new', 'ContractController@store')->name('panel.contractStore');
        Route::get('/{contractID}', 'ContractController@edit')->name('panel.contractEdit');
        Route::put('/new', 'ContractController@update')->name('panel.contractUpdate');

    });



});



