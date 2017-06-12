@extends('layouts.visitor')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/visitor/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/visitor/blogIndex.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/visitor/index.css') }}">
@stop

@section('script')
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
        <div>
            <img src="images/sliderIndex/5.jpg">
        </div>
        <div>
            <img src="images/sliderIndex/6.jpg">
        </div>
        <div>
            <img src="images/sliderIndex/7.jpg">
        </div>
        <div>
            <img src="images/sliderIndex/8.jpg">
        </div>
    </div>



<div class="everything">

    <div id="quienSoy">
        <div class="titulo">
            <h1>ESTOY FASCINADA POR LA MAGIA DE LA FOTOGRAFIA</h1>
            <p>En mi trabajo, balanceo dos intenciones: dibujo imagenes con luz que no necesitan explicación, donde la historia, el momento, y la emoción son claras y poderosas. La segunda son fotos con un ligero toque de misterio; donde las circunstancias no son totalmente obvias y tu imaginacion es quien crea la historia.</p>
            <p>Las Bodas y XV son unicos al brindar la oportunidad de ser la mejor versión de ti, con todas las personas que te importan. Yo me siento con mucha emoción de que puedas ser vivir la experiencia de trabajar conmigo. Mi oficina principal se encuentra en la ciudad de San Cristobal de las Casas, Chiapas</p>
        </div>
        <div class="descripcion">
            <strong>CONFIANZA</strong><br><br>

            Usted sabrá en los primeros momentos si mi fotografía resuena con usted.
            Estoy completamente preparada para documentar los mejores momentos de la vida de alguien.
            <br><br>
            <strong>INSPIRACIÓN</strong><br><br>
            Estoy inspirada por y para mis clientes, creando fotografías totalmente ordinarias motivadas por como eres como individuo.

        </div>


    </div>
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


