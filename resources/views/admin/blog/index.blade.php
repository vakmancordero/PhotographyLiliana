@extends('layouts.app')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/appAdmin/photosFacebook.css') }}">
@stop

@section('script')
    {{--<script src="{{url('js/curriculum/index.js')}}"></script>--}}
    <script src="{{url('js/appAdmin/photosFacebook.js')}}"></script>
@stop

@section('content')

    <a href="{{url('admin/blog/create')}}">
        <button class="ui green button icon right floated ">
            Crear <i class="plus icon"></i>
        </button>
    </a>

    <h1 style="margin-top: 0">Panel de control - Blog</h1>


    @if(isset($blogs))
        @foreach($blogs as $blog)
            <div class="ui segment">
                <div class="ui stackable grid">
                    <div class="five wide column" style="padding: 5px 0px 0px 0px !important;">
                        <img src="{{url('images/aplication/blog' . "/$blog->image")}}" style="width: 100%">
                    </div>
                    <div class="ten wide column" style="padding: 5px 0px 0px 0px !important;">
                        <h3>{{$blog->name}}</h3>
                        <a href="{{url("blog/$blog->id")}}">
                            <button class="mini positive ui button">ver</button>
                        </a>
                        <a href="{{url('admin/blog/modificar' ."/$blog->id") }}">
                            <button class="mini ui blue button">Modificar</button>
                        </a>
                        @if($blog->gallery == 1)
                            <a href="{{url("admin/blog/upload/$blog->id")}}">
                                <button class="mini ui yellow button">Galeria</button>
                            </a>
                        @endif
                        <a href="{{url('admin/blog/destroy' ."/$blog->id") }}">
                            <button class="mini negative ui button">Eliminar</button>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

@endsection


