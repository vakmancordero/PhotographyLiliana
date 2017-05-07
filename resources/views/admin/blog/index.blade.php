@extends('layouts.app')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/appAdmin/photosFacebook.css') }}">
@stop

@section('script')
    <script src="{{url('js/curriculum/index.js')}}"></script>
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



    @endif

@endsection


