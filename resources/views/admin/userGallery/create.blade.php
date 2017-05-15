@extends('layouts.app')

@section('script')

@endsection

@section('content')

    @if(Session::has('msj'))
        <strong>Exito!</strong> Haz creado un nuevo post
    @endif

    <h1>Crear nueva galeria</h1>

    <form class="ui form" role="form" method="POST"  enctype="multipart/form-data">

        {{ csrf_field() }}


        <div class="field{{ $errors->has('name') ? ' has-error' : '' }}">

            <label>Nombre: </label>
            <input type="text" class="form-control" name="name" required autofocus>


            <div class="fields">
                <div class="four wide field">
                    <label>Imagen: </label>
                    <input name="image" type="file" class="ui button" accept="image/jpeg, image/png" required>
                </div>
                <div class="six wide field">
                    <label>Fecha:</label>
                    <input type="date" name="date">
                </div>

                <div class="four wide field">
                    <label>Fotos disponibles: </label>
                    <input name="disponible" type="number" min="0" max="999" maxlength="3" required>
                </div>


            </div>

            <br><br>
        </div>

        <button class="ui primary button" type="submit">Crear</button>

    </form>


@endsection
