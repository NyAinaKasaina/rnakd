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

Route::get('/application/ajouter', 'Main\FormController@ajouterApplication');
Route::get('/application/modifier/{id}', 'Main\FormController@modifierApplication');
Route::get('/application/lister/{limit}/{page}','Main\ListController@application');

Route::get('/domaine/ajouter', 'Main\FormController@ajouterDomaine');
Route::get('/domaine/modifier/{id}', 'Main\FormController@modifierDomaine');
Route::get('/domaine/lister','Main\ListController@domaine');

Route::get('/type/ajouter', 'Main\FormController@ajouterType');
Route::get('/type/modifier/{id}', 'Main\FormController@modifierType');
Route::get('/type/lister/{domaine}','Main\ListController@type');

Route::get('/modification/ajouter', 'Main\FormController@ajouterModification');
Route::get('/modification/modifier/{id}', 'Main\FormController@modifierModification');
Route::get('/modification/lister/{id}','Main\ListController@modification');

Route::resource('domaine','DomaineController');
Route::resource('type','TypeController');
Route::resource('application','ApplicationController');
Route::resource('modification','ModificationController');
