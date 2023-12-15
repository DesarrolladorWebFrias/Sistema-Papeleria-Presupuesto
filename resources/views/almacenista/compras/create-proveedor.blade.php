<div class="modal" id="crear_proveedor">
    <div class="modal__content modal__content--xl">
        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
            <h2 class="font-medium text-base mr-auto">
                Crear nuevo proveedor
            </h2>
            <!--
            <button class="button border items-center text-gray-700 hidden sm:flex"> <i data-feather="file" class="w-4 h-4 mr-2"></i> Download Docs </button>
            <div class="dropdown relative sm:hidden">
                <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-700"></i> </a>
                <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-20">
                    <div class="dropdown-box__content box p-2">
                        <a href="javascript:;" class="flex items-center p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="file" class="w-4 h-4 mr-2"></i> Download Docs </a>
                    </div>
                </div>
            </div>
            -->
        </div>
        <form method="POST" action="{{ route('compras.proveedor') }}"  role="form">
            {{ csrf_field() }}
            <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                <div class="col-span-12 sm:col-span-4 @if ($errors->has('nombre')) has-error @endif">
                    <label class="font-medium text-base mr-auto" for="nombre">Nombre</label>
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
                <div class="col-span-12 sm:col-span-4 @if ($errors->has('telefono')) has-error @endif">
                    <label class="font-medium text-base mr-auto" for="telefono">Telefono</label>
                    <input type="number" class="input w-full border mt-2 flex-1" name="telefono" id="telefono" aria-describedby="helpTelefono">
                    <span id="helpTelefono" class="help-block">
                        @if ($errors->has('telefono'))
                            @foreach($errors->get('telefono') as $message)
                                @if(!$loop->first) / @endif
                                {{ $message }}
                            @endforeach
                        @endif
                    </span>
                </div>
                <div class="col-span-12 sm:col-span-4 @if ($errors->has('direccion')) has-error @endif">
                    <label class="font-medium text-base mr-auto" for="direccion">direccion</label>
                    <input type="text" class="input w-full border mt-2 flex-1" name="direccion" id="direccion" aria-describedby="helpDireccion">
                    <span id="helpDireccion" class="help-block">
                        @if ($errors->has('direccion'))
                            @foreach($errors->get('direccion') as $message)
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

