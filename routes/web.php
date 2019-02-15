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

Route::group(['namespace' => 'User'], function () {
    
    Route::resource('/', 'HomeController');
    Route::resource('post', 'PostController');
    
});


Route::group(['namespace' => 'Admin'], function () {
    Route::get('admin/home', 'HomeController@index');
    Route::resource('admin/post', 'PostController');
    Route::resource('admin/tags', 'TagController');
    Route::resource('admin/category', 'CategoryController');
    
});
