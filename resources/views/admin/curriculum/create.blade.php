@extends('layouts.app')

@section('content')

    @if(Session::has('msj'))
        <strong>Exito!</strong> Haz creado un nuevo currículum
    @endif

    <h1>Curriculum - Crear un nuevo currículum</h1>

    <form class="ui form" role="form" method="POST" action="{{ url('admin/curriculum/create') }}">

        {{ csrf_field() }}

        <div class="field{{ $errors->has('name') ? ' has-error' : '' }}">

            <label>Nombre: </label>
            <input type="text" class="form-control" name="name" required autofocus>

            <label>Descripción: </label>
            <input type="text" class="form-control" name="description" required>

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif

        </div>

        <button class="ui primary button" type="submit">Crear</button>

    </form>


@endsection
