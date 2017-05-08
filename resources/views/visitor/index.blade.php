@extends('layouts.visitor3')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/visitor/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/visitor/slider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/visitor/blogIndex.css') }}">
@stop

@section('javascript')
    <script src="{{asset('js/visitor/sliderIndex.js')}}"></script>
@stop

@section('content')
    <div id="directionContainer">
        <h3 id="leftSlider" class="directions" onclick="sliderBefore()"><i class="angle left icon"></i></h3>
    </div>
    <div id="directionContainer">
        <h3 id="rightSlider" class="directions" onclick="sliderNext()"><i class="angle right icon"></i></h3>
    </div>
    <div id="slider-container">
        <div>
            <img src="images/sliderIndex/1.jpg">
        </div>
        <div>
            <img src="images/sliderIndex/2.jpg">
        </div>
        <div>
            <img src="images/sliderIndex/3.jpg">
        </div>
        <div>
            <img src="images/sliderIndex/4.jpg">
        </div>
    </div>



<div class="everything" style="background-image: url('{{url('images/texture.png')}}')  ;">
    <div class="blogContainer">
        <div>
            <p>Blog</p>
        </div>
        <br><br>
        <div class="blogCardsSection">
            @foreach($blogs as $n)
            <div class="blog">
                <a href="{{url('blog/' . $n->link)}}">
                    <div style="background-image: url('{{url('images/aplication/blog/' . $n->image)}}')"></div>
                    <img src="{{url('images/aplication/blog/' . $n->image)}}">
                    <h5>{{$n->name}}</h5>
                </a>
                <h5>{{$n->date }}</h5>
            </div>
            @endforeach
        </div>
        <div class="blogMas">
            <p>Mas historias</p>
        </div>
    </div>

    {{--<br><br><br>--}}
    {{--<br><br><br>--}}
    {{--<br><br><br>--}}
    {{--<br><br><br>--}}

    {{--<div id="why" class="ui vertical stripe segment">--}}
        {{--<div class="ui middle aligned stackable grid container">--}}
            {{--<div class="row">--}}
                {{--<div class="eight wide left floated column">--}}
                    {{--<img src="http://candlelabs.com.mx/images/home/home.svg" class="ui large bordered rounded image">--}}
                {{--</div>--}}
                {{--<div class="eight wide column">--}}
                    {{--<h3 class="ui header">Tu día a día con en tu ordenador</h3>--}}
                    {{--<p>Las aplicaciones de escritorio brindan la facilidad de acceso cuando inicias tu ordenador, el sistema siempre estará listo para ti sin necesidad de una conexión estricta a internet.</p>--}}
                    {{--<h3 class="ui header">Agiliza tus actividades e integra gran variedad de herramientas</h3>--}}
                    {{--<p>Los sistemas de escritorio abren la posibilidad de integración con herramientas con las que ya estas acostumbrado, permite hacer uso de dispositivos con los que tu ordenador cuenta y optimiza los recursos para no realientizar tu sistema.</p>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="row">--}}
                {{--<div class="center aligned column">--}}
                    {{--<a href="/contacto" class="ui huge button">Obtener una aplicación hoy!</a>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}


</div>
@stop


