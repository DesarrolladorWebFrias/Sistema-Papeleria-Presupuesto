<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Empresa;
use DataTables;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Empresa::all();
             return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('btn', 'admin.empresas.opciones')
                    ->rawColumns(['btn'])
                    ->toJson();
         } 
        return view('admin.empresas.index');
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
            'rfc' => 'required',
            'direccion' => 'required'
        ]);

        Empresa::create($request->all());
        alert()->success('La empresa ha sido agregada correctamente.', 'Empresa agregada');
        return redirect()->back();
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
            'rfc' => 'required',
            'direccion' => 'required'
        ]);
        $empresa = Empresa::find($id)->update($request->except(['_method', '_token']));
        alert()->success('la empresa ha sido actualizado correctamente.', 'Empresa actualizada');
        return redirect()->route('empresa.index');
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
