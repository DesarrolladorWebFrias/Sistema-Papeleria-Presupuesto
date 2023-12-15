<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categorias;
use App\SubCategorias;

class SubCategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categorias::all();
        $subcategoria = SubCategorias::all();
        return view('admin.subcategorias.index', compact('categorias','subcategoria'));
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
          $this->validate($request, [
                'nombre' => 'required',
                'categorias_id' => 'required'
            ]
        );
       $area = SubCategorias::create([
            'nombre' => $request->get('nombre'),
            'categorias_id' => $request->get('categorias_id'),

        ]);

        alert()->success('La subcategoria ha sido creado correctamente.', 'Subcategoria creada');
        return redirect()->route('subcategorias.index');
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
            'categorias_id' => 'required'
        ]);
        $subcategorias = SubCategorias::find($id)->update($request->except(['_method', '_token']));
        alert()->success('La subcategoria ha sido actualizada correctamente.', 'Subcategoria actualizada');
        return redirect()->route('subcategorias.index');
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
