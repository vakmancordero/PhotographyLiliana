@extends('layouts.app')

@section('script')
    <script type="text/javascript" src="{{ asset('dropzone/dropzone.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/upload/imageUploader.js') }}"></script>
    <script src="{{url('js/appAdmin/photosFacebook.js')}}"></script>
@stop

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('dropzone/dropzone.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/appAdmin/photosFacebook.css') }}">
@stop

@section('content')

    <h1>Currículums - {{ $curriculum->name }}</h1>
    <h3>Añada sus imágenes</h3>

    <div class="row">
        <div class="col-md-4">
            <div class="description">
                {!! nl2br($curriculum->description) !!}
            </div>
        </div>
    </div>

        <form id="addImagesForm"
              action="{{ route('store_path', [$curriculum->id]) }}"
              method="POST"
              class="dropzone">
            {{ csrf_field() }}
        </form>
<br>

            <div id="photoContainer">
                @foreach ($curriculum->curriculumImages as $image)

                        <div id="photos" style="background-image: url(/{{ $image->path }}" data-lity>
                            <div id="photoHover">
                                <form class="deleteImageForm" action="/admin/curriculum/images/{{ $image->id }}">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="ui icon button"><i class="trash icon"></i></button>
                                </form>

                            </div>
                        </div>

                @endforeach
            </div>

    <br>
    <div class="row">
        <div class="col-md-8 gallery">
            @foreach ($curriculum->curriculumImages->chunk(4) as $set)

                    @foreach ($curriculum->curriculumImages as $image)
                        <div class="col-md-3">
                            <a href="/{{ $image->path }}" data-lity>
                                <img class="img-fluid img-thumbnail"
                                     src="/{{ $image->path }}" alt="" width="200"
                                     height="200">
                            </a>
                            <form class="deleteImageForm" action="/admin/curriculum/images/{{ $image->id }}">
                                {!! csrf_field() !!}
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit">Delete</button>
                            </form>
                        </div>
                    @endforeach

            @endforeach
            {{--@if(!Auth::guest())--}}
                {{--@if ($article->ownedBy(Auth::user()))--}}
                    <hr>


                {{--@endif--}}
            {{--@endif--}}
        </div>
    </div>

@endsection