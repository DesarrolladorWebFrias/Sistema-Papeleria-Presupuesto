<div class="modal" id="edit-categoria{{$subcategorias->id}}">
    <div class="modal__content modal__content--xl">
        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
            <h2 class="font-medium text-base mr-auto">
                Actualizacion de la subcategorias {{$subcategorias->nombre}}
            </h2>
        </div>
        {!! Form::open(['route' => ['subcategorias.update', $subcategorias->id], 'method' => 'PUT']) !!}
        {{ csrf_field() }}
            <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                <div class="col-span-12 sm:col-span-6 @if ($errors->has('nombre')) has-error @endif">
                    <label class="font-medium text-base mr-auto" for="nombre">Nombre de la subcategoria:</label>
                    <input type="text" class="input w-full border mt-2 flex-1" name="nombre" id="nombre" value="{{ $subcategorias->nombre }}" aria-describedby="helpNombre">
                    <span id="helpNombre" class="help-block">
                        @if ($errors->has('nombre'))
                            @foreach($errors->get('nombre') as $message)
                                @if(!$loop->first) / @endif
                                {{ $message }}
                            @endforeach
                        @endif
                    </span>
                </div>
                <div class="col-span-12 sm:col-span-6 @if ($errors->has('categorias_id')) has-error @endif">
                    <label class="font-medium text-base mr-auto" for="categorias_id">Nombre de la empresa:</label>
                    <select class="input w-full border mt-2 flex-1" id="categorias_id" name="categorias_id">
                        @foreach($categorias as $categoria)
                            <option value="{{$categoria->id}}" @if($subcategorias->categorias_id == $categoria->id) selected="selected" @endif>{{$categoria->nombre}}</option>
                        @endforeach
                    </select>
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

