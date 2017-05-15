@extends('layouts.app')

@section('script')

@endsection


@section('content')


    <h4>Cliente: {{ $usuario->name }}</h4>
    <a href="{{url("admin/clientes/$usuario->id/crearGaleria")}}">
        <button class="ui purple mini button">Crear Galeria</button>
    </a>
<br><br><hr>

    <div>

        @foreach($galerias as $gal)
            <div class="galeria">
                <img src="{{url('images/aplication/clients/secundaria_' . $gal->img)}}">
                <br>
                <a href="{{url('admin/galleryClient/' . $gal->id  . '/upload')}}">
                    <button class="ui blue mini button">Administrar</button>
                </a>

                <a href="{{url('admin/galleryClient/' . $gal->id )}}">
                    <button class="ui green mini button">Ver</button>
                </a>

                <a href="{{url('admin/galleryClient/destroyGallery/' . $gal->id )}}">
                    <button class="ui red mini button" onsubmit="eliminar({{$gal->id}})">Eliminar</button>
                </a>
            </div>

        @endforeach

    </div>

@endsection