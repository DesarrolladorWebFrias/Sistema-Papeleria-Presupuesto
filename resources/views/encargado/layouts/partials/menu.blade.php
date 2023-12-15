<div class="mobile-menu md:hidden">
    <div class="mobile-menu-bar">
        <a href="/encargado/dashboard" class="flex mr-auto">
            <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="{{ asset('images/logo.svg')}}">
        </a>
        <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
    </div>
    <ul class="border-t border-theme-24 py-5 hidden">
        <li>
            <a href="/encargado/dashboard" class="{{ (request()->is('encargado/dashboard')) ? 'menu menu--active' : 'menu' }}">
                <div class="menu__icon"> <i data-feather="home"></i> </div>
                <div class="menu__title"> Inicio </div>
            </a>
        </li>
        <li>
            <a href="/encargado/presupuesto" class="{{ (request()->is('encargado/presupuesto')) ? 'menu menu--active' : 'menu' }}">
                <div class="menu__icon"> <i data-feather="home"></i> </div>
                <div class="menu__title"> Crear presupuesto </div>
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
        <a href="/encargado/dashboard" class="intro-x flex items-center pl-5 pt-4">
            <img alt="Siap" class="w-6" src="{{ asset('images/logo.svg')}}">
            <span class="hidden xl:block text-white text-lg ml-3"> SI<span class="font-medium">AP</span> </span>
        </a>
        <div class="side-nav__devider my-6"></div>
        <ul>
            <li>
                <a href="/encargado/dashboard" class="{{ ((request()->is('encargado/dashboard')) || (request()->is('encargado/presupuesto/*'))) ? 'side-menu side-menu--active' : 'side-menu' }}">
                    <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                    <div class="side-menu__title"> Inicio </div>
                </a>
            </li>
            <li>
                <a href="/encargado/presupuesto" class="{{ (request()->is('encargado/presupuesto'))  ? 'side-menu side-menu--active' : 'side-menu' }}">
                    <div class="side-menu__icon"> <i data-feather="credit-card"></i> </div>
                    <div class="side-menu__title"> Crear presupuesto </div>
                </a>
            </li>
            <li class="side-nav__devider my-6"></li>
            <li>
                <a href="/encargado/reportencargado" class="{{ (request()->is('encargado/reportencargado'))  ? 'side-menu side-menu--active' : 'side-menu' }}">
                    <div class="side-menu__icon"> <i data-feather="printer"></i> </div>
                    <div class="side-menu__title"> Reportes </div>
                </a>
            </li>
        </ul>
    </nav>