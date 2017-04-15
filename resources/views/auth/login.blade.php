@extends('layouts.visitor2')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home/main.css') }}">
    
@stop

@section('content')<br><br><br><br>
<div class="ui raised very padded text container segment">

                <h1 style="text-align: center">Inicia tu sesión</h1>
                <img src="images/logo/rueda.png" style="margin: 0 auto; display: block; width: 150px; padding-bottom: 20px;">

                    <form class="ui form" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="field{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label>Correo Electronico</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <br>

                        <div class="ui toggle checkbox">
                            <input type="checkbox" name="remember">
                            <label>No salir de la cuenta</label>
                        </div>

                        <br><br>


                        <button class="ui primary button" type="submit">Login </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>

                    </form>
                </div>
</div>
<br><br><br><br><br>


@endsection
