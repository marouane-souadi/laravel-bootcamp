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
Route::middleware(['admin'])->group(function () {
  Route::get('admin', function() {
    return view('admin.index');
  })->name('admin');
  Route::resource('admin/users', 'Admin\AdminUsersController',  ['as' => 'admin']);
  Route::resource('admin/posts', 'Admin\AdminPostsController',  ['as' => 'admin']);
});

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');
Route::get('/', function () {
    return view('welcome');
});