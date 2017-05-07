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
<body>

<!-- Following Menu -->
<div class="ui large top fixed hidden menu">
    <div class="ui container">
        <a class="active item">Home</a>
        <a class="item">Work</a>
        <a class="item">Company</a>
        <a class="item">Careers</a>
        <div class="right menu">
            <div class="item">
                <a class="ui button">Log in</a>
            </div>
            <div class="item">
                <a class="ui primary button">Sign Up</a>
            </div>
        </div>
    </div>
</div>

<!-- Sidebar Menu -->
<div class="ui vertical inverted sidebar menu right">
    <a class="active item">Home</a>
    <a class="item">Work</a>
    <a class="item">Company</a>
    <a class="item">Careers</a>
    <a class="item">Login</a>
    <a class="item">Signup</a>
</div>


<!-- Page Contents -->
<div class="pusher">

    <div class="menuAbsolute" style="position: absolute; width: 100vw; height: 2.5%;
            z-index: 3;
           background: rgba(255,255,255,1);
            background: -moz-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(241,241,241,0.84) 78%, rgba(237,237,237,0) 99%, rgba(237,237,237,0) 100%);
            background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(255,255,255,1)), color-stop(78%, rgba(241,241,241,0.84)), color-stop(99%, rgba(237,237,237,0)), color-stop(100%, rgba(237,237,237,0)));
            background: -webkit-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(241,241,241,0.84) 78%, rgba(237,237,237,0) 99%, rgba(237,237,237,0) 100%);
            background: -o-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(241,241,241,0.84) 78%, rgba(237,237,237,0) 99%, rgba(237,237,237,0) 100%);
            background: -ms-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(241,241,241,0.84) 78%, rgba(237,237,237,0) 99%, rgba(237,237,237,0) 100%);
            background: linear-gradient(to bottom, rgba(255,255,255,1) 0%, rgba(241,241,241,0.84) 78%, rgba(237,237,237,0) 99%, rgba(237,237,237,0) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ededed', GradientType=0 );" >
        <div class="ui  vertical escuseToFix center aligned ">
            <div class="ui container">
                <div class="ui large secondary  pointing menu" style="border: 0;">

                    <a href="{{ url('/')}}" class="header item" style="padding-bottom: 0; padding-top: 0">
                        <img class="logo" src="{{url("images/logo/header.png")}}" style="width: 150px">
                    </a>
                    <div class="right item" style="padding: 0px;">
                        <div class="ui simple dropdown item">
                            Portafolio <i class="dropdown icon"></i>
                            <div class="menu">
                                @foreach($curriculum as $n)
                                    <a class="item" href="{{url('portafolio/' . $n->id)}}">{{$n->name}}</a>
                                @endforeach
                            </div>
                        </div>
                        <a href="#" class="item">Blog</a>
                        <a href="#" class="item">Contacto</a>
                        <a href="{{url('login')}}" class="item">Login</a>
                        <a class="toc item">
                            <i class="sidebar icon"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>



@yield('content')

<div class="ui inverted vertical footer segment">
    <div class="ui center aligned container">
        <div class="ui stackable inverted divided grid">
            <div class="three wide column">
                <h4 class="ui inverted header">Group 1</h4>
                <div class="ui inverted link list">
                    <a href="#" class="item">Link One</a>
                    <a href="#" class="item">Link Two</a>
                    <a href="#" class="item">Link Three</a>
                    <a href="#" class="item">Link Four</a>
                </div>
            </div>
            <div class="three wide column">
                <h4 class="ui inverted header">Group 2</h4>
                <div class="ui inverted link list">
                    <a href="#" class="item">Link One</a>
                    <a href="#" class="item">Link Two</a>
                    <a href="#" class="item">Link Three</a>
                    <a href="#" class="item">Link Four</a>
                </div>
            </div>
            <div class="three wide column">
                <h4 class="ui inverted header">Group 3</h4>
                <div class="ui inverted link list">
                    <a href="#" class="item">Link One</a>
                    <a href="#" class="item">Link Two</a>
                    <a href="#" class="item">Link Three</a>
                    <a href="#" class="item">Link Four</a>
                </div>
            </div>
            <div class="seven wide column">
                <h4 class="ui inverted header">Footer Header</h4>
                <p>Extra space for a call to action inside the footer that could help re-engage users.</p>
            </div>
        </div>
        <div class="ui inverted section divider"></div>
        <img src="https://semantic-ui.com/examples/assets/images/logo.png" class="ui centered mini image">
        <div class="ui horizontal inverted small divided link list">
            <a class="item" href="#">Site Map</a>
            <a class="item" href="#">Contact Us</a>
            <a class="item" href="#">Terms and Conditions</a>
            <a class="item" href="#">Privacy Policy</a>
        </div>
    </div>
</div>

</div>

<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

<script src="{{ asset('semantic/dist/semantic.min.js') }}"></script>

@yield('javascript')
<script>
    $(document).ready(function() {

        // fix menu when passed
        $('.escuseToFix')
            .visibility({
                once: false,
                onBottomPassed: function() {
                    $('.fixed.menu').transition('fade in');
                },
                onBottomPassedReverse: function() {
                    $('.fixed.menu').transition('fade out');
                }
            })
        ;

        // create sidebar and attach to menu open
        $('.ui.sidebar')
            .sidebar('attach events', '.toc.item')
        ;

    });
</script>
</body>
</html>

