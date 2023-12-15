@extends('layouts/app')
@section('title', 'Reportes')
@section('content')
<div>
    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
    <h2 class="font-medium text-base mr-auto">
       Creación de Reportes
    </h2>
</div>
{!! Form::open(['route'=>'reportencargado.store','method'=>'POST' ]) !!}
    {{ csrf_field()}}
<div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
	<div class="rounded-md flex items-center col-span-12 px-5 py-3 mb-2 bg-theme-5 text-gray-700"> <i data-feather="briefcase" class="w-6 h-6 mr-2"></i> Reportes de presupuesto</div>

    <div class="col-span-12 sm:col-span-3 @if ($errors->has('fechainicio')) has-error @endif">
        <label class="font-medium text-base mr-auto" for="fechainicio">Fecha inicial de la creacion:</label>
        <input class="datepicker input pl-12 border mt-2" id="fechainicio" name="fechainicio" aria-describedby="helpFechaCompras">
        <span id="helpFechaCompras" class="help-block">
            @if ($errors->has('fechainicio'))
                @foreach($errors->get('fechainicio') as $message)
                    @if(!$loop->first) / @endif
                    {{ $message }}
                @endforeach
            @endif
        </span>
    </div>
   <div class="col-span-12 sm:col-span-3 @if ($errors->has('fechafinal')) has-error @endif">
        <label class="font-medium text-base mr-auto" for="fechafinal">Fecha final de la creacion:</label>
        <input class="datepicker input pl-12 border mt-2" id="fechafinal" name="fechafinal" aria-describedby="helpFechaCompras">
        <span id="helpFechaCompras" class="help-block">
            @if ($errors->has('fechafinal'))
                @foreach($errors->get('fechafinal') as $message)
                    @if(!$loop->first) / @endif
                    {{ $message }}
                @endforeach
            @endif
        </span>
    </div>
    <div class="col-span-12 sm:col-span-3 @if ($errors->has('detalle')) has-error @endif">
        <label class="font-medium text-base mr-auto">Detalles:</label>
        <div class="mt-2">
             <select class="select2 w-full" id="detalle" name="detalle" required>
             	 	<option value="">Selecciona una opcion</option>
                	<option value="1">Sin detalle</option>
          			<option value="2">Con detalle</option>
            </select>
        </div>
    </div>
     <div class="col-span-12 sm:col-span-3 "><br><br>
    	 <button class="button w-20 bg-theme-1 text-white" id="submit">Crear</button>
    </div>    
</div>
{!! Form::close()!!}

@endsection


