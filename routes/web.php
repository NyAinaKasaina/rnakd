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
});


Route::resource('domaine','DomaineController');
Route::resource('type','TypeController');
Route::resource('application','ApplicationController');
Route::resource('modification','ModificationController');

Route::get('/application/ajouter', 'Main\FormController@ajouterApplication');
Route::get('/application/modifier/{id}', 'Main\FormController@modifierApplication');
Route::get('/application/lister/{limit}/{page}');
