@extends('layouts.app')

@section('script')
    <script>
        $(document).ready(function(){
            $('#validarTel').keypress(function (e){
                if(String.fromCharCode(e.keyCode).match(/[^0-9]/g)) return false;
            })
        });
    </script>
@endsection


@section('content')
    <div class="ui raised very padded text container segment">

        @if(session()->has('msj'))
            <script>alert('Cliente Actualizado');</script>
        @endif

        <h1>Modificar Cliente</h1>

        <form class="ui form" role="form" method="POST" >
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Nombre: </label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{ $usuario->name }}" required autofocus>
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">Correo electronico:</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ $usuario->email }}" required>
                </div>
            </div>

            <div class="form-group">
                <label for="password-confirm" class="col-md-4 control-label">Telefono</label>

                <div class="col-md-6">
                    <input type="tel" value="{{$usuario->phone}}" class="form-control" name="phone" maxlength="10" id="validarTel">
                </div>
            </div>


            <label class="">Password</label>
                <input id="password" type="password" class="form-control" name="password">
            <br><br>
            <button class="ui primary button" type="submit">Register </button>


        </form>
    </div>
@endsection
