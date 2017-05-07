@extends('layouts.app')

@section('content')

    @if(Session::has('msj'))
        <strong>Exito!</strong> Haz creado un nuevo post
    @endif

    <h1>Blog - Crear un nuevo post</h1>

    <form class="ui form" role="form" method="POST" action="{{ url('admin/blog/create') }}" enctype="multipart/form-data">

        {{ csrf_field() }}

        <div class="field{{ $errors->has('name') ? ' has-error' : '' }}">

            <label>Nombre: </label>
            <input type="text" class="form-control" name="titulo" required autofocus>

            <label>Escribe tu historia: </label>
            <textarea type="text" class="form-control" name="historia" required></textarea>

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif

            <label>Escribe tu historia: </label>
            <input name="imagen" type="image">

        </div>

        <button class="ui primary button" type="submit">Crear</button>

    </form>


@endsection
