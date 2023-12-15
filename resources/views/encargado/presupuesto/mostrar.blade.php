@extends('layouts/app')
@section('title', 'Ver presupuesto')
@section('content')
<div>
    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
    <h2 class="font-medium text-base mr-auto">
       Ver presupuesto
    </h2>
</div>
<div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
    <div class="col-span-12 sm:col-span-12">
    </div>
    <div class="rounded-md flex items-center col-span-12 px-5 py-3 mb-2 bg-theme-5 text-gray-700"> <i data-feather="user" class="w-6 h-6 mr-2"></i> Datos del solicitante </div>
    <div class="col-span-12 sm:col-span-12">
    </div>
    <div class="col-span-12 sm:col-span-3 @if ($errors->has('user_id')) has-error @endif">
        <label class="font-medium text-base mr-auto" for="user_id">Nombre Completo:</label>
        <input type="text" class="input w-full border mt-2 flex-1" value="{{$presupuesto->user->name}} {{$presupuesto->user->ap_paterno}} {{$presupuesto->user->ap_materno}}" aria-describedby="helpUser" disabled>
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
        <input type="text" class="input w-full border mt-2 flex-1" value="{{$presupuesto->user->telefono}}" aria-describedby="helpUserTelefono" disabled>
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
        <input type="text" class="input w-full border mt-2 flex-1" value="{{$presupuesto->user->email}}" aria-describedby="helpUserEmail" disabled>
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
        <input type="text" class="input w-full border mt-2 flex-1" value="{{$presupuesto->user->role->nombre}}" aria-describedby="helpUserRol" disabled>
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
        <input type="text" class="input w-full border mt-2 flex-1" value="{{$presupuesto->user->subarea->area->empresa->nombre}}" aria-describedby="helpUserRol" disabled>
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
        <label class="font-medium text-base mr-auto" for="user_rol">Departamento:</label>
        <input type="text" class="input w-full border mt-2 flex-1" value="{{$presupuesto->user->subarea->area->nombre}}" aria-describedby="helpUserRol" disabled>
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
        <label class="font-medium text-base mr-auto" for="user_rol">Centro de costo:</label>
        <input type="text" class="input w-full border mt-2 flex-1" value="{{$presupuesto->user->subarea->nombre}}" aria-describedby="helpUserRol" disabled>
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
        <input type="text" class="input w-full border mt-2 flex-1" value="{{$presupuesto->user->direccion}}" aria-describedby="helpUserDireccion" disabled>
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
        <input type="text" class="input w-full border mt-2 flex-1" value="{{$presupuesto->descripcion}}" aria-describedby="helpUserDireccion" disabled>
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
        <label class="font-medium text-base mr-auto">Periodo:</label>
        <input type="text" class="input w-full border mt-2 flex-1" value="{{$presupuesto->periodo}}" aria-describedby="helpUserDireccion" disabled>
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
        <input type="text" class="input w-full border mt-2 flex-1" value="{{$presupuesto->estatuspresupuesto->nombre}}" aria-describedby="helpUserDireccion" disabled>
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
		             <tr class="bg-gray-700 text-white" >
		             	
		                 <th class="border-b-2 whitespace-no-wrap">Opciones</th>
		                 <th class="border-b-2 whitespace-no-wrap">Fecha de creacion</th>
                         <th class="border-b-2 whitespace-no-wrap">Clave</th>
		                 <th class="border-b-2 whitespace-no-wrap">Producto</th>
                         <th class="border-b-2 whitespace-no-wrap">Categoria</th>
                         <th class="border-b-2 whitespace-no-wrap">Subcategoria</th>
                         <th class="border-b-2 whitespace-no-wrap">Cantidad en stock</th>
		                 <th class="border-b-2 whitespace-no-wrap">Precio</th>
		                 <th class="border-b-2 whitespace-no-wrap">Cantidad</th>
                         <th class="border-b-2 whitespace-no-wrap">Subtotal</th>
		                 <th class="border-b-2 whitespace-no-wrap">Iva</th>
		                 <th class="border-b-2 whitespace-no-wrap">Total</th>
		             </tr>
		         </thead>
		        <tfoot>
					<th colspan="10"></th>
					<th>Total Final</th>
					<th><strong>$ {{ number_format($presupuesto->costo_total, 2)}}</strong></th>
				</tfoot>
		         <tbody>
		            @foreach($details as $detail)
                        <tr>
                            @if($presupuesto->estatus_presupuesto == 1)
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3" href="javascript:;" data-toggle="modal" data-target="#edit-productos{{$detail->id}}" value="{{$detail->id}}"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar </a>
                                     <form action="{{action('Encargado\PresupuestoController@destroy', $detail->id)}}" method="post">
								    	{{csrf_field()}}
								        <input name="_method" type="hidden" value="DELETE">
								        <button onClick="return confirm('desea eliminar el producto?')" class="flex items-center text-theme-6" title="Eliminar materia"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i>Eliminar </button>
								    </form> 

                                </div>
                                 @include('encargado.presupuesto.edit')
                            </td>
                            @else
                                <td>{{ $detail->id}}</td>
                            @endif
                            <td>{{ $detail->created_at}}</td>
                            <td>{{ $detail->productos->clave}}</td>
                            <td>{{ $detail->productos->nombre}}</td>
                            <td>{{ $detail->productos->subcategorias->categorias->nombre}}</td>
                            <td>{{ $detail->productos->subcategorias->nombre}}</td>
                            <td >{{ $detail->productos->cantidad}}</td>
                            <td>{{ number_format($detail->productos->precio, 2)}}</td>
                            <td>{{ $detail->cantidad}}</td>
                            <td> {{ number_format($detail->productos->precio * $detail->cantidad, 2)}}</td>
                            <td>{{ number_format(($detail->productos->precio * $detail->cantidad)*$detail->productos->iva, 2)}}</td>
                            <td>{{ number_format(($detail->productos->precio * $detail->cantidad)+($detail->productos->precio * $detail->cantidad)*$detail->productos->iva, 2)}}</td>

                        </tr>
                    @endforeach
		         </tbody>
		     </table>
	 	</div> 
	</div>
	<div class="col-span-12 sm:col-span-4">  
</div>
<div class="col-span-12 sm:col-span-2">  
    <a href="/encargado/dashboard" class="button w-32 mr-2 mb-2 flex items-center justify-center border text-gray-700"> <i data-feather="hard-drive" class="w-4 h-4 mr-2"></i> Regresar</a> 
</div>
@if(Auth::user()->role_id != '4')
    <div class="col-span-12 sm:col-span-2">
        <a href="/gerencia/comprasautorizar/{{$presupuesto->id}}/2" class="button w-32 mr-2 mb-2 flex items-center justify-center bg-theme-1 text-white"> <i data-feather="activity" class="w-4 h-4 mr-2"></i> Autorizar</a> 
    </div>
    <div class="col-span-12 sm:col-span-2">
        <a href="/gerencia/comprasautorizar/{{$presupuesto->id}}/3" class="button w-32 mr-2 mb-2 flex items-center justify-center bg-theme-9 text-white"> <i data-feather="calendar" class="w-4 h-4 mr-2"></i>  Editar</a> 
    </div>
    <div class="col-span-12 sm:col-span-2">
        <a href="/gerencia/comprasautorizar/{{$presupuesto->id}}/4" class="button w-32 mr-2 mb-2 flex items-center justify-center bg-theme-6 text-white"> <i data-feather="trash" class="w-4 h-4 mr-2"></i> Rechazar</a> 
    </div>
@endif
@endsection