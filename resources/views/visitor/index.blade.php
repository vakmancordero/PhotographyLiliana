@extends('layouts.visitor3')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home/slider.css') }}">
@stop

@section('javascript')
    <script src="{{asset('js/visitor/sliderIndex.js')}}"></script>
@stop

@section('content')
    <div id="directionContainer">
        <h3 id="leftSlider" class="directions" onclick="sliderBefore()"><</h3>
    </div>
    <div id="directionContainer">
        <h3 id="rightSlider" class="directions" onclick="sliderNext()">></h3>
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



    <div id="why" class="ui vertical stripe segment">
        <div class="ui middle aligned stackable grid container">
            <div class="row">
                <div class="eight wide left floated column">
                    <img src="http://candlelabs.com.mx/images/home/home.svg" class="ui large bordered rounded image">
                </div>
                <div class="eight wide column">
                    <h3 class="ui header">Tu día a día con en tu ordenador</h3>
                    <p>Las aplicaciones de escritorio brindan la facilidad de acceso cuando inicias tu ordenador, el sistema siempre estará listo para ti sin necesidad de una conexión estricta a internet.</p>
                    <h3 class="ui header">Agiliza tus actividades e integra gran variedad de herramientas</h3>
                    <p>Los sistemas de escritorio abren la posibilidad de integración con herramientas con las que ya estas acostumbrado, permite hacer uso de dispositivos con los que tu ordenador cuenta y optimiza los recursos para no realientizar tu sistema.</p>
                </div>
            </div>
            <div class="row">
                <div class="center aligned column">
                    <a href="/contacto" class="ui huge button">Obtener una aplicación hoy!</a>
                </div>
            </div>
        </div>
    </div>

    <div class="ui vertical stripe segment" style="background-color: #008FEA">
        <div class="ui middle aligned stackable grid container">
            <div class="row">
                <div class="eight wide column">
                    <h3 class="ui header white">Calidad y productividad es lo de hoy</h3>
                    <p class="white">Hoy en día los sistemas de escritorio cuentan con una gran cantidad de herramientas que hace uso de servicios que se encuentran en la red, para mejorar la experiencia y funcionalidad; ofreciendo respaldo de información en tiempo real y sistemas de correos para notificar eventos que ocurran en su negocio.</p>
                </div>
                <div class="six wide right floated column">
                    <img src="http://candlelabs.com.mx/images/home/iMac.svg" class="ui large bordered rounded image">
                </div>
            </div>

        </div>
    </div>

@stop


