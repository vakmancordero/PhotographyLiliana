@extends('layouts.app')

@section('content')

<div class="">

    <a href="{{url('admin/curriculum/create')}}">
        <button class="ui green button icon right floated ">
            Agregar <i class="plus icon"></i>
        </button>
    </a>

    <h1>Panel de control - Curriculum</h1>

</div>

    @if(isset($curriculums))

        @foreach($curriculums as $curriculum)

            <div class="ui segment">
                <h3 class="ui  floated header">{{ $curriculum->name }}</h3>

                <a href="{{url('admin/curriculum/cargar/'. $curriculum->id)}}">
                    <div class="ui right floated  header" tabindex="0">
                        <div class="ui red button">
                            <i class="trash icon"></i>
                        </div>

                    </div>
                </a>

                <a href="{{url('admin/curriculum/cargar/'. $curriculum->id)}}">
                    <div class="ui right floated labeled button" tabindex="0">
                        <div class="ui blue button">
                            <i class="image icon"></i> Agregar Fotos
                        </div>
                        <a class="ui basic blue left pointing label">
                            1,048
                        </a>
                    </div>
                </a>
                <div class="ui clearing divider"></div>
                @for($n = 0; $n <= 15; $n++)
                    <div>holi</div>
                @endfor

            </div>

        @endforeach

    @endif

@endsection
