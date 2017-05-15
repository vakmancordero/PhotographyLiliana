@extends('layouts.app')

@section('script')

@endsection


@section('content')


    <h4>Cliente: {{ $usuario->name }}</h4>
    <a href="{{url("admin/clientes/$usuario->id/crearGaleria")}}">
        <button class="ui mini button">Crear Galeria</button>
    </a>
<br><br><hr>



    @foreach($galerias as $gal)
        <img src="{{url('images/aplication/clients/secundaria_' . $gal->img)}}">
        <br>
        <a href="{{url('admin/galleryClient/' . $gal->id  . '/upload')}}">
            <button class="ui mini button">Administrar</button>
        </a>

        <a href="{{url('admin/galleryClient/' . $gal->id )}}">
            <button class="ui mini button">Ver</button>
        </a>
    @endforeach
@endsection