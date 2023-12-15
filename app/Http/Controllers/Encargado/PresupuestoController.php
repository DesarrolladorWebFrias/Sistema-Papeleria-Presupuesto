<?php

namespace App\Http\Controllers\Encargado;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Productos;
use App\Presupuesto;
use App\DetallePresupuesto;
use App\User;
use App\Vales;
use App\DetalleVales;
use DB;

class PresupuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productoscompras = Productos::where('estatus_id', 1)->where('cantidad','!=', 0)->get();
        return view('encargado.presupuesto.index',compact('productoscompras'));
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
        $now = new \DateTime();
        $año = $now->format('Y');

         try {
            DB::beginTransaction();
            $id = auth()->user()->id;
            $user = User::findOrFail($id);
            $presupuesto = new Presupuesto($request->all());
            $presupuesto->costo_total = $request->total;
            $presupuesto->estatus_presupuesto = 1;
            $presupuesto->periodo = $año;
            $presupuesto->user_id = $user->id;
            //dd($requisition);
            $presupuesto->save();

            $idproduct = $request->get('productos_idcompras');
            $quantity = $request->get('quantity');
            $unity = $request->get('unity');
            $price = $request->get('price');
            $iva = $request->get('iva');
            $payment = $request->get('formadepago');
            $cont = 0;

            while ($cont < count($idproduct)) {
                $details = new DetallePresupuesto();
                $details->producto_id = $idproduct[$cont];
                $details->cantidadrequerida = $quantity[$cont];
                $details->cantidad = $quantity[$cont];
                $details->presupuesto_id = $presupuesto->id;
                $details->save();
                $cont = $cont+1;
            }        
            DB::commit(); 
        alert()->success('La compra ha sido realizada.', 'Compra agregada');         
        } catch (Exception $e) {
            DB::rollback();
        } 
        return redirect()->route('encargado.dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $presupuesto = Presupuesto::find($id);
        $details = DetallePresupuesto::where('presupuesto_id', $id)->get();
       return view('encargado.presupuesto.mostrar', compact('presupuesto','details'));
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

    public function valescreados(Request $request)
    {
        $vale = new Vales();
            $vale->total = $request->total;
            $vale->presupuesto_id = $request->presupuesto_id;
            $vale->estatus = "espera de entrega";
            $vale->user_id = auth()->user()->id;
        $vale->save();
            
        $idproduct = $request->get('productos_idcompras');
        $quantity = $request->get('quantity');
        $unity = $request->get('unity');
        $price = $request->get('price');
        $iva = $request->get('iva');
        $cont = 0;

        while ($cont < count($idproduct)) {
            $detallevale = new DetalleVales();
                $detallevale->precio = $price[$cont];
                $detallevale->cantidad = $quantity[$cont];
                $detallevale->iva = $iva[$cont];
                $detallevale->total = $iva[$cont] + ($price[$cont] * $quantity[$cont]);
                $detallevale->product_id = $idproduct[$cont];
                $detallevale->vale_id = $vale->id;
            $detallevale->save();
            $cont = $cont+1;
        }
        
        $generarvale = DetalleVales::where('vale_id', $vale->id)->get();
        $detallepresupuesto = DetallePresupuesto::where('presupuesto_id', $request->presupuesto_id)->get();
        
        foreach ($detallepresupuesto as $detalle) {
            foreach ($generarvale as $vale) {
               if ($vale->product_id == $detalle->producto_id) {
                    $product = DetallePresupuesto::findOrFail($detalle->producto_id);
                        $product->cantidad = ($detalle->cantidad - $vale->cantidad);
                    $product->save(); 
               } 
            }
        }   
        alert()->success('El vale ha sido realizado.', 'Vale agregado');         
        return back();
    }

    public function pdfvales($id)
    {
            $now = new \DateTime();
            $fecha = $now->format('d-m-Y');
            $detallevales = DetalleVales::where('vale_id', $id)->get();
            $usuario = User::where('role_id', 3)->get();

        $view = \PDF::loadView('Reportes.vales', compact('fecha','detallevales','usuario'));
        return $view->download('Responsable.pdf');
    }
}
