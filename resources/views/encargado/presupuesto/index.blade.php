@extends('layouts/app')
@section('title', 'Presupuesto')
@section('content')
<div>
    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
    <h2 class="font-medium text-base mr-auto">
       Crear nuevo presupuesto
    </h2>
</div>
{!! Form::open(['route' => 'presupuesto.store']) !!}
<div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
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

    <div class="rounded-md flex items-center col-span-12 px-5 py-3 mb-2 bg-theme-5 text-gray-700"> <i data-feather="shopping-cart" class="w-6 h-6 mr-2"></i> Datos del presupuesto: </div>
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
    <div class="col-span-12 sm:col-span-2 @if ($errors->has('clave')) has-error @endif">
        <label class="font-medium text-base mr-auto">Clave del producto</label>
        <input type="text" class="input w-full border mt-2 flex-1" name="clave" id="clave" value="{{old('clave')}}" aria-describedby="helpClave" disabled>
        <span id="helpClave" class="help-block">
            @if ($errors->has('clave'))
                @foreach($errors->get('clave') as $message)
                    @if(!$loop->first) / @endif
                    {{ $message }}
                @endforeach
            @endif
        </span>
    </div>
     <div class="col-span-12 sm:col-span-4 @if ($errors->has('stock')) has-error @endif">
        <label class="font-medium text-base mr-auto" for="stock">Cantidad en stock:</label>
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
    <div class="col-span-12 sm:col-span-12">
    </div>
    <div class="col-span-6 sm:col-span-6 @if ($errors->has('descripcion')) has-error @endif">
        <label class="font-medium text-base mr-auto" for="descripcion">Concepto de la compra</label>
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
    <div class="col-span-6 sm:col-span-3 @if ($errors->has('categoria')) has-error @endif">
        <label class="font-medium text-base mr-auto" for="categoria">Categoria</label>
        <input type="text" class="input w-full border mt-2 flex-1" name="categoria" id="categoria" value="{{old('categoria')}}" aria-describedby="helpCategoria" disabled>
        <span id="helpCategoria" class="help-block">
            @if ($errors->has('categoria'))
                @foreach($errors->get('categoria') as $message)
                    @if(!$loop->first) / @endif
                    {{ $message }}
                @endforeach
            @endif
        </span>
    </div>
    <div class="col-span-6 sm:col-span-3 @if ($errors->has('sub')) has-error @endif">
        <label class="font-medium text-base mr-auto" for="sub">Subcategoria</label>
        <input type="text" class="input w-full border mt-2 flex-1" name="sub" id="sub" value="{{old('sub')}}" aria-describedby="helpSubcategoria" disabled>
        <span id="helpSubcategoria" class="help-block">
            @if ($errors->has('sub'))
                @foreach($errors->get('sub') as $message)
                    @if(!$loop->first) / @endif
                    {{ $message }}
                @endforeach
            @endif
        </span>
    </div>
    <div class="col-span-12 sm:col-span-12">
    </div>
    <div class="col-span-12 sm:col-span-3 @if ($errors->has('precioproducto')) has-error @endif">
        <label class="font-medium text-base mr-auto" for="precioproducto">Precio</label>
        <input type="number" class="input w-full border mt-2 flex-1" name="precioproducto" id="price_product" min="1" value="{{old('precioproducto')}}" aria-describedby="helpPrecio" disabled>
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
        <input type="number" class="input w-full border mt-2 flex-1" name="iva" id="iva" value="{{old('iva')}}" min="0" aria-describedby="helpIva" disabled>
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
        <input type="text" class="input w-full border mt-2 flex-1" name="medida" id="medida" value="{{old('medida')}}" min="0" aria-describedby="helpMedida" disabled>
        <span id="helpMedida" class="help-block">
            @if ($errors->has('medida'))
                @foreach($errors->get('medida') as $message)
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
    <br>
    <div class="col-span-12 sm:col-span-12">
	    <div class="overflow-x-auto">
		    <table class="table" id="details">
		        <thead>
		             <tr class="bg-gray-700 text-white" >
		                 <th class="border-b-2 whitespace-no-wrap">Opciones</th>
                         <th class="border-b-2 whitespace-no-wrap">Folio</th>
		                 <th class="border-b-2 whitespace-no-wrap">Producto</th>
                         <th class="border-b-2 whitespace-no-wrap">Categoria</th>
                         <th class="border-b-2 whitespace-no-wrap">Subcategoria</th>
		                 <th class="border-b-2 whitespace-no-wrap">Unidad</th>
		                 <th class="border-b-2 whitespace-no-wrap">Precio</th>
		                 <th class="border-b-2 whitespace-no-wrap">Cantidad</th>
		                 <th class="border-b-2 whitespace-no-wrap">Iva</th>
		                 <th class="border-b-2 whitespace-no-wrap">Subtotal</th>
		             </tr>
		         </thead>
		        <tfoot>
					<th colspan="8"></th>
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
		$.get('/productos/'+provider_id, function (data){
			$('#price_product').val(data.precio);
            $("#clave").val(data.clave);
            $("#categoria").val(data.categoria);
            $("#sub").val(data.sub);
			$("#iva").val(data.iva);
			$("#stock").val(data.cantidad);
			$("#medida").val(data.medida);
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
        folio = $("#clave").val();
		product = $("#productos_idcompras option:selected").text();
        categoria = $("#categoria").val();
        sub = $("#sub").val();
		quantity = $("#cantidad").val();
		unity = $("#medida").val();
		price = $("#price_product").val();
		iva = parseFloat($("#iva").val());

		if (productos_idcompras!="" && quantity!="" && quantity > 0  && price!="") 
		{
			cal_iva = iva * (quantity*price);
			subtotal[cont] =cal_iva + (quantity*price);
			total=total + subtotal[cont];
			var fila = '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-raised btn-warning btn-xs" onclick="eliminar('+cont+');">x</button></td><td><input type="text" name="folio[]" class="field" value="'+folio+'"></td><td><input type="hidden" name="productos_idcompras[]" value="'+productos_idcompras+'">'+product+'</td><td><input type="text" name="categoria[]" class="field" value="'+categoria+'"></td><td><input type="text" name="sub[]" class="field" value="'+sub+'"></td><td><input type="text" name="unity[]" class="field" value="'+unity+'"></td><td><input type="number" name="price[]" class="field" value="'+price+'"></td><td><input type="number" name="quantity[]" class="field" value="'+quantity+'"></td><td><input type="text" name="iva[]" class="field" value="'+cal_iva+'"></td><td class="field">'+subtotal[cont]+'</td></tr>';
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
        $("#categoria").val("");
        $("#sub").val("");
        $("#medida").val("");
        $("#clave").val("");
        $("#stock").val("");
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

