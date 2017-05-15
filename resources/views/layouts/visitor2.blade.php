<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <link rel="icon"  href="{{ url('icono.ico')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- StyleSheets -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('semantic/dist/semantic.min.css') }}">


    <!--FONTS-->
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,900" rel="stylesheet">

    @yield('stylesheets')

    @yield('javascript-before')

    <title>@yield('title')</title>

    <style type="text/css">

    </style>

</head>
<body style="
        background-image: url('{{url('images/texture.png')}}') !important;">

<div class="ui fixed menu" style="background:white;">
    <div class="ui container" style="color: #000">
        <a href="{{ url('/')}}" class="header item">
            <!--                <img class="logo" src="https://semantic-ui.com/examples/assets/images/logo.png">-->
            <img class="logo" src="{{url("images/logo/header.png")}}" style="width: 150px">
        </a>

        <div class="right item" style="padding: 0px;">
            <a href="#" class="item">Inicio</a>
            <div class="ui simple dropdown item">
                Portafolio <i class="dropdown icon"></i>
                <div class="menu">
                    <a class="item" href="{{url('portafolio/bodas')}}">Bodas</a>
                    <a class="item" href="{{url('portafolio/xv')}}">Xv</a>
                    <a class="item" href="{{url('portafolio/sesiones-especiales')}}">Sesiones Especiales</a>
                </div>
            </div>
            <a href="#" class="item">Blog</a>
            <a href="#" class="item">Contacto</a>
            <a href="{{url('login')}}" class="item">Login</a>
            @if(Auth::user())
                <a href="{{url('logout')}}" class="item">Cerrar Sesión</a>
            @endif
        </div>
    </div>
</div>

    @yield('content')

    {{--<div class="ui inverted vertical footer segment">--}}
        {{--<div class="ui center aligned container">--}}
            {{--<div class="ui stackable inverted divided grid">--}}
                {{--<div class="three wide column">--}}
                    {{--<h4 class="ui inverted header">Group 1</h4>--}}
                    {{--<div class="ui inverted link list">--}}
                        {{--<a href="#" class="item">Link One</a>--}}
                        {{--<a href="#" class="item">Link Two</a>--}}
                        {{--<a href="#" class="item">Link Three</a>--}}
                        {{--<a href="#" class="item">Link Four</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="three wide column">--}}
                    {{--<h4 class="ui inverted header">Group 2</h4>--}}
                    {{--<div class="ui inverted link list">--}}
                        {{--<a href="#" class="item">Link One</a>--}}
                        {{--<a href="#" class="item">Link Two</a>--}}
                        {{--<a href="#" class="item">Link Three</a>--}}
                        {{--<a href="#" class="item">Link Four</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="three wide column">--}}
                    {{--<h4 class="ui inverted header">Group 3</h4>--}}
                    {{--<div class="ui inverted link list">--}}
                        {{--<a href="#" class="item">Link One</a>--}}
                        {{--<a href="#" class="item">Link Two</a>--}}
                        {{--<a href="#" class="item">Link Three</a>--}}
                        {{--<a href="#" class="item">Link Four</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="seven wide column">--}}
                    {{--<h4 class="ui inverted header">Footer Header</h4>--}}
                    {{--<p>Extra space for a call to action inside the footer that could help re-engage users.</p>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="ui inverted section divider"></div>--}}
            {{--<img src="https://semantic-ui.com/examples/assets/images/logo.png" class="ui centered mini image">--}}
            {{--<div class="ui horizontal inverted small divided link list">--}}
                {{--<a class="item" href="#">Site Map</a>--}}
                {{--<a class="item" href="#">Contact Us</a>--}}
                {{--<a class="item" href="#">Terms and Conditions</a>--}}
                {{--<a class="item" href="#">Privacy Policy</a>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

<script src="{{ asset('semantic/dist/semantic.min.js') }}"></script>

@yield('script')

</body>
</html>

