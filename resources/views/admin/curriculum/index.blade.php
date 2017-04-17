@extends('layouts.app')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/appAdmin/photosFacebook.css') }}">
@stop

@section('content')
<div class="">

    <a href="{{url('admin/curriculum/create')}}">
        <button class="ui green button icon right floated ">
            Agregar <i class="plus icon"></i>
        </button>
    </a>

    <h1>Panel de control - Curriculum</h1>

</div>

    @if(isset($curriculums))

        @foreach($curriculums as $curriculum)

            <div class="ui segment">
                <h3 class="ui  floated header">{{ $curriculum->name }}</h3>

                <a href="{{url('admin/curriculum/upload/' . $curriculum->id)}}">
                    <div class="ui right floated  header" tabindex="0">
                        <div class="ui red button">
                            <i class="trash icon"></i>
                            Eliminar
                        </div>
                    </div>
                </a>

                <a href="{{url('admin/curriculum/upload/' . $curriculum->id)}}">
                    <div class="ui right floated labeled button" tabindex="0">
                        <div class="ui blue button">
                            <i class="image icon"></i>
                            Cargar imágenes
                        </div>
                        <a class="ui basic blue left pointing label">
                            1,048
                        </a>
                    </div>
                </a>
                <div class="ui clearing divider"></div>
                <div id="photoContainer">

                    @for($n = 0; $n <= 15; $n++)
                        <div id="photos" style="background-image: url(https://unsplash.imgix.net/photo-1414490929659-9a12b7e31907);">
                            <div id="photoHover">
                                <i class="trash icon"></i>
                            </div>
                        </div>
                    @endfor

                </div>

            </div>

        @endforeach

    @endif

@endsection

@section('script')
    <script src="{{url('js/appAdmin/photosFacebook.js')}}"></script>
@stop
