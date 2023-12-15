<?php

namespace App\Http\Controllers\Gerencia;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Compras;
use App\Productos;
use App\Presupuesto;
use App\DetalleCompras;
use App\Categorias;
use App\Movimientos;
use auth;
use DB;
use DataTables;

class ComprasAutorizarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comprarzda = Compras::where('estatus_compra_id', 1)->get();
        $compraaut = Compras::where('estatus_compra_id', 2)->get();
        $comprarech = Compras::where('estatus_compra_id', 4)->get();

        return view('gerencia.compras.index', compact('comprarzda','compraaut','comprarech'));
    }

    public function comprascreadas(Request $request)
    {
        if ($request->ajax()) {
            $data = Compras::where('estatus_compra_id', 1)->get();
             return Datatables::of($data)
                    ->editColumn('proveedor', function($datas){
                             return $datas->proveedor->nombre;
                    })
                    ->editColumn('estatuscompras', function($estatus)
                          {
                             return $estatus->estatuscompras->nombre;
                          })
                    ->editColumn('user', function($usuario)
                          {
                             return $usuario->user->name;
                          })
                    ->addIndexColumn()
                    ->addColumn('btn', 'gerencia.compras.opciones')
                    ->rawColumns(['btn'])
                    ->make(true);
         } 
    }

    public function autorizadas(Request $request)
    {
        if ($request->ajax()) {
            $data = Compras::where('estatus_compra_id', 2)->get();
             return Datatables::of($data)
                    ->editColumn('proveedor', function($datas){
                             return $datas->proveedor->nombre;
                    })
                    ->editColumn('estatuscompras', function($estatus)
                          {
                             return $estatus->estatuscompras->nombre;
                          })
                    ->editColumn('user', function($usuario)
                          {
                             return $usuario->user->name;
                          })
                    ->addIndexColumn()
                    ->addColumn('btn', 'gerencia.compras.opciones')
                    ->rawColumns(['btn'])
                    ->make(true);
         } 
    }

    public function rechazarcompra(Request $request)
    {
        if ($request->ajax()) {
            $data = Compras::where('estatus_compra_id', 4)->get();
             return Datatables::of($data)
                    ->editColumn('proveedor', function($datas){
                             return $datas->proveedor->nombre;
                    })
                    ->editColumn('estatuscompras', function($estatus)
                          {
                             return $estatus->estatuscompras->nombre;
                          })
                    ->editColumn('user', function($usuario)
                          {
                             return $usuario->user->name;
                          })
                    ->addIndexColumn()
                    ->addColumn('btn', 'gerencia.compras.opciones')
                    ->rawColumns(['btn'])
                    ->make(true);
         } 
    }

    public function estatus($id, $estatus)
    { 
        $details = DetalleCompras::where('compra_id', $id)->get();
        $productos = Productos::all();
        
        foreach ($productos as $producto) {   
            foreach ($details as $detalle) {                    
               if ($detalle->product_compra_id == $producto->id && $producto->estatus_id ==  2) {
                   $productos = Productos::where('id', '=', $producto->id) 
                        ->update(['precio' => $detalle->precio,
                                'cantidad' => $detalle->cantidad,
                                'iva' => $detalle->iva,
                                'medida' => $detalle->unidad,
                                'subcategoria_id' => $detalle->subcategoria_id,
                                'estatus_id' => 1]);

                        $movimientos = new Movimientos();
                            $movimientos->tipo_movimiento_id = '3';
                            $movimientos->cantidad = $detalle->cantidad;
                            $movimientos->total = ($detalle->precio * $detalle->cantidad+($detalle->precio * $detalle->cantidad)*$detalle->iva);
                            $movimientos->productos_id = $detalle->product_compra_id;
                            $movimientos->compra_id = $detalle->id;
                            $movimientos->area_id = auth::user()->subarea_id;
                            $movimientos->user_id = auth::user()->id;
                         $movimientos->save();

               } elseif ($detalle->product_compra_id == $producto->id && $producto->estatus_id ==  1) {
                    $productos = Productos::where('id', '=', $producto->id) 
                        ->update(['cantidad' => $producto->cantidad + $detalle->cantidad]);

                    $movimientos = new Movimientos();
                        $movimientos->tipo_movimiento_id = '3';
                        $movimientos->cantidad = $detalle->cantidad;
                        $movimientos->total = ($detalle->precio * $detalle->cantidad+($detalle->precio * $detalle->cantidad)*$detalle->iva);
                        $movimientos->productos_id = $detalle->product_compra_id;
                        $movimientos->compra_id = $detalle->compra_id ;
                        $movimientos->area_id = auth::user()->subarea_id;
                        $movimientos->user_id = auth::user()->id;
                     $movimientos->save();
                } 
            }
        }  
        $compras = Compras::findOrFail($id);        
            $compras->estatus_compra_id = $estatus;
        $compras->save();
        //sending notifications, emails, broadcasting.
        alert()->success('La compra ha sido actualizada.', 'Compra actualizada'); 
        return redirect()->route('comprasautorizar.index');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $compras = Compras::find($id);
            $details = DetalleCompras::where('compra_id', $id)->get();
        $categorias = Categorias::all();
       return view('gerencia.compras.mostrar', compact('compras','details','categorias'));
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
        $productos = Productos::where('id', '=', $request->producto_id) 
            ->update(['nombre' => $request->product_compra_id]);

        $compras = Compras::where('id', '=', $request->compra_id)->get();

        $detallecompra = DetalleCompras::where('id', '=', $id)->get(); 

        $totaldisminucion = ($detallecompra[0]->iva*($detallecompra[0]->precio * $detallecompra[0]->cantidad))+($detallecompra[0]->precio * $detallecompra[0]->cantidad);

        $disminucion = Compras::where('id', '=', $request->compra_id) 
            ->update(['costo_total' => $compras[0]->costo_total - $totaldisminucion]);


        $detalle = DetalleCompras::where('id', '=', $id) 
            ->update([
                'precio' => $request->precio,
                'cantidad' => $request->cantidad,
                'unidad' => $request->unidad,
                'iva' => $request->iva]);

        $totalcompra = ($request->iva*($request->precio * $request->cantidad))+($request->precio * $request->cantidad);

        $comprasproducto = Compras::where('id', '=', $request->compra_id)->get();

        $aumnetocompra = Compras::where('id', '=', $request->compra_id) 
            ->update(['costo_total' => $comprasproducto[0]->costo_total + $totalcompra]);       

        alert()->success('La compra se ha sido modificado.', 'Compra modificada');     
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detallecompras = DetalleCompras::where('id', '=', $id)->get();

        $compras = Compras::where('id', '=', $detallecompras[0]->compra_id)->get();

        $totaldescuento = ($detallecompras[0]->precio * $detallecompras[0]->cantidad+($detallecompras[0]->precio * $detallecompras[0]->cantidad)*$detallecompras[0]->iva);

        $presupuestos = Compras::where('id', '=', $detallecompras[0]->compra_id ) 
            ->update(['costo_total' => $compras[0]->costo_total - $totaldescuento]); 


        $detalle = DetalleCompras::where('id', '=', $id);
        $deleted = $detalle->delete();
        alert()->success('message', 'El producto se ha eliminado correctamente de la compra!');
        return back();
    }
}
