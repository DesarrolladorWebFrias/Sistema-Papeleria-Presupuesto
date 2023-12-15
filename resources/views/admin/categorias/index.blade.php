@extends('layouts/app')
@section('title', 'Categorias')
@section('content')
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Categorias
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <a class="button text-white bg-theme-1 shadow-md mr-2" href="javascript:;" data-toggle="modal" data-target="#crear_categorias" >Crear nueva categoria</a>
        @include('admin.categorias.create')
        <!-- 
        <div class="dropdown relative ml-auto sm:ml-0">
            <button class="dropdown-toggle button px-2 box text-gray-700">
                <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="plus"></i> </span>
            </button>
            <div class="dropdown-box mt-10 absolute w-40 top-0 right-0 z-20">
                <div class="dropdown-box__content box p-2">
                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="file-plus" class="w-4 h-4 mr-2"></i> New Category </a>
                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="users" class="w-4 h-4 mr-2"></i> New Group </a>
                </div>
            </div> 
        </div>
        -->
    </div>
</div><br><br>

 <div class="overflow-x-auto">
     <table class="table">
         <thead>
             <tr class="bg-gray-700 text-white" >
                 <th class="border-b-2 whitespace-no-wrap text-center">Id</th>
                 <th class="border-b-2 whitespace-no-wrap text-center">Nombre</th>
                 <th class="border-b-2 whitespace-no-wrap">Opciones</th>
             </tr>
         </thead>
         <tbody>
            @foreach($categoria as $categorias)
             <tr>
                 <td class="border-b whitespace-no-wrap text-center">{{$categorias->id}}</td>
                 <td class="border-b whitespace-no-wrap text-center">{{$categorias->nombre}}</td>
                 <td class="border-b whitespace-no-wrap text-center">
                    <div class="flex">
                        <a class="flex items-center mr-3"data-toggle="modal" data-target="#edit-categoria{{$categorias->id}}"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar </a>
                    </div>
                </td>
                 @include('admin.categorias.updated')              
             </tr>
            @endforeach 
         
         </tbody>
     </table>
 </div>

@endsection