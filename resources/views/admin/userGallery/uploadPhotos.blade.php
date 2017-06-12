@extends('layouts.app')

@section('script')
    <script type="text/javascript" src="{{ asset('dropzone/dropzone.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/appAdmin/ClientStoreImageGallery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/appAdmin/ClientGetImageGallery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/appAdmin/ClientDeleteImage.js') }}"></script>
    <script src="{{url('js/appAdmin/photosFacebook.js')}}"></script>

@stop

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('dropzone/dropzone.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/appAdmin/photosFacebook.css') }}">
@stop

@section('content')

    <h1>Galleria - {{ $album->name }}</h1>
    <a href="{{url("admin/clientes/$album->client_id/galerias")}}">
        <button class="ui mini button yellow">Ver Galerias del Cliente</button>
    </a>

    <h5>Añada sus imágenes</h5>

    <button onclick="restartFailUploads();">Reintentar Cargar</button>

    <form id="addImagesForm"
          method="POST"
          action="{{url("admin/galleryClient/$id/upload")}}"
          class="dropzone">
        {{ csrf_field() }}
    </form>

    <br>

    <input type="hidden" value="{{$album->id}}" id="galleryId">
    <input type="hidden" value="{{url('/')}}" id="homePath">

    <div id="links" class="photoContainer">

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

    <br>



@endsection