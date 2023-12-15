<!DOCTYPE html>
<html lang="en">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="{{ asset('images/logo.svg')}}" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Papeleria | Login</title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="{{ asset('css/app.css')}}" />
        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
    <body class="login">
        <div class="container sm:px-10">
            <div class="block xl:grid grid-cols-2 gap-4">
                <!-- BEGIN: Login Info -->
                <div class="hidden xl:flex flex-col min-h-screen">
                    <a href="" class="-intro-x flex items-center pt-5">
                        <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="{{ asset('images/logo.svg')}}">
                        <span class="text-white text-lg ml-3"> SI<span class="font-medium">AP</span> </span>
                    </a>
                    <div class="my-auto">
                        <img alt="Midone Tailwind HTML Admin Template" class="-intro-x w-1/2 -mt-16" src="{{ asset('images/illustration.svg')}}">
                        <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                           Sistema integral de  
                            <br>
                           papelería y presupuesto
                        </div>
                    </div>
                </div>
                <!-- END: Login Info -->
                <!-- BEGIN: Login Form -->
                <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                    <div class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                            LOGIN
                        </h2>
                        <div class="intro-x mt-2 text-gray-500 xl:hidden text-center">Algunos clics más para iniciar sesión en su cuenta.</div>
                        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf
                            <div class="intro-x mt-8">
                                <input id="email" type="email" class="intro-x login__input input input--lg border border-gray-300 block" name="email" value="{{ old('email') }}"placeholder="Email" required autofocus >
                                <input id="password" type="password" class="intro-x login__input input input--lg border border-gray-300 block mt-4" name="password" placeholder="Password" required>
                            </div>
                            <div class="intro-x flex text-gray-700 text-xs sm:text-sm mt-4">
                                <div class="flex items-center mr-auto">
                                    <input type="checkbox" class="input border mr-2" id="remember-me">
                                    <label class="cursor-pointer select-none" for="remember-me">Recordarme</label>
                                </div>
                            </div>
                            <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                                <button class="button button--lg w-full xl:w-32 text-white bg-theme-1 xl:mr-3">Login</button>
                            </div>
                            <div class="intro-x mt-10 xl:mt-24 text-gray-700 text-center xl:text-left">
                                Sistema integral de papelerías y presupuestos
                                <br>
                                <a class="text-theme-1" href=""> Todos los derechos reservados.</a> <a class="text-theme-1" href="">2020</a> 
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END: Login Form -->
            </div>
        </div>
        <!-- BEGIN: JS Assets-->
        <script src="{{ asset('js/app.js')}}"></script>
        <!-- END: JS Assets-->
    </body>
</html>