@extends('layouts.app')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/appAdmin/photosFacebook.css') }}">
@stop

@section('content')

    <style>
        .row > .column {
            padding: 0 8px;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        .column {
            float: left;
            width: 25%;
        }

        /* The Modal (background) */
        .modal {
            display: none;
            position: fixed;
            z-index: 103;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: black;
        }

        /* Modal Content */
        .modal-content {
            position: relative;
            background-color: #fefefe;
            margin: auto;
            padding: 0;
            width: 90%;
            max-width: 1200px;
        }

        /* The Close Button */
        .close {
            color: white;
            position: absolute;

            top: 10px;
            right: 25px;
            font-size: 35px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #999;
            text-decoration: none;
            cursor: pointer;
        }

        .mySlides {
            display: none;
        }

        /* Next & previous buttons */
        .prev,
        .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            margin-top: -50px;
            color: white;
            font-weight: bold;
            font-size: 20px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
            -webkit-user-select: none;
        }

        /* Position the "next button" to the right */
        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        /* On hover, add a black background color with a little bit see-through */
        .prev:hover,
        .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        /* Number text (1/3 etc) */
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        .caption-container {
            text-align: center;
            background-color: black;
            padding: 2px 16px;
            color: white;
        }

        img.demo {
            opacity: 0.6;
        }

        .active,
        .demo:hover {
            opacity: 1;
        }

        img.hover-shadow {
            transition: 0.3s
        }

        .hover-shadow:hover {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
        }
    </style>
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
                            <i class="trash icon"></i>
                            Eliminar
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
                            1,048
                        </a>
                    </div>
                </a>
                <div class="ui clearing divider"></div>
                <div id="photoContainer">

                    @for($n = 0; $n <= 15; $n++)
                        <div id="photos" style="background-image: url(https://unsplash.imgix.net/photo-1414490929659-9a12b7e31907);"
                             onclick="openModal();currentSlide({{$n+1}})">
                            <div id="photoHover">
                                <i class="trash icon"></i>
                            </div>
                        </div>
                    @endfor

                </div>


                <div id="myModal" class="modal">
                    <span class="close cursor" onclick="closeModal()">&times;</span>
                    <div class="modal-content">
                        @for($n = 0; $n <= 15; $n++)
                            <div class="mySlides">
                                <div class="numbertext">{{$n + 1}} / 15</div>
                                <img src="https://unsplash.imgix.net/photo-1414490929659-9a12b7e31907" style="width:100%">
                            </div>
                        @endfor

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
2
@endsection

@section('script')
    <script src="{{url('js/appAdmin/photosFacebook.js')}}"></script>
    <script>
        //$('html').keypress(function(e){
          //  alert(e.which);
        //});


        $(document).keyup(function(e) {

            if (e.keyCode == 27) { // escape key maps to keycode `27`
                closeModal();
            }

            else if(e.keyCode == 37) {
                plusSlides(-1);
            }
            else if(e.keyCode == 39) {
                plusSlides(1);
            }
        });




        function openModal() {
           $('#myModal').css('display' , "block");
        }

        function closeModal() {
           $('#myModal').css('display' ,"none");
        }

        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("demo");
            var captionText = document.getElementById("caption");
            if (n > slides.length) {slideIndex = 1}
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }

            slides[slideIndex-1].style.display = "block";

            //captionText.innerHTML = dots[slideIndex-1].alt;
        }
    </script>
    </script>
@stop
