<?php

namespace App\Http\Controllers\Almacenista;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Compras;
use App\Presupuesto;
use DataTables;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $prespstorzda = Presupuesto::where('estatus_presupuesto', 1)->get();
        $prespstoaut = Presupuesto::where('estatus_presupuesto', 2)->get();
        $prespstorech = Presupuesto::where('estatus_presupuesto', 4)->get();
       
        return view('almacenista.presupuestos.index', compact('prespstorzda','prespstoaut','prespstorech'));    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

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
                    ->make(true);
         } 
    }

    public function editarcompra(Request $request)
    {
        if ($request->ajax()) {
            $data = Compras::where('estatus_compra_id', 3)->get();
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
                    ->make(true);
         } 
    }
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
