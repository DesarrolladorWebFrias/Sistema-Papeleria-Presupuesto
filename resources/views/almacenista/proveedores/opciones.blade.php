<div class="flex justify-center items-center">
    <a class="flex items-center text-theme-3" href="javascript:;" data-toggle="modal" data-target="#edit-proveedor{{$id}}" value="{{$id}}"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar </a>

    <a class="flex items-center text-theme-7" href="javascript:;" data-toggle="modal" data-target="#edit-proveedor{{$id}}" value="{{$id}}"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Mostrar Compras </a>
    <!-- 
    	<a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal" data-target="#edit-user"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
	-->
     @include('almacenista.proveedores.updated')
</div>