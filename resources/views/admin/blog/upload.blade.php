@extends('layouts.app')

@section('script')
    <script type="text/javascript" src="{{ asset('dropzone/dropzone.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/appAdmin/uploadBlogImage.js') }}"></script>
    <script src="{{url('js/appAdmin/photosFacebook.js')}}"></script>
    <script src="{{url('js/curriculum/upload.js')}}"></script>
@stop

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('dropzone/dropzone.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/appAdmin/photosFacebook.css') }}">
@stop

@section('content')

    <h1>Blog - {{ $blog->name }}</h1>

    <h3>Añada sus imágenes</h3>

    <form id="addImagesForm"
          action="{{ url('admin/blog/upload'. "/$id" ) }}"
          method="POST"
          class="dropzone">
        {{ csrf_field() }}
    </form>

    <br>
    <input type="hidden" value="{{$id}}" id="curriculumId">
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