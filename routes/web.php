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

Route::get('/', 'Auth\LoginController@showLoginForm');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/* users CRUD */
Route::get('/admin/users', 'Admin\UsersController@index');
Route::get('/admin/users/add', 'Admin\UsersController@add');
Route::get('/admin/users/edit/{id}', 'Admin\UsersController@edit');
Route::get('/admin/users/delete/{id}', 'Admin\UsersController@delete');

Route::post('/admin/users/save', 'Admin\UsersController@save');
Route::post('/admin/users/update', 'Admin\UsersController@update');


