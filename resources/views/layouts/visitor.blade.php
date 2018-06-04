<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <link rel="icon"  href="{{ url('icono.ico')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- StyleSheets -->

    <link rel="stylesheet" type="text/css" href="{{ asset('css/visitor/header.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('loader/loader.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('css/styles.css') }}">

    
    <!--FONTS-->
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    @yield('stylesheets')


    
    @yield('javascript-before')

    <title>@yield('title')</title>

   

</head>
<body>
    
<div id="loader">
    <div class="loaderContainer">
        <img src='{{ url("loader/loader2.png") }}' id="loader2">
        <img src='{{ url("loader/loader1.png") }}' id="loader1" class="rotating">
        <img src='{{ url("loader/loader3.png") }}' id="loader3">
    </div>
        
</div>
    
<div class="shadow" id="shadowMenu" onclick="menuAction()"></div>

<nav class="nav bodyMove" id="bodyMove1">

    <div class="logo lines">
        <img src="http://www.lilianapineda.com/images/logo/header.png">
    </div>

    <div class="links">

        <a class="lines" href="{{url('/')}}" ><p>Inicio</p></a>
        <a class="lines" href="{{url('portafolio')}}" ><p>Portafolio</p></a>
        <a class="lines" href="{{url('blog')}}" ><p>Blog</p></a>
        <a class="lines" href="{{url('contacto')}}" ><p>Contacto</p></a>
        <a class="lines" href="http://app.lilianapineda.com/" ><p>Login</p></a>

    </div>

    <div class="menuIcon lines" onclick="menuAction()">
        <i class="material-icons">menu</i>
    </div>


</nav>


<div class="menuPhone">
    <img class="  img1" src="http://www.lilianapineda.com/images/logo/rueda.png">
    <img class="logoPrincipal" src="http://www.lilianapineda.com/loader/loader3.png">

    <div class="moveLinks">

        <a href="{{url('/')}}" ><p>Inicio</p></a>
        <a href="{{ url('/portafolio') }}" ><p>Portafolio</p></a>
        <a href="{{url('blog')}}" ><p>Blog</p></a>
        <a href="{{url('contacto')}}" ><p>Contacto</p></a>
        <a href="http://app.lilianapineda.com/" ><p>Login</p></a>
    </div>

    
</div>

<div class="principalCard" id="bodyMove2">
    
    @yield('content')

    <div class="ui inverted vertical footer segment">
        <div class="ui center aligned container">
            
            <div class="ui inverted section divider"></div>
            
            <div class="ui horizontal inverted small divided link list">
                <a class="item" href="{{ url('login')}}">Login Admin</a>
                <a class="item" href="#">Contact Us</a>
                <a class="item" href="#">Terms and Conditions</a>
                <a class="item" href="#">Privacy Policy</a>
            </div>
        </div>
    </div>

</div> 




    

   

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="http://www.residencialchulavista.com/js/visitor/SmoothScroll.js"></script>
    
    <script src="{{ asset('loader/loader.js') }}"></script>
    <script src="{{ asset('js/visitor/menu.js') }}"></script>
    @yield('script')

    </body>
</html>

