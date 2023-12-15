<?php

namespace App\Http\Controllers\Almacenista;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Productos;
use App\Categorias;
use App\SubCategorias;
use App\Movimientos;
use DataTables;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categorias::all();
        return view('almacenista.inventarios.index', compact('categorias'));
    }

    public function productos(Request $request)
    {
         if ($request->ajax()) {
            $data = Productos::where('estatus_id', 1)->get();
             return Datatables::of($data)
                    ->editColumn('subcategorias', function($categorias)
                          {
                             return $categorias->subcategorias->nombre;
                          })
                    ->editColumn('categorias', function($categorias)
                          {
                             return $categorias->subcategorias->categorias->nombre;
                          })                    
                    ->addIndexColumn()
                    ->addColumn('btn', 'almacenista.inventarios.opciones')
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
        $this->validate($request, [
                'clave' => 'required',
                'nombre' => 'required',
                'precio' => 'required',
                'cantidad' => 'required',
                'medida' => 'required',
                'subcategoria_id' => 'required'
            ]
        );
       $productos = Productos::create($request->all());

         $movimiento = Movimientos::create([
            'tipo_movimiento_id' => 1,
            'cantidad' => $request->get('cantidad'),
            'total' => ($request->precio * $request->cantidad) + (($request->precio * $request->cantidad) * $request->iva),
            'productos_id' => $productos->id,
            'area_id' => auth()->user()->subarea_id,
            'user_id' => auth()->user()->id,
        ]);

        alert()->success('El producto ha sido agregado correctamente.', 'Producto agregado');
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
        $productos = Productos::find($id);
         $details = Movimientos::where('productos_id', $id)->get();
       return view('almacenista.inventarios.mostrar', compact('productos','details'));        
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
            'clave' => 'required',
            'nombre' => 'required',
            'precio' => 'required',
            'iva' => 'required',
            'medida' => 'required',
            'subcategoria_id' => 'required',
        ]);
        
        $productoscantidad = Productos::where('id', '=', $id)->get();
        $productos = Productos::find($id)->update($request->except(['_method', '_token']));
        if ($request->movimiento == null) {
            # code...
        } else {
           if ($request->movimiento == '1') {
                $productoactual = Productos::where('id', '=', $id) 
                ->update(['cantidad' => $productoscantidad[0]->cantidad + $request->cantidadmovimiento]);  
            } elseif ($request->movimiento == '4') {
                $productoactual = Productos::where('id', '=', $id) 
                ->update(['cantidad' => $productoscantidad[0]->cantidad - $request->cantidadmovimiento]);
             } else{
                $productoactual = Productos::where('id', '=', $id) 
                ->update(['cantidad' => $request->cantidadmovimiento]);
            }

            $movimiento = Movimientos::create([
                'tipo_movimiento_id' => $request->movimiento,
                'cantidad' => $request->cantidadmovimiento,
                'total' => ($productoscantidad[0]->precio * $request->cantidadmovimiento) + (($productoscantidad[0]->precio * $request->cantidadmovimiento) * $productoscantidad[0]->iva),
                'productos_id' => $id,
                'area_id' => auth()->user()->subarea_id,
                'user_id' => auth()->user()->id,
            ]);
        }
        alert()->success('El producto ha sido modificado correctamente.', 'Producto modificado');
        return redirect()->back();
        
        
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
