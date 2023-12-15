@extends('layouts/app')
@section('title', 'Generar Tiquets')
@section('content')
<div>
    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
    <h2 class="font-medium text-base mr-auto">
       Ver presupuesto
    </h2>
</div>

{!! Form::open(['route' => 'presupuestosvales.valescreados']) !!}
<input type="text" name="presupuesto_id" id="presupuesto_id" value="{{$presupuesto->id}}" style="display:none">
<div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
 	<div class="col-span-12 sm:col-span-12">
		<div class="overflow-x-auto">
		    <table class="table" id="tiquets">
		        <thead>
		             <tr class="bg-gray-700 text-white" >
		             	
		                 <th class="border-b-2 whitespace-no-wrap">Opciones</th>
		                 <th class="border-b-2 whitespace-no-wrap">Fecha de creacion</th>
		                 <th class="border-b-2 whitespace-no-wrap">Producto</th>
		                 <th class="border-b-2 whitespace-no-wrap">Cantidad solicitado</th>
		                 <th class="border-b-2 whitespace-no-wrap">Precio</th>
		                 <th class="border-b-2 whitespace-no-wrap">Cantidad faltante</th>
	                     <th class="border-b-2 whitespace-no-wrap">Subtotal</th>
		                 <th class="border-b-2 whitespace-no-wrap">Iva</th>
		                 <th class="border-b-2 whitespace-no-wrap">Total</th>
		             </tr>
		         </thead>
		        <tfoot>
					<th colspan="7"></th>
					<th>Total Final</th>
					<th><strong>$ {{ number_format($presupuesto->costo_total, 2)}}</strong></th>
				</tfoot>
		         <tbody>
		            @foreach($details as $detail)
	                    <tr>
	                        @if($presupuesto->estatus_presupuesto == 1)
	                        <td class="table-report__action w-56">
	                            <div class="flex justify-center items-center">
	                                <a class="flex items-center mr-3" href="javascript:;" data-toggle="modal" data-target="#edit-productos{{$detail->id}}" value="{{$detail->id}}"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar </a>
	                                 <form action="{{action('Encargado\PresupuestoController@destroy', $detail->id)}}" method="post">
								    	{{csrf_field()}}
								        <input name="_method" type="hidden" value="DELETE">
								        <button onClick="return confirm('desea eliminar el producto?')" class="flex items-center text-theme-6" title="Eliminar materia"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i>Eliminar </button>
								    </form> 

	                            </div>
	                             @include('encargado.presupuesto.edit')
	                        </td>
	                        @else
	                            <td>{{ $detail->id}}</td>
	                        @endif
	                        <td>{{ $detail->created_at}}</td>
	                        <td>{{ $detail->productos->nombre}}</td>
	                        <td >{{ $detail->cantidadrequerida}}</td>
	                        <td>{{ number_format($detail->productos->precio, 2)}}</td>
	                        <td>{{ $detail->cantidad}}</td>
	                        <td> {{ number_format($detail->productos->precio * $detail->cantidad, 2)}}</td>
	                        <td>{{ number_format(($detail->productos->precio * $detail->cantidad)*$detail->productos->iva, 2)}}</td>
	                        <td>{{ number_format(($detail->productos->precio * $detail->cantidad)+($detail->productos->precio * $detail->cantidad)*$detail->productos->iva, 2)}}</td>

	                    </tr>
	                @endforeach
		         </tbody>
		    </table> 	
		</div> 
	</div>
	@if($vales->count() != 0)
		<div class="col-span-12 sm:col-span-12">
			 <div class="accordion">
			 	@foreach($vales as $vale)
			 	@if($vale->estatus == 'espera de entrega')
			    <div class="accordion__pane border-b border-gray-200 pb-4"> <a href="javascript:;" class="accordion__pane__toggle font-medium block">Vales creado con folio: {{$vale->id}}<a type="button" href="{{ url('/encargado/pdfvales/'.$vale->id)}}" class="button w-32 mr-2 mb-2 h-8 ml-auto flex items-center justify-center bg-theme-1 text-white" target="_blank"> <i data-feather="printer" class="w-4 h-4 mr-2"></i> Imprimir </a> </a>
			    @else
			    <div class="accordion__pane border-b border-gray-200 pb-4"> <a href="javascript:;" class="accordion__pane__toggle font-medium block">Vales creado con folio: {{$vale->id}}<i data-feather="code" class="w-4 h-4 ml-auto"></i> </a>
			    @endif
			    	<div class="accordion__pane__content mt-3 text-gray-700 leading-relaxed">
				        <table class="table">
				        	<thead>
					             <tr class="bg-gray-700 text-white">			     
					                 <th class="border-b-2 whitespace-no-wrap">Opciones</th>
					                 <th class="border-b-2 whitespace-no-wrap">Fecha de creacion</th>
					                 <th class="border-b-2 whitespace-no-wrap">Producto</th>
					                 <th class="border-b-2 whitespace-no-wrap">Precio</th>
					                 <th class="border-b-2 whitespace-no-wrap">Cantidad solicitada</th>
				                     <th class="border-b-2 whitespace-no-wrap">Subtotal</th>
					                 <th class="border-b-2 whitespace-no-wrap">Iva</th>
					                 <th class="border-b-2 whitespace-no-wrap">Total</th>
					             </tr>
				         	</thead>
				         	<tbody>
				         		@foreach($vales as $detail)
				         			@if(isset($detail->detallevale))
				         				@foreach ($detail->detallevale as $detallevales)
				         					@if($detallevales->vale_id == $vale->id)
							         		<tr>
							           			<td>{{$detallevales->id}}</td>
							           			<td>{{$detallevales->created_at}}</td>
							           			<td>{{$detallevales->productos->nombre}}</td>
							           			<td>{{$detallevales->precio}}</td>
							           			<td>{{$detallevales->cantidad}}</td>
							           			<td>{{$detallevales->precio * $detallevales->cantidad}}</td>
							           			<td>{{$detallevales->iva}}</td>
							           			<td>{{$detallevales->total}}</td>
							           		</tr>
							           		@endif
						           		@endforeach
				           		 	@endif
								@endforeach
				         	</tbody>
				        	
			        	</table>
			        </div>
			    </div>
			    @endforeach

			 </div>
		</div>
	@else
	@endif
	<div class="col-span-12 sm:col-span-12">
	</div>

	<div class="rounded-md flex items-center col-span-12 px-5 py-3 mb-2 bg-theme-5 text-gray-700"> <i data-feather="shopping-cart" class="w-6 h-6 mr-2"></i> Datos del tiquets: </div>
    <div class="col-span-12 sm:col-span-4 @if ($errors->has('nombre')) has-error @endif">
        <label class="font-medium text-base mr-auto">Nombre del Producto</label>
        <div class="mt-2">
             <select class="select2 w-full" id="productos_idcompras" name="productos_idcompras">
             	 	<option value="">Selecciona un producto</option>
            		@foreach($details as $producto)
            			@if($producto->cantidad >= '1')
                			<option value="{{$producto->productos->id}}">{{$producto->productos->nombre}}</option>
                		@endif
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-span-12 sm:col-span-4 @if ($errors->has('stock')) has-error @endif">
        <label class="font-medium text-base mr-auto" for="stock">Cantidad solicitado:</label>
        <input type="text" class="input w-full border mt-2 flex-1" name="stock" id="stock" value="{{old('stock')}}" aria-describedby="helpStock" disabled>
        <span id="helpStock" class="help-block">
            @if ($errors->has('stock'))
                @foreach($errors->get('stock') as $message)
                    @if(!$loop->first) / @endif
                    {{ $message }}
                @endforeach
            @endif
        </span>
    </div>
    <div class="col-span-12 sm:col-span-2 @if ($errors->has('cantidad')) has-error @endif">
        <label class="font-medium text-base mr-auto" for="cantidad">Cantidad requerida</label>
        <input type="number" class="input w-full border mt-2 flex-1" name="cantidad" id="cantidad" value="{{old('cantidad')}}" min="1" aria-describedby="helpCantidad">
        <span id="helpCantidad" class="help-block">
            @if ($errors->has('cantidad'))
                @foreach($errors->get('cantidad') as $message)
                    @if(!$loop->first) / @endif
                    {{ $message }}
                @endforeach
            @endif
        </span>
    </div>
    <div class="col-span-12 sm:col-span-2"><br><br>
    	<a class="button bg-theme-9 text-white" id="btn_add">Agregar Productos</a>
    </div>
    <div class="col-span-12 sm:col-span-12">
    </div>
    <div class="col-span-12 sm:col-span-6 @if ($errors->has('nombre')) has-error @endif">
        <label class="font-medium text-base mr-auto">precio:</label>
        <input type="number" class="input w-full border mt-2 flex-1" name="precio" id="precio" value="{{old('precio')}}" min="1" aria-describedby="helpCantidad" disabled>
        <span id="helpCantidad" class="help-block">
            @if ($errors->has('precio'))
                @foreach($errors->get('precio') as $message)
                    @if(!$loop->first) / @endif
                    {{ $message }}
                @endforeach
            @endif
        </span>
    </div>
    <div class="col-span-12 sm:col-span-6 @if ($errors->has('iva')) has-error @endif">
        <label class="font-medium text-base mr-auto" for="iva">Iva:</label>
        <input type="text" class="input w-full border mt-2 flex-1" name="iva" id="iva" value="{{old('iva')}}" aria-describedby="helpStock" disabled>
        <span id="helpStock" class="help-block">
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
    <br>
    <div class="col-span-12 sm:col-span-12">
	    <div class="overflow-x-auto">
		    <table class="table" id="details">
		        <thead>
		             <tr class="bg-gray-700 text-white" >
		                 <th class="border-b-2 whitespace-no-wrap">Opciones</th>
		                 <th class="border-b-2 whitespace-no-wrap">Producto</th>
		                 <th class="border-b-2 whitespace-no-wrap">Cantidad Solicitada</th>
		                 <th class="border-b-2 whitespace-no-wrap">Precio</th>
		                 <th class="border-b-2 whitespace-no-wrap">Cantidad requerida</th>
		                 <th class="border-b-2 whitespace-no-wrap">Iva</th>
		                 <th class="border-b-2 whitespace-no-wrap">Subtotal</th>
		             </tr>
		         </thead>
		        <tfoot>
					<th colspan="5"></th>
					<th>Total</th>
					<th><h4 id="total">$. 0.00</h4><input type="hidden" name="total" id="total_re"></input></th>
				</tfoot>
		         <tbody>
		            
		         
		         </tbody>
		     </table>
	 	</div> 
	</div>

	<div class="px-5 py-3 text-right border-t border-gray-200" id="save">
	    <button onclick="window.location.href='/almacenista/home'" type="button" class="button w-20 border text-gray-700 mr-1">Regresar</button>
	    <button class="button w-20 bg-theme-1 text-white" id="submit">Crear</button>
	</div>
