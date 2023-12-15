<?php

namespace App\Http\Controllers\Almacenista;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Presupuesto;
use App\DetalleVales;
use App\DetallePresupuesto;
use App\Vales;
use DataTables;

class ValesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $velesrealizados = Vales::where('estatus', 'espera de entrega')->get();
        $velesentregados = Vales::where('estatus', 'entregado')->get();

        return view('almacenista.vales.index', compact('velesrealizados','velesentregados'));
    }

    public function valesrealizados(Request $request)
    {
        if ($request->ajax()) {
            $data = Vales::where('estatus', 'espera de entrega')->get();
             return Datatables::of($data)
                    ->editColumn('presupuesto', function($presupuestos)
                          {
                             return $presupuestos->presupuesto->descripcion;
                          })
                    ->editColumn('usuario', function($user)
                          {
                             return $user->usuario->name;
                          })
                    ->addIndexColumn()
                    ->addColumn('btn', 'almacenista.vales.opciones')
                    ->rawColumns(['btn'])
                    ->make(true);
         } 
    }

    public function valesentregado(Request $request)
    {
        if ($request->ajax()) {
            $data = Vales::where('estatus', 'entregado')->get();
             return Datatables::of($data)
                    ->editColumn('presupuesto', function($presupuestos)
                          {
                             return $presupuestos->presupuesto->descripcion;
                          })
                    ->editColumn('usuario', function($user)
                          {
                             return $user->usuario->name;
                          })
                    ->addIndexColumn()
                    ->addColumn('btn', 'almacenista.vales.opciones')
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
        $vales = Vales::find($id);
        $details = DetalleVales::where('vale_id', $id)->get();
        $detallepresupuesto= DetallePresupuesto::where('presupuesto_id', $vales->presupuesto_id)->get();
       return view('almacenista.vales.mostrar', compact('vales','details','detallepresupuesto'));
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

    public function estatus($id, $estatus)
    {
        if ($estatus == 2) {
            $vales = Vales::where('id', '=', $id) 
                ->update(['estatus' => 'entregado']);  
        } else {
            # code...
        }
        
        //sending notifications, emails, broadcasting.
        alert()->success('El vale se ha modificado.', 'Vale entregado'); 
        
        $velesrealizados = Vales::where('estatus', 'espera de entrega')->get();
        $velesentregados = Vales::where('estatus', 'entregado')->get();

        return view('almacenista.vales.index', compact('velesrealizados','velesentregados'));
    }
}
