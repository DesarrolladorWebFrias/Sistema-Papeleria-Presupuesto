<?php

namespace App\Http\Controllers\Gerencia;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Productos;
use App\Presupuesto;
use App\DetallePresupuesto;
use App\Movimientos;

class AutorizarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prespstorzda = Presupuesto::where('estatus_presupuesto', 1)->get();
        $prespstoaut = Presupuesto::where('estatus_presupuesto', 2)->get();
        $prespstoedit = Presupuesto::where('estatus_presupuesto', 3)->get();

        return view('gerencia.presupuesto.index', compact('prespstorzda','prespstoaut','prespstoedit'));
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
        $detallepresupuesto = DetallePresupuesto::where('id', '=', $id)->get();
        $presupuesto = Presupuesto::where('id', '=', $detallepresupuesto[0]->presupuesto_id)->get();
        $productos = Productos::where('id', '=', $detallepresupuesto[0]->producto_id)->get();


        $totaldescuento = ($productos[0]->precio * $detallepresupuesto[0]->cantidad+($productos[0]->precio * $detallepresupuesto[0]->cantidad)*$productos[0]->iva);

        $presupuestos = Presupuesto::where('id', '=', $detallepresupuesto[0]->presupuesto_id) 
            ->update(['costo_total' => $presupuesto[0]->costo_total-$totaldescuento]);   

        $presupustoactual = Presupuesto::where('id', '=', $detallepresupuesto[0]->presupuesto_id)->get();
        $detalle = DetallePresupuesto::findOrFail($id);
            $detalle->fill($request->all());
            $detalle->cantidadrequerida = $request->cantidad;
        $detalle->save();

        $total = (($productos[0]->precio * $detalle->cantidad) + (($productos[0]->precio * $detalle->cantidad)*$productos[0]->iva));        

        $presupuestoactual = Presupuesto::where('id', '=', $detalle->presupuesto_id) 
            ->update(['costo_total' => $presupustoactual[0]->costo_total + $total]);  


         alert()->success('El presupuesto ha sido modificado.', 'Presupuesto modificado');     
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
        $detallepresupuesto = DetallePresupuesto::where('id', '=', $id)->get();
        $presupuesto = Presupuesto::where('id', '=', $detallepresupuesto[0]->presupuesto_id)->get();
        $productos = Productos::where('id', '=', $detallepresupuesto[0]->producto_id)->get();

        $totaldescuento = ($productos[0]->precio * $detallepresupuesto[0]->cantidad+($productos[0]->precio * $detallepresupuesto[0]->cantidad)*$productos[0]->iva);

        $presupuestos = Presupuesto::where('id', '=', $detallepresupuesto[0]->presupuesto_id) 
            ->update(['costo_total' => $presupuesto[0]->costo_total-$totaldescuento]); 


        $detalle = DetallePresupuesto::where('id', '=', $id);
        $deleted = $detalle->delete();
        alert()->success('message', 'Las producto se ha eliminado correctamente del presupuesto!');
        return back();
    }

    public function estatus($id, $estatus)
    {        
        if($estatus == '2') {
            $detallepresupuesto = DetallePresupuesto::where('presupuesto_id', '=', $id)->get();
            $productos = Productos::all();
            foreach ($detallepresupuesto as $detallepresupuest) {
                foreach ($productos as $producto) {
                   if ($producto->id == $detallepresupuest->producto_id) {
                        $product = Productos::findOrFail($detallepresupuest->producto_id);
                            $product->cantidad = ($producto->cantidad - $detallepresupuest->cantidad);
                        $product->save();
                        $movimientos = new Movimientos();
                            $movimientos->tipo_movimiento_id = '2';
                            $movimientos->cantidad = $detallepresupuest->cantidad;
                            $movimientos->total = ($producto->precio * $detallepresupuest->cantidad+($producto->precio * $detallepresupuest->cantidad)*$producto->iva);
                            $movimientos->productos_id = $product->id;
                            $movimientos->presupuesto_id = $detallepresupuest->presupuesto_id;
                            $movimientos->user_id = 1;
                        $movimientos->save(); 
                   }
                }
            }
        }        
        $presupuesto = Presupuesto::findOrFail($id);        
            $presupuesto->estatus_presupuesto = $estatus;
            $presupuesto->autorizo_id = auth()->user()->id;
        $presupuesto->save();
        //sending notifications, emails, broadcasting.
         alert()->success('El presupuesto se ha autorizado.', 'Presupuesto autorizado'); 
         return redirect()->route('gerencia.dashboard');
    }


}
