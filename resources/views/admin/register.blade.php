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

        <h1>Registra un nuevo Cliente</h1>

        @if(session()->has('msj'))
            <script>alert('Nuevo cliente registrado');</script>
        @endif

        <form class="ui form" role="form" method="POST" action="{{ url('admin/register') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Nombre: </label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">Correo electronico:</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
            </div>


            <label class="">Password</label>
            <input id="password" type="password" class="form-control" name="password" required>

            @if ($errors->has('password'))
                <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
            @endif



            <div class="form-group">
                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>

            <div class="form-group">
                <label for="password-confirm" class="col-md-4 control-label">Telefono</label>

                <div class="col-md-6">
                    <input type="tel" value="{{old('tel')}}" class="form-control" name="phone" maxlength="10" id="validarTel">
                </div>
            </div>

            <br>
            <div class="ui toggle checkbox">
                <input type="checkbox" name="level">
                <label>Administrador</label>
            </div>

            <br><br>

            <button class="ui primary button" type="submit">Register </button>


        </form>
    </div>
@endsection
