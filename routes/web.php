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
    return view('user.home');
});


Route::get('post', function () {
    return view('user.post');
})->name('user.post');


// admin
Route::get('admin/home', function () {
    return view('admin.home');
})->name('admin.home');

Route::get('admin/post', function () {
    return view('admin.pages.post.index');
})->name('admin.home');

Route::get('admin/tags', function () {
    return view('admin.pages.tags.index');
})->name('admin.tags');

Route::get('admin/category', function () {
    return view('admin.pages.category.index');
})->name('admin.category');