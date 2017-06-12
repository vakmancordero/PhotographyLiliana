@extends('layouts.app')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/appAdmin/photosFacebook.css') }}">
@stop

@section('script')
    <script src="{{url('js/appAdmin/CurriculumIndexGetImages.js')}}"></script>
    <script src="{{url('js/appAdmin/photosFacebook.js')}}"></script>
@stop

@section('content')

    <a href="{{url('admin/curriculum/create')}}">
        <button class="ui green button icon right floated ">
            Agregar <i class="plus icon"></i>
        </button>
    </a>

    <h1 style="margin-top: 0">Panel de control - Curriculum</h1>

    @if(isset($curriculums))

        @foreach($curriculums as $curriculum)

            <div class="ui segment">

                <input type="hidden" class="light_identifier" value="{{$curriculum->id}}">

                <h3 class="ui floated header">{{ $curriculum->name }}</h3>

                <a href="{{url('admin/curriculum/upload/' . $curriculum->id)}}">
                    <div class="ui right floated  header" tabindex="0">
                        <div class="ui red button mini">
                            <a href="{{url('admin/curriculum/delete/' . $curriculum->id)}}">
                                <i class="trash icon"></i>
                                Eliminar
                            </a>
                        </div>
                    </div>
                </a>

                <a href="{{url('admin/curriculum/upload/' . $curriculum->id)}}">
                    <div class="ui right floated labeled button" tabindex="0">
                        <div class="ui blue  button">
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

                <a href="{{url('admin/curriculum/edit/' . $curriculum->id)}}">
                    <div class="ui right floated  header" tabindex="0">
                        <div class="ui yellow button mini">

                                Editar
                        </div>
                    </div>
                </a>

                <div class="ui clearing divider"></div>

                <div id="links_{{$curriculum->id}}" class="photoContainer"></div>

                <div id="blueimp-gallery" class="blueimp-gallery">
                    <div class="slides"></div>
                    <h3 class="title"></h3>
                    <a class="prev">‹</a>
                    <a class="next">›</a>
                    <a class="close">×</a>
                    <a class="play-pause"></a>
                    <ol class="indicator"></ol>
                </div>

            </div>

        @endforeach

    @endif

    <center>


        <div class="ui demo buttons">
            <!-- Previous Page Link -->
            @if ($curriculums->onFirstPage())
                <div class="ui button disabled"><a href="#!"> < </a></div>
            @else
                <div class="ui button"><a href="{{ $curriculums->previousPageUrl() }}"> < </a></div>

            @endif

        <!-- Pagination Elements -->
            @for($i=1; $i <= $curriculums->lastPage(); $i++)
                @if($i == $curriculums->currentPage())
                    <div class="ui button disabled"><a href="#!" class=" white-text">{{$i}}</a></div>
                @else
                    <div class="ui button"><a href="{{url('admin/blog?page=' .  $i) }}">{{$i}}</a></div>
                @endif
            @endfor

        <!-- Next Page Link -->
            @if ($curriculums->hasMorePages())
                <div class="ui button"><a href="{{ $curriculums->nextPageUrl() }}"> > </a></>
            @else
                <li class="ui button disabled"><a href="#!"> > </a></li>
            @endif
        </div>

    </center>

@endsection


