<div class="mobile-menu md:hidden">
    <div class="mobile-menu-bar">
        <a href="/gerencia/dashboard" class="flex mr-auto">
            <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="{{ asset('images/logo.svg')}}">
        </a>
        <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
    </div>
    <ul class="border-t border-theme-24 py-5 hidden">
        <li>
            <a href="/home" class="{{ (request()->is('home')) ? 'menu menu--active' : 'menu' }}">
                <div class="menu__icon"> <i data-feather="home"></i> </div>
                <div class="menu__title"> Inicio </div>
            </a>
        </li>
    </ul>
</div>
<!-- END: Mobile Menu -->
<div class="flex">
    <!-- BEGIN: Side Menu -->
    <nav class="side-nav">
        <a href="/gerencia/dashboard" class="intro-x flex items-center pl-5 pt-4">
            <img alt="Siap" class="w-6" src="{{ asset('images/logo.svg')}}">
            <span class="hidden xl:block text-white text-lg ml-3"> SI<span class="font-medium">AP</span> </span>
        </a>
        <div class="side-nav__devider my-6"></div>
        <ul>
            <li>
                <a href="/gerencia/dashboard" class="{{ ((request()->is('gerencia/dashboard')) || (request()->is('gerencia/presupuestosmostrar/*'))) ? 'side-menu side-menu--active' : 'side-menu' }}">
                    <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                    <div class="side-menu__title"> Presupuestos </div>
                </a>
            </li>
            <li>
                <a href="/gerencia/comprasautorizar" class="{{  (request()->is('gerencia/comprasautorizar')) || ((request()->is('gerencia/comprasautorizar/*'))|| (request()->is('almacenista/compras/*'))) ? 'side-menu side-menu--active' : 'side-menu' }}">
                    <div class="side-menu__icon"> <i data-feather="shopping-cart"></i> </div>
                    <div class="side-menu__title"> Compras </div>
                </a>
            </li>
            <li class="side-nav__devider my-6"></li>
            <li>
                <a href="/gerencia/inventarios_geren" class="{{ (request()->is('gerencia/inventarios_geren')) || (request()->is('gerencia/inventarios_geren/*')) ? 'side-menu side-menu--active' : 'side-menu' }}">
                    <div class="side-menu__icon"> <i data-feather="archive"></i> </div>
                    <div class="side-menu__title"> Inventarios </div>
                </a>
            </li>
            <li>
                <a href="/gerencia/proveedorgerencia" class="{{ (request()->is('gerencia/proveedorgerencia')) ? 'side-menu side-menu--active' : 'side-menu' }}">
                    <div class="side-menu__icon"> <i data-feather="hard-drive"></i> </div>
                    <div class="side-menu__title"> Proveedores </div>
                </a>
            </li>
            <li class="side-nav__devider my-6"></li>
            <li>
                <a href="#" class="side-menu">
                    <div class="side-menu__icon"> <i data-feather="printer"></i> </div>
                    <div class="side-menu__title"> Reportes </div>
                </a>
            </li>
        </ul>
    </nav>