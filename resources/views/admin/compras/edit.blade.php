<div class="modal" id="edit-compras{{$detail->id}}">
    <div class="modal__content modal__content--xl">
        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
            <h2 class="font-medium text-base mr-auto">
                Actualizacion del producto: {{$detail->productos->nombre}}
            </h2>
            <button class="button border items-center text-gray-700 hidden sm:flex"> <i data-feather="file" class="w-4 h-4 mr-2"></i> Download Docs </button>
            <div class="dropdown relative sm:hidden">
                <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-700"></i> </a>
                <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-20">
                    <div class="dropdown-box__content box p-2">
                        <a href="javascript:;" class="flex items-center p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="file" class="w-4 h-4 mr-2"></i> Download Docs </a>
                    </div>
                </div>
            </div>
        </div>
         {!! Form::open(['route' => ['compra.update', $detail->id], 'method' => 'PUT']) !!}
        {{ csrf_field() }}
            <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                 <div class="col-span-12 sm:col-span-3 @if ($errors->has('product_compra_id')) has-error @endif">
                    <label class="font-medium text-base mr-auto" for="product_compra_id">Nombre del producto:</label>
                    <input type="producto_id" name="producto_id" value="{{ $detail->productos->id }}"  style="display:none">
                    <input type="compra_id" name="compra_id" value="{{ $detail->compra_id }}"  style="display:none">

                    <input type="text" class="input w-full border mt-2 flex-1" name="product_compra_id" id="product_compra_id" value="{{ $detail->productos->nombre }}" aria-describedby="helpnombre">
                    <span id="helpnombre" class="help-block">
                        @if ($errors->has('product_compra_id'))
                            @foreach($errors->get('product_compra_id') as $message)
                                @if(!$loop->first) / @endif
                                {{ $message }}
                            @endforeach
                        @endif
                    </span>
                </div>
                <div class="col-span-12 sm:col-span-3 @if ($errors->has('precio')) has-error @endif">
                    <label class="font-medium text-base mr-auto" for="precio">Precio:</label>
                    <input type="number" class="input w-full border mt-2 flex-1" name="precio" id="precio" value="{{ $detail->precio }}" aria-describedby="helpPrecio">
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
                    <input type="number" class="input w-full border mt-2 flex-1" name="cantidad" id="cantidad" value="{{ $detail->cantidad }}" aria-describedby="helpCantidad">
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
                    <label class="font-medium text-base mr-auto" for="iva">Iva:</label>
                    <input type="number" class="input w-full border mt-2 flex-1" name="iva" id="iva" value="{{ $detail->iva }}" aria-describedby="helpIva">
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
                <div class="col-span-12 sm:col-span-4 @if ($errors->has('unidad')) has-error @endif">
                    <label class="font-medium text-base mr-auto" for="unidad">Unidad de medida:</label>
                     <select class="input w-full border mt-2 flex-1" id="unidad" name="unidad">
                        <option value="PZ" @if($detail->unidad == "PZ") selected="selected" @endif>PZ</option>
                        <option value="PQ" @if($detail->unidad == "PQ") selected="selected" @endif>PQ</option>
                        <option value="CJ" @if($detail->unidad == "CJ") selected="selected" @endif>CJ</option>
                        <option value="TUBO" @if($detail->unidad == "TUBO") selected="selected" @endif>TUBO</option>
                        <option value="JK" @if($detail->unidad == "JK") selected="selected" @endif>JK</option>
                        <option value="BK" @if($detail->unidad == "BK") selected="selected" @endif>BK</option>
                    </select>
                </div>
                <div class="col-span-12 sm:col-span-4 @if ($errors->has('categoria')) has-error @endif">
                    <label class="font-medium text-base mr-auto" for="categoria">Categoria:</label>
                     <select class="input w-full border mt-2 flex-1" id="categoria" name="categoria">
                         @foreach($categorias as $categoria)
                            <option value="{{$categoria->id}}" @if($detail->subcategorias->categorias_id == $categoria->id) selected="selected" @endif>{{$categoria->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-span-12 sm:col-span-4 @if ($errors->has('sub_categoria')) has-error @endif">
                    <label class="font-medium text-base mr-auto">subcategoria</label>
                    <div class="mt-2">
                         <select class="input w-full border mt-2 flex-1" id="sub_categoria" name="sub_categoria">
                            <option value="">Selecciona una opcion</option>
                        </select>
                    </div>
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