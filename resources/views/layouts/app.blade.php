<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon"  href="{{ url('icono.ico')}}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Panel Administración || Fotografía Liliana Pineda</title>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('semantic/dist/semantic.min.css') }}">
    @yield('stylesheets')



    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    @yield('javascript-before')
</head>
<body>

<!-- Sidebar Menu -->
<div class="ui right vertical inverted sidebar menu ">
    <img src="{{url('loader/loader3.png')}}" style="width: 80%; margin: 0 auto; display: block">
    <a class="active item">Curriculum</a>
    <a class="item">Blog</a>
    <a class="item">Clientes</a>
    <a class="item">Careers</a>
    <a class="item">Login</a>
    <a class="item">Signup</a>
</div>



<!-- Tablet and computer menu-->
<div class="ui  top fixed hidden menu" style="padding-top: 0;">
    <div class="ui container">
        <a href="{{ url('/')}}" class="header item">
            <img class="logo" src="images/logo/header.png" style="width: 150px">
        </a>
        <div class="right menu">

            <div class="item">
                <a href="{{ route('logout') }}" class="ui primary button tablet computer only "
                   onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                    Cerrar Sesión
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
            <div class="item mobile only grid">
                <a  id="toggle" class="mobile only ">
                    <i class="sidebar icon"></i>
                </a>
            </div>
        </div>
    </div>
</div>







<br><br><br>

        @yield('content')
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="{{ asset('semantic/dist/semantic.min.js') }}"></script>
    <script>
        $('#toggle').click(function(){
           $('.ui.sidebar').sidebar('toggle');
        });
    </script>
    @yield('script')

</body>
</html>
