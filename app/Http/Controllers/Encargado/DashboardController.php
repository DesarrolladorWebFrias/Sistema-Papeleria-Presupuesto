<?php

namespace App\Http\Controllers\Encargado;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Presupuesto;
use App\DetallePresupuesto;
use App\Compras;
use App\Vales;
use App\DetalleVales;
use auth;
use DataTables;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prestocreado = Presupuesto::where('estatus_presupuesto', 1)
                        ->where('user_id', auth::user()->id)->get();
        $prestoautrzdo = Presupuesto::where('estatus_presupuesto', 2)
                        ->where('user_id', auth::user()->id)->get();
        $prestorechzds = Presupuesto::where('estatus_presupuesto', 4)
                        ->where('user_id', auth::user()->id)->get();
        return view('encargado.index', compact('prestocreado','prestoautrzdo','prestorechzds'));
    }

    public function prestocreadas(Request $request)
    {
        if ($request->ajax()) {
            $data = Presupuesto::where('estatus_presupuesto', 1)
            ->where('user_id', auth::user()->id)->get();
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
                    ->addColumn('btn', 'encargado.opciones')
                    ->rawColumns(['btn'])
                    ->make(true);
         } 
    }

    public function prsupstoautorizadas(Request $request)
    {
        if ($request->ajax()) {
            $data = Presupuesto::where('estatus_presupuesto', 2)
                    ->where('user_id', auth::user()->id)->get();
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
                    ->addColumn('btn', 'encargado.tiquetsopciones')
                    ->rawColumns(['btn'])
                    ->make(true);
         } 
    }

    public function prsupstorechazados(Request $request)
    {
        if ($request->ajax()) {
            $data = Presupuesto::where('estatus_presupuesto', 4)
                    ->where('user_id', auth::user()->id)->get();
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
                    ->addColumn('btn', 'encargado.tiquetsopciones')
                    ->rawColumns(['btn'])
                    ->make(true);
         } 
    }

    public function tiquet($id)
    {
        $presupuesto = Presupuesto::find($id);
        $details = DetallePresupuesto::where('presupuesto_id', $id)->get();
        $vales = Vales::where('presupuesto_id', $id)->get();

        return view('encargado.presupuesto.tiquets',compact('presupuesto','details','vales'));
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
