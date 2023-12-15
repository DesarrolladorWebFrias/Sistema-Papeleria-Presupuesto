@extends('layouts/app')
@section('title', 'Usuario')
@section('content')
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Usuario
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <a class="button text-white bg-theme-1 shadow-md mr-2" href="javascript:;" data-toggle="modal" data-target="#crear_usuario" >Crear nueva usuario</a>
        @include('admin.usuario.create')
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
                 <th class="border-b-2 whitespace-no-wrap">Id</th>
                 <th class="border-b-2 whitespace-no-wrap">Nombre Completo</th>
                 <th class="border-b-2 whitespace-no-wrap">Telefono</th>
                 <th class="border-b-2 whitespace-no-wrap">Correo</th>
                 <th class="border-b-2 whitespace-no-wrap">Estatus</th>
                 <th class="border-b-2 whitespace-no-wrap">Rol</th>
                 <th class="border-b-2 whitespace-no-wrap">Departamento</th>
                 <th class="border-b-2 whitespace-no-wrap">Centro de costos</th>
                 <th class="border-b-2 whitespace-no-wrap">Opciones</th>

             </tr>
         </thead>
         <tbody>
         	@foreach($usuarios as $usuario)
             <tr>
                 <td class="border-b whitespace-no-wrap">{{$usuario->id}}</td>
                 <td class="border-b whitespace-no-wrap">{{$usuario->name}} {{$usuario->ap_paterno}} {{$usuario->ap_materno}}</td>
                 <td class="border-b whitespace-no-wrap">{{$usuario->telefono}}</td>
                 <td class="border-b whitespace-no-wrap">{{$usuario->email}}</td>
                 <td class="border-b whitespace-no-wrap">{{$usuario->estatus->nombre}}</td>
                 <td class="border-b whitespace-no-wrap">{{$usuario->role->nombre}}</td>
                 <td class="border-b whitespace-no-wrap">{{$usuario->subarea->area->nombre}}</td>
                 <td class="border-b whitespace-no-wrap">{{$usuario->subarea->nombre}}</td>
                 <td class="border-b whitespace-no-wrap">
                    <div class="flex">
                        <a class="flex items-center mr-3"data-toggle="modal" data-target="#edit-user{{$usuario->id}}"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar </a>
                         <form action="{{action('Admin\UsuarioController@destroy', $usuario->id)}}" method="post">
					    	{{csrf_field()}}
					        <input name="_method" type="hidden" value="DELETE">
					        <button onClick="return confirm('suspender usuario?')" class="flex items-center text-theme-6" title="Eliminar materia"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i>Suspender </button>
					    </form> 
                    </div>
                </td>
                 @include('admin.usuario.updated')
             </tr>
            @endforeach 
         </tbody>
     </table>
 </div>

@endsection

@section('scripts_ready')
<script type="text/javascript">
    //funcion para buscar las sub_areas que hay en una area en un select metodo update
	$(function() {
		$("#area").on('change', onSelectareaChanges);
	});

	function onSelectareaChanges() {
		var area_id = $(this).val();		
	if (! area_id) {
        $('#subarea_id').html('<option value="">Seleccione un area del negocio</option>');
    }
    //ajax
    $.get('/area/'+area_id+'', function (data) {
        var html_select = '<option value="">Selecciona un area del negocio</option>';
        for (var i = 0; i<data.length; i++) 
            html_select += '<option value="'+data[i].id+'">'+data[i].nombre+'</option>';
            $('#subarea_id').html(html_select);
    });
    }

    $(function() {
		$("#areas").on('change', onSelectareaChangescreate);
	});

	function onSelectareaChangescreate() {
		var area_ids = $(this).val();		
	if (! area_ids) {
        $('#subarea_id').html('<option value="">Seleccione un area del negocio</option>');
    }
    //ajax
    $.get('/area/'+area_ids+'', function (data) {
        var html_select = '<option value="">Selecciona un area del negocio</option>';
        for (var i = 0; i<data.length; i++) 
            html_select += '<option value="'+data[i].id+'">'+data[i].nombre+'</option>';
            $('#subarea_ids').html(html_select);
    });
    }
	//termino de la funcion
</script>
@endsection