<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubAreas;
use App\Area;
use App\Proveedores;
use App\Productos;
use App\DetallePresupuesto;
use App\SubCategorias;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function getArea(Request $request, $id)
    {
        if($request->ajax()){
            $subarea = SubAreas::where('area_id', $id)->get();
            return response()->json($subarea);
        };
    }

    public function getSubArea(Request $request, $id)
    {
        if($request->ajax()){
            $empresa = Area::where('empresa_id', $id)->get();
            return response()->json($empresa);
        };
    }

       public function getProviders($id)
    {
        if (request()->ajax()) {
            return Proveedores::findOrFail($id);
        }
        return back();
    }

       public function getProductos($id)
    {
        if (request()->ajax()) {
            //return Productos::findOrFail($id);
            return Productos::select('productos.*','subcategorias.nombre as sub','categorias.nombre as categoria')
                ->join('subcategorias','productos.subcategoria_id','=','subcategorias.id')
                ->join('categorias','subcategorias.categorias_id','=','categorias.id')
                ->where('productos.id',$id)->first();
        }
        return back();
    }

       public function getCategorias($id)
    {
        if (request()->ajax()) {
            $categoria = SubCategorias::where('categorias_id', $id)->get();
            return response()->json($categoria);
        }
        return back();
    }

       public function getProductosTiquets($id, $presupuesto)
    {
        if (request()->ajax()) {
            return DetallePresupuesto::select('detalle_presupuesto.*','productos.nombre','productos.precio','productos.iva')
                    ->join('productos','detalle_presupuesto.producto_id','=','productos.id')
                    ->where('detalle_presupuesto.producto_id', $id)
                    ->where('detalle_presupuesto.presupuesto_id',$presupuesto)->first();   
        }
        return back();
    }
}
