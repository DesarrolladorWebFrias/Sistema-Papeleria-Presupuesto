<div class="modal" id="edit-user{{ $usuario->id}}">
    <div class="modal__content modal__content--xl">
        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
            <h2 class="font-medium text-base mr-auto">
                Actualizacion del usuario {{$usuario->name}} {{ $usuario->ap_paterno}} {{ $usuario->ap_materno}}
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
        {!! Form::open(['route' => ['usuarios.update', $usuario->id], 'method' => 'PUT']) !!}
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
        	<div class="col-span-12 sm:col-span-3 @if ($errors->has('name')) has-error @endif">
                <label class="font-medium text-base mr-auto" for="name">Nombre</label>
                <input type="text" class="input w-full border mt-2 flex-1" name="name" id="name" value="{{ $usuario->name }}" aria-describedby="helpNombre">
                <span id="helpNombre" class="help-block">
                    @if ($errors->has('name'))
                        @foreach($errors->get('name') as $message)
                            @if(!$loop->first) / @endif
                            {{ $message }}
                        @endforeach
                    @endif
                </span>
            </div>
            <div class="col-span-12 sm:col-span-3 @if ($errors->has('ap_paterno')) has-error @endif">
                <label class="font-medium text-base mr-auto" for="ap_paterno">Apellido paterno</label>
                <input type="text" class="input w-full border mt-2 flex-1" name="ap_paterno" id="ap_paterno" value="{{ $usuario->ap_paterno }}" aria-describedby="helpAppaterno">
                <span id="helpAppaterno" class="help-block">
                    @if ($errors->has('ap_paterno'))
                        @foreach($errors->get('ap_paterno') as $message)
                            @if(!$loop->first) / @endif
                            {{ $message }}
                        @endforeach
                    @endif
                </span>
            </div>
            <div class="col-span-12 sm:col-span-3 @if ($errors->has('ap_materno')) has-error @endif">
                <label class="font-medium text-base mr-auto" for="ap_materno">Apellido materno</label>
                <input type="text" class="input w-full border mt-2 flex-1" name="ap_materno" id="ap_materno" value="{{ $usuario->ap_materno }}" aria-describedby="helpApmaterno">
                <span id="helpApmaterno" class="help-block">
                    @if ($errors->has('ap_materno'))
                        @foreach($errors->get('ap_materno') as $message)
                            @if(!$loop->first) / @endif
                            {{ $message }}
                        @endforeach
                    @endif
                </span>
            </div>
             <div class="col-span-12 sm:col-span-3 @if ($errors->has('telefono')) has-error @endif">
                <label class="font-medium text-base mr-auto" for="telefono">Telefono</label>
                <input type="text" class="input w-full border mt-2 flex-1" name="telefono" id="telefono" value="{{ $usuario->telefono }}" aria-describedby="helpTelefono">
                <span id="helpTelefono" class="help-block">
                    @if ($errors->has('telefono'))
                        @foreach($errors->get('telefono') as $message)
                            @if(!$loop->first) / @endif
                            {{ $message }}
                        @endforeach
                    @endif
                </span>
            </div>
			<div class="col-span-12 sm:col-span-12">
            </div>
            <div class="col-span-12 sm:col-span-3 @if ($errors->has('role_id')) has-error @endif">
                <label class="font-medium text-base mr-auto" for="role_id">Rol</label>
                 <select class="input w-full border mt-2 flex-1" id="role_id" name="role_id">
                    @foreach($rols as $roles)
                    	<option value="{{$roles->id}}" @if($usuario->role->nombre == $roles->nombre) selected="selected" @endif>{{$roles->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-12 sm:col-span-3 @if ($errors->has('activo')) has-error @endif">
                <label class="font-medium text-base mr-auto" for="activo">Estatus</label>
                 <select class="input w-full border mt-2 flex-1" id="activo" name="activo">
                    @foreach($estatus as $estatu)
                    	<option value="{{$estatu->id}}" @if($usuario->activo == $estatu->id) selected="selected" @endif>{{$estatu->nombre}}</option>
                    @endforeach
                </select>
            </div>
             <div class="col-span-12 sm:col-span-3 @if ($errors->has('area')) has-error @endif">
                <label class="font-medium text-base mr-auto" for="area">Area</label>
                 <select class="input w-full border mt-2 flex-1" id="area" name="area">
                 	@foreach($areas as $areasempresa)
                    	<option value="{{$areasempresa->id}}" @if($usuario->subarea->id == $areasempresa->id) selected="selected" @endif>{{$areasempresa->nombre}}</option>
                    @endforeach                 	
                </select>
            </div>
            <div class="col-span-12 sm:col-span-3 @if ($errors->has('subarea_id')) has-error @endif">
                <label class="font-medium text-base mr-auto" for="subarea_id">Sub Areas</label>
                 <select class="input w-full border mt-2 flex-1" id="subarea_id" name="subarea_id">
                    <option value="{{$usuario->subarea->id}}">{{$usuario->subarea->nombre}}</option>
                </select>
            </div>
            <div class="col-span-12 sm:col-span-12">
            </div>
            <div class="col-span-12 sm:col-span-6 @if ($errors->has('email')) has-error @endif">
                <label class="font-medium text-base mr-auto" for="email">Correo</label>
                <input type="email" class="input w-full border mt-2 flex-1" name="email" id="email" value="{{ $usuario->email }}" aria-describedby="helpEmail" disabled>
                <span id="helpEmail" class="help-block">
                    @if ($errors->has('email '))
                        @foreach($errors->get('email ') as $message)
                            @if(!$loop->first) / @endif
                            {{ $message }}
                        @endforeach
                    @endif
                </span>
            </div>
            <div class="col-span-12 sm:col-span-6 @if ($errors->has('direccion')) has-error @endif">
                <label class="font-medium text-base mr-auto" for="direccion">Direccion</label>
                <input type="text" class="input w-full border mt-2 flex-1" name="direccion" id="direccion" value="{{ $usuario->direccion }}" aria-describedby="helpDireccion">
                <span id="helpDireccion" class="help-block">
                    @if ($errors->has('direccion'))
                        @foreach($errors->get('direccion') as $message)
                            @if(!$loop->first) / @endif
                            {{ $message }}
                        @endforeach
                    @endif
                </span>
            </div>
        </div>
        <div class="px-5 py-3 text-right border-t border-gray-200">
            <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 mr-1">Cancelar</button>
            <button class="button w-20 bg-theme-1 text-white">Guardar</button>
        </div>
        {!! Form::close()!!}
    </div>
</div>

