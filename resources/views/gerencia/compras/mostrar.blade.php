@extends('layouts/app')
@section('title', 'Compras')
@section('content')
<div>
    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
    <h2 class="font-medium text-base mr-auto">
       Crear nueva compra
    </h2>
</div>
<div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
	<div class="rounded-md flex items-center col-span-12 px-5 py-3 mb-2 bg-theme-5 text-gray-700"> <i data-feather="briefcase" class="w-6 h-6 mr-2"></i> Datos del proveedor: </div>
    <div class="col-span-12 sm:col-span-4 @if ($errors->has('nombre')) has-error @endif">
        <label class="font-medium text-base mr-auto">Nombre del Proveedor</label>
        <input type="text" class="input w-full border mt-2 flex-1" aria-describedby="helpTelefono" value="{{$compras->proveedor->nombre}}" disabled>
    </div>
    <div class="col-span-12 sm:col-span-4 @if ($errors->has('telefono')) has-error @endif">
        <label class="font-medium text-base mr-auto">Telefono:</label>
         <input type="number" class="input w-full border mt-2 flex-1" value="{{$compras->proveedor->telefono}}" aria-describedby="helpTelefono" disabled>
         
    </div>
    <div class="col-span-12 sm:col-span-4 @if ($errors->has('direccion')) has-error @endif">
        <label class="font-medium text-base mr-auto">Direccion:</label>
         <input type="text" class="input w-full border mt-2 flex-1" value="{{$compras->proveedor->direccion}}" aria-describedby="helpDireccion" disabled>
         <span id="helpDireccion" class="help-block">
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
    <div class="rounded-md flex items-center col-span-12 px-5 py-3 mb-2 bg-theme-5 text-gray-700"> <i data-feather="user" class="w-6 h-6 mr-2"></i> Datos del solicitante </div>
    <div class="col-span-12 sm:col-span-12">
    </div>
    <div class="col-span-12 sm:col-span-3 @if ($errors->has('user_id')) has-error @endif">
        <label class="font-medium text-base mr-auto" for="user_id">Nombre Completo:</label>
        <input type="text" class="input w-full border mt-2 flex-1" value="{{$compras->user->name}} {{$compras->user->ap_paterno}} {{$compras->user->ap_materno}}" aria-describedby="helpUser" disabled>
        <span id="helpUser" class="help-block">
            @if ($errors->has('user_id'))
                @foreach($errors->get('user_id') as $message)
                    @if(!$loop->first) / @endif
                    {{ $message }}
                @endforeach
            @endif
        </span>
    </div>
    <div class="col-span-12 sm:col-span-3 @if ($errors->has('user_telefono')) has-error @endif">
        <label class="font-medium text-base mr-auto" for="user_telefono">Telefono:</label>
        <input type="text" class="input w-full border mt-2 flex-1" value="{{$compras->user->telefono}}" aria-describedby="helpUserTelefono" disabled>
        <span id="helpUserTelefono" class="help-block">
            @if ($errors->has('user_telefono'))
                @foreach($errors->get('user_telefono') as $message)
                    @if(!$loop->first) / @endif
                    {{ $message }}
                @endforeach
            @endif
        </span>
    </div>
    <div class="col-span-12 sm:col-span-3 @if ($errors->has('user_email')) has-error @endif">
        <label class="font-medium text-base mr-auto" for="user_email">Correo:</label>
        <input type="text" class="input w-full border mt-2 flex-1" value="{{$compras->user->email}}" aria-describedby="helpUserEmail" disabled>
        <span id="helpUserEmail" class="help-block">
            @if ($errors->has('user_email'))
                @foreach($errors->get('user_email') as $message)
                    @if(!$loop->first) / @endif
                    {{ $message }}
                @endforeach
            @endif
        </span>
    </div>
    <div class="col-span-12 sm:col-span-3 @if ($errors->has('user_rol')) has-error @endif">
        <label class="font-medium text-base mr-auto" for="user_rol">Rol:</label>
        <input type="text" class="input w-full border mt-2 flex-1" value="{{$compras->user->role->nombre}}" aria-describedby="helpUserRol" disabled>
        <span id="helpUserRol" class="help-block">
            @if ($errors->has('user_rol'))
                @foreach($errors->get('user_rol') as $message)
                    @if(!$loop->first) / @endif
                    {{ $message }}
                @endforeach
            @endif
        </span>
    </div>
     <div class="col-span-12 sm:col-span-12">
    </div>
    <div class="col-span-12 sm:col-span-3 @if ($errors->has('user_rol')) has-error @endif">
        <label class="font-medium text-base mr-auto" for="user_rol">Empresa:</label>
        <input type="text" class="input w-full border mt-2 flex-1" value="{{$compras->user->subarea->area->empresa->nombre}}" aria-describedby="helpUserRol" disabled>
        <span id="helpUserRol" class="help-block">
            @if ($errors->has('user_rol'))
                @foreach($errors->get('user_rol') as $message)
                    @if(!$loop->first) / @endif
                    {{ $message }}
                @endforeach
            @endif
        </span>
    </div>
    <div class="col-span-12 sm:col-span-3 @if ($errors->has('user_rol')) has-error @endif">
        <label class="font-medium text-base mr-auto" for="user_rol">Area:</label>
        <input type="text" class="input w-full border mt-2 flex-1" value="{{$compras->user->subarea->area->nombre}}" aria-describedby="helpUserRol" disabled>
        <span id="helpUserRol" class="help-block">
            @if ($errors->has('user_rol'))
                @foreach($errors->get('user_rol') as $message)
                    @if(!$loop->first) / @endif
                    {{ $message }}
                @endforeach
            @endif
        </span>
    </div>
    <div class="col-span-12 sm:col-span-3 @if ($errors->has('user_rol')) has-error @endif">
        <label class="font-medium text-base mr-auto" for="user_rol">Subarea:</label>
        <input type="text" class="input w-full border mt-2 flex-1" value="{{$compras->user->subarea->nombre}}" aria-describedby="helpUserRol" disabled>
        <span id="helpUserRol" class="help-block">
            @if ($errors->has('user_rol'))
                @foreach($errors->get('user_rol') as $message)
                    @if(!$loop->first) / @endif
                    {{ $message }}
                @endforeach
            @endif
        </span>
    </div>
    <div class="col-span-12 sm:col-span-3 @if ($errors->has('user_direccion')) has-error @endif">
        <label class="font-medium text-base mr-auto" for="user_direccion">Direccion:</label>
        <input type="text" class="input w-full border mt-2 flex-1" value="{{$compras->user->direccion}}" aria-describedby="helpUserDireccion" disabled>
         <span id="helpUserDireccion" class="help-block">
            @if ($errors->has('user_direccion'))
                @foreach($errors->get('user_direccion') as $message)
                    @if(!$loop->first) / @endif
                    {{ $message }}
                @endforeach
            @endif
        </span>
    </div>

    <div class="col-span-12 sm:col-span-12">
    </div>
    <div class="rounded-md flex items-center col-span-12 px-5 py-3 mb-2 bg-theme-5 text-gray-700"> <i data-feather="shopping-cart" class="w-6 h-6 mr-2"></i> Datos de la compra </div>

    <div class="col-span-12 sm:col-span-6 @if ($errors->has('nombre')) has-error @endif">
        <label class="font-medium text-base mr-auto">Descripcion de la compra:</label>
        <input type="text" class="input w-full border mt-2 flex-1" value="{{$compras->descripcion}}" aria-describedby="helpUserDireccion" disabled>
         <span id="helpUserDireccion" class="help-block">
            @if ($errors->has('user_direccion'))
                @foreach($errors->get('user_direccion') as $message)
                    @if(!$loop->first) / @endif
                    {{ $message }}
                @endforeach
            @endif
        </span>
    </div>
    <div class="col-span-12 sm:col-span-2 @if ($errors->has('nombre')) has-error @endif">
        <label class="font-medium text-base mr-auto">Fecha para realizar la compra:</label>
        <input type="text" class="input w-full border mt-2 flex-1" value="{{$compras->fechacompras}}" aria-describedby="helpUserDireccion" disabled>
         <span id="helpUserDireccion" class="help-block">
            @if ($errors->has('user_direccion'))
                @foreach($errors->get('user_direccion') as $message)
                    @if(!$loop->first) / @endif
                    {{ $message }}
                @endforeach
            @endif
        </span>
    </div>
    <div class="col-span-12 sm:col-span-2 @if ($errors->has('nombre')) has-error @endif">
        <label class="font-medium text-base mr-auto">Forma de pago</label>
        <input type="text" class="input w-full border mt-2 flex-1" value="{{$compras->formadepago}}" aria-describedby="helpUserDireccion" disabled>
         <span id="helpUserDireccion" class="help-block">
            @if ($errors->has('user_direccion'))
                @foreach($errors->get('user_direccion') as $message)
                    @if(!$loop->first) / @endif
                    {{ $message }}
                @endforeach
            @endif
        </span>
    </div>
    <div class="col-span-12 sm:col-span-2 @if ($errors->has('nombre')) has-error @endif">
        <label class="font-medium text-base mr-auto">Estatus</label>
        <input type="text" class="input w-full border mt-2 flex-1" value="{{$compras->estatuscompras->nombre}}" aria-describedby="helpUserDireccion" disabled>
         <span id="helpUserDireccion" class="help-block">
            @if ($errors->has('user_direccion'))
                @foreach($errors->get('user_direccion') as $message)
                    @if(!$loop->first) / @endif
                    {{ $message }}
                @endforeach
            @endif
        </span>
    </div>
    <div class="col-span-12 sm:col-span-12">
    </div>
    <br>
    <div class="col-span-12 sm:col-span-12">
	    <div class="overflow-x-auto">
		    <table class="table" id="details">
		        <thead>
		             <tr class="bg-gray-700 text-center text-white">
                         <th class="border-b-2 whitespace-no-wrap">Opciones</th>
                         <th class="border-b-2 whitespace-no-wrap">Fecha de creacion</th>
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
					<th colspan="8"></th>
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
                                     <form action="{{action('Gerencia\ComprasAutorizarController@destroy', $detail->id)}}" method="post">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button onClick="return confirm('desea eliminar el producto?')" class="flex items-center text-theme-6" title="Eliminar materia"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i>Eliminar </button>
                                    </form> 
                                </div>
                                @include('gerencia.compras.edit') 
                            </td>
                            @else
                                <td>{{ $detail->id}}</td>
                            @endif
                            <td class="text-center border-b">{{ $detail->created_at}}</td>
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

<div class="col-span-12 sm:col-span-6">  
</div>
<div class="col-span-12 sm:col-span-2">  
    <a href="/gerencia/comprasautorizar" class="button w-32 mr-2 mb-2 flex items-center justify-center border text-gray-700"> <i data-feather="hard-drive" class="w-4 h-4 mr-2"></i> Regresar</a> 
</div>
@if($compras->estatuscompras->id == '1')
    <div class="col-span-12 sm:col-span-2">
        <a href="/gerencia/comprasautorizar/{{$compras->id}}/2" class="button w-32 mr-2 mb-2 flex items-center justify-center bg-theme-1 text-white"> <i data-feather="activity" class="w-4 h-4 mr-2"></i> Autorizar</a> 
    </div>
    <div class="col-span-12 sm:col-span-2">
        <a href="/gerencia/comprasautorizar/{{$compras->id}}/4" class="button w-32 mr-2 mb-2 flex items-center justify-center bg-theme-6 text-white"> <i data-feather="trash" class="w-4 h-4 mr-2"></i> Rechazar</a> 
    </div>
@endif
</div>
@endsection