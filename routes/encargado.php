<?php

Route::group(['middleware' => ['auth','role:4'], 'prefix' => 'encargado'], function(){

	/*Controlador de los */

    Route::get('dashboard', 'Encargado\DashboardController@index')->name('encargado.dashboard');

    Route::get('prestocreadas', 'Encargado\DashboardController@prestocreadas')->name('encargado.prestocreadas');

    Route::get('prsupstoautorizadas', 'Encargado\DashboardController@prsupstoautorizadas')->name('encargado.prsupstoautorizadas');
    
    Route::get('prsupstorechazados', 'Encargado\DashboardController@prsupstorechazados')->name('encargado.prsupstorechazados');

    Route::get('presupuestostiquets/{id}', 'Encargado\DashboardController@tiquet')->name('presupuestostiquets.tiquet');

	/*Controlador del presupuesto*/

    Route::resource('presupuesto', 'Encargado\PresupuestoController');

    Route::post('valescreados', 'Encargado\PresupuestoController@valescreados')->name('presupuestosvales.valescreados');

    Route::get('pdfvales/{id}', 'Encargado\PresupuestoController@pdfvales')->name('presupuesto.pdfvales');

    /*Controlador del reporte en excel*/

    Route::resource('reportencargado', 'Encargado\ReporteEncargadoController');

});