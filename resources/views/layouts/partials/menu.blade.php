<div class="mobile-menu md:hidden">
    <div class="mobile-menu-bar">
        <a href="/home" class="flex mr-auto">
            <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="{{ asset('images/logo.svg')}}">
        </a>
        <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
    </div>
    <ul class="border-t border-theme-24 py-5 hidden">
        <li>
            <a href="/admin/dashboard" class="{{ (request()->is('admin/dashboard')) ? 'menu menu--active' : 'menu' }}">
                <div class="menu__icon"> <i data-feather="home"></i> </div>
                <div class="menu__title"> Inicio </div>
            </a>
        </li>
        <li>
            <a href="/admin/empresa" class="{{ (request()->is('/admin/empresa')) ? 'menu menu--active' : 'menu' }}">
                <div class="menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="menu__title"> Centro de trabajo </div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="{{ (request()->is('usuarios')) ? 'side-menu side-menu--active' : 'menu' }}">
                <div class="menu__icon"> <i data-feather="box"></i> </div>
                <div class="menu__title"> Usuarios <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="#" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Administradores </div>
                    </a>
                </li>
                <li>
                    <a href="#" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Almacenistas </div>
                    </a>
                </li>
                <li>
                    <a href="#" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Gerencias </div>
                    </a>
                </li>
                <li>
                    <a href="#" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Encargados </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#" class="{{ (request()->is('articulos')) ? 'side-menu side-menu--active' : 'menu' }}">
                <div class="menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="menu__title"> Articulos </div>
            </a>
        </li>
        <li>
            <a href="#" class="{{ (request()->is('proveedores')) ? 'side-menu side-menu--active' : 'menu' }}">
                <div class="menu__icon"> <i data-feather="hard-drive"></i> </div>
                <div class="menu__title"> Proveedores </div>
            </a>
        </li>
        <li class="menu__devider my-6"></li>
        <li>
            <a href="/admin/empresa" class="{{ (request()->is('admin/empresa')) ? 'side-menu side-menu--active' : 'menu' }}">
                <div class="menu__icon"> <i data-feather="credit-card"></i> </div>
                <div class="menu__title"> Empresas </div>
            </a>
        </li>
        <li>
            <a href="#" class="{{ (request()->is('negocio')) ? 'side-menu side-menu--active' : 'menu' }}">
                <div class="menu__icon"> <i data-feather="message-square"></i> </div>
                <div class="menu__title"> Linea de negocio </div>
            </a>
        </li>
        <li class="menu__devider my-6"></li>
        <li>
            <a href="#" class="{{ (request()->is('comprases')) ? 'side-menu side-menu--active' : 'menu' }}">
                <div class="menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="menu__title"> Compras especiales </div>
            </a>
        </li>
        <li>
            <a href="#" class="{{ (request()->is('comprasnor')) ? 'side-menu side-menu--active' : 'menu' }}">
                <div class="menu__icon"> <i data-feather="hard-drive"></i> </div>
                <div class="menu__title"> Compra normal </div>
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
        <a href="/home" class="intro-x flex items-center pl-5 pt-4">
            <img alt="Siap" class="w-6" src="{{ asset('images/logo.svg')}}">
            <span class="hidden xl:block text-white text-lg ml-3"> SI<span class="font-medium">AP</span> </span>
        </a>
        <div class="side-nav__devider my-6"></div>
        <ul>
            <li>
                <a href="/admin/dashboard" class="{{ (request()->is('admin/dashboard')) ? 'side-menu side-menu--active' : 'side-menu' }}">
                    <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                    <div class="side-menu__title"> Inicio </div>
                </a>
            </li>
            <li>
                <a href="/admin/empresa" class="{{ (request()->is('admin/empresa')) ? 'side-menu side-menu--active' : 'side-menu' }}">
                    <div class="side-menu__icon"> <i data-feather="credit-card"></i> </div>
                    <div class="side-menu__title"> Centro de trabajo </div>
                </a>
            </li>
            <li>
                <a href="/admin/areas" class="{{  (request()->is('admin/areas')) ? 'side-menu side-menu--active' : 'side-menu' }}">
                    <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                    <div class="side-menu__title"> Departamentos </div>
                </a>
            </li>
            <li>
                <a href="/admin/subareas" class="{{ (request()->is('admin/subareas')) ? 'side-menu side-menu--active' : 'side-menu' }}">
                    <div class="side-menu__icon"> <i data-feather="hard-drive"></i> </div>
                    <div class="side-menu__title"> Centro de costos </div>
                </a>
            </li>
            <li>
                <a href="/admin/categorias" class="{{ (request()->is('admin/categorias')) ? 'side-menu side-menu--active' : 'side-menu' }}">
                    <div class="side-menu__icon"> <i data-feather="package"></i> </div>
                    <div class="side-menu__title"> Categorias </div>
                </a>
            </li>
            <li>
                <a href="/admin/subcategorias" class="{{ (request()->is('admin/subcategorias')) ? 'side-menu side-menu--active' : 'side-menu' }}">
                    <div class="side-menu__icon"> <i data-feather="paperclip"></i> </div>
                    <div class="side-menu__title"> Subcategorias </div>
                </a>
            </li>
            
            <li>
                <a href="/admin/usuarios" class="{{ (request()->is('admin/usuarios')) ? 'side-menu side-menu--active' : 'side-menu' }}">
                    <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                    <div class="side-menu__title"> Usuarios </div>
                </a>
            </li>
            <li class="side-nav__devider my-6"></li>
            <li>
                <a href="/admin/inventarios" class="{{ (request()->is('admin/inventarios')) || (request()->is('admin/inventarios/*'))? 'side-menu side-menu--active' : 'side-menu' }}">
                    <div class="side-menu__icon"> <i data-feather="archive"></i> </div>
                    <div class="side-menu__title"> Inventarios </div>
                </a>
            </li>
            <li>
                <a href="/admin/compra" class="{{ (request()->is('admin/compra')) || (request()->is('admin/compra/*'))? 'side-menu side-menu--active' : 'side-menu' }}">
                    <div class="side-menu__icon"> <i data-feather="shopping-cart"></i> </div>
                    <div class="side-menu__title"> Compras </div>
                </a>
            </li>
            <li>
                <a href="/admin/presupuestoadmin" class="{{ (request()->is('admin/presupuestoadmin')) || (request()->is('admin/presupuestoadmin/*'))? 'side-menu side-menu--active' : 'side-menu' }}">
                    <div class="side-menu__icon"> <i data-feather="calendar"></i> </div>
                    <div class="side-menu__title"> Presupuesto </div>
                </a>
            </li>
            <li>
                <a href="/admin/proveedor" class="{{ (request()->is('admin/proveedor')) ? 'side-menu side-menu--active' : 'side-menu' }}">
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