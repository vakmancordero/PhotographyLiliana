@extends('layouts.visitor')

@section('stylesheets')
    
    <link rel="stylesheet" type="text/css" href="{{ asset('css/visitor/blogIndex.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/visitor/index.css') }}">
@stop

@section('script')
    <script src="{{asset('js/visitor/sliderIndex.js')}}"></script>
@stop

@section('content')

<div class="slider">

    <div class="slider-container">

        <div class="img-container" 
            ontouchstart="sliderIndexTouchStart(event)"
            ontouchmove="sliderIndexTouchMove(event)"
            ontouchend="sliderIndexTouchEnd(event)">

            <!-- <div class="slider-piece centrar" style=" background-image: url('{{ url('img/index/1.jpg') }}') ">
                <div>
                    <h3>Apasionado por el Código</h3>
                    <a class="linea"></a>
                    <p>El desarrollo de software ofrece el poder de crear únicamente necesitando un computador</p>
                    
                </div>
            </div> -->
            
            <div class="slider-piece centrar" 
                style=" background-image: url('{{ url('images/sliderIndex/1.jpg') }}') "></div>
            <div class="slider-piece centrar" 
                style=" background-image: url('{{ url('images/sliderIndex/2.jpg') }}') "></div>

            <div class="slider-piece centrar" 
                style=" background-image: url('{{ url('images/sliderIndex/3.jpg') }}') "></div>

            <div class="slider-piece centrar" 
                style=" background-image: url('{{ url('images/sliderIndex/4.jpg') }}') "></div>

            <div class="slider-piece centrar" 
                style=" background-image: url('{{ url('images/sliderIndex/5.jpg') }}') "></div>

            <div class="slider-piece centrar" 
                style=" background-image: url('{{ url('images/sliderIndex/6.jpg') }}') "></div>

            <div class="slider-piece centrar" 
                style=" background-image: url('{{ url('images/sliderIndex/7.jpg') }}') "></div>

            <!-- <div class="slider-piece" 
                style=" background-image: url('{{ url('images/sliderIndex/8.jpg') }}') "></div> -->

        </div>
        <div class="indicators left" onclick="sliderBefore()"><i class="material-icons" >keyboard_arrow_left</i></div>
        <div class="indicators right" onclick="sliderNext()"><i class="material-icons">keyboard_arrow_right</i></div>

    </div>

    <div class="slider-circles">
        
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

   
@stop


