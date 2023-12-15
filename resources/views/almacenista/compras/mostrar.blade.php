@extends('layouts/app')
@section('title', 'Ver compra')
@section('content')
<div>
    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
    <h2 class="font-medium text-base mr-auto">
       Descripcion de la compras: {{$compras->descripcion}}
    </h2>
</div>

<div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
    <div class="col-span-12 sm:col-span-12">
    </div>
    <div class="rounded-md flex items-center col-span-12 px-5 py-3 mb-2 bg-theme-5 text-gray-700"> <i data-feather="user" class="w-6 h-6 mr-2"></i> Datos del producto </div>
    <div class="col-span-12 sm:col-span-12">
    </div>
    <div class="col-span-12 sm:col-span-3 @if ($errors->has('descripcion')) has-error @endif">
        <label class="font-medium text-base mr-auto" for="descripcion">Descripción:</label>
        <input type="text" class="input w-full border mt-2 flex-1" value="{{$compras->descripcion}}" aria-describedby="helpDescripcion" disabled>
        <span id="helpDescripcion" class="help-block">
            @if ($errors->has('descripcion'))
                @foreach($errors->get('descripcion') as $message)
                    @if(!$loop->first) / @endif
                    {{ $message }}
                @endforeach
            @endif
        </span>
    </div>
    <div class="col-span-12 sm:col-span-3 @if ($errors->has('costo_total')) has-error @endif">
        <label class="font-medium text-base mr-auto" for="costo_total">Total:</label>
        <input type="text" class="input w-full border mt-2 flex-1" value="$ {{ number_format($compras->costo_total, 2)}}" aria-describedby="helpTotal" disabled>
        <span id="helpTotal" class="help-block">
            @if ($errors->has('costo_total'))
                @foreach($errors->get('costo_total') as $message)
                    @if(!$loop->first) / @endif
                    {{ $message }}
                @endforeach
            @endif
        </span>
    </div>
    <div class="col-span-12 sm:col-span-3 @if ($errors->has('fechacompras')) has-error @endif">
        <label class="font-medium text-base mr-auto" for="fechacompras">Fecha de compras:</label>
        <input type="text" class="input w-full border mt-2 flex-1" value="{{$compras->fechacompras}}" aria-describedby="helpFecha" disabled>
        <span id="helpFecha" class="help-block">
            @if ($errors->has('fechacompras'))
                @foreach($errors->get('fechacompras') as $message)
                    @if(!$loop->first) / @endif
                    {{ $message }}
                @endforeach
            @endif
        </span>
    </div>
    <div class="col-span-12 sm:col-span-3 @if ($errors->has('formadepago')) has-error @endif">
        <label class="font-medium text-base mr-auto" for="formadepago">Forma de pago:</label>
        <input type="text" class="input w-full border mt-2 flex-1" value="{{$compras->formadepago}}" aria-describedby="helpFormadepago" disabled>
        <span id="helpFormadepago" class="help-block">
            @if ($errors->has('formadepago'))
                @foreach($errors->get('formadepago') as $message)
                    @if(!$loop->first) / @endif
                    {{ $message }}
                @endforeach
            @endif
        </span>
    </div>
     <div class="col-span-12 sm:col-span-12">
    </div>
    <div class="col-span-12 sm:col-span-4 @if ($errors->has('comprasuser')) has-error @endif">
        <label class="font-medium text-base mr-auto" for="comprasuser">Usuario que solicito:</label>
        <input type="text" class="input w-full border mt-2 flex-1" value="{{$compras->user->name}} {{$compras->user->ap_paterno}} {{$compras->user->ap_materno}}" aria-describedby="helpComprasUserName" disabled>
        <span id="helpComprasUserName" class="help-block">
            @if ($errors->has('comprasuser'))
                @foreach($errors->get('comprasuser') as $message)
                    @if(!$loop->first) / @endif
                    {{ $message }}
                @endforeach
            @endif
        </span>
    </div>
    <div class="col-span-12 sm:col-span-4 @if ($errors->has('comprasuserrol')) has-error @endif">
        <label class="font-medium text-base mr-auto" for="comprasuserrol">Rol:</label>
        <input type="text" class="input w-full border mt-2 flex-1" value="{{$compras->user->role->nombre}}" aria-describedby="helpUserRol" disabled>
        <span id="helpUserRol" class="help-block">
            @if ($errors->has('comprasuserrol'))
                @foreach($errors->get('comprasuserrol') as $message)
                    @if(!$loop->first) / @endif
                    {{ $message }}
                @endforeach
            @endif
        </span>
    </div>
    <div class="col-span-12 sm:col-span-2 @if ($errors->has('usertelefono')) has-error @endif">
        <label class="font-medium text-base mr-auto" for="usertelefono">Telefono:</label>
        <input type="text" class="input w-full border mt-2 flex-1" value="{{$compras->user->telefono}}" aria-describedby="helpUsertelefono" disabled>
        <span id="helpUsertelefono" class="help-block">
            @if ($errors->has('usertelefono'))
                @foreach($errors->get('usertelefono') as $message)
                    @if(!$loop->first) / @endif
                    {{ $message }}
                @endforeach
            @endif
        </span>
    </div>
    <div class="col-span-12 sm:col-span-2 @if ($errors->has('usercorreo')) has-error @endif">
        <label class="font-medium text-base mr-auto" for="usercorreo">Correo:</label>
        <input type="text" class="input w-full border mt-2 flex-1" value="{{$compras->user->email}}" aria-describedby="helpUsercorreo" disabled>
        <span id="helpUsercorreo" class="help-block">
            @if ($errors->has('usercorreo'))
                @foreach($errors->get('usercorreo') as $message)
                    @if(!$loop->first) / @endif
                    {{ $message }}
                @endforeach
            @endif
        </span>
    </div>
    <div class="col-span-12 sm:col-span-12">
    </div>
     <div class="rounded-md flex items-center col-span-12 px-5 py-3 mb-2 bg-theme-5 text-gray-700"> <i data-feather="user" class="w-6 h-6 mr-2"></i> Datos del proveedor </div>
    <div class="col-span-12 sm:col-span-12">
    </div>
    <div class="col-span-12 sm:col-span-4 @if ($errors->has('nombreproveedor')) has-error @endif">
        <label class="font-medium text-base mr-auto" for="nombreproveedor">Nombre del proveedor:</label>
        <input type="text" class="input w-full border mt-2 flex-1" value="{{$compras->proveedor->nombre}}" aria-describedby="helpProveedor" disabled>
        <span id="helpProveedor" class="help-block">
            @if ($errors->has('nombreproveedor'))
                @foreach($errors->get('nombreproveedor') as $message)
                    @if(!$loop->first) / @endif
                    {{ $message }}
                @endforeach
            @endif
        </span>
    </div>
    <div class="col-span-12 sm:col-span-4 @if ($errors->has('telefono')) has-error @endif">
        <label class="font-medium text-base mr-auto" for="telefono">Telefono:</label>
        <input type="text" class="input w-full border mt-2 flex-1" value="{{$compras->proveedor->telefono}}" aria-describedby="helpProveedorTelefono" disabled>
        <span id="helpProveedorTelefono" class="help-block">
            @if ($errors->has('telefono'))
                @foreach($errors->get('telefono') as $message)
                    @if(!$loop->first) / @endif
                    {{ $message }}
                @endforeach
            @endif
        </span>
    </div>
    <div class="col-span-12 sm:col-span-4 @if ($errors->has('direccion')) has-error @endif">
        <label class="font-medium text-base mr-auto" for="direccion">Dirección:</label>
        <input type="text" class="input w-full border mt-2 flex-1" value="{{$compras->proveedor->direccion}}" aria-describedby="helpProveedorDireccion" disabled>
        <span id="helpProveedorDireccion" class="help-block">
            @if ($errors->has('direccion'))
                @foreach($errors->get('direccion') as $message)
                    @if(!$loop->first) / @endif
                    {{ $message }}
                @endforeach
            @endif
        </span>
    </div>
    <div class="col-span-12 sm:col-span-12">
    </div>
    <div class="rounded-md flex items-center col-span-12 px-5 py-3 mb-2 bg-theme-5 text-gray-700"> <i data-feather="shopping-cart" class="w-6 h-6 mr-2"></i> Movimiento del producto </div>

    <div class="col-span-12 sm:col-span-12">
    </div>
    <div class="col-span-12 sm:col-span-12">
        <div class="overflow-x-auto">
            <table class="table" id="details">
                <thead>
                     <tr class="bg-gray-700 text-white" >
                         <th class="border-b-2 whitespace-no-wrap">Opciones</th>
                         <th class="border-b-2 whitespace-no-wrap">Fecha de creacion</th>
                         <th class="border-b-2 whitespace-no-wrap">Clave</th>
                         <th class="border-b-2 whitespace-no-wrap">Producto</th>
                         <th class="border-b-2 whitespace-no-wrap">Categoria</th>
                         <th class="border-b-2 whitespace-no-wrap">Subcategoria</th>
                         <th class="border-b-2 whitespace-no-wrap">Precio</th>
                         <th class="border-b-2 whitespace-no-wrap">Cantidad</th>
                         <th class="border-b-2 whitespace-no-wrap">Subtotal</th>
                         <th class="border-b-2 whitespace-no-wrap">Iva</th>
                         <th class="border-b-2 whitespace-no-wrap">Total</th>
                     </tr>
                 </thead>
                 <tfoot>
                    <th colspan="9"></th>
                    <th>Total Final</th>
                    <th><strong>$ {{ number_format($compras->costo_total, 2)}}</strong></th>
                </tfoot>
                 <tbody>
                    @foreach($details as $detail)
                        <tr>
                            @if($compras->estatus_compra_id == 1)
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3" href="javascript:;" data-toggle="modal" data-target="#edit-compras{{$detail->id}}" value="{{$detail->id}}"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar </a>
                                     <form action="{{action('Almacenista\ComprasController@destroy', $detail->id)}}" method="post">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button onClick="return confirm('desea eliminar el producto?')" class="flex items-center text-theme-6" title="Eliminar materia"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i>Eliminar </button>
                                    </form> 

                                </div>
                                 @include('almacenista.compras.edit')
                            </td>
                            @else
                                <td>{{ $detail->id}}</td>
                            @endif
                            <td class="text-center border-b">{{ $detail->created_at}}</td>
                            <td class="text-center border-b">{{ $detail->productos->clave}}</td>
                            <td class="text-center border-b">{{ $detail->productos->nombre}}</td>
                            <td class="text-center border-b">{{ $detail->subcategorias->categorias->nombre}}</td>
                            <td class="text-center border-b">{{ $detail->subcategorias->nombre}}</td>
                            <td class="text-center border-b">{{ number_format($detail->precio, 2)}}</td>
                            <td class="text-center border-b">{{ number_format($detail->cantidad, 2)}}</td>
                            <td class="text-center border-b">{{ number_format($detail->precio * $detail->cantidad, 2)}}</td>
                            <td class="text-center border-b">{{ number_format($detail->iva, 2)}}</td>
                            <td class="text-center border-b">{{ number_format(($detail->iva*($detail->precio * $detail->cantidad))+($detail->precio * $detail->cantidad), 2)}}</td>
                        </tr>
                    @endforeach
                 </tbody>
             </table>
        </div> 
    </div>
    <div class="col-span-12 sm:col-span-4">  
</div>
@endsection