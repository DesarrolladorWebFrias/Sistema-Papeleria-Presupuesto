<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SubAreas;
use App\Area;

class SubAreasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Area::all();
        $subareas = SubAreas::all();
        return view('admin.subareas.index', compact('areas','subareas'));
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
                'clave' => 'required|unique:sub_areas',
                'nombre' => 'required',
                'area_id' => 'required'
            ]
        );
       $area = SubAreas::create([
            'clave' => $request->get('clave'),
            'nombre' => $request->get('nombre'),
            'area_id' => $request->get('area_id'),
        ]);

        alert()->success('La subárea ha sido creado correctamente.', 'Subárea creada');
        return redirect()->route('subareas.index');
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
            'area_id' => 'required',
             'clave' => 'required|unique:sub_areas'
        ]);
        $subareas = SubAreas::find($id)->update($request->except(['_method', '_token']));
        alert()->success('La subárea ha sido actualizada correctamente.', 'Subárea  actualizada');
        return redirect()->route('subareas.index');
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
