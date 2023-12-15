@extends('layouts/app')
@section('title', 'Compras')
@section('content')
<div>
    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
    <h2 class="font-medium text-base mr-auto">
       Crear nueva compra
    </h2>
</div>
{!! Form::open(['route' => 'compras.store']) !!}
<div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
	<div class="rounded-md flex items-center col-span-12 px-5 py-3 mb-2 bg-theme-5 text-gray-700"> <i data-feather="briefcase" class="w-6 h-6 mr-2"></i> Datos del proveedor </div>
    <div class="col-span-12 sm:col-span-3 @if ($errors->has('nombre')) has-error @endif">
        <label class="font-medium text-base mr-auto">Nombre del Proveedor</label>
        <div class="mt-2">
             <select class="select2 w-full" id="proveedor_id" name="proveedor_id">
             	 	<option value="">Selecciona un proveedor</option>
                @foreach($proveedor as $proveedores)
                	<option value="{{$proveedores->id}}">{{$proveedores->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-span-12 sm:col-span-3 @if ($errors->has('telefono')) has-error @endif">
        <label class="font-medium text-base mr-auto">Telefono</label>
         <input type="number" class="input w-full border mt-2 flex-1" name="telefono" id="telefono" value="{{old('telefono')}}" aria-describedby="helpTelefono" disabled>
         <span id="helpTelefono" class="help-block">
            @if ($errors->has('telefono'))
                @foreach($errors->get('telefono') as $message)
                    @if(!$loop->first) / @endif
                    {{ $message }}
                @endforeach
            @endif
        </span>
    </div>
    <div class="col-span-12 sm:col-span-3 @if ($errors->has('direccion')) has-error @endif">
        <label class="font-medium text-base mr-auto">Direccion</label>
         <input type="text" class="input w-full border mt-2 flex-1" name="direccion" id="direccion" aria-describedby="helpDireccion" disabled>
         <span id="helpDireccion" class="help-block">
            @if ($errors->has('direccion'))
                @foreach($errors->get('direccion') as $message)
                    @if(!$loop->first) / @endif
                    {{ $message }}
                @endforeach
            @endif
        </span>
    </div>
     <div class="col-span-12 sm:col-span-3 "><br><br>
    	<a class="button bg-theme-32 text-white" data-toggle="modal" data-target="#crear_proveedor">Agregar Proveedor</a> 	 
    </div>    
    @include('almacenista.compras.create-proveedor')

    <div class="col-span-12 sm:col-span-12">
    </div>
    <!--
    <div class="rounded-md flex items-center col-span-12 px-5 py-3 mb-2 bg-theme-5 text-gray-700"> <i data-feather="user" class="w-6 h-6 mr-2"></i> Datos del solicitante </div>
    <div class="col-span-12 sm:col-span-12">
    </div>
    <div class="col-span-12 sm:col-span-4 @if ($errors->has('user_id')) has-error @endif">
        <label class="font-medium text-base mr-auto" for="user_id">Nombre Completo</label>
        <input type="text" class="input w-full border mt-2 flex-1" name="user_id" id="user_id" value="{{Auth::user()->name}} {{Auth::user()->ap_paterno}} {{Auth::user()->ap_materno}}" aria-describedby="helpUser" disabled>
        <span id="helpUser" class="help-block">
            @if ($errors->has('user_id'))
                @foreach($errors->get('user_id') as $message)
                    @if(!$loop->first) / @endif
                    {{ $message }}
                @endforeach
            @endif
        </span>
    </div>
    <div class="col-span-12 sm:col-span-4 @if ($errors->has('user_telefono')) has-error @endif">
        <label class="font-medium text-base mr-auto" for="user_telefono">Telefono</label>
        <input type="text" class="input w-full border mt-2 flex-1" name="user_id" id="user_id" value="{{Auth::user()->telefono}}" aria-describedby="helpUserTelefono" disabled>
        <span id="helpUserTelefono" class="help-block">
            @if ($errors->has('user_telefono'))
                @foreach($errors->get('user_telefono') as $message)
                    @if(!$loop->first) / @endif
                    {{ $message }}
                @endforeach
            @endif
        </span>
    </div>
    <div class="col-span-12 sm:col-span-4 @if ($errors->has('user_email')) has-error @endif">
        <label class="font-medium text-base mr-auto" for="user_email">Correo</label>
        <input type="text" class="input w-full border mt-2 flex-1" name="user_email" id="user_email" value="{{Auth::user()->email}}" aria-describedby="helpUserEmail" disabled>
        <span id="helpUserEmail" class="help-block">
            @if ($errors->has('user_email'))
                @foreach($errors->get('user_email') as $message)
                    @if(!$loop->first) / @endif
                    {{ $message }}
                @endforeach
            @endif
        </span>
    </div>
     <div class="col-span-12 sm:col-span-12">
    </div>
    <div class="col-span-12 sm:col-span-4 @if ($errors->has('user_rol')) has-error @endif">
        <label class="font-medium text-base mr-auto" for="user_rol">Rol</label>
        <input type="text" class="input w-full border mt-2 flex-1" name="user_rol" id="user_rol" value="{{Auth::user()->role->nombre}}" aria-describedby="helpUserRol" disabled>
        <span id="helpUserRol" class="help-block">
            @if ($errors->has('user_rol'))
                @foreach($errors->get('user_rol') as $message)
                    @if(!$loop->first) / @endif
                    {{ $message }}
                @endforeach
            @endif
        </span>
    </div>
    <div class="col-span-12 sm:col-span-8 @if ($errors->has('user_direccion')) has-error @endif">
        <label class="font-medium text-base mr-auto" for="user_direccion">Direccion</label>
        <input type="text" class="input w-full border mt-2 flex-1" name="user_direccion" id="user_direccion" value="{{Auth::user()->direccion}}" aria-describedby="helpUserDireccion" disabled>
         <span id="helpUserDireccion" class="help-block">
            @if ($errors->has('user_direccion'))
                @foreach($errors->get('user_direccion') as $message)
                    @if(!$loop->first) / @endif
                    {{ $message }}
                @endforeach
            @endif
        </span>
    </div>

    <div class="col-span-12 sm:col-span-12">
    </div>
	-->

    <div class="rounded-md flex items-center col-span-12 px-5 py-3 mb-2 bg-theme-5 text-gray-700"> <i data-feather="shopping-cart" class="w-6 h-6 mr-2"></i> Datos de la compra </div>
    <div class="col-span-12 sm:col-span-6 @if ($errors->has('nombre')) has-error @endif">
        <label class="font-medium text-base mr-auto">Nombre del Producto</label>
        <div class="mt-2">
             <select class="select2 w-full" id="productos_idcompras" name="productos_idcompras">
             	 	<option value="">Selecciona un producto</option>
                @foreach($productoscompras as $productoscompra)
                	<option value="{{$productoscompra->id}}">{{$productoscompra->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-span-12 sm:col-span-6"><br><br>
    	<a class="button bg-theme-32 text-white" data-toggle="modal" data-target="#crear_productos">Agregar Productos</a>
    	 @include('almacenista.compras.create-productos') 	 
    </div> 
    <div class="col-span-12 sm:col-span-12">
    </div>

    <div class="col-span-12 sm:col-span-3 @if ($errors->has('descripcion')) has-error @endif">
        <label class="font-medium text-base mr-auto" for="descripcion">Concepto de la compra:</label>
        <input type="text" class="input w-full border mt-2 flex-1" name="descripcion" id="descripcion" value="{{old('descripcion')}}" aria-describedby="helpDescripcion" required>
        <span id="helpDescripcion" class="help-block">
            @if ($errors->has('descripcion'))
                @foreach($errors->get('descripcion') as $message)
                    @if(!$loop->first) / @endif
                    {{ $message }}
                @endforeach
            @endif
        </span>
    </div>
    <div class="col-span-12 sm:col-span-3 @if ($errors->has('fechacompras')) has-error @endif">
        <label class="font-medium text-base mr-auto" for="fechacompras">Fecha programada de compra:</label>
        <input class="datepicker input pl-12 border mt-2" id="fechacompras" name="fechacompras" aria-describedby="helpFechaCompras">
        <span id="helpFechaCompras" class="help-block">
            @if ($errors->has('fechacompras'))
                @foreach($errors->get('fechacompras') as $message)
                    @if(!$loop->first) / @endif
                    {{ $message }}
                @endforeach
            @endif
        </span>
    </div>
    <div class="col-span-12 sm:col-span-2 @if ($errors->has('pago')) has-error @endif">
        <label class="font-medium text-base mr-auto">Forma de Pago:</label>
        <div class="mt-2">
             <select class="select2 w-full" id="formadepago" name="formadepago">
             	 	<option value="">Selecciona un producto</option>
                	<option value="Efectivo">Efectivo</option>
          			<option value="Cheque">Cheque</option>
          			<option value="Transferencia">Transferencia</option>
            </select>
        </div>
    </div>
    <div class="col-span-12 sm:col-span-2 @if ($errors->has('categoria')) has-error @endif">
        <label class="font-medium text-base mr-auto">Categoria</label>
        <div class="mt-2">
             <select class="select2 w-full" id="categoria" name="categoria">
                    <option value="">Selecciona un producto</option>
                @foreach($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-span-12 sm:col-span-2 @if ($errors->has('subcategoria_id')) has-error @endif">
        <label class="font-medium text-base mr-auto">subcategoria</label>
        <div class="mt-2">
             <select class="select2 w-full" id="subcategoria_id" name="subcategoria_id">
                <option value="">Selecciona una opcion</option>
            </select>
        </div>
    </div>
    <div class="col-span-12 sm:col-span-12">
    </div>
    <div class="col-span-12 sm:col-span-3 @if ($errors->has('precioproducto')) has-error @endif">
        <label class="font-medium text-base mr-auto" for="precioproducto">Precio</label>
        <input type="number" class="input w-full border mt-2 flex-1" name="precioproducto" id="price_product" min="1" value="{{old('precioproducto')}}" aria-describedby="helpPrecio">
        <span id="helpPrecio" class="help-block">
            @if ($errors->has('precio'))
                @foreach($errors->get('precio') as $message)
                    @if(!$loop->first) / @endif
                    {{ $message }}
                @endforeach
            @endif
        </span>
    </div>
    <div class="col-span-12 sm:col-span-2 @if ($errors->has('cantidad')) has-error @endif">
        <label class="font-medium text-base mr-auto" for="cantidad">Cantidad</label>
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
    <div class="col-span-12 sm:col-span-2 @if ($errors->has('iva')) has-error @endif">
        <label class="font-medium text-base mr-auto" for="iva">Iva</label>
        <input type="number" class="input w-full border mt-2 flex-1" name="iva" id="iva" value="{{old('iva')}}" min="0" aria-describedby="helpIva">
        <span id="helpIva" class="help-block">
            @if ($errors->has('iva'))
                @foreach($errors->get('iva') as $message)
                    @if(!$loop->first) / @endif
                    {{ $message }}
                @endforeach
            @endif
        </span>
    </div>
    <div class="col-span-12 sm:col-span-2 @if ($errors->has('medida')) has-error @endif">
        <label class="font-medium text-base mr-auto">Unidad de medida</label>
        <div class="mt-2">
             <select class="select2 w-full" id="medida" name="medida">
             	<option value="">Selecciona una opcion</option>
    	 		<option value="PZ" >PZ</option>
                <option value="PQ" >PQ</option>
                <option value="CJ" >CJ</option>
                <option value="TUBO" >TUBO</option>
                <option value="JK" >JK</option>
                <option value="BK" >BK</option> 
            </select>
        </div>
    </div>
     <div class="col-span-12 sm:col-span-2"><br><br>
    	<a class="button bg-theme-9 text-white" id="btn_add">Agregar Productos</a>
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
                         <th class="border-b-2 whitespace-no-wrap">Subcategoria</th>
		                 <th class="border-b-2 whitespace-no-wrap">Forma de pago</th>
		                 <th class="border-b-2 whitespace-no-wrap">Unidad</th>
		                 <th class="border-b-2 whitespace-no-wrap">Precio</th>
		                 <th class="border-b-2 whitespace-no-wrap">Cantidad</th>
		                 <th class="border-b-2 whitespace-no-wrap">Iva</th>
		                 <th class="border-b-2 whitespace-no-wrap">Subtotal</th>
		             </tr>
		         </thead>
		        <tfoot>
					<th colspan="7"></th>
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
    $(function() {
        $("#categoria").on('change', onSelectareaChanges);
    });

    function onSelectareaChanges() {
        var categorias_id = $(this).val();       
    if (! categorias_id) {
        $('#subcategoria_id').html('<option value="">Seleccione una subcategoria del producto</option>');
    }
    //ajax
    $.get('/categorias/'+categorias_id+'', function (data) {
        var html_select = '<option value="">Selecciona una subcategoria</option>';
        for (var i = 0; i<data.length; i++) 
            html_select += '<option value="'+data[i].id+'">'+data[i].nombre+'</option>';
            $('#subcategoria_id').html(html_select);
    });
    }
    //termino de la funcion
</script>
<script type="text/javascript">
	$(function() {
		$("#proveedor_id").on('change', onSelectProviderChange);
	});

	function onSelectProviderChange() {
		var provider_id = $(this).val();
		$.get('/providers/'+provider_id, function (data){
			$('#telefono').val(data.telefono);
			$("#direccion").val(data.direccion);
		});
	}

	$(document).ready(function(){
		$("#btn_add").click(function(){
			agregar();
		});
	});

	var cont = 0;
	total = 0;
	subtotal=[];
	$("#save").hide();
	$("#proveedor_id").change(showValues);

	function showValues() {
		dataProduct = document.getElementById('productos_idcompras').value.split('_');
        datasubcategoria = document.getElementById('subcategoria_id').value.split('_');
		$("#precioproducto").val(dataProduct[1]);
	}

	function agregar() {
		dataProduct = document.getElementById('productos_idcompras').value.split('_');
        datasubcategoria = document.getElementById('subcategoria_id').value.split('_');
		$("#precioproducto").val(dataProduct[1]);

		productos_idcompras = dataProduct[0];
        subcategoria_id = datasubcategoria[0];
		product = $("#productos_idcompras option:selected").text();
        subcategoria = $("#subcategoria_id option:selected").text();
		quantity = $("#cantidad").val();
		unity = $("#medida option:selected").text();
		price = $("#price_product").val();
		type_payment = $("#formadepago option:selected").text();
		iva = parseFloat($("#iva").val());

		if (productos_idcompras!="" && quantity!="" && quantity > 0  && price!="") 
		{
            porcentaje_iva = iva;
			cal_iva = iva * (quantity*price);
			subtotal[cont] = cal_iva + (quantity*price);
			total=total + subtotal[cont];
			var fila = '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-raised btn-warning btn-xs" onclick="eliminar('+cont+');">x</button></td><td><input type="hidden" name="productos_idcompras[]" value="'+productos_idcompras+'">'+product+'</td><td><input type="hidden" name="subcategoria_id[]" value="'+subcategoria_id+'">'+subcategoria+'</td><td><input type="text" name="type_payment" value="'+type_payment+'"></td><td><input type="text" name="unity[]" class="field" value="'+unity+'"></td><td><input type="number" name="price[]" class="field" value="'+price+'"></td><td><input type="number" name="quantity[]" class="field" value="'+quantity+'"></td><td><input type="text" name="iva[]" class="field" value="'+porcentaje_iva+'"></td><td class="field">'+subtotal[cont]+'</td></tr>';
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
		$("#cantidad").val("");
		$("#iva").val("");
		$("#price_product").val("");
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
		$("#total_sale").val(total);
		$("#fila" + index).remove();
		evaluate();
	}
</script>

@endsection