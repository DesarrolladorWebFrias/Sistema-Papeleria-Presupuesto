@extends('layouts/app')
@section('title', 'Gerencia')
@section('content')
<div>
    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
    <h2 class="font-medium text-base mr-auto">
      Presupuestos creados
    </h2>
</div>
<div class="intro-y pr-1">
    <div class="box p-2">
        <div class="chat__tabs nav-tabs justify-center flex"> 
        	<a data-toggle="tab" data-target="#chats" href="javascript:;" class="flex-1 py-2 rounded-md text-center active">Presupuestos realizados - {{$prespstorzda->count()}}</a> 
        	<a data-toggle="tab" data-target="#friends" href="javascript:;" class="flex-1 py-2 rounded-md text-center">Presupuestos Autorizados - {{$prespstoaut->count()}}</a> 
        	<a data-toggle="tab" data-target="#profile" href="javascript:;" class="flex-1 py-2 rounded-md text-center">Presupuestos rechazados - {{$prespstorech->count()}}</a> 
        </div>
    </div>
</div>
<div class="tab-content">
	<br>
    <div class="tab-content__pane active" id="chats">
        <div class="intro-y datatable-wrapper overflow-x-auto">
		    <table class="table table-report table-report--bordered display datatable w-full" id="presupuesto_realizadas">
		        <thead>
		            <tr>
		                <th class="border-b-2 whitespace-no-wrap">Id</th>
		                <th class="border-b-2 text-center whitespace-no-wrap">Descripcion</th>
		                <th class="border-b-2 text-center whitespace-no-wrap">Estatus</th>
		                <th class="border-b-2 text-center whitespace-no-wrap">Total</th>
                        <th class="border-b-2 text-center whitespace-no-wrap">Periodo</th>
		                <th class="border-b-2 text-center whitespace-no-wrap">Usuario</th>
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
		    <table class="table table-report table-report--bordered display datatable w-full" id="presupuesto_autorizadas">
		        <thead>
		            <tr>
		               <th class="border-b-2 whitespace-no-wrap">Id</th>
                        <th class="border-b-2 text-center whitespace-no-wrap">Descripcion</th>
                        <th class="border-b-2 text-center whitespace-no-wrap">Estatus</th>
                        <th class="border-b-2 text-center whitespace-no-wrap">Total</th>
                        <th class="border-b-2 text-center whitespace-no-wrap">Periodo</th>
                        <th class="border-b-2 text-center whitespace-no-wrap">Usuario</th>
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
		    <table class="table table-report table-report--bordered display datatable w-full" id="presupuesto_rechazados">
		        <thead>
		            <tr>
		                <th class="border-b-2 whitespace-no-wrap">Id</th>
                        <th class="border-b-2 text-center whitespace-no-wrap">Descripcion</th>
                        <th class="border-b-2 text-center whitespace-no-wrap">Estatus</th>
                        <th class="border-b-2 text-center whitespace-no-wrap">Total</th>
                        <th class="border-b-2 text-center whitespace-no-wrap">Periodo</th>
                        <th class="border-b-2 text-center whitespace-no-wrap">Usuario</th>
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
      $('#presupuesto_realizadas').DataTable().destroy();
      var table = $('#presupuesto_realizadas').DataTable({
          processing: true,
          serverSide: true,
        ajax: "{{ route('gerencia.presupuestoscreados') }}",
        columns: [
            {data: 'id', name: 'id', class:"border-b"},
            {data: 'descripcion', name: 'descripcion', class: "text-center border-b"},
            {data: 'estatuspresupuesto', name: 'estatuspresupuesto', class: "text-center border-b"},
            {data: 'costo_total', name: 'costo_total', class: "text-center border-b", "searchable": false},
            {data: 'periodo', name: 'periodo', class: "text-center border-b"},
            {data: 'user', name: 'user', class: "text-center border-b"},
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
      $('#presupuesto_autorizadas').DataTable().destroy();
      var table = $('#presupuesto_autorizadas').DataTable({
          processing: true,
          serverSide: true,
        ajax: "{{ route('gerencia.presupuestosautorizado') }}",
        columns: [
            {data: 'id', name: 'id', class:"border-b"},
            {data: 'descripcion', name: 'descripcion', class: "text-center border-b"},
            {data: 'estatuspresupuesto', name: 'estatuspresupuesto', class: "text-center border-b"},
            {data: 'costo_total', name: 'costo_total', class: "text-center border-b", "searchable": false},
            {data: 'periodo', name: 'periodo', class: "text-center border-b"},
            {data: 'user', name: 'user', class: "text-center border-b"},
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
      $('#presupuesto_rechazados').DataTable().destroy();
      var table = $('#presupuesto_rechazados').DataTable({
          processing: true,
          serverSide: true,
        ajax: "{{ route('gerencia.presupuestorechazados') }}",
        columns: [
             {data: 'id', name: 'id', class:"border-b"},
            {data: 'descripcion', name: 'descripcion', class: "text-center border-b"},
            {data: 'estatuspresupuesto', name: 'estatuspresupuesto', class: "text-center border-b"},
            {data: 'costo_total', name: 'costo_total', class: "text-center border-b", "searchable": false},
            {data: 'periodo', name: 'periodo', class: "text-center border-b"},
            {data: 'user', name: 'user', class: "text-center border-b"},
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

