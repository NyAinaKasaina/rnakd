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
Route::get('/login', 'SessionController@login')->name('login');
Route::get('/logout', 'SessionController@logout');
Route::post('/', 'SessionController@login');
Route::get('/applink/invite','SessionController@invite')->name('invite');
Route::get('/applink/admin','SessionController@administrator')->name('admin');

Route::get('/images/{image}', function($image = null)
{
    $path = storage_path().'/app/images/' . $image;
    if (file_exists($path)) {
        return Response::download($path);
    }
});

Route::resource('/domaine','DomaineController');
Route::resource('/type','TypeController');
Route::resource('/application','ApplicationController');
Route::resource('/modification','ModificationController');


Route::post('/select/domaine', 'DomaineController@selectbox');
Route::post('/select/type', 'TypeController@selectbox');


Route::get('/teste', function () {
    return view('teste');
});

Route::get('pdfview',array('as'=>'pdfview','uses'=>'PdfTest@pdfview'));

Route::get("/export/application/{timestamp}", 'ApplicationController@export');