@extends('layouts/app')
@section('title', 'Proveedores')
@section('content')
<style type="text/css">
 .table {
    width: 100%;
    text-align: center;
} 
</style>
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Proveedores
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <a class="button text-white bg-theme-1 shadow-md mr-2" href="javascript:;" data-toggle="modal" data-target="#crear_proveedor" >Crear nuevo proveedor</a>
        @include('admin.proveedores.create')
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
</div><br>
<div class="intro-y datatable-wrapper overflow-x-auto">
    <table class="table table-report table-report--bordered display datatable w-full">
        <thead>
            <tr>
                <th class="border-b-2 whitespace-no-wrap">Id</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Nombre</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Telefono</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Dirección</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Compras</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Opciones</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>
@endsection
@section('scripts_ready')
<script type="text/javascript">
    $(function () {
      $('#DataTables_Table_0').DataTable().destroy();
      var table = $('#DataTables_Table_0').DataTable({
          processing: true,
          serverSide: true,
        ajax: "{{ route('proveedor.index') }}",
        columns: [
            {data: 'id', name: 'id', class:"border-b"},
            {data: 'nombre', name: 'nombre', class: "text-center border-b"},
            {data: 'telefono', name: 'telefono', class: "text-center border-b"},
            {data: 'direccion', name: 'direccion', class: "text-center border-b"},
            {data: 'id', name: 'id', class: "text-center border-b"},
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