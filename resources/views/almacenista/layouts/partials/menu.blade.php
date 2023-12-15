<div class="mobile-menu md:hidden">
    <div class="mobile-menu-bar">
        <a href="/almacenista/dashboard" class="flex mr-auto">
            <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="{{ asset('images/logo.svg')}}">
        </a>
        <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
    </div>
    <ul class="border-t border-theme-24 py-5 hidden">
        <li>
            <a href="/almacenista/dashboard" class="{{ (request()->is('almacenista/dashboard')) ? 'menu menu--active' : 'menu' }}">
                <div class="menu__icon"> <i data-feather="home"></i> </div>
                <div class="menu__title"> Inicio </div>
            </a>
        </li>
        <li>
            <a href="/almacenista/inventarios" class="{{ (request()->is('almacenista/inventarios')) ? 'menu menu--active' : 'menu' }}">
                <div class="menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="menu__title"> Inventarios </div>
            </a>
        </li>
        <li>
            <a href="/almacenista/compras" class="{{ (request()->is('almacenista/compras')) ? 'side-menu side-menu--active' : 'menu' }}">
                <div class="menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="menu__title"> Crear compras </div>
            </a>
        </li>
        <li>
            <a href="/almacenista/proveedores" class="{{ (request()->is('almacenista/proveedores')) ? 'side-menu side-menu--active' : 'menu' }}">
                <div class="menu__icon"> <i data-feather="hard-drive"></i> </div>
                <div class="menu__title"> Proveedores </div>
            </a>
        </li>
        <li class="menu__devider my-6"></li>
        <li>
            <a href="#" class="{{ (request()->is('reportes')) ? 'side-menu side-menu--active' : 'menu' }}">
                <div class="menu__icon"> <i data-feather="message-square"></i> </div>
                <div class="menu__title"> Reportes </div>
            </a>
        </li>
    </ul>
</div>
<!-- END: Mobile Menu -->
<div class="flex">
    <!-- BEGIN: Side Menu -->
    <nav class="side-nav">
        <a href="/almacenista/dashboard" class="intro-x flex items-center pl-5 pt-4">
            <img alt="Siap" class="w-6" src="{{ asset('images/logo.svg')}}">
            <span class="hidden xl:block text-white text-lg ml-3"> SI<span class="font-medium">AP</span> </span>
        </a>
        <div class="side-nav__devider my-6"></div>
        <ul>
            <li>
                <a href="/almacenista/dashboard" class="{{ (request()->is('almacenista/dashboard')) || (request()->is('almacenista/presupuestos/*')) ? 'side-menu side-menu--active' : 'side-menu' }}">
                    <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                    <div class="side-menu__title"> Inicio </div>
                </a>
            </li>
             <li>
                <a href="/almacenista/vales" class="{{ (request()->is('almacenista/vales')) || (request()->is('almacenista/vales/*')) ? 'side-menu side-menu--active' : 'side-menu' }}">
                    <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                    <div class="side-menu__title"> Vales </div>
                </a>
            </li>
            <li>
                <a href="/almacenista/inventario" class="{{ (request()->is('almacenista/inventario')) || (request()->is('almacenista/inventario/*')) ? 'side-menu side-menu--active' : 'side-menu' }}">
                    <div class="side-menu__icon"> <i data-feather="archive"></i> </div>
                    <div class="side-menu__title"> Inventario </div>
                </a>
            </li>
            <li>
                <a href="/almacenista/compras" class="{{  (request()->is('almacenista/compras')) || ((request()->is('almacenista/compras/create'))|| (request()->is('almacenista/compras/*'))) ? 'side-menu side-menu--active' : 'side-menu' }}">
                    <div class="side-menu__icon"> <i data-feather="shopping-cart"></i> </div>
                    <div class="side-menu__title"> Compras </div>
                </a>
            </li>
            <li>
                <a href="/almacenista/proveedores" class="{{ (request()->is('almacenista/proveedores')) ? 'side-menu side-menu--active' : 'side-menu' }}">
                    <div class="side-menu__icon"> <i data-feather="hard-drive"></i> </div>
                    <div class="side-menu__title"> Proveedores </div>
                </a>
            </li>
            <li class="side-nav__devider my-6"></li>
            <li>
                <a href="/almacenista/reportealmacenista" class="{{ (request()->is('almacenista/reportealmacenista')) ? 'side-menu side-menu--active' : 'side-menu' }}">
                    <div class="side-menu__icon"> <i data-feather="printer"></i> </div>
                    <div class="side-menu__title"> Reportes </div>
                </a>
            </li>
        </ul>
    </nav>