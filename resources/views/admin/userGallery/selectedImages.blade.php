@extends('layouts.app')

@section('script')
    <script type="text/javascript" src="{{ asset('js/appAdmin/ClientGetSelectedImages.js') }}"></script>

    <script src="{{url('js/appAdmin/photosFacebook.js')}}"></script>

@stop

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('dropzone/dropzone.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/appAdmin/photosFacebook.css') }}">
@stop

@section('content')

    <h1> {{ $gallery->name }}</h1>
    <h5>Fotos Seleccionadas</h5>
    <img src="{{url('images/aplication/clients/'.$gallery->id.'/principal_'.$gallery->img)}}" style="width: 50%">

    <br>

    <input type="hidden" value="{{$gallery->id}}" id="galleryId">
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