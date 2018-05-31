@extends('layouts.visitor2')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/client/showGallery.css') }}">

    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('gallery/css/blueimp-gallery.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('gallery/css/blueimp-gallery-indicator.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('gallery/css/blueimp-gallery-video.css') }}"> -->
@endsection

@section('script')
    <script src="https://unpkg.com/imagesloaded@4.1/imagesloaded.pkgd.min.js"></script>
    <script src="https://unpkg.com/masonry-layout@4.2.0/dist/masonry.pkgd.min.js"></script>
    <!-- <script src="{{ asset('gallery/js/blueimp-helper.js') }}"></script>
    <script src="{{ asset('gallery/js/blueimp-gallery.js') }}"></script>
    <script src="{{ asset('gallery/js/blueimp-gallery-fullscreen.js') }}"></script>
    <script src="{{ asset('gallery/js/blueimp-gallery-indicator.js') }}"></script>
    <script src="{{ asset('gallery/js/jquery.blueimp-gallery.js') }}"></script> -->

    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    
    <script src="{{ asset('js/client/preventDownload.js') }}"></script>
    <script src="{{ asset('js/client/getGaleria.js') }}"></script>
    

@endsection


@section('content')

<div id="app1">

    <div class="headImage">
        <div style="background-image: url('{{url("images/aplication/clients/principal_$galeria->img")}}')"></div>
        <img src="{{url('images/aplication/clients/principal_'. $galeria->img)}}">
    </div>

    <div id="galleryConteiner">
        <h2 id="titulo">{{$galeria->name}}</h2>

        <input value="{{url('/')}}" type="hidden" id="homePath">
        <input value="{{ $galeria->id }}" type="hidden" id="galleryId">
        <input value="{{ $galeria->disponible }}" type="hidden" id="galleryLimit">

        <div>Fotos Seleccionadas</div>
        <div>Enviar seleccion de photos</div>
        <div>Deshacer Seleccion</div>

        <div id="links" class="photoContainer">
            
            <div v-for="photo in photos" class="pint">
                <div v-bind:style="{ background-image:  }"> @{{ url + photo.path }}</div>
                <i class="heart icon" id="heart"></i>
            </div>

        </div>

        <div id="blueimp-gallery" class="blueimp-gallery">
            <div class="slides"></div>
            <h3 class="title"></h3>
            <a class="prev">‹</a>
            <a class="next">›</a>
            <a class="close">×</a>
            <a class="play-pause"></a>
            <ol class="indicator"></ol>
        </div>
    </div>

    <div class="counter">0/ @{{ limit }}</div>

    <br><br><br>

</div>
@endsection
