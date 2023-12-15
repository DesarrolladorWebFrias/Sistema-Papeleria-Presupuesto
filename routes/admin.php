<?php

Route::group(['middleware' => ['auth','role:1'], 'prefix' => 'admin'], function(){

    Route::get('dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');

    Route::resource('empresa', 'Admin\EmpresaController');
    Route::resource('areas', 'Admin\AreasController');
    Route::resource('categorias', 'Admin\CategoriaController');
    Route::resource('subcategorias', 'Admin\SubCategoriasController');

    Route::resource('subareas', 'Admin\SubareasController');
    Route::resource('usuarios', 'Admin\UsuarioController');
 	
 	/*Controlador de los inventarios*/
    Route::resource('inventarios', 'Admin\InventarioAdminController');
    Route::get('producto', 'Admin\InventarioAdminController@producto')->name('admin.producto');

    /*Controlador de las compras*/
    Route::resource('compra', 'Admin\ComprasAdminController');
    Route::post('compra/proveedor', 'Admin\ComprasAdminController@proveedor')->name('compra.proveedor');
    Route::post('compra/productos', 'Admin\ComprasAdminController@productos')->name('compra.productos');

    Route::get('admininventariocomprarealizadas', 'Admin\ComprasAdminController@realizadas')->name('admin.inventario.compras.realizadas');
    Route::get('admininventariocomprasautorizadas', 'Admin\ComprasAdminController@autorizadas')->name('admin.inventario.compras.autorizadas');
    Route::get('admininventariocomprasrechazadas', 'Admin\ComprasAdminController@rechazadas')->name('admin.inventario.compras.rechazadas');

    /*Controlador de los presupuestos*/

    Route::resource('presupuestoadmin', 'Admin\PresupuestoAdminController');

    Route::get('presupuestocreados', 'Admin\PresupuestoAdminController@presupuestocreados')->name('admin.presupuesto.presupuestocreados');

    Route::get('presupuestoautorizado', 'Admin\PresupuestoAdminController@presupuestoautorizado')->name('admin.presupuesto.presupuestoautorizado');

    Route::get('presupuestorechazados', 'Admin\PresupuestoAdminController@presupuestorechazados')->name('admin.presupuesto.presupuestorechazados');

    Route::resource('proveedor', 'Admin\ProveedoresAdminController');

});