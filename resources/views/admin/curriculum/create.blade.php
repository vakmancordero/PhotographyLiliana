@extends('layouts.app')

@section('content')

    @if(Session::has('msj'))
        <strong>Exito!</strong> Haz creado una nueva sección
    @endif

    <h1>Curriculum - Crear nueva seccion</h1>

    <form class="ui form" role="form" method="POST" action="{{ url('admin/curriculum/create') }}">

        {{ csrf_field() }}

        <div class="field{{ $errors->has('name') ? ' has-error' : '' }}">
            <label>Nombre de la sección</label>
            <input id="email" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>

        <button class="ui primary button" type="submit">Login </button>

    </form>


@endsection
