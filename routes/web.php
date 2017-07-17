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

/* resource types CRUD */
Route::get('/admin/resource', 'Admin\ResourceController@index');
Route::get('/admin/resource/add', 'Admin\ResourceController@add');
Route::get('/admin/resource/edit/{id}', 'Admin\ResourceController@edit');
Route::get('/admin/resource/delete/{id}', 'Admin\ResourceController@delete');

Route::post('/admin/resource/save', 'Admin\ResourceController@save');
Route::post('/admin/resource/update', 'Admin\ResourceController@update');

/* ycompany types CRUD */
Route::get('/admin/ycompany', 'Admin\YCompanyController@index');
Route::get('/admin/ycompany/add', 'Admin\YCompanyController@add');
Route::get('/admin/ycompany/edit/{id}', 'Admin\YCompanyController@edit');
Route::get('/admin/ycompany/delete/{id}', 'Admin\YCompanyController@delete');

Route::post('/admin/ycompany/save', 'Admin\YCompanyController@save');
Route::post('/admin/ycompany/update', 'Admin\YCompanyController@update');

/* rsocompany types CRUD */
Route::get('/admin/rsocompany', 'Admin\RSOCompanyController@index');
Route::get('/admin/rsocompany/add', 'Admin\RSOCompanyController@add');
Route::get('/admin/rsocompany/edit/{id}', 'Admin\RSOCompanyController@edit');
Route::get('/admin/rsocompany/delete/{id}', 'Admin\RSOCompanyController@delete');

Route::post('/admin/rsocompany/save', 'Admin\RSOCompanyController@save');
Route::post('/admin/rsocompany/update', 'Admin\RSOCompanyController@update');