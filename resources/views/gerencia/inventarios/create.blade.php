<div class="modal" id="crear_inventarios">
    <div class="modal__content modal__content--xl">
        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
            <h2 class="font-medium text-base mr-auto">
                Creacion de nuevos inventarios
            </h2>
        </div>
        <form method="POST" action="{{ route('inventarios_geren.store') }}"  role="form">
        {{ csrf_field() }}
        <input type="number" name="user_id" id="user_id" value="{{Auth::user()->id}}" style="display:none">
        <input type="number" name="estatus_id" id="estatus_id" value="1" style="display:none">
        <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
            <div class="col-span-12 sm:col-span-3 @if ($errors->has('nombre')) has-error @endif">
                <label class="font-medium text-base mr-auto" for="nombre">Nombre:</label>
                <input type="text" class="input w-full border mt-2 flex-1" name="nombre" id="nombre" aria-describedby="helpNombre">
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
                <input type="number" class="input w-full border mt-2 flex-1" name="precio" id="precio"  aria-describedby="helpPrecio">
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
                <input type="number" class="input w-full border mt-2 flex-1" name="cantidad" id="cantidad" aria-describedby="helpCantidad">
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
                <input type="text" class="input w-full border mt-2 flex-1" name="iva" id="iva" aria-describedby="helpIva">
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
            <div class="col-span-12 sm:col-span-4 @if ($errors->has('medida')) has-error @endif">
                <label class="font-medium text-base mr-auto" for="medida">Unidad de medida:</label>
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
            <div class="col-span-12 sm:col-span-4 @if ($errors->has('categorias')) has-error @endif">
                <label class="font-medium text-base mr-auto" for="categorias">Categorias:</label>
                 <select class="select2 w-full" id="categorias" name="categorias">
                        <option value="">Selecciona una opcion</option>
                    @foreach($categorias as $categoria)
                        <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                    @endforeach
                </select>
            </div>
             <div class="col-span-12 sm:col-span-4 @if ($errors->has('subcategoria_id')) has-error @endif">
                <label class="font-medium text-base mr-auto" for="subcategoria_id">Subcategorias:</label>
                 <select class="input w-full border mt-2 flex-1" id="subcategoria" name="subcategoria_id">
                        <option value="">Selecciona una opcion</option>
                                    
                </select>
            </div>
            <div class="col-span-12 sm:col-span-12">
            </div>
        </div>
        <div class="px-5 py-3 text-right border-t border-gray-200">
            <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 mr-1">Cancelar</button>
            <button class="button w-20 bg-theme-1 text-white">Guardar</button>
        </div>
        </form>

    </div>
</div>

