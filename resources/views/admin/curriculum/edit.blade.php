@extends('layouts.app')

@section('content')

    @if(Session::has('msj'))
        <script>alert('Portafolio Modificado con exito');</script>
    @endif

    <h1>Edit Curriculum - {{$curriculum->name}}</h1>

    <form class="ui form" role="form" method="POST" enctype="multipart/form-data">

        {{ csrf_field() }}


        @if ($errors->has('name'))
            <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
        @endif

            <label>Nombre: </label>
            <input type="text" class="form-control" name="name" required autofocus value="{{$curriculum->name}}">

        @if ($errors->has('description'))
            <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
        @endif

            <label>Descripción: </label>
            <input type="text" class="form-control" name="description" required value="{{$curriculum->description}}">



            <div class="five wide field">
                <label>Imagen: </label>
                <input name="image" type="file" class="ui button" accept="image/jpeg, image/png">
            </div>



        <button class="ui primary button" type="submit">Crear</button>

    </form>


@endsection