</div>
{!! Form::close()!!}
@endsection

@section('scripts_ready')
<script type="text/javascript">
    //funcion para buscar las sub_areas que hay en una area en un select metodo update
	$(function() {
		$("#productos_idcompras").on('change', onSelectareaChanges);
	});

	function onSelectareaChanges() {
		var provider_id = $(this).val();
		var presupuesto = document.getElementById("presupuesto_id").value;
		$.get('/productostiquets/'+provider_id+'/'+presupuesto, function (data){
			$("#stock").val(data.cantidad);
			$("#precio").val(data.precio);
			$("#iva").val(data.iva);
			var cardnumber = $("#stock").val();
			var input=  document.getElementById('cantidad');
			input.addEventListener('input',function(){
			  if (this.value.length > cardnumber) 
			     this.value = this.value.slice(0,cardnumber); 
			 console.log(this.value);
			})

			console.log(cardnumber);

		});
	}

	
$(document).ready(function(){
		$("#btn_add").click(function(){
			agregar();
		});
	});

	var cont = 0;
	total = 0;
	total_re = 0;
	subtotal=[];
	$("#save").hide();

	function agregar() {
		dataProduct = document.getElementById('productos_idcompras').value.split('_');
		$("#precioproducto").val(dataProduct[1]);
		productos_idcompras = dataProduct[0];
		product = $("#productos_idcompras option:selected").text();
		quantity = $("#cantidad").val();
		unity = $("#stock").val();
		price = $("#precio").val();
		iva = parseFloat($("#iva").val());

		if (productos_idcompras!="" && quantity!="" && quantity > 0  && price!="") 
		{
			cal_iva = iva * (quantity*price);
			subtotal[cont] =cal_iva + (quantity*price);
			total=total + subtotal[cont];
			var fila = '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-raised btn-warning btn-xs" onclick="eliminar('+cont+');">x</button></td><td><input type="hidden" name="productos_idcompras[]" value="'+productos_idcompras+'">'+product+'</td><td><input type="text" name="unity[]" class="field" value="'+unity+'"></td><td><input type="number" name="price[]" class="field" value="'+price+'"></td><td><input type="number" name="quantity[]" class="field" value="'+quantity+'"></td><td><input type="text" name="iva[]" class="field" value="'+cal_iva+'"></td><td class="field">'+subtotal[cont]+'</td></tr>';
			cont++;
			evaluate();
			clean();
			$('#total').html("$ " + total);
			$('#total_re').val(total);
			$('#details').append(fila);
		}else {
			alert('Error al ingresar el detalle de la requisición, revise los datos del producto');
		}

	}

	function clean() {
		$("#stock").val("");
		$("#cantidad").val("");
		$("#iva").val("");
		$("#precio").val("");
	}

	function evaluate() {
		if (total>0) {
			$("#save").show();

		}else {
			$("#save").hide();
		}
	}

	function eliminar(index) {
		total = total-subtotal[index];
		$("#total").html("$ " +total);
		$("#total_re").val(total);
		$("#fila" + index).remove();
		evaluate();
	}
</script>
@endsection