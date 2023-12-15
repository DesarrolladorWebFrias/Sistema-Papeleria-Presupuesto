@extends('layouts/app')
@section('title', 'Almacenista')
@section('content')
<div>
    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
    <h2 class="font-medium text-base mr-auto">
      Compras realizadas
    </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
         <a class="button text-white bg-theme-1 shadow-md mr-2" href="{{ route('compras.create') }}">Crear nueva compras</a>

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
<div class="intro-y pr-1">
    <div class="box p-2">
        <div class="chat__tabs nav-tabs justify-center flex"> 
            <a data-toggle="tab" data-target="#chats" href="javascript:;" class="flex-1 py-2 rounded-md text-center active">Compras realizadas - {{$comprarzda->count()}}</a> 
            <a data-toggle="tab" data-target="#friends" href="javascript:;" class="flex-1 py-2 rounded-md text-center">Compras Autorizadas - {{$compraaut->count()}}</a> 
            <a data-toggle="tab" data-target="#profile" href="javascript:;" class="flex-1 py-2 rounded-md text-center">Compras rechazadas - {{$comprarech->count()}}</a>  
        </div>
    </div>
</div>
<div class="tab-content">
    <br>
    <div class="tab-content__pane active" id="chats">
        <div class="intro-y datatable-wrapper overflow-x-auto">
            <table class="table table-report table-report--bordered display datatable w-full" id="compras_realizadas">
                <thead>
                    <tr>
                        <th class="border-b-2 whitespace-no-wrap">Id</th>
                        <th class="border-b-2 text-center whitespace-no-wrap">Descripcion</th>
                        <th class="border-b-2 text-center whitespace-no-wrap">Forma de pago</th>
                        <th class="border-b-2 text-center whitespace-no-wrap">Estatus</th>
                        <th class="border-b-2 text-center whitespace-no-wrap">Total</th>
                        <th class="border-b-2 text-center whitespace-no-wrap">Usuario</th>
                        <th class="border-b-2 text-center whitespace-no-wrap">Proveedor</th>
                        <th class="border-b-2 text-center whitespace-no-wrap">Opciones</th>

                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
    <div class="tab-content__pane" id="friends">
        <div class="intro-y datatable-wrapper overflow-x-auto">
            <table class="table table-report table-report--bordered display datatable w-full" id="compras_autorizadas">
                <thead>
                    <tr>
                        <th class="border-b-2 whitespace-no-wrap">Id</th>
                        <th class="border-b-2 text-center whitespace-no-wrap">Descripcion</th>
                        <th class="border-b-2 text-center whitespace-no-wrap">Forma de pago</th>
                        <th class="border-b-2 text-center whitespace-no-wrap">Estatus</th>
                        <th class="border-b-2 text-center whitespace-no-wrap">Total</th>
                        <th class="border-b-2 text-center whitespace-no-wrap">Usuario</th>
                        <th class="border-b-2 text-center whitespace-no-wrap">Proveedor</th>
                        <th class="border-b-2 text-center whitespace-no-wrap">Opciones</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
    <div class="tab-content__pane" id="profile">
        <div class="intro-y datatable-wrapper overflow-x-auto">
            <table class="table table-report table-report--bordered display datatable w-full" id="campras_rechazadas">
                <thead>
                    <tr>
                        <th class="border-b-2 whitespace-no-wrap">Id</th>
                        <th class="border-b-2 text-center whitespace-no-wrap">Descripcion</th>
                        <th class="border-b-2 text-center whitespace-no-wrap">Forma de pago</th>
                        <th class="border-b-2 text-center whitespace-no-wrap">Estatus</th>
                        <th class="border-b-2 text-center whitespace-no-wrap">Total</th>
                        <th class="border-b-2 text-center whitespace-no-wrap">Usuario</th>
                        <th class="border-b-2 text-center whitespace-no-wrap">Proveedor</th>
                        <th class="border-b-2 text-center whitespace-no-wrap">Opciones</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts_ready')
