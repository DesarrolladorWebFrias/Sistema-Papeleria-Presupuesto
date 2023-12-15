@extends('layouts/app')
@section('title', 'Subcategorias')
@section('content')
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Subcategorias
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <a class="button text-white bg-theme-1 shadow-md mr-2" href="javascript:;" data-toggle="modal" data-target="#crear_subcategorias" >Crear nuevo subcategorias</a>
        @include('admin.subcategorias.create')
    </div>
</div>
<br><br>

 <div class="overflow-x-auto">
     <table class="table">
         <thead>
             <tr class="bg-gray-700 text-white" >
                 <th class="border-b-2 whitespace-no-wrap">Id</th>
                 <th class="border-b-2 whitespace-no-wrap">Nombre de la subcategoria</th>
                 <th class="border-b-2 whitespace-no-wrap">Nombre de la categoria</th>
                 <th class="border-b-2 whitespace-no-wrap">Opciones</th>
             </tr>
         </thead>
         <tbody>
            @foreach($subcategoria as $subcategorias)
             <tr>
                 <td class="border-b whitespace-no-wrap">{{$subcategorias->id}}</td>
                 <td class="border-b whitespace-no-wrap">{{$subcategorias->nombre}}</td>
                 <td class="border-b whitespace-no-wrap">{{$subcategorias->categorias->nombre}}</td>
                 <td class="border-b whitespace-no-wrap">
                    <div class="flex">
                        <a class="flex items-center mr-3"data-toggle="modal" data-target="#edit-categoria{{$subcategorias->id}}"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar </a>
                        
                    </div>
                </td>
                 @include('admin.subcategorias.updated')                
             </tr>
            @endforeach 
         
         </tbody>
     </table>
 </div>

@endsection