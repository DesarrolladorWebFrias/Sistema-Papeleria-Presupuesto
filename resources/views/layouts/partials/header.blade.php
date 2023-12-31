<!-- Inicio del encabezado -->
<div class="top-bar">
    <!-- BEGIN: Breadcrumb -->
    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="" class=""><strong>Bienvenido {{Auth::user()->role->nombre}}: {{Auth::user()->name}} {{Auth::user()->ap_paterno}} {{Auth::user()->ap_materno}}</strong></a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="" class="breadcrumb--active">Vista del @yield('title')</a> </div>
    <!-- END: Breadcrumb -->
  
    <!-- BEGIN: Account Menu -->
    <div class="intro-x dropdown w-8 h-8 relative">
        <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in">
            <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="{{ asset('images/perfil/masculino.png')}}">
        </div>
        <div class="dropdown-box mt-10 absolute w-56 top-0 right-0 z-20">
            <div class="dropdown-box__content box bg-theme-38 text-white">
                <div class="p-4 border-b border-theme-40">
                    <div class="font-medium">{{Auth::user()->name}}</div>
                    <div class="text-xs text-theme-41">{{Auth::user()->email}}</div>
                </div>
                <div class="p-2">
                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="user" class="w-4 h-4 mr-2"></i> Perfil </a>
                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="lock" class="w-4 h-4 mr-2"></i> Cambiar Contraseña </a>
                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="help-circle" class="w-4 h-4 mr-2"></i> Ayuda </a>
                </div>
                <div class="p-2 border-t border-theme-40">
                    <a href="{{ route('logout') }}" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Salir </a>
                </div>
            </div>
        </div>
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
    <!-- END: Account Menu -->
</div>
<!-- Finalizacion del encabezado -->