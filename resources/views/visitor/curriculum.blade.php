@extends('layouts.visitor2')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home/main.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('gallery/css/blueimp-gallery.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('gallery/css/blueimp-gallery-indicator.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('gallery/css/blueimp-gallery-video.css') }}">
@stop

@section('javascript')
    <script src="{{ asset('gallery/js/blueimp-helper.js') }}"></script>
    <script src="{{ asset('gallery/js/blueimp-gallery.js') }}"></script>
    <script src="{{ asset('gallery/js/blueimp-gallery-fullscreen.js') }}"></script>
    <script src="{{ asset('gallery/js/blueimp-gallery-indicator.js') }}"></script>
    <script src="{{ asset('gallery/js/jquery.blueimp-gallery.js') }}"></script>

    <script src="https://unpkg.com/masonry-layout@4.2.0/dist/masonry.pkgd.min.js"></script>

    <script>

        var elem = document.querySelector('.photoContainer');
        var msnry = new Masonry( elem, {

            itemSelector: '.pint',

        });
    </script>
@stop

@section('content')

<style>
    .pint{
        width: 33.33333%;
        background: #fff2f2;
        float: left;
        height: auto;

    }
    .pint img {
        margin:0 auto;
    }

    .photoContainer{
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        flex-direction:row;
    }
</style>

<img src="{{url('images/aplication/curriculum/computer/' . $images[0]->path)}}" width="100%">
    <div id="links" class="photoContainer" style="margin: 0 auto; width: 75%" >
        @foreach($images as $n)
            <a class="pint" href="{{url('images/aplication/curriculum/computer/'.$n->path)}}" title="Bodas" data-gallery='#blueimp-gallery-links'>
                <img src="{{url('images/aplication/curriculum/mov/'.$n->path)}}" width="100%">
            </a>
        @endforeach
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

@stop




