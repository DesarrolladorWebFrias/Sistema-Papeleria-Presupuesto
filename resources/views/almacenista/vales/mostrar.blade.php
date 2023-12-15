@extends('layouts/app')
@section('title', 'Ver vales')
@section('content')
<div>
    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
    <h2 class="font-medium text-base mr-auto">
       Ver Vales
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
        <input type="text" class="input w-full border mt-2 flex-1" value="{{$vales->usuario->name}} {{$vales->usuario->ap_paterno}} {{$vales->usuario->ap_materno}}" aria-describedby="helpUser" disabled>
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
        <input type="text" class="input w-full border mt-2 flex-1" value="{{$vales->usuario->telefono}}" aria-describedby="helpUserTelefono" disabled>
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
        <input type="text" class="input w-full border mt-2 flex-1" value="{{$vales->usuario->email}}" aria-describedby="helpUserEmail" disabled>
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
        <input type="text" class="input w-full border mt-2 flex-1" value="{{$vales->usuario->role->nombre}}" aria-describedby="helpUserRol" disabled>
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
        <input type="text" class="input w-full border mt-2 flex-1" value="{{$vales->usuario->subarea->area->empresa->nombre}}" aria-describedby="helpUserRol" disabled>
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
        <input type="text" class="input w-full border mt-2 flex-1" value="{{$vales->usuario->subarea->area->nombre}}" aria-describedby="helpUserRol" disabled>
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
        <input type="text" class="input w-full border mt-2 flex-1" value="{{$vales->usuario->subarea->nombre}}" aria-describedby="helpUserRol" disabled>
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
        <input type="text" class="input w-full border mt-2 flex-1" value="{{$vales->usuario->direccion}}" aria-describedby="helpUserDireccion" disabled>
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
    <div class="rounded-md flex items-center col-span-12 px-5 py-3 mb-2 bg-theme-5 text-gray-700"> <i data-feather="shopping-cart" class="w-6 h-6 mr-2"></i> Datos del presupuesto </div>

    <div class="col-span-12 sm:col-span-6 @if ($errors->has('nombre')) has-error @endif">
        <label class="font-medium text-base mr-auto">Descripcion de la compra:</label>
        <input type="text" class="input w-full border mt-2 flex-1" value="{{$vales->presupuesto->descripcion}}" aria-describedby="helpUserDireccion" disabled>
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
        <input type="text" class="input w-full border mt-2 flex-1" value="{{$vales->presupuesto->periodo}}" aria-describedby="helpUserDireccion" disabled>
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
        <input type="text" class="input w-full border mt-2 flex-1" value="{{$vales->presupuesto->estatuspresupuesto->nombre}}" aria-describedby="helpUserDireccion" disabled>
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
             <div class="accordion">
                <div class="accordion__pane border-b border-gray-200 pb-4"> <a href="javascript:;" class="accordion__pane__toggle font-medium block">Detalle del presupuesto con folio: {{$vales->presupuesto_id}}<i data-feather="code" class="w-4 h-4 ml-auto"></i> </a>

                    <div class="accordion__pane__content mt-3 text-gray-700 leading-relaxed">
                        <div class="overflow-x-auto">
                        <table class="table">
                            <thead>
                                 <tr class="bg-gray-700 text-white">                 
                                     <th class="border-b-2 text-center whitespace-no-wrap">Opciones</th>
                                     <th class="border-b-2 text-center whitespace-no-wrap">Fecha de creacion</th>
                                     <th class="border-b-2 text-center whitespace-no-wrap">Clave</th>
                                     <th class="border-b-2 text-center whitespace-no-wrap">Producto</th>
                                     <th class="border-b-2 text-center whitespace-no-wrap">Categorias</th>
                                     <th class="border-b-2 text-center whitespace-no-wrap">Subcategorias</th>
                                     <th class="border-b-2 text-center whitespace-no-wrap">Cantidad requerida</th>
                                     <th class="border-b-2 text-center whitespace-no-wrap">Precio</th>
                                     <th class="border-b-2 text-center whitespace-no-wrap">Cantidad faltante</th>
                                     <th class="border-b-2 text-center whitespace-no-wrapp">Subtotal</th>
                                     <th class="border-b-2 text-center whitespace-no-wrap">Iva</th>
                                     <th class="border-b-2 text-center whitespace-no-wrap">Total</th>
                                 </tr>
                            </thead>
                            <tfoot>
                                <th colspan="10"></th>
                                <th>Total Final</th>
                                <th><strong>$ {{ number_format($detallepresupuesto[0]->presupuesto->costo_total, 2)}}</strong></th>
                            </tfoot>
                            <tbody>
                                @foreach($detallepresupuesto as $detallepresupuestos)
                                <tr>
                                    <td class="text-center border-b">{{ $detallepresupuestos->id}}</td>
                                    <td class="text-center border-b">{{ $detallepresupuestos->created_at}}</td>
                                    <td class="text-center border-b">{{ $detallepresupuestos->productos->clave}}</td>
                                    <td class="text-center border-b">{{ $detallepresupuestos->productos->nombre}}</td>
                                    <td class="text-center border-b">{{ $detallepresupuestos->productos->subcategorias->categorias->nombre}}</td>
                                    <td class="text-center border-b">{{ $detallepresupuestos->productos->subcategorias->nombre}}</td>
                                    <td class="text-center border-b">{{ $detallepresupuestos->cantidadrequerida}}</td>
                                    <td class="text-center border-b">{{ $detallepresupuestos->productos->precio}}</td>
                                    <td class="text-center border-b">{{ $detallepresupuestos->cantidad}}</td>
                                    <td class="text-center border-b">{{ $detallepresupuestos->productos->precio * $detallepresupuestos->cantidad}}</td>
                                    <td class="text-center border-b">{{ ($detallepresupuestos->productos->precio * $detallepresupuestos->cantidad) * $detallepresupuestos->productos->iva}}</td>
                                    <td class="text-center border-b">{{ ($detallepresupuestos->productos->precio * $detallepresupuestos->cantidad) + (($detallepresupuestos->productos->precio * $detallepresupuestos->cantidad) * $detallepresupuestos->productos->iva)}}</td>


                                </tr>
                                @endforeach
                            </tbody>
                            
                        </table>
                        </div>
                    </div>
                </div>
             

             </div>
        </div>

   
    <div class="rounded-md flex items-center col-span-12 px-5 py-3 mb-2 bg-theme-5 text-gray-700"> <i data-feather="shopping-cart" class="w-6 h-6 mr-2"></i> Detalle del Vale </div>
    <div class="col-span-12 sm:col-span-12">
	    <div class="overflow-x-auto">
		    <table class="table" id="details">
		        <thead>
		             <tr class="bg-gray-700 text-white" >
		             	
		                 <th class="border-b-2 whitespace-no-wrap">Id</th>
		                 <th class="border-b-2 whitespace-no-wrap">Fecha de creacion</th>
                         <th class="border-b-2 whitespace-no-wrap">Clave</th>
		                 <th class="border-b-2 whitespace-no-wrap">Producto</th>
                         <th class="border-b-2 whitespace-no-wrap">Categorias</th>
                         <th class="border-b-2 whitespace-no-wrap">Subcategorias</th>
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
					<th><strong>$ {{ number_format($vales->total, 2)}}</strong></th>
				</tfoot>
		         <tbody>
		            @foreach($details as $detail)
                        <tr>
                            <td>{{ $detail->id}}</td>
                            <td>{{ $detail->created_at}}</td>
                            <td>{{ $detail->productos->clave}}</td>
                            <td>{{ $detail->productos->nombre}}</td>
                            <td>{{ $detail->productos->subcategorias->categorias->nombre}}</td>
                            <td>{{ $detail->productos->subcategorias->nombre}}</td>
                            <td>{{ number_format($detail->precio, 2)}}</td>
                            <td>{{ $detail->cantidad}}</td>
                            <td>{{ number_format($detail->precio * $detail->cantidad, 2)}}</td>
                            <td>{{ number_format($detail->iva, 2)}}</td>
                            <td>{{ number_format($detail->total, 2)}}</td>

                        </tr>
                    @endforeach
		         </tbody>
		     </table>
	 	</div> 
	</div>
	<div class="col-span-12 sm:col-span-6">  
    </div>
    <div class="col-span-12 sm:col-span-2">  
        <a href="/almacenista/vales" class="button w-32 mr-2 mb-2 flex items-center justify-center border text-gray-700"> <i data-feather="hard-drive" class="w-4 h-4 mr-2"></i> Regresar</a> 
    </div>
@if(Auth::user()->role_id == '3' && $vales->estatus == "espera de entrega")
    <div class="col-span-12 sm:col-span-2">
        <a href="/almacenista/valesestatus/{{$vales->id}}/2" class="button w-32 mr-2 mb-2 flex items-center justify-center bg-theme-1 text-white"> <i data-feather="activity" class="w-4 h-4 mr-2"></i> Entregado</a> 
    </div>
    <div class="col-span-12 sm:col-span-2">
        <a href="/almacenista/valesestatus/{{$vales->id}}/3" class="button w-32 mr-2 mb-2 flex items-center justify-center bg-theme-6 text-white"> <i data-feather="trash" class="w-4 h-4 mr-2"></i> Rechazar</a> 
    </div>
@endif
@endsection