<?php

Route::group(['middleware' => ['auth','role:3'], 'prefix' => 'almacenista'], function(){

    Route::get('dashboard', 'Almacenista\DashboardController@index')->name('almacenista.dashboard');
   
    /*Controlador de los inventario*/

    Route::resource('inventario', 'Almacenista\InventarioController');
    Route::get('productos', 'Almacenista\InventarioController@productos')->name('almacenista.productos');

    /*Controlador de los proveedores*/

    Route::resource('proveedores', 'Almacenista\ProveedoresController');
   
    /*Controlador de las compras*/

    Route::resource('compras', 'Almacenista\ComprasController');
    Route::post('compras/proveedor', 'Almacenista\ComprasController@proveedor')->name('compras.proveedor');
    Route::post('compras/productos', 'Almacenista\ComprasController@productos')->name('compras.productos');

    Route::get('inventariocomprarealizadas', 'Almacenista\ComprasController@realizadas')->name('almacenista.inventario.compras.realizadas');
    Route::get('inventariocomprasautorizadas', 'Almacenista\ComprasController@autorizadas')->name('almacenista.inventario.compras.autorizadas');
    Route::get('inventariocomprasrechazadas', 'Almacenista\ComprasController@rechazadas')->name('almacenista.inventario.compras.rechazadas');

    /*Controlador de los presupuestos*/

    Route::resource('presupuestos', 'Almacenista\PresupuestoController');

    Route::get('presupuestoscreados', 'Almacenista\PresupuestoController@presupuestoscreados')->name('almacenista.presupuesto.presupuestoscreados');

    Route::get('presupuestosautorizado', 'Almacenista\PresupuestoController@presupuestosautorizado')->name('almacenista.presupuesto.presupuestosautorizado');

    Route::get('presupuestosrechazados', 'Almacenista\PresupuestoController@presupuestosrechazados')->name('almacenista.presupuesto.presupuestosrechazados');

    /*Controlador de los vales*/

    Route::resource('vales', 'Almacenista\ValesController');

    Route::get('valesrealizados', 'Almacenista\ValesController@valesrealizados')->name('almacenista.vales.valesrealizados');

    Route::get('valesentregado', 'Almacenista\ValesController@valesentregado')->name('almacenista.vales.valesentregado');

    Route::get('valesestatus/{id}/{estatus}', 'Almacenista\ValesController@estatus');

    /*Controlador de los réportes*/

    Route::resource('reportealmacenista', 'Almacenista\ReporteAlmacenistaController');


});