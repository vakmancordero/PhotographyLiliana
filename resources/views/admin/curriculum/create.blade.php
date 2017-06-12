@extends('layouts.app')

@section('content')

    @if(Session::has('msj'))
        <strong>Exito!</strong> Haz creado un nuevo currículum
    @endif

    <h1>Curriculum - Crear un nuevo currículum</h1>

    <form class="ui form" role="form" method="POST" action="{{ url('admin/curriculum/create') }}" enctype="multipart/form-data">

        {{ csrf_field() }}

        @if ($errors->has('name'))
            <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
        @endif

            <label>Nombre: </label>
            <input type="text" class="form-control" name="name" required autofocus>

        @if ($errors->has('description'))
            <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
        @endif

            <label>Descripción: </label>
            <input type="text" class="form-control" name="description" required>

            <div class="five wide field">
                <label>Imagen: </label>
                <input name="image" type="file" class="ui button" accept="image/jpeg, image/png" required>
            </div>



        <button class="ui primary button" type="submit">Crear</button>

    </form>


@endsection
