@extends('layouts.visitor3')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/visitor/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/visitor/blogIndex.css') }}">
@stop

@section('javascript')

@stop

@section('content')

<div class="everything" style="background-image: url('{{url('images/texture.png')}}')  ;">
    <div class="blogContainer">
        <div>
            <p>Blog</p>
        </div>
        <br><br>
        <div class="blogCardsSection">
            @foreach($blogs as $n)
                <div class="blog">
                    <a href="{{url('blog/' . $n->link)}}">
                        <div style="background-image: url('{{url('images/aplication/blog/' . $n->image)}}')"></div>
                        <img src="{{url('images/aplication/blog/' . $n->image)}}">
                        <h5>{{$n->name}}</h5>
                    </a>
                    <h5>{{$n->date }}</h5>
                </div>
            @endforeach
        </div>
        <div class="blogMas">
            <p>Mas historias</p>
        </div>
    </div>
</div>

@stop