@extends('layouts.app')

@section('script')
    <script type="text/javascript" src="{{ asset('dropzone/dropzone.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/upload/imageUploader.js') }}"></script>
    <script src="{{url('js/appAdmin/photosFacebook.js')}}"></script>
    <script src="{{url('js/curriculum/upload.js')}}"></script>
@stop

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('dropzone/dropzone.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/appAdmin/photosFacebook.css') }}">
@stop

@section('content')

    <h1>Currículums - {{ $curriculum->name }}</h1>

    <div class="row">
        <div class="col-md-4">
            <div class="description">
                {!! nl2br($curriculum->description) !!}
            </div>
        </div>
    </div>

    <h3>Añada sus imágenes</h3>

    <form id="addImagesForm"
          action="{{ route('store_path', [$curriculum->id]) }}"
          method="POST"
          class="dropzone">
        {{ csrf_field() }}
    </form>

    <br>
    <input type="hidden" value="{{$curriculum->id}}" id="curriculumId">
    <input type="hidden" value="{{url('/')}}" id="homePath">

    <div id="links" class="photoContainer">
        @foreach()
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

    {{--<form class="deleteImageForm" action="/admin/curriculum/images/{{ $image->id }}">--}}
    {{--{!! csrf_field() !!}--}}
    {{--<input type="hidden" name="_method" value="DELETE">--}}
    {{--<button type="submit" class="ui icon button"><i class="trash icon"></i></button>--}}
    {{--</form>--}}

@endsection