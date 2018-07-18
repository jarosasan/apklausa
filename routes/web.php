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

Route::get('/', 'UsersController@index')->name('home');
Route::post('/', 'UsersController@storeName')->name('storeName');
Route::get('/age/{id}', 'UsersController@createAge')->name('createAge');
Route::post('/age/{id}', 'UsersController@storeAge')->name('storeAge');
Route::get('/gen/{id}', 'UsersController@createGender')->name('createGender');
Route::post('/gen/{id}', 'UsersController@storeGender')->name('storeGender');
Route::get('/test/{id}', 'UsersController@createTest')->name('createTest');
Route::post('/test/{id}', 'UsersController@storeTest')->name('storeTest');
Route::get('/fin/{id}', 'UsersController@createFinish')->name('createFin');
Route::get('/lang/{id}', 'UsersController@createLang')->name('createLang');
Route::post('/lang/{id}', 'UsersController@storeLang')->name('storeLang');
Route::get('/file/{id}', 'UsersController@createfile')->name('createFile');
Route::post('/file/{id}', 'UsersController@storeFile')->name('storeFile');
Route::get('/show/{id}', 'UsersController@show')->name('showUser');
