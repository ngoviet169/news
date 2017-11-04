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
    return view('frontend.index');
});

Route::get('news/{id}', 'PagesController@show');

Route::get('login', 'Auth\LoginController@login')->name('login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::post('login', 'Auth\LoginController@login');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', 'Backend\NewsController@index')->name('admin');

    Route::resource('news', 'Backend\NewsController');
    Route::get('changeStatus/{id}', 'Backend\NewsController@changeStatus')->name('changeStatus');

    Route::resource('cate', 'Backend\CateController');
    Route::post('cate/{cate}', 'Backend\CateController@update')->name('updateCate');
    Route::get('cage/{cate}', 'Backend\CateController@destroy')->name('deleteCate');
});
