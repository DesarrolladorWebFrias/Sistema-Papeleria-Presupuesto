<?php

namespace App\Http\Controllers\Gerencia;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Proveedores;
use DataTables;

class ProveedoresGerenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       if ($request->ajax()) {
            $data = Proveedores::all();
             return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('btn', 'gerencia.proveedores.opciones')
                    ->rawColumns(['btn'])
                    ->toJson();
         } 
        return view('gerencia.proveedores.index');
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
         $this->validate($request,[
            'nombre' => 'required',
            'telefono' => 'required',
            'direccion' => 'required'
        ]);

        Proveedores::create($request->all());
        alert()->success('El proveedor ha sido agregado correctamente.', 'Proveedor agregado');
         return redirect()->route('proveedorgerencia.index');
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
        $this->validate($request,[
             'nombre' => 'required',
            'telefono' => 'required',
            'direccion' => 'required'
        ]);
        $proveedor = Proveedores::find($id)->update($request->except(['_method', '_token']));
        alert()->success('El proveedor ha sido actualizado correctamente.', 'Proveedor actualizada');
        return redirect()->route('proveedorgerencia.index');
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
