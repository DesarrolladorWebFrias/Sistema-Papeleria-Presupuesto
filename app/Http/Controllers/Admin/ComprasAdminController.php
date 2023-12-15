<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Proveedores;
use App\Productos;
use App\Compras;
use App\Categorias;
use App\User;
use App\DetalleCompras;
use auth;
use DB;
use DataTables;

class ComprasAdminController extends Controller
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
       return view('admin.compras.index',compact('comprarzda','compraaut','comprarech'));
    }

    public function realizadas(Request $request)
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
                    ->addColumn('btn', 'admin.compras.opciones')
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
                    ->addColumn('btn', 'admin.compras.opciones')
                    ->rawColumns(['btn'])
                    ->make(true);
         } 
    }

    public function rechazadas(Request $request)
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
                    ->addColumn('btn', 'admin.compras.opciones')
                    ->rawColumns(['btn'])
                    ->make(true);
         } 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedor = Proveedores::all();
        $productoscompras = Productos::all();
        $categorias = Categorias::all();
       return view('admin.compras.create',compact('proveedor','productoscompras','categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         try {
            DB::beginTransaction();
            $id = auth()->user()->id;
            $user = User::findOrFail($id);
            $compras = new Compras($request->all());
            $compras->estatus_compra_id = 1;
            $compras->proveedor_id = $request->proveedor_id;
            $compras->user_id = $user->id;
            $compras->costo_total = $request->total;
            //dd($requisition);
            $compras->save();

            $idproduct = $request->get('productos_idcompras');
            $subcategoria = $request->get('subcategoria_id');
            $quantity = $request->get('quantity');
            $unity = $request->get('unity');
            $price = $request->get('price');
            $iva = $request->get('iva');
            $payment = $request->get('formadepago');
            $cont = 0;

            while ($cont < count($idproduct)) {
                $details = new DetalleCompras();
                $details->product_compra_id = $idproduct[$cont];
                $details->subcategoria_id = $subcategoria[$cont];
                $details->tipo_pago=$payment;
                $details->cantidad = $quantity[$cont];
                $details->unidad = $unity[$cont];
                $details->iva = $iva[$cont];
                $details->precio = $price[$cont];
                $details->compra_id = $compras->id;
                $details->save();
                $cont = $cont+1;
            }        
            DB::commit(); 
        alert()->success('La compra ha sido realizada.', 'Compra agregada');         
        } catch (Exception $e) {
            DB::rollback();
        } 
        return redirect()->route('admin.dashboard');
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
       return view('admin.compras.mostrar', compact('compras','details','categorias')); 
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
