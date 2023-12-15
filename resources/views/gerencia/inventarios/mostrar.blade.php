@extends('layouts/app')
@section('title', 'Ver productos')
@section('content')
<div>
    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
    <h2 class="font-medium text-base mr-auto">
       Ver movimiento del producto: {{$productos->nombre}}
    </h2>
</div>

<div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
    <div class="col-span-12 sm:col-span-12">
    </div>
    <div class="rounded-md flex items-center col-span-12 px-5 py-3 mb-2 bg-theme-5 text-gray-700"> <i data-feather="user" class="w-6 h-6 mr-2"></i> Datos del producto </div>
    <div class="col-span-12 sm:col-span-12">
    </div>
    <div class="col-span-12 sm:col-span-3 @if ($errors->has('nombre')) has-error @endif">
        <label class="font-medium text-base mr-auto" for="nombre">Productos:</label>
        <input type="text" class="input w-full border mt-2 flex-1" value="{{$productos->nombre}}" aria-describedby="helpNombre" disabled>
        <span id="helpNombre" class="help-block">
            @if ($errors->has('user_id'))
                @foreach($errors->get('user_id') as $message)
                    @if(!$loop->first) / @endif
                    {{ $message }}
                @endforeach
            @endif
        </span>
    </div>
    <div class="col-span-12 sm:col-span-3 @if ($errors->has('precio')) has-error @endif">
        <label class="font-medium text-base mr-auto" for="precio">Precio:</label>
        <input type="text" class="input w-full border mt-2 flex-1" value="{{$productos->precio}}" aria-describedby="helpPrecio" disabled>
        <span id="helpPrecio" class="help-block">
            @if ($errors->has('precio'))
                @foreach($errors->get('precio') as $message)
                    @if(!$loop->first) / @endif
                    {{ $message }}
                @endforeach
            @endif
        </span>
    </div>
    <div class="col-span-12 sm:col-span-3 @if ($errors->has('cantidad')) has-error @endif">
        <label class="font-medium text-base mr-auto" for="cantidad">Cantidad:</label>
        <input type="text" class="input w-full border mt-2 flex-1" value="{{$productos->cantidad}}" aria-describedby="helpCantidad" disabled>
        <span id="helpCantidad" class="help-block">
            @if ($errors->has('cantidad'))
                @foreach($errors->get('cantidad') as $message)
                    @if(!$loop->first) / @endif
                    {{ $message }}
                @endforeach
            @endif
        </span>
    </div>
    <div class="col-span-12 sm:col-span-3 @if ($errors->has('iva')) has-error @endif">
        <label class="font-medium text-base mr-auto" for="iva">Iva:</label>
        <input type="text" class="input w-full border mt-2 flex-1" value="{{$productos->iva}}" aria-describedby="helpIva" disabled>
        <span id="helpIva" class="help-block">
            @if ($errors->has('iva'))
                @foreach($errors->get('iva') as $message)
                    @if(!$loop->first) / @endif
                    {{ $message }}
                @endforeach
            @endif
        </span>
    </div>
     <div class="col-span-12 sm:col-span-12">
    </div>
    <div class="col-span-12 sm:col-span-3 @if ($errors->has('medida')) has-error @endif">
        <label class="font-medium text-base mr-auto" for="medida">Medida:</label>
        <input type="text" class="input w-full border mt-2 flex-1" value="{{$productos->medida}}" aria-describedby="helpMedida" disabled>
        <span id="helpMedida" class="help-block">
            @if ($errors->has('medida'))
                @foreach($errors->get('medida') as $message)
                    @if(!$loop->first) / @endif
                    {{ $message }}
                @endforeach
            @endif
        </span>
    </div>
    <div class="col-span-12 sm:col-span-3 @if ($errors->has('categoria')) has-error @endif">
        <label class="font-medium text-base mr-auto" for="categoria">Categoria:</label>
        <input type="text" class="input w-full border mt-2 flex-1" value="{{$productos->subcategorias->categorias->nombre}}" aria-describedby="helpCategorias" disabled>
        <span id="helpCategorias" class="help-block">
            @if ($errors->has('categoria'))
                @foreach($errors->get('categoria') as $message)
                    @if(!$loop->first) / @endif
                    {{ $message }}
                @endforeach
            @endif
        </span>
    </div>
    <div class="col-span-12 sm:col-span-3 @if ($errors->has('subcategoria_id')) has-error @endif">
        <label class="font-medium text-base mr-auto" for="subcategoria_id">Subcategorias:</label>
        <input type="text" class="input w-full border mt-2 flex-1" value="{{$productos->subcategorias->nombre}}" aria-describedby="helpSubcategorias" disabled>
        <span id="helpSubcategorias" class="help-block">
            @if ($errors->has('subcategoria_id'))
                @foreach($errors->get('subcategoria_id') as $message)
                    @if(!$loop->first) / @endif
                    {{ $message }}
                @endforeach
            @endif
        </span>
    </div>
    <div class="col-span-12 sm:col-span-3 @if ($errors->has('user_id')) has-error @endif">
        <label class="font-medium text-base mr-auto" for="user_id">Creador:</label>
        <input type="text" class="input w-full border mt-2 flex-1" value="{{$productos->usuario->name}} {{$productos->usuario->ap_paterno}} {{$productos->usuario->ap_materno}}" aria-describedby="helpUser" disabled>
         <span id="helpUser" class="help-block">
            @if ($errors->has('user_id'))
                @foreach($errors->get('user_id') as $message)
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
                         <th class="border-b-2 whitespace-no-wrap">Fecha de creacion</th>
                         <th class="border-b-2 whitespace-no-wrap">Tipo de movimiento</th>
                         <th class="border-b-2 whitespace-no-wrap">Producto</th>
                         <th class="border-b-2 whitespace-no-wrap">Precio</th>
                         <th class="border-b-2 whitespace-no-wrap">Cantidad</th>
                         <th class="border-b-2 whitespace-no-wrap">Subtotal</th>
                         <th class="border-b-2 whitespace-no-wrap">Iva</th>
                         <th class="border-b-2 whitespace-no-wrap">Total</th>
                         <th class="border-b-2 text-center whitespace-no-wrap">Folio del presupuesto</th>
                         <th class="border-b-2 text-center whitespace-no-wrap">Usuario que creo el movimiento</th>

                     </tr>
                 </thead>
                 <tbody>
                    @foreach($details as $detail)
                        <tr>
                            <td class="text-center border-b">{{ $detail->created_at}}</td>
                            <td class="text-center border-b">{{ $detail->tipomovimiento->nombre}}</td>
                            <td class="text-center border-b">{{ $detail->producto->nombre}}</td>
                            <td class="text-center border-b">{{ number_format($detail->producto->precio, 2)}}</td>
                            <td class="text-center border-b">{{ number_format($detail->cantidad, 2)}}</td>
                            <td class="text-center border-b">{{ number_format($detail->producto->precio * $detail->cantidad, 2)}}</td>
                            <td class="text-center border-b">{{ number_format(($detail->producto->precio * $detail->cantidad)*$detail->producto->iva, 2)}}</td>
                            <td class="text-center border-b">{{ number_format($detail->total, 2)}}</td>
                            @if($detail->presupuesto_id != null)
                            <td class="text-center border-b">
                                 <div class="flex justify-center items-center">
                                   <a class="flex items-center mr-3" href="javascript:;" data-toggle="modal" data-target="#mostrar-presupuesto{{$detail->presupuesto_id}}" value="{{$detail->presupuesto_id}}"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Mostrar presupuesto: {{$detail->presupuesto_id}}  </a>
                                </div>
                                 @include('gerencia.inventarios.mostrarpresupuesto')
                            </td>
                            @else
                            <td class="text-center border-b">
                                0
                            </td>
                            @endif
                            <td class="text-center border-b">{{ $detail->usuario->name}} {{ $detail->usuario->ap_paterno}}</td>
                        </tr>
                    @endforeach
                 </tbody>
             </table>
        </div> 
    </div>
    <div class="col-span-12 sm:col-span-4">  
</div>
@endsection