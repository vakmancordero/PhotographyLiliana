@extends('layouts.app')

@section('content')

    <h1>Panel de control - Curriculum</h1>

    <a href="{{url('admin/curriculum/create')}}">
        Crear nuevo tipo curriculum
    </a>

    <hr>

    @if(isset($curriculumTypes))

        @foreach($curriculumTypes as $curriculumType)

            <h3>{{ $curriculumType->type }}</h3>

            <a href="{{url('admin/curriculum/cargar/' . $curriculumType->id)}}">
                Abrir sección de {{ $curriculumType->type }}
            </a>

            <hr>

        @endforeach

    @endif

@endsection
