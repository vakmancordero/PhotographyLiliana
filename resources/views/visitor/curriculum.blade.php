@extends('layouts.visitor')

@section('stylesheets')

    <link rel="stylesheet" type="text/css" href="{{ asset('gallery/css/blueimp-gallery.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('gallery/css/blueimp-gallery-indicator.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('gallery/css/blueimp-gallery-video.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/visitor/portafolioShow.css') }}">
@stop

@section('script')
    <script src="https://unpkg.com/imagesloaded@4.1/imagesloaded.pkgd.min.js"></script>
    <script src="https://unpkg.com/masonry-layout@4.2.0/dist/masonry.pkgd.min.js"></script>
    <script src="{{ asset('gallery/js/blueimp-helper.js') }}"></script>
    <script src="{{ asset('gallery/js/blueimp-gallery.js') }}"></script>
    <script src="{{ asset('gallery/js/blueimp-gallery-fullscreen.js') }}"></script>
    <script src="{{ asset('gallery/js/blueimp-gallery-indicator.js') }}"></script>
    <script src="{{ asset('gallery/js/jquery.blueimp-gallery.js') }}"></script>
    <script src="{{ asset('js/visitor/curriculum.js') }}"></script>
@stop

@section('content')

<div style=" background-image: url('{{url('images/aplication/curriculum/principal_'. $portafolio->image )}}')" id="landing"></div>

<div id="albumContent">
    <h1>{{$portafolio->name}}</h1>
    <img src="{{url('images/aplication/curriculum/principal_'. $portafolio->image )}}" class="portafolioImg">
    <p>{{ $portafolio->description }}</p>

    <input type="hidden" value="{{$portafolio->id}}" id="curriculumId">
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
</div>

@stop




