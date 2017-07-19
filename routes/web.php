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

/* complect types CRUD */
Route::get('/admin/complect', 'Admin\KomplectTermoparController@index');
Route::get('/admin/complect/add', 'Admin\KomplectTermoparController@add');
Route::get('/admin/complect/edit/{id}', 'Admin\KomplectTermoparController@edit');
Route::get('/admin/complect/delete/{id}', 'Admin\KomplectTermoparController@delete');

Route::post('/admin/complect/save', 'Admin\KomplectTermoparController@save');
Route::post('/admin/complect/update', 'Admin\KomplectTermoparController@update');

/* power_podacha types CRUD */
Route::get('/admin/power_podacha', 'Admin\DavlenieNaPodacheController@index');
Route::get('/admin/power_podacha/add', 'Admin\DavlenieNaPodacheController@add');
Route::get('/admin/power_podacha/edit/{id}', 'Admin\DavlenieNaPodacheController@edit');
Route::get('/admin/power_podacha/delete/{id}', 'Admin\DavlenieNaPodacheController@delete');

Route::post('/admin/power_podacha/save', 'Admin\DavlenieNaPodacheController@save');
Route::post('/admin/power_podacha/update', 'Admin\DavlenieNaPodacheController@update');

/* power_obrabotka types CRUD */
Route::get('/admin/power_obrabotka', 'Admin\DavlenieNaObrabotkeController@index');
Route::get('/admin/power_obrabotka/add', 'Admin\DavlenieNaObrabotkeController@add');
Route::get('/admin/power_obrabotka/edit/{id}', 'Admin\DavlenieNaObrabotkeController@edit');
Route::get('/admin/power_obrabotka/delete/{id}', 'Admin\DavlenieNaObrabotkeController@delete');

Route::post('/admin/power_obrabotka/save', 'Admin\DavlenieNaObrabotkeController@save');
Route::post('/admin/power_obrabotka/update', 'Admin\DavlenieNaObrabotkeController@update');

/* warm_marka types CRUD */
Route::get('/admin/warm_marka', 'Admin\WarmMarkaController@index');
Route::get('/admin/warm_marka/add', 'Admin\WarmMarkaController@add');
Route::get('/admin/warm_marka/edit/{id}', 'Admin\WarmMarkaController@edit');
Route::get('/admin/warm_marka/delete/{id}', 'Admin\WarmMarkaController@delete');

Route::post('/admin/warm_marka/save', 'Admin\WarmMarkaController@save');
Route::post('/admin/warm_marka/update', 'Admin\WarmMarkaController@update');

/* warm_model types CRUD */
Route::get('/admin/warm_model', 'Admin\WarmModelController@index');
Route::get('/admin/warm_model/add', 'Admin\WarmModelController@add');
Route::get('/admin/warm_model/edit/{id}', 'Admin\WarmModelController@edit');
Route::get('/admin/warm_model/delete/{id}', 'Admin\WarmModelController@delete');

Route::post('/admin/warm_model/save', 'Admin\WarmModelController@save');
Route::post('/admin/warm_model/update', 'Admin\WarmModelController@update');

/* rashodomer_podacha_model types CRUD */
Route::get('/admin/rashodomer_podacha_model', 'Admin\RashodomerPodachaModelController@index');
Route::get('/admin/rashodomer_podacha_model/add', 'Admin\RashodomerPodachaModelController@add');
Route::get('/admin/rashodomer_podacha_model/edit/{id}', 'Admin\RashodomerPodachaModelController@edit');
Route::get('/admin/rashodomer_podacha_model/delete/{id}', 'Admin\RashodomerPodachaModelController@delete');

Route::post('/admin/rashodomer_podacha_model/save', 'Admin\RashodomerPodachaModelController@save');
Route::post('/admin/rashodomer_podacha_model/update', 'Admin\RashodomerPodachaModelController@update');

/* rashodomer_podacha_marka types CRUD */
Route::get('/admin/rashodomer_podacha_marka', 'Admin\RashodomerPodachaMarkaController@index');
Route::get('/admin/rashodomer_podacha_marka/add', 'Admin\RashodomerPodachaMarkaController@add');
Route::get('/admin/rashodomer_podacha_marka/edit/{id}', 'Admin\RashodomerPodachaMarkaController@edit');
Route::get('/admin/rashodomer_podacha_marka/delete/{id}', 'Admin\RashodomerPodachaMarkaController@delete');

Route::post('/admin/rashodomer_podacha_marka/save', 'Admin\RashodomerPodachaMarkaController@save');
Route::post('/admin/rashodomer_podacha_marka/update', 'Admin\RashodomerPodachaMarkaController@update');

/* rashodomer_obrabotka_model types CRUD */
Route::get('/admin/rashodomer_obrabotka_model', 'Admin\RashodomerObrabotkaModelController@index');
Route::get('/admin/rashodomer_obrabotka_model/add', 'Admin\RashodomerObrabotkaModelController@add');
Route::get('/admin/rashodomer_obrabotka_model/edit/{id}', 'Admin\RashodomerObrabotkaModelController@edit');
Route::get('/admin/rashodomer_obrabotka_model/delete/{id}', 'Admin\RashodomerObrabotkaModelController@delete');

Route::post('/admin/rashodomer_obrabotka_model/save', 'Admin\RashodomerObrabotkaModelController@save');
Route::post('/admin/rashodomer_obrabotka_model/update', 'Admin\RashodomerObrabotkaModelController@update');

/* rashodomer_obrabotka_marka types CRUD */
Route::get('/admin/rashodomer_obrabotka_marka', 'Admin\RashodomerObrabotkaMarkaController@index');
Route::get('/admin/rashodomer_obrabotka_marka/add', 'Admin\RashodomerObrabotkaMarkaController@add');
Route::get('/admin/rashodomer_obrabotka_marka/edit/{id}', 'Admin\RashodomerObrabotkaMarkaController@edit');
Route::get('/admin/rashodomer_obrabotka_marka/delete/{id}', 'Admin\RashodomerObrabotkaMarkaController@delete');

Route::post('/admin/rashodomer_obrabotka_marka/save', 'Admin\RashodomerObrabotkaMarkaController@save');
Route::post('/admin/rashodomer_obrabotka_marka/update', 'Admin\RashodomerObrabotkaMarkaController@update');