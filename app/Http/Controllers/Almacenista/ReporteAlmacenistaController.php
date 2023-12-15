<?php

namespace App\Http\Controllers\Almacenista;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Presupuesto;
use App\Vales;
use App\Productos;
use App\Compras;
use App\Proveedores;
use auth;

class ReporteAlmacenistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('almacenista.reportes.index');
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
        if ($request->status == 1) {
           Excel::create('Presupuestos', function($excel) use($request){
            $created_at = $request->input('fechainicio');
            $fecha_inicial = date("Y-m-d", strtotime($created_at)) . ' ' . '00:00:00';

            $finish_at =  $request->input('fechafinal');
            $fechafinal = date("Y-m-d", strtotime($finish_at)) . ' ' . '23:59:59';

            if ($request->detalle == 1) {
                $presupuestos = Presupuesto::whereBetween('created_at', [$fecha_inicial, $fechafinal])->get();
                

                $excel->sheet('Presupuestos', function($sheet) use($presupuestos){
                $sheet->row(1, [
                    'Folio del presupuesto', 'Fecha de creacion','Descripcion','Periodo','Costo Total','Estatus','Usuario que creo el presupuesto'
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
                ->get(); 
dd($presupuestos);
                $excel->sheet('Presupuestos con detalles', function($sheet) use($presupuestos){
                $sheet->row(1, [
                    'Folio del presupuesto', 'Fecha de creacion','Descripcion','Costo Total','Periodo','Productos','Precio','Cantidad','Subtotal','Iva','Total','Cantidad faltante','Estatus','Usuario que creo el presupuesto'
                    ]);
                    foreach ($presupuestos as $index => $presupuesto) {
                        $sheet->row($index+2, [
                            $presupuesto->id, $presupuesto->created_at, $presupuesto->descripcion ,$presupuesto->costo_total, $presupuesto->periodo, $presupuesto->nombre, $presupuesto->precio, $presupuesto->cantidadrequerida, $presupuesto->precio*$presupuesto->cantidadrequerida, ($presupuesto->precio*$presupuesto->cantidadrequerida)*$presupuesto->iva, ($presupuesto->precio*$presupuesto->cantidadrequerida)+($presupuesto->precio*$presupuesto->cantidadrequerida)*$presupuesto->iva, $presupuesto->cantidad, $presupuesto->estatuspresupuesto->nombre, $presupuesto->user->name." ".$presupuesto->user->ap_paterno." ".$presupuesto->user->ap_materno
                            ]);
                    }
                });             
            }        
            })->export('csv');
        } elseif ($request->status == 2) {
            Excel::create('Vales', function($excel) use($request){
            $created_at = $request->input('fechainicio');
            $fecha_inicial = date("Y-m-d", strtotime($created_at)) . ' ' . '00:00:00';

            $finish_at =  $request->input('fechafinal');
            $fechafinal = date("Y-m-d", strtotime($finish_at)) . ' ' . '23:59:59';

            if ($request->detalle == 1) {
                $vales = Vales::whereBetween('created_at', [$fecha_inicial, $fechafinal])->get();

                $excel->sheet('Vales', function($sheet) use($vales){
                $sheet->row(1, [
                    'Folio del vale', 'Fecha de creacion','Folio presupuesto','Descripcion del presupuesto','Costo Total','Estatus','Usuario que lo solicito'
                    ]);
                    foreach ($vales as $index => $vale) {
                        $sheet->row($index+2, [
                            $vale->id, $vale->created_at, $vale->presupuesto_id, $vale->presupuesto->descripcion, $vale->total, $vale->estatus, $vale->usuario->name." ".$vale->usuario->ap_paterno." ".$vale->usuario->ap_materno
                            ]);
                    }
                });

            } else {
               $vales = Vales::select('vales.*','detalle_vales.precio', 'detalle_vales.cantidad', 'detalle_vales.iva', 'detalle_vales.total as totalvales', 'productos.nombre')
                ->join('detalle_vales','detalle_vales.vale_id', 'vales.id')
                ->join('productos','productos.id', 'detalle_vales.product_id')
                ->whereBetween('vales.created_at', [$fecha_inicial, $fechafinal])
                ->get(); 

                $excel->sheet('Vales con detalles', function($sheet) use($vales){
                $sheet->row(1, [
                    'Folio del vale', 'Fecha de creacion','Folio presupuesto','Descripcion del presupuesto','Costo Total','Productos','Precio','Cantidad','Subtotal','Iva','Total','Usuario que lo solicito'
                    ]);
                    foreach ($vales as $index => $vale) {
                        $sheet->row($index+2, [
                            $vale->id, $vale->created_at, $vale->presupuesto_id, $vale->presupuesto->descripcion, $vale->total, $vale->nombre, $vale->precio, $vale->cantidad, $vale->precio*$vale->cantidad, $vale->iva, $vale->totalvales, $vale->usuario->name." ".$vale->usuario->ap_paterno." ".$vale->usuario->ap_materno
                            ]);
                    }
                });             
            }        
            })->export('csv');
        } elseif ($request->status == 3) {
            Excel::create('Productos', function($excel) use($request){
            $created_at = $request->input('fechainicio');
            $fecha_inicial = date("Y-m-d", strtotime($created_at)) . ' ' . '00:00:00';

            $finish_at =  $request->input('fechafinal');
            $fechafinal = date("Y-m-d", strtotime($finish_at)) . ' ' . '23:59:59';

            if ($request->detalle == 1) {
                $productos = Productos::whereBetween('created_at', [$fecha_inicial, $fechafinal])->where('estatus_id', 1)->get();

                $excel->sheet('Productos', function($sheet) use($productos){
                $sheet->row(1, [
                    'Folio del producto', 'Fecha de creacion','Nombre','Medida','Categoria','Subcategorias','Cantidad','Precio','Subtotal','Iva','Total','Usuario que creo el producto'
                    ]);
                    foreach ($productos as $index => $producto) {
                        $sheet->row($index+2, [
                            $producto->id, $producto->created_at, $producto->nombre, $producto->medida, $producto->subcategorias->categorias->nombre, $producto->subcategorias->nombre, $producto->cantidad, $producto->precio, $producto->cantidad*$producto->precio, ($producto->precio*$producto->cantidad)*$producto->iva,($producto->precio*$producto->cantidad)+($producto->precio*$producto->cantidad)*$producto->iva, $producto->usuario->name." ".$producto->usuario->ap_paterno." ".$producto->usuario->ap_materno
                            ]);
                    }
                });

            } else {
               $productos = Productos::select('productos.*','movimientos.cantidad as cantidadmovimiento', 'movimientos.total', 'movimientos.presupuesto_id', 'movimientos.compra_id','tipo_movimiento.nombre as tipomovimiento','movimientos.user_id as usuariomovimiento')
                ->join('movimientos', 'productos.id', 'movimientos.productos_id')
                ->join('tipo_movimiento', 'movimientos.tipo_movimiento_id', 'tipo_movimiento.id')
                ->whereBetween('productos.created_at', [$fecha_inicial, $fechafinal])
                ->get(); 

                $excel->sheet('Productos con detalles', function($sheet) use($productos){
                $sheet->row(1, [
                    'Folio del producto', 'Fecha de creacion', 'Nombre', 'Medida', 'Categoria', 'Subcategorias', 'Cantidad', 'Precio', 'Subtotal', 'Iva', 'Total', 'Usuario que creo el producto', 'Tipo movimiento', 'Folio presupuesto', 'Folio compra','Cantidad de movimiento','Total de movimiento', 'Usuario que solicito el movimiento'
                    ]);
                    foreach ($productos as $index => $producto) {
                        $sheet->row($index+2, [
                            $producto->id, $producto->created_at, $producto->nombre, $producto->medida, $producto->subcategorias->categorias->nombre, $producto->subcategorias->nombre, $producto->cantidad, $producto->precio, $producto->cantidad*$producto->precio, ($producto->precio*$producto->cantidad)*$producto->iva, ($producto->precio*$producto->cantidad)+($producto->precio*$producto->cantidad)*$producto->iva, $producto->usuario->name." ".$producto->usuario->ap_paterno." ".$producto->usuario->ap_materno, $producto->tipomovimiento,  $producto->presupuesto_id,  $producto->compra_id, $producto->cantidadmovimiento, $producto->total
                            ]);;
                    }
                });             
            }        
            })->export('csv');
        } elseif ($request->status == 4) {
           Excel::create('Compras', function($excel) use($request){
            $created_at = $request->input('fechainicio');
            $fecha_inicial = date("Y-m-d", strtotime($created_at)) . ' ' . '00:00:00';

            $finish_at =  $request->input('fechafinal');
            $fechafinal = date("Y-m-d", strtotime($finish_at)) . ' ' . '23:59:59';

            if ($request->detalle == 1) {
                $compras = Compras::whereBetween('created_at', [$fecha_inicial, $fechafinal])->where('user_id', auth::user()->id)->get();

                $excel->sheet('Compras', function($sheet) use($compras){
                $sheet->row(1, [
                    'Folio de compras', 'Fecha de creacion','Descripcion','Total del la compra','Fecha solicitada de compra','Forma de pago','Estatus','Proveedor','Usuario que creo la compra'
                    ]);
                    foreach ($compras as $index => $compra) {
                        $sheet->row($index+2, [
                            $compra->id, $compra->created_at, $compra->descripcion, $compra->costo_total, $compra->fechacompras, $compra->formadepago, $compra->estatuscompras->nombre, $compra->proveedor->nombre, $compra->user->name." ".$compra->user->ap_paterno." ".$compra->user->ap_materno
                            ]);
                    }
                });

            } else {
               $compras = Compras::select('compras.*','detalle_compras.cantidad', 'detalle_compras.unidad', 'detalle_compras.iva', 'detalle_compras.precio','productos.nombre')
                ->join('detalle_compras', 'detalle_compras.compra_id', 'compras.id')
                ->join('productos', 'detalle_compras.product_compra_id', 'productos.id')
                ->whereBetween('detalle_compras.created_at', [$fecha_inicial, $fechafinal])
                ->where('compras.user_id', auth::user()->id)
                ->get(); 

                $excel->sheet('Compras con detalles', function($sheet) use($compras){
                $sheet->row(1, [
                    'Folio de compras', 'Fecha de creacion','Descripcion','Total del la compra','Fecha solicitada de compra','Forma de pago','Estatus','Usuario que creo la compra','Proveedor','Productos','Precio','Cantidad','Subtotal','Iva','Total'
                    ]);
                    foreach ($compras as $index => $compra) {
                        $sheet->row($index+2, [
                             $compra->id, $compra->created_at, $compra->descripcion, $compra->costo_total, $compra->fechacompras, $compra->formadepago, $compra->estatuscompras->nombre, $compra->user->name." ".$compra->user->ap_paterno." ".$compra->user->ap_materno, $compra->proveedor->nombre, $compra->nombre, $compra->precio, $compra->cantidad, $compra->precio*$compra->cantidad, ($compra->precio*$compra->cantidad)*$compra->iva,($compra->precio*$compra->cantidad)+($compra->precio*$compra->cantidad)*$compra->iva,
                            ]);
                    }
                });             
            }        
            })->export('csv');
        } elseif ($request->status == 5) {
            Excel::create('Proveedores', function($excel) use($request){
            $created_at = $request->input('fechainicio');
            $fecha_inicial = date("Y-m-d", strtotime($created_at)) . ' ' . '00:00:00';

            $finish_at =  $request->input('fechafinal');
            $fechafinal = date("Y-m-d", strtotime($finish_at)) . ' ' . '23:59:59';

            if ($request->detalle == 1) {
                $proveedor = Proveedores::whereBetween('created_at', [$fecha_inicial, $fechafinal])->get();

                $excel->sheet('Proveedores', function($sheet) use($proveedor){
                $sheet->row(1, [
                    'Folio del proveedor', 'Fecha de creacion','Nombre','Direccion','Telefono'
                    ]);
                    foreach ($proveedor as $index => $proveedores) {
                        $sheet->row($index+2, [
                            $proveedores->id, $proveedores->created_at, $proveedores->nombre, $proveedores->direccion, $proveedores->telefono
                            ]);
                    }
                });

            } else {
               $proveedor = Proveedores::select('proveedor.*','compras.descripcion', 'compras.costo_total', 'compras.fechacompras', 'compras.formadepago', 'users.name', 'users.ap_paterno', 'users.ap_materno')
                ->join('compras', 'proveedor.id', 'compras.proveedor_id')
                ->join('users', 'users.id', 'compras.user_id')
                ->whereBetween('proveedor.created_at', [$fecha_inicial, $fechafinal])
                ->get(); 

                $excel->sheet('Proveedores con detalles', function($sheet) use($proveedor){
                $sheet->row(1, [
                    'Folio del proveedor', 'Fecha de creacion','Nombre','Direccion','Telefono', 'Descripcion compra', 'Costo de la compra', 'Fecha compras', 'Forma de pago', 'Nombre de usuario'
                    ]);
                    foreach ($proveedor as $index => $proveedores) {
                        $sheet->row($index+2, [
                            $proveedores->id, $proveedores->created_at, $proveedores->nombre, $proveedores->direccion, $proveedores->telefono, $proveedores->descripcion, $proveedores->costo_total, $proveedores->fechacompras, $proveedores->formadepago, $proveedores->name." ".$proveedores->ap_paterno." ".$proveedores->ap_materno
                            ]);;
                    }
                });             
            }        
            })->export('csv');
        } else{
            # code...
        }
        
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
