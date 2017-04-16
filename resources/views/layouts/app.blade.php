<!DOCTYPE html>
<div lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon"  href="{{ url('icono.ico')}}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Panel Administración || Fotografía Liliana Pineda</title>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('semantic/dist/semantic.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/appAdmin/principalAdministrador.css') }}">
    @yield('stylesheets')


    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    @yield('javascript-before')
</head>
<>

<!-- Sidebar Menu Computer -->
<div style="position: relative">
    <div class="ui  vertical visible inverted sidebar menu" id="idMenu">
        <img src="{{url('loader/loader3.png')}}" style="width: 80%; margin: 0 auto; display: block">
        <a class="active item">Curriculum</a>
        <a class="item">Blog</a>
        <a class="item">Clientes</a>
        <a class="item">Careers</a>
        <a class="item">Login</a>
        <a class="item">Signup</a>
        <a href="{{ route('logout') }}" class="item"
           onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
            Cerrar Sesión
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>
</div>


<div class="ui fixed menu tablet computer only grid">

    <a href="{{ url('/')}}" class="header item">
        <img class="logo" src="images/logo/header.png" style="width: 150px">
    </a>
    <div class="right menu">

        <div class="item">
            <a href="{{ route('logout') }}" class="ui primary button  "
               onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                Cerrar Sesión
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>

    </div>
</div>




<!-- movil-->
<div class="ui fixed menu mobile only grid" style="padding-top: 0;">
        <a href="{{ url('/')}}" class="header item">
            <img class="logo" src="images/logo/header.png" style="width: 150px">
        </a>
        <div class="right menu">
            <div class="item">
                <a  id="toggle" class="mobile only ">
                    <i class="sidebar icon"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<br><br>

<div class="contenedorPrincipalPanel">
    <div id="spaceSidebar">1</div>
    <div id="spaceSidebar2">
        <div id="principal">
        @yield('content')
        </div>
    </div>
</div>


    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="{{ asset('semantic/dist/semantic.min.js') }}"></script>
    <script src="{{ asset('js/appAdmin/principalAdministrador.js') }}"></script>
    @yield('script')

</body>
</html>

