<?php

Route::group(['middleware' => ['auth','role:2'], 'prefix' => 'gerencia'], function(){

    Route::get('dashboard', 'Gerencia\DashboardController@index')->name('gerencia.dashboard');

    Route::get('presupuestoscreados', 'Gerencia\DashboardController@presupuestoscreados')->name('gerencia.presupuestoscreados');

    Route::get('presupuestosautorizado', 'Gerencia\DashboardController@presupuestosautorizado')->name('gerencia.presupuestosautorizado');

    Route::get('presupuestorechazados', 'Gerencia\DashboardController@presupuestorechazados')->name('gerencia.presupuestorechazados');
    

    Route::get('presupuestosmostrar/{id}', 'Gerencia\DashboardController@show')->name('presupuestosmostrar.show');

    //funcion compras

    Route::resource('comprasautorizar', 'Gerencia\ComprasAutorizarController');

    Route::get('comprascreadas', 'Gerencia\ComprasAutorizarController@comprascreadas')->name('gerencia.comprascreadas');

    Route::get('autorizadas', 'Gerencia\ComprasAutorizarController@autorizadas')->name('gerencia.autorizadas');

    Route::get('rechazarcompra', 'Gerencia\ComprasAutorizarController@rechazarcompra')->name('gerencia.rechazarcompra');

    Route::get('comprasautorizar/{id}/{estatus}', 'Gerencia\ComprasAutorizarController@estatus');

    //funcion autorizacion

    Route::resource('autorizar', 'Gerencia\AutorizarController');

    Route::get('autorizar/{id}/{estatus}', 'Gerencia\AutorizarController@estatus');

    /*Controlador de los inventarios*/
    Route::resource('inventarios_geren', 'Gerencia\InventarioGerenciaController');
    Route::get('productosgeren', 'Gerencia\InventarioGerenciaController@producto')->name('gerencia.productosgeren');

    Route::resource('proveedorgerencia', 'Gerencia\ProveedoresGerenciaController');

});