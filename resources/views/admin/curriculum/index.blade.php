@extends('layouts.app')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/appAdmin/photosFacebook.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/appAdmin/lightBox.css') }}">
@stop
@section('script')
    <script src="{{url('js/appAdmin/photosFacebook.js')}}"></script>
    <script src="{{url('js/appAdmin/lightBox.js')}}"></script>
@stop
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

                <a href="{{url('admin/curriculum/upload/' . $curriculum->id)}}">
                    <div class="ui right floated  header" tabindex="0">
                        <div class="ui red button">
                            <a href="{{url('admin/curriculum/delete/' . $curriculum->id)}}">
                                <i class="trash icon"></i>
                                Eliminar
                            </a>
                        </div>
                    </div>
                </a>

                <a href="{{url('admin/curriculum/upload/' . $curriculum->id)}}">
                    <div class="ui right floated labeled button" tabindex="0">
                        <div class="ui blue button">
                            <i class="image icon"></i>
                            Cargar imágenes
                        </div>
                        <a class="ui basic blue left pointing label">
                            <?php $total = count($curriculum->curriculumImages);
                                echo $total;
                            ?>
                        </a>
                    </div>
                </a>
                <div class="ui clearing divider"></div>

                <div id="photoContainer">
                @if($total < 5)
                    @for ($n = 0; $n < count($curriculum->curriculumImages); $n++)

                        <div id="photos" style="background-image: url('{{url($curriculum->curriculumImages[$n]->path)}}')" data-lity
                             onclick="openModal();currentSlide({{$n + 1}})">
                            <div id="photoHover">
                                <form class="deleteImageForm" action="/admin/curriculum/images/{{$curriculum->curriculumImages[$n]->id }}">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="ui icon button"><i class="trash icon"></i></button>
                                </form>
                            </div>
                        </div>
                    @endfor
                @else
                    @for ($n = 0; $n < 5; $n++)
                        <div id="photos" style="background-image: url('{{url($curriculum->curriculumImages[$n]->path)}}')" data-lity
                             onclick="openModal();currentSlide({{$n + 1}})">
                            <div id="photoHover">
                                <form class="deleteImageForm" action="/admin/curriculum/images/{{$curriculum->curriculumImages[$n]->id }}">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="ui icon button"><i class="trash icon"></i></button>
                                </form>
                            </div>
                        </div>
                    @endfor
                @endif
                </div>


                <div id="myModal" class="modal">
                    <span class="close cursor" onclick="closeModal()">&times;</span>
                    <div class="modal-content">


                        @if($total < 5)
                            @for ($n = 0; $n < count($curriculum->curriculumImages); $n++)

                                <div class="mySlides">
                                    <div class="numbertext">{{$n + 1}} / {{$total}}</div>
                                    <img src='{{url($curriculum->curriculumImages[$n]->path)}}'>
                                </div>
                            @endfor
                        @else
                            @for ($n = 0; $n < 5; $n++)
                                <div class="mySlides">
                                    <div class="numbertext">{{$n + 1}} / 5</div>
                                    <img src='{{url($curriculum->curriculumImages[$n]->path)}}'>
                                </div>
                            @endfor
                        @endif




                        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                        <a class="next" onclick="plusSlides(1)">&#10095;</a>

                        <div class="caption-container">
                            <p id="caption"></p>
                        </div>


                    </div>
                </div>

            </div>

        @endforeach

    @endif

@endsection


