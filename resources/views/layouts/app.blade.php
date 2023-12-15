<!DOCTYPE html>

<html lang="en">
    <!-- Inicio del Head -->
    <head>
        <meta charset="utf-8">
        <title>SIAP | @yield('title')</title>
        <link rel="shorcut icon" href="{{ asset('images/logo.svg')}}"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Sitio web oficial del Sistema integral de papelería y presupuesto.">
        <meta name="author" content="Jimmy Frias">
        <!-- Inicio del CSS de la pagina-->
        <link rel="stylesheet" href="{{ asset('css/app.css')}}" />
        <!-- Finalización del CSS de la pagina-->
    </head>
    <!-- Finalización del Head -->
    <body class="app">
        <!-- Inicio del Menu -->
            @if(Auth::user()->role->id == 1)
                @include('layouts.partials.menu')
            @elseif(Auth::user()->role->id == 2)
                @include('gerencia.layouts.partials.menu')
            @elseif(Auth::user()->role->id == 3)
                @include('almacenista.layouts.partials.menu')
            @else
                @include('encargado.layouts.partials.menu')
            @endif
        <!-- Finalización del Menu -->
            <!-- Incio del contenedor -->
            <div class="content">
                @include('layouts.partials.header')
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <p>Corrige los siguientes errores:</p>
                            <ul>
                                @foreach ($errors->all() as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                @section('content')
                @show

            </div>
            <!-- Finalización del contenedor -->
        <!-- Incio del JS Assets-->
   
        <script src="{{ asset('js/app.js')}}"></script>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>  
        @section('scripts_ready')
        @show
        @include('sweet::alert')     
        
        <!-- Finalización: JS Assets-->
    </body>
</html>