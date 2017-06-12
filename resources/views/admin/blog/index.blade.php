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



        @foreach($blogs as $blog)
            <div class="ui segment">
                <div class="ui stackable grid">
                    <div class="five wide column" style="padding: 5px 0px 0px 0px !important;">
                        <img src="{{url('images/aplication/blog' . "/$blog->image")}}" style="width: 100%">
                    </div>
                    <div class="ten wide column" style="padding: 5px 0px 0px 0px !important;">
                        <h3>{{$blog->name}}</h3>
                        <a href="{{url("blog/$blog->link")}}">
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

    <center>


        <div class="ui demo buttons">
            <!-- Previous Page Link -->
            @if ($blogs->onFirstPage())
                <div class="ui button disabled"><a href="#!"> < </a></div>
            @else
                <div class="ui button"><a href="{{ $blogs->previousPageUrl() }}"> < </a></div>

            @endif

        <!-- Pagination Elements -->
            @for($i=1; $i <= $blogs->lastPage(); $i++)
                @if($i == $blogs->currentPage())
                    <div class="ui button disabled"><a href="#!" class=" white-text">{{$i}}</a></div>
                @else
                    <div class="ui button"><a href="{{url('admin/blog?page=' .  $i) }}">{{$i}}</a></div>
                @endif
            @endfor

        <!-- Next Page Link -->
            @if ($blogs->hasMorePages())
                <div class="ui button"><a href="{{ $blogs->nextPageUrl() }}"> > </a></>
            @else
                <li class="ui button disabled"><a href="#!"> > </a></li>
            @endif
        </div>

    </center>


@endsection


