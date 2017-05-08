@extends('layouts.visitor3')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home/main.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('gallery/css/blueimp-gallery.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('gallery/css/blueimp-gallery-indicator.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('gallery/css/blueimp-gallery-video.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/visitor/blog.css') }}">
@stop

@section('javascript')
    <script src="https://unpkg.com/imagesloaded@4.1/imagesloaded.pkgd.min.js"></script>
    <script src="{{ asset('gallery/js/blueimp-helper.js') }}"></script>
    <script src="{{ asset('gallery/js/blueimp-gallery.js') }}"></script>
    <script src="{{ asset('gallery/js/blueimp-gallery-fullscreen.js') }}"></script>
    <script src="{{ asset('gallery/js/blueimp-gallery-indicator.js') }}"></script>
    <script src="{{ asset('gallery/js/jquery.blueimp-gallery.js') }}"></script>
    <script src="{{ asset('js/visitor/blog.js') }}"></script>
@stop

@section('content')


<div style=" background-image: url('{{url('images/aplication/blog/' . $blog->image)}}')" id="landing">
    asdasd
</div>
<div class="everything" style="background-image: url('{{url('images/texture.png')}}')  ;">

    <div id="blogContent">
        <h1>{{$blog->name}}</h1>
        <p>{!! $blog->description !!}</p>

        <input type="hidden" value="{{$blog->id}}" id="blogId">
        <input type="hidden" value="{{$blog->gallery}}" id="blogGal">
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

</div>
@stop




