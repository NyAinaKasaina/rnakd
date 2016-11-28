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

Route::get('/', 'SessionController@index')->name('/');
Route::get('/logout', 'SessionController@logout');
Route::post('/', 'SessionController@login');
Route::get('/applink/invite','SessionController@invite')->name('invite');
Route::get('/applink/admin','SessionController@administrator')->name('admin');

Route::resource('/domaine','DomaineController');
Route::resource('/type','TypeController');
Route::resource('/application','ApplicationController');
Route::resource('/modification','ModificationController');
