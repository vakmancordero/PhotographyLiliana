@extends('layouts.app')
@section('script')
    <script>$('.ui.checkbox')
            .checkbox()
        ;</script>
@stop
@section('content')

    @if(Session::has('msj'))
        <strong>Exito!</strong> La modificacion se ha realizado correctamente
    @endif

    <h1>Blog - Crear un nuevo post</h1>

    <form class="ui form" role="form" method="POST" action="{{ url('admin/blog/modificar' . "/$blog->id") }}" enctype="multipart/form-data">

        {{ csrf_field() }}

        <div class="field{{ $errors->has('name') ? ' has-error' : '' }}">

            <label>Nombre: </label>
            <input type="text" value="{{$blog->name}}" class="form-control" name="name" required autofocus>

                <br><br>
                <img src="{{url('images/aplication/blog' . "/$blog->image")}}" style="width: 300px">


            <label>Escribe tu historia: </label>
            <textarea type="text" class="form-control" name="historia" required>{{$blog->description}}</textarea>

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif




            <div class="fields">
                <div class="four wide field">
                    <label>Imagen: </label>
                    <input name="imagen" type="file" class="ui button" accept="image/jpeg, image/png" >

                </div>
                <div class="six wide field">
                    <label>Fecha:</label>
                    <input type="date" name="date" value="{{$blog->date}}" required>
                </div>
            </div>

            <div class="ui toggle checkbox">
                @if($blog->gallery == 1)
                <input type="checkbox" name="galeria" tabindex="0" class="hidden" checked>
                @else
                    <input type="checkbox" name="galeria" tabindex="0" class="hidden">
                @endif
                <label>Galeria de imagenes</label>
            </div>
            <br><br>
        </div>

        <button class="ui primary button" type="submit">Crear</button>

    </form>


@endsection
