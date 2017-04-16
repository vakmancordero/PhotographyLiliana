@extends('layouts.app')

@section('content')


    <h1>Panel de control - Curriculum</h1>




        <a href="{{url('admin/curriculum/create')}}">Crear nueva seccion del curriculum</a>

    <hr>

    @if(isset($curriculumSections))
        @foreach($curriculumSections as $x)
            <h3>{{ $x->type }}</h3>
            <a href="{{url('admin/curriculum/cargar/'. $x->id)}}">Carga fotografías</a>
        <hr>
        @endforeach
    @endif
@endsection
