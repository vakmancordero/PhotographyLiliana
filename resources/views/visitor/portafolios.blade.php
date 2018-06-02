@extends('layouts.visitor')

@section('stylesheets')
    
    <link rel="stylesheet" type="text/css" href="{{ asset('css/visitor/portafolio.css') }}">
@stop

@section('script')
    <script src="{{asset('js/visitor/portafolio.js')}}"></script>
@stop

@section('content')

<div class="contentPortafolios">

    @foreach($portafolios as $po)

    <a class="portafolio move" id="por{{ $po->id }}" href="{{ url('portafolio/' . $po->url) }}">
        <div class="poImg">
        
            <div class="poImg" style="background-image: url({{ url('images/aplication/curriculum/principal_' . $po->image)}})"></div>         
        
            <div  class="poData">
                
                <div class="poId"><h3> #No . 0{{ $po->id }}</h3></div>
                <div class="poName"><h3>{{ $po->name }}</h3></div>
            </div>
        </div>
    </a>    

    @endforeach

</div>
    
@stop


