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
    return view('welcome');
    //return view('backend.login');
});

Route::group(['namespace' => 'Admin'], function () {
    Route::group(['prefix' => 'login','middleware'=>'CheckLogedIn'], function () {
        Route::get('/','LoginController@getLogin');
        Route::post('/','LoginController@postLogin');
    });
    Route::get('logout','HomeController@getLogout');
    Route::group(['prefix' => 'admin','middleware'=>'CheckLogedOut'], function () {
        Route::get('home','HomeController@getHome');

        Route::group(['prefix' => 'category'], function () {
            Route::get('/','CategoryController@getCate');
            Route::post('/','CategoryController@postCate');

            Route::get('edit/{id}','CategoryController@getEditCate');

            Route::get('delete/{id}','CategoryController@getDeleteCate');
        });
    });
});


// Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
//     Route::get('/', function () {
        
//     })->name('index');
// })
