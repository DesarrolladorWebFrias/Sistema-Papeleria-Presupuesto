<div class="modal" id="mostrar-presupuesto{{$detail->presupuesto_id}}">
    <div class="modal__content modal__content--xl">
        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
            <h2 class="font-medium text-base mr-auto">
               Folio del presupuesto del movimiento: {{$detail->presupuesto_id}}
            </h2>
        </div>
        <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
            <div class="col-span-12 sm:col-span-6 @if ($errors->has('nombre')) has-error @endif">
                <label class="font-medium text-base mr-auto" for="nombre">Descripcion:</label>
                <input type="text" class="input w-full border mt-2 flex-1" name="nombre" id="nombre" aria-describedby="helpDescripcion" value="{{$detail->presupuesto->descripcion}}" disabled>
                <span id="helpDescripcion" class="help-block">
                    @if ($errors->has('nombre'))
                        @foreach($errors->get('nombre') as $message)
                            @if(!$loop->first) / @endif
                            {{ $message }}
                        @endforeach
                    @endif
                </span>
            </div>
            <div class="col-span-12 sm:col-span-3 @if ($errors->has('precio')) has-error @endif">
                <label class="font-medium text-base mr-auto" for="precio">Periodo:</label>
                <input type="number" class="input w-full border mt-2 flex-1" name="precio" id="precio"  aria-describedby="helpPeriodo"  value="{{$detail->presupuesto->periodo}}" disabled>
                <span id="helpPeriodo" class="help-block">
                    @if ($errors->has('precio'))
                        @foreach($errors->get('precio') as $message)
                            @if(!$loop->first) / @endif
                            {{ $message }}
                        @endforeach
                    @endif
                </span>
            </div>
            <div class="col-span-12 sm:col-span-3 @if ($errors->has('cantidad')) has-error @endif">
                <label class="font-medium text-base mr-auto" for="cantidad">Estatus:</label>
                <input type="text" class="input w-full border mt-2 flex-1" name="cantidad" id="cantidad" aria-describedby="helpEstatus"  value="{{$detail->presupuesto->estatuspresupuesto->nombre}}" disabled>
                <span id="helpEstatus" class="help-block">
                    @if ($errors->has('cantidad'))
                        @foreach($errors->get('cantidad') as $message)
                            @if(!$loop->first) / @endif
                            {{ $message }}
                        @endforeach
                    @endif
                </span>
            </div>            
            <div class="col-span-12 sm:col-span-12">
            </div>
             <div class="col-span-12 sm:col-span-3 @if ($errors->has('tipo_movimiento_id')) has-error @endif">
                <label class="font-medium text-base mr-auto" for="tipo_movimiento_id">Tipo de movimiento:</label>
                <input type="text" class="input w-full border mt-2 flex-1" name="tipo_movimiento_id" id="tipo_movimiento_id" aria-describedby="helpTipoMovimiento" value="{{$detail->tipomovimiento->nombre}}" disabled>
                <span id="helpTipoMovimiento" class="help-block">
                    @if ($errors->has('nombre'))
                        @foreach($errors->get('nombre') as $message)
                            @if(!$loop->first) / @endif
                            {{ $message }}
                        @endforeach
                    @endif
                </span>
            </div>
            <div class="col-span-12 sm:col-span-5 @if ($errors->has('user_id')) has-error @endif">
                <label class="font-medium text-base mr-auto" for="user_id">Usuario que lo solicito:</label>
                <input type="text" class="input w-full border mt-2 flex-1" name="user_id" id="user_id"  aria-describedby="helpUser"  value="{{$detail->presupuesto->user->name}} {{$detail->presupuesto->user->ap_paterno}} {{$detail->presupuesto->user->ap_materno}}" disabled>
                <span id="helpUser" class="help-block">
                    @if ($errors->has('user_id'))
                        @foreach($errors->get('user_id') as $message)
                            @if(!$loop->first) / @endif
                            {{ $message }}
                        @endforeach
                    @endif
                </span>
            </div>
            <div class="col-span-12 sm:col-span-2 @if ($errors->has('area_id')) has-error @endif">
                <label class="font-medium text-base mr-auto" for="area_id">Area:</label>
                <input type="text" class="input w-full border mt-2 flex-1" aria-describedby="helpCantidad"  value="{{$detail->presupuesto->user->subarea->area->nombre}}" disabled>
                <span id="helpCantidad" class="help-block">
                    @if ($errors->has('cantidad'))
                        @foreach($errors->get('cantidad') as $message)
                            @if(!$loop->first) / @endif
                            {{ $message }}
                        @endforeach
                    @endif
                </span>
            </div> 
            <div class="col-span-12 sm:col-span-2 @if ($errors->has('area_id')) has-error @endif">
                <label class="font-medium text-base mr-auto" for="area_id">Subarea:</label>
                <input type="text" class="input w-full border mt-2 flex-1" aria-describedby="helpCantidad"  value="{{$detail->presupuesto->user->subarea->nombre}}" disabled>
                <span id="helpCantidad" class="help-block">
                    @if ($errors->has('cantidad'))
                        @foreach($errors->get('cantidad') as $message)
                            @if(!$loop->first) / @endif
                            {{ $message }}
                        @endforeach
                    @endif
                </span>
            </div> 
            <div class="col-span-12 sm:col-span-12">
            </div>
             <div class="col-span-12 sm:col-span-2 @if ($errors->has('producto')) has-error @endif">
                <label class="font-medium text-base mr-auto" for="producto">Producto:</label>
                <input type="text" class="input w-full border mt-2 flex-1" value="{{$detail->producto->nombre}}" disabled>
                
            </div>
            <div class="col-span-12 sm:col-span-2 @if ($errors->has('precio')) has-error @endif">
                <label class="font-medium text-base mr-auto" for="precio">Precio:</label>
                <input type="text" class="input w-full border mt-2 flex-1" value="$ {{number_format($detail->producto->precio, 2)}}" disabled>
              
            </div>
            <div class="col-span-12 sm:col-span-2 @if ($errors->has('cantidad')) has-error @endif">
                <label class="font-medium text-base mr-auto" for="cantidad">Cantidad:</label>
                <input type="text" class="input w-full border mt-2 flex-1" value="{{number_format($detail->cantidad, 2)}}" disabled>
                
            </div> 
            <div class="col-span-12 sm:col-span-2 @if ($errors->has('subtotal')) has-error @endif">
                <label class="font-medium text-base mr-auto" for="subtotal">Subtotal:</label>
                <input type="text" class="input w-full border mt-2 flex-1" value="$ {{number_format($detail->producto->precio * $detail->cantidad, 2)}}" disabled>
            </div>   
             <div class="col-span-12 sm:col-span-2 @if ($errors->has('iva')) has-error @endif">
                <label class="font-medium text-base mr-auto" for="iva">Iva:</label>
                <input type="text" class="input w-full border mt-2 flex-1" value="$ {{number_format(($detail->producto->precio * $detail->cantidad)*$detail->producto->iva, 2)}}" disabled>
            </div> 
             <div class="col-span-12 sm:col-span-2 @if ($errors->has('total')) has-error @endif">
                <label class="font-medium text-base mr-auto" for="total">Total:</label>
                <input type="text" class="input w-full border mt-2 flex-1" value="$ {{number_format($detail->total, 2)}}" disabled>
            </div> 
        </div>
        <div class="px-5 py-3 text-right border-t border-gray-200">
            <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 mr-1">Cancelar</button>
            <button class="button w-40 bg-theme-3 text-white"> <a href="{{ route('presupuestos.show', $detail->presupuesto_id) }}"> Mostrar presupuesto </a></button>
        </div>

    </div>
</div>


