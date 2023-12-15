<?php

namespace App\Http\Controllers\Encargado;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Presupuesto;
use auth;

class ReporteEncargadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('encargado.reportes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Excel::create('Presupuestos', function($excel) use($request){
            $created_at = $request->input('fechainicio');
            $fecha_inicial = date("Y-m-d", strtotime($created_at)) . ' ' . '00:00:00';

            $finish_at =  $request->input('fechafinal');
            $fechafinal = date("Y-m-d", strtotime($finish_at)) . ' ' . '23:59:59';

            if ($request->detalle == 1) {
                $presupuestos = Presupuesto::whereBetween('created_at', [$fecha_inicial, $fechafinal])->where('user_id', auth::user()->id)->get();

                $excel->sheet('Presupuestos', function($sheet) use($presupuestos){
                $sheet->row(1, [
                    'Folio', 'Fecha de creacion','Descripcion','Periodo','Costo Total','Estatus','Creador'
                    ]);
                    foreach ($presupuestos as $index => $presupuesto) {
                        $sheet->row($index+2, [
                            $presupuesto->id, $presupuesto->created_at, $presupuesto->descripcion, $presupuesto->periodo, $presupuesto->costo_total, $presupuesto->estatuspresupuesto->nombre, $presupuesto->user->name." ".$presupuesto->user->ap_paterno." ".$presupuesto->user->ap_materno
                            ]);
                    }
                });

            } else {
               $presupuestos = Presupuesto::select('presupuesto.*','detalle_presupuesto.cantidadrequerida', 'detalle_presupuesto.cantidad','productos.nombre','productos.precio','productos.iva')
                ->join('detalle_presupuesto','detalle_presupuesto.presupuesto_id', 'presupuesto.id')
                ->join('productos','productos.id', 'detalle_presupuesto.producto_id')
                ->whereBetween('presupuesto.created_at', [$fecha_inicial, $fechafinal])
                ->where('presupuesto.user_id', auth::user()->id)
                ->get(); 

                $excel->sheet('Presupuestos con detalles', function($sheet) use($presupuestos){
                $sheet->row(1, [
                    'Folio', 'Fecha de creacion','Descripcion','Costo Total','Periodo','Productos','Precio','Cantidad','Subtotal','Iva','Total','Cantidad faltante','Estatus','Creador'
                    ]);
                    foreach ($presupuestos as $index => $presupuesto) {
                        $sheet->row($index+2, [
                            $presupuesto->id, $presupuesto->created_at, $presupuesto->descripcion ,$presupuesto->costo_total, $presupuesto->periodo, $presupuesto->nombre, $presupuesto->precio, $presupuesto->cantidadrequerida, $presupuesto->precio*$presupuesto->cantidadrequerida, ($presupuesto->precio*$presupuesto->cantidadrequerida)*$presupuesto->iva, ($presupuesto->precio*$presupuesto->cantidadrequerida)+($presupuesto->precio*$presupuesto->cantidadrequerida)*$presupuesto->iva, $presupuesto->cantidad, $presupuesto->estatuspresupuesto->nombre, $presupuesto->user->name." ".$presupuesto->user->ap_paterno." ".$presupuesto->user->ap_materno
                            ]);
                    }
                });             
            }        
        })->export('csv');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
