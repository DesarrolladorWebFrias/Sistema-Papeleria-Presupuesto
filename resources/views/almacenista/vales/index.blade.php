@extends('layouts/app')
@section('title', 'Vales')
@section('content')
<div>
    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
    <h2 class="font-medium text-base mr-auto">
      Vales creados
    </h2>
</div>
<div class="intro-y pr-1">
    <div class="box p-2">
        <div class="chat__tabs nav-tabs justify-center flex"> 
        	<a data-toggle="tab" data-target="#realizados" href="javascript:;" class="flex-1 py-2 rounded-md text-center active">Vales elaborados - {{$velesrealizados->count()}}</a> 
        	<a data-toggle="tab" data-target="#autorizados" href="javascript:;" class="flex-1 py-2 rounded-md text-center">Vales entregados - {{$velesentregados->count()}}</a>
        </div>
    </div>
</div>
<div class="tab-content">
	<br>
    <div class="tab-content__pane active" id="realizados">
        <div class="intro-y datatable-wrapper overflow-x-auto">
		    <table class="table table-report table-report--bordered display datatable w-full" id="vales_realizado">
		        <thead>
		            <tr>
		                <th class="border-b-2 whitespace-no-wrap">Folio</th>
		                <th class="border-b-2 text-center whitespace-no-wrap">Concepto del presupuesto</th>
		                <th class="border-b-2 text-center whitespace-no-wrap">Total</th>
		                <th class="border-b-2 text-center whitespace-no-wrap">Usuario</th>
		                <th class="border-b-2 text-center whitespace-no-wrap">Opciones</th>

		            </tr>
		        </thead>
		        <tbody>

		        </tbody>
		    </table>
		</div>
    </div>
	<div class="tab-content__pane" id="autorizados">
	    <div class="intro-y datatable-wrapper overflow-x-auto">
		    <table class="table table-report table-report--bordered display datatable w-full" id="vales_entregados">
		        <thead>
		            <tr>
		               <th class="border-b-2 whitespace-no-wrap">Folio</th>
                        <th class="border-b-2 text-center whitespace-no-wrap">Concepto del presupuesto</th>
                        <th class="border-b-2 text-center whitespace-no-wrap">Total</th>
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
      $('#vales_realizado').DataTable().destroy();
      var table = $('#vales_realizado').DataTable({
          processing: true,
          serverSide: true,
        ajax: "{{ route('almacenista.vales.valesrealizados') }}",
        columns: [
            {data: 'id', name: 'id', class:"border-b"},
            {data: 'presupuesto', name: 'presupuesto', class: "text-center border-b"},
            {data: 'total', name: 'total', class: "text-center border-b"},
            {data: 'usuario', name: 'usuario', class: "text-center border-b", "searchable": false},
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
      $('#vales_entregados').DataTable().destroy();
      var table = $('#vales_entregados').DataTable({
          processing: true,
          serverSide: true,
        ajax: "{{ route('almacenista.vales.valesentregado') }}",
        columns: [
            {data: 'id', name: 'id', class:"border-b"},
            {data: 'presupuesto', name: 'presupuesto', class: "text-center border-b"},
            {data: 'total', name: 'total', class: "text-center border-b"},
            {data: 'usuario', name: 'usuario', class: "text-center border-b", "searchable": false},
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


