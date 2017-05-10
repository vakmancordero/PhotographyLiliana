@extends('layouts.app')
@section('script')
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script>

        CKEDITOR.replace( 'editor' );

        $('.ui.checkbox').checkbox();


        function editar(){
            var data = CKEDITOR.instances.editor.getData();
            $('#blogHistoria').val(data);

//            return false;
        }

    </script>
@stop
@section('content')

    @if(Session::has('msj'))
        <strong>Exito!</strong> Haz creado un nuevo post
    @endif

    <h1>Blog - Crear un nuevo post</h1>

    <form class="ui form" role="form" method="POST" action="{{ url('admin/blog/create') }}" enctype="multipart/form-data" onsubmit="return editar()">

        {{ csrf_field() }}

        <div class="field{{ $errors->has('name') ? ' has-error' : '' }}">

            <label>Nombre: </label>
            <input type="text" class="form-control" name="name" required autofocus>

            <label>Escribe tu historia: </label>
            <textarea name="editor1" id="editor" rows="10" cols="80" style="display: none"></textarea>
            <input type="hidden" id="blogHistoria" name="historia" value="">

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif




            <div class="fields">
                <div class="four wide field">
                    <label>Imagen: </label>
                    <input name="imagen" type="file" class="ui button" accept="image/jpeg, image/png" required>
                </div>
                <div class="six wide field">
                    <label>Fecha:</label>
                    <input type="date" name="date">
                </div>
            </div>

            <div class="ui toggle checkbox">

                <input type="checkbox" name="galeria" tabindex="0" class="hidden">
                <label>Galeria de imagenes</label>
            </div>
            <br><br>
        </div>

        <button class="ui primary button" type="submit">Crear</button>

    </form>


@endsection
