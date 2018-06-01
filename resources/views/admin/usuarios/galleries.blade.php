@extends('layouts.app')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/appAdmin/listClientsGallery.css') }}">
@endsection

@section('script')

@endsection


@section('content')


    <h4>Cliente: {{ $usuario->name }}</h4>
    <a href="{{url("admin/clientes/$usuario->id/crearGaleria")}}">
        <button class="ui purple mini button">Crear Galeria</button>
    </a>
<br><br><hr>

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

                  @if($n->status == 2)
                        <a href="{{url('admin/galleryClient/' . $n->id  . '/selected')}}">
                            <button class="ui yellow mini button">Ver Fotos seleccionadas</button>
                        </a>
                    @endif



                <a href="{{url('admin/galleryClient/destroyGallery/' . $n->id )}}">
                    <button class="ui red mini button" onsubmit="eliminar({{$n->id}})">Eliminar</button>
                </a>
            </div>
        @endforeach
    </div>

        {{--@foreach($galerias as $gal)--}}
            {{--<div class="galeria">--}}
                {{--<img src="{{url('images/aplication/clients/secundaria_' . $gal->img)}}">--}}
                {{--<br>--}}
                {{--<a href="{{url('admin/galleryClient/' . $gal->id  . '/upload')}}">--}}
                    {{--<button class="ui blue mini button">Administrar</button>--}}
                {{--</a>--}}

                {{--<a href="{{url('admin/galleryClient/' . $gal->id )}}">--}}
                    {{--<button class="ui green mini button">Ver</button>--}}
                {{--</a>--}}

                {{--<a href="{{url('admin/galleryClient/destroyGallery/' . $gal->id )}}">--}}
                    {{--<button class="ui red mini button" onsubmit="eliminar({{$gal->id}})">Eliminar</button>--}}
                {{--</a>--}}
            {{--</div>--}}

        {{--@endforeach--}}



@endsection