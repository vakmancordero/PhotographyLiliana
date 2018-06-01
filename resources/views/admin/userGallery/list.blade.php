@extends('layouts.app')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/appAdmin/listClientsGallery.css') }}">
@endsection

@section('script')

@endsection


@section('content')
    <div class="sectionClient">

    <h2>Galerias de Clientes - Lista</h2>
    <hr>

        <div class="albunes">
            @foreach($galerias as $n)
                <div id="album">
                    <a href="{{url('admin/galleryClient/'.$n->id)}}">
                        <img src="{{url('images/aplication/clients/'.$n->id.'/secundaria_'.$n->img)}}" >
                        <h4>{{$n->name}}</h4>
                    </a>
                    <h5>{{$n->date}}</h5>
                    <a href="{{url('admin/galleryClient/' . $n->id  . '/upload')}}">
                        <button class="ui blue mini button">Administrar</button>
                    </a>



                    <a href="{{url('admin/galleryClient/destroyGallery/' . $n->id )}}">
                        <button class="ui red mini button" onsubmit="eliminar({{$n->id}})">Eliminar</button>
                    </a>
                </div>
            @endforeach
        </div>

        <center>


            <div class="ui demo buttons">
                <!-- Previous Page Link -->
                @if ($galerias->onFirstPage())
                    <div class="ui button disabled"><a href="#!"> < </a></div>
                @else
                    <div class="ui button"><a href="{{ $galerias->previousPageUrl() }}"> < </a></div>

                @endif

            <!-- Pagination Elements -->
                @for($i=1; $i <= $galerias->lastPage(); $i++)
                    @if($i == $galerias->currentPage())
                        <div class="ui button disabled"><a href="#!" class=" white-text">{{$i}}</a></div>
                    @else
                        <div class="ui button"><a href="{{url('admin/blog?page=' .  $i) }}">{{$i}}</a></div>
                    @endif
                @endfor

            <!-- Next Page Link -->
                @if ($galerias->hasMorePages())
                    <div class="ui button"><a href="{{ $galerias->nextPageUrl() }}"> > </a></>
                @else
                    <li class="ui button disabled"><a href="#!"> > </a></li>
                @endif
            </div>

        </center>

    </div>
@endsection