<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Presupuesto;
use App\DetallePresupuesto;
use DataTables;

class PresupuestoAdminController extends Controller
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
        $prespstorech = Presupuesto::where('estatus_presupuesto', 4)->get();
       
        return view('admin.presupuestos.index', compact('prespstorzda','prespstoaut','prespstorech'));
    }

     public function presupuestocreados(Request $request)
    {
        if ($request->ajax()) {
            $data = Presupuesto::where('estatus_presupuesto', 1)->get();
             return Datatables::of($data)
                    ->editColumn('estatuspresupuesto', function($estatus)
                          {
                             return $estatus->estatuspresupuesto->nombre;
                          })
                    ->editColumn('user', function($usuario)
                          {
                             return $usuario->user->name;
                          })
                    ->addIndexColumn()
                    ->addColumn('btn', 'admin.presupuestos.opciones')
                    ->rawColumns(['btn'])
                    ->make(true);
         } 
    }

    public function presupuestoautorizado(Request $request)
    {
        if ($request->ajax()) {
            $data = Presupuesto::where('estatus_presupuesto', 2)->get();
             return Datatables::of($data)
                    ->editColumn('estatuspresupuesto', function($estatus)
                          {
                             return $estatus->estatuspresupuesto->nombre;
                          })
                    ->editColumn('user', function($usuario)
                          {
                             return $usuario->user->name;
                          })
                    ->addIndexColumn()
                    ->addColumn('btn', 'admin.presupuestos.opciones')
                    ->rawColumns(['btn'])
                    ->make(true);
         } 
    }

     public function presupuestorechazados(Request $request)
    {
        if ($request->ajax()) {
            $data = Presupuesto::where('estatus_presupuesto', 4)->get();
             return Datatables::of($data)
                    ->editColumn('estatuspresupuesto', function($estatus)
                          {
                             return $estatus->estatuspresupuesto->nombre;
                          })
                    ->editColumn('user', function($usuario)
                          {
                             return $usuario->user->name;
                          })
                    ->addIndexColumn()
                    ->addColumn('btn', 'admin.presupuestos.opciones')
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
        $presupuesto = Presupuesto::find($id);
        $details = DetallePresupuesto::where('presupuesto_id', $id)->get();
       return view('admin.presupuestos.mostrar', compact('presupuesto','details'));
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
