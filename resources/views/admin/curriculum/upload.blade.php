@extends('layouts.app')

@section('script')
    <script type="text/javascript" src="{{ asset('dropzone/dropzone.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/upload/imageUploader.js') }}"></script>
@stop

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('dropzone/dropzone.min.css') }}">
@stop

@section('content')

    <h1>Panel de control - Currículums</h1>
    <h3>Añada sus imágenes</h3>

    <div class="row">
        <div class="col-md-4">
            <h1>{{ $curriculum->name }}</h1>
            <hr>
            <div class="description">
                {!! nl2br($curriculum->description) !!}
            </div>
        </div>
        <div class="col-md-8 gallery">
            {{--@foreach ($article->images->chunk(4) as $set)--}}
                {{--<div class="row">--}}
                    {{--@foreach ($set as $image)--}}
                        {{--<div class="col-md-3">--}}
                            {{--<a href="/{{ $image->path }}" data-lity>--}}
                                {{--<img class="img-fluid img-thumbnail"--}}
                                     {{--src="/{{ $image->path }}" alt="" width="200"--}}
                                     {{--height="200">--}}
                            {{--</a>--}}
                            {{--<form class="deleteImageForm" action="/images/{{ $image->id }}">--}}
                                {{--{!! csrf_field() !!}--}}
                                {{--<input type="hidden" name="_method" value="DELETE">--}}
                                {{--<button type="submit">Delete</button>--}}
                            {{--</form>--}}
                        {{--</div>--}}
                    {{--@endforeach--}}
                {{--</div>--}}
            {{--@endforeach--}}
            {{--@if(!Auth::guest())--}}
                {{--@if ($article->ownedBy(Auth::user()))--}}
                    <hr>

                    <h2>Add Your Images</h2>

                    <form id="addImagesForm"
                          action="{{ route('store_path', [$curriculum->id]) }}"
                          method="POST"
                          class="dropzone">
                        {{ csrf_field() }}
                    </form>
                {{--@endif--}}
            {{--@endif--}}
        </div>
    </div>

@endsection
