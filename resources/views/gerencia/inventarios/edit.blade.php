<div class="modal" id="edit-inventarios{{$id}}">
    <div class="modal__content modal__content--xl">
        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
            <h2 class="font-medium text-base mr-auto">
                Edicion del producto: {{$nombre}}
            </h2>
        </div>
        {!! Form::open(['route' => ['inventarios_geren.update', $id], 'method' => 'PUT']) !!}
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">       
        <input type="number" name="user_id" id="user_id" value="{{Auth::user()->id}}" style="display:none">
        <input type="number" name="estatus_id" id="estatus_id" value="1" style="display:none">
        <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
            <div class="col-span-12 sm:col-span-3 @if ($errors->has('nombre')) has-error @endif">
                <label class="font-medium text-base mr-auto" for="nombre">Nombre:</label>
                <input type="text" class="input w-full border mt-2 flex-1" name="nombre" id="nombre" aria-describedby="helpNombre" value="{{$nombre}}">
                <span id="helpNombre" class="help-block">
                    @if ($errors->has('nombre'))
                        @foreach($errors->get('nombre') as $message)
                            @if(!$loop->first) / @endif
                            {{ $message }}
                        @endforeach
                    @endif
                </span>
            </div>
            <div class="col-span-12 sm:col-span-3 @if ($errors->has('precio')) has-error @endif">
                <label class="font-medium text-base mr-auto" for="precio">Precio:</label>
                <input type="number" class="input w-full border mt-2 flex-1" name="precio" id="precio"  aria-describedby="helpPrecio"  value="{{$precio}}">
                <span id="helpPrecio" class="help-block">
                    @if ($errors->has('precio'))
                        @foreach($errors->get('precio') as $message)
                            @if(!$loop->first) / @endif
                            {{ $message }}
                        @endforeach
                    @endif
                </span>
            </div>
            <div class="col-span-12 sm:col-span-3 @if ($errors->has('cantidad')) has-error @endif">
                <label class="font-medium text-base mr-auto" for="cantidad">Cantidad:</label>
                <input type="number" class="input w-full border mt-2 flex-1" name="cantidad" id="cantidad" aria-describedby="helpCantidad"  value="{{$cantidad}}" disabled>
                <span id="helpCantidad" class="help-block">
                    @if ($errors->has('cantidad'))
                        @foreach($errors->get('cantidad') as $message)
                            @if(!$loop->first) / @endif
                            {{ $message }}
                        @endforeach
                    @endif
                </span>
            </div>            
             <div class="col-span-12 sm:col-span-3 @if ($errors->has('iva')) has-error @endif">
                <label class="font-medium text-base mr-auto" for="iva">IVA:</label>
                <input type="text" class="input w-full border mt-2 flex-1" name="iva" id="iva" aria-describedby="helpIva"  value="{{$iva}}">
                <span id="helpIva" class="help-block">
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
            <div class="col-span-12 sm:col-span-3 @if ($errors->has('medida')) has-error @endif">
                <label class="font-medium text-base mr-auto" for="medida">Unidad de medida:</label>
                <select class="input w-full border mt-2 flex-1" id="medida" name="medida">
                    <option value="PZ" @if($medida == "PZ") selected="selected" @endif>PZ</option>
                    <option value="PQ" @if($medida == "PQ") selected="selected" @endif>PQ</option>
                    <option value="CJ" @if($medida== "CJ") selected="selected" @endif>CJ</option>
                    <option value="TUBO" @if($medida == "TUBO") selected="selected" @endif>TUBO</option>
                    <option value="JK" @if($medida == "JK") selected="selected" @endif>JK</option>
                    <option value="BK" @if($medida == "BK") selected="selected" @endif>BK</option>

                </select>
            </div>
            <div class="col-span-12 sm:col-span-3 @if ($errors->has('subcategoria_id')) has-error @endif">
                <label class="font-medium text-base mr-auto" for="subcategoria_id">Subcategorias:</label>
                 <select class="input w-full border mt-2 flex-1" id="subcategoria_id" name="subcategoria_id">
                 @php $subcategoriaas = \App\SubCategorias::all(); @endphp
                        @foreach($subcategoriaas as $subcategoriass)
                            <option value="{{$subcategoriass->id}}" @if($subcategoriass->id == $subcategoria_id) selected="selected" @endif>{{$subcategoriass->nombre}} - {{$subcategoriass->categorias->nombre}}</option>
                        @endforeach
                </select>
            </div>
            <div class="col-span-12 sm:col-span-3 @if ($errors->has('movimiento')) has-error @endif">
                <label class="font-medium text-base mr-auto" for="movimiento">Tipo de movimiento:</label>
                <select class="input w-full border mt-2 flex-1" id="movimiento" name="movimiento">
                    <option value="">Seleccione una opción</option>
                    <option value="1" >Alta</option>
                    <option value="4" >Baja</option>
                    <option value="5" >Error en la cantidad</option>
                </select>
            </div>
            <div class="col-span-12 sm:col-span-3">
                <label class="font-medium text-base mr-auto" for="cantidadmovimiento">Cantidad a corregir:</label>
                <input type="number" class="input w-full border mt-2 flex-1" name="cantidadmovimiento" id="cantidadmovimiento" aria-describedby="helpCantidad">
                <span id="helpCantidad" class="help-block">
                    @if ($errors->has('cantidadmovimiento'))
                        @foreach($errors->get('cantidadmovimiento') as $message)
                            @if(!$loop->first) / @endif
                            {{ $message }}
                        @endforeach
                    @endif
                </span>
            </div>
            <div class="col-span-12 sm:col-span-12">
            </div>
        </div>
        <div class="px-5 py-3 text-right border-t border-gray-200">
            <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 mr-1">Cancelar</button>
            <button class="button w-20 bg-theme-1 text-white">Guardar</button>
        </div>
        {!! Form::close()!!}
    </div>
</div>


