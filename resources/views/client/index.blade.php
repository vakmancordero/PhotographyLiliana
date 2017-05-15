@extends('layouts.visitor2')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/client/index.css') }}">
@endsection

@section('script')

@endsection


@section('content')

    <div class="sectionClient">

    <h2>Hola {{ Auth::user()->name }}!</h2>

        <div class="albunes">
            @foreach($galerias as $n)
                <div id="album">
                    <a href="{{url('client/'.$n->id)}}">
                        <img src="{{url('images/aplication/clients/secundaria_'.$n->img)}}" >
                        <h4>{{$n->name}}</h4>
                    </a>
                    <h5>{{$n->date}}</h5>
                </div>
            @endforeach
        </div>

    </div>
@endsection