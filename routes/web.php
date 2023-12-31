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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/*
	---Apis
*/
Route::get('area/{id}', 'HomeController@getArea');
Route::get('subarea/{id}', 'HomeController@getSubArea');
Route::get('/providers/{id}', 'HomeController@getProviders');
Route::get('/productos/{id}', 'HomeController@getProductos');
Route::get('/categorias/{id}', 'HomeController@getCategorias');
Route::get('/productostiquets/{id}/{presupuesto}', 'HomeController@getProductosTiquets');



require __DIR__ . '/admin.php';
require __DIR__ . '/gerencia.php';
require __DIR__ . '/almacenista.php';
require __DIR__ . '/encargado.php';



