@extends('layouts.app')

@section('content')
    <div class="">

        <div class="">Dashboard</div>

        <div class="">
            You are logged in!<br>
            <a href="{{url('admin/curriculum/create')}}">Crear nueva seccion del curriculum</a>
        </div>

    </div>
@endsection