<script type="text/javascript">
    $(function () {
      $('#compras_realizadas').DataTable().destroy();
      var table = $('#compras_realizadas').DataTable({
          processing: true,
          serverSide: true,
        ajax: "{{ route('almacenista.inventario.compras.realizadas') }}",
        columns: [
            {data: 'id', name: 'id', class:"border-b"},
            {data: 'descripcion', name: 'descripcion', class: "text-center border-b"},
            {data: 'formadepago', name: 'formadepago', class: "text-center border-b"},
            {data: 'estatuscompras', name: 'estatuscompras', class: "text-center border-b"},
            {data: 'costo_total', name: 'costo_total', class: "text-center border-b", "searchable": false},
            {data: 'user', name: 'user', class: "text-center border-b"},
            {data: 'proveedor', name: 'proveedor', class: "text-center border-b"},
            {data: 'btn', name: 'btn', class: "text-center border-b"},
        ],
            "language": {
                "info": "_TOTAL_ registros",
                "search": "Buscar",
                "paginate": {
                    "next": "Siguiente",
                    "previous": "Anterior",
                },
                "lengthMenu": 'Mostrar <select >'+
                            '<option value="10">10</option>'+
                            '<option value="30">30</option>'+
                            '<option value="-1">Todos</option>'+
                            '</select> registros',
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "emptyTable": "No hay datos",
                "zeroRecords": "No hay coincidencias", 
                "infoEmpty": "",
                "infoFiltered": ""
            }
    });    
  });
</script>

<script type="text/javascript">
    $(function () {
      $('#compras_autorizadas').DataTable().destroy();
      var table = $('#compras_autorizadas').DataTable({
          processing: true,
          serverSide: true,
        ajax: "{{ route('almacenista.inventario.compras.autorizadas') }}",
       columns: [
            {data: 'id', name: 'id', class:"border-b"},
            {data: 'descripcion', name: 'descripcion', class: "text-center border-b"},
            {data: 'formadepago', name: 'formadepago', class: "text-center border-b"},
            {data: 'estatuscompras', name: 'estatuscompras', class: "text-center border-b"},
            {data: 'costo_total', name: 'costo_total', class: "text-center border-b", "searchable": false},
            {data: 'user', name: 'user', class: "text-center border-b"},
            {data: 'proveedor', name: 'proveedor', class: "text-center border-b"},
            {data: 'btn', name: 'btn', class: "text-center border-b"},
        ],
            "language": {
                "info": "_TOTAL_ registros",
                "search": "Buscar",
                "paginate": {
                    "next": "Siguiente",
                    "previous": "Anterior",
                },
                "lengthMenu": 'Mostrar <select >'+
                            '<option value="10">10</option>'+
                            '<option value="30">30</option>'+
                            '<option value="-1">Todos</option>'+
                            '</select> registros',
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "emptyTable": "No hay datos",
                "zeroRecords": "No hay coincidencias", 
                "infoEmpty": "",
                "infoFiltered": ""
            }
    });    
  });
</script>

<script type="text/javascript">
    $(function () {
      $('#campras_rechazadas').DataTable().destroy();
      var table = $('#campras_rechazadas').DataTable({
          processing: true,
          serverSide: true,
        ajax: "{{ route('almacenista.inventario.compras.rechazadas') }}",
        columns: [
            {data: 'id', name: 'id', class:"border-b"},
            {data: 'descripcion', name: 'descripcion', class: "text-center border-b"},
            {data: 'formadepago', name: 'formadepago', class: "text-center border-b"},
            {data: 'estatuscompras', name: 'estatuscompras', class: "text-center border-b"},
            {data: 'costo_total', name: 'costo_total', class: "text-center border-b", "searchable": false},
            {data: 'user', name: 'user', class: "text-center border-b"},
            {data: 'proveedor', name: 'proveedor', class: "text-center border-b"},
            {data: 'btn', name: 'btn', class: "text-center border-b"},
        ],
            "language": {
                "info": "_TOTAL_ registros",
                "search": "Buscar",
                "paginate": {
                    "next": "Siguiente",
                    "previous": "Anterior",
                },
                "lengthMenu": 'Mostrar <select >'+
                            '<option value="10">10</option>'+
                            '<option value="30">30</option>'+
                            '<option value="-1">Todos</option>'+
                            '</select> registros',
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "emptyTable": "No hay datos",
                "zeroRecords": "No hay coincidencias", 
                "infoEmpty": "",
                "infoFiltered": ""
            }
    });    
  });
</script>
@endsection