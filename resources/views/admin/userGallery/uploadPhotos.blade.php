@extends('layouts.app')

@section('script')
    
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/vue"></script> -->
    <script src="https://unpkg.com/axios@0.12.0/dist/axios.min.js"></script>
    <script src="https://unpkg.com/lodash@4.13.1/lodash.min.js"></script>

    <script type="text/javascript" src="{{ asset('js/appAdmin/ClientStoreImageGallery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/appAdmin/ClientGetImageGallery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/appAdmin/ClientDeleteImage.js') }}"></script>
    <script src="{{url('js/appAdmin/photosFacebook.js')}}"></script>

@stop

@section('stylesheets')
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('dropzone/dropzone.min.css') }}"> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/appAdmin/photosFacebook.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/appAdmin/myDropZone.css') }}">

@stop

@section('content')

<div id="app">

    <h1>Galleria - {{ $album->name }}</h1>
    <a href="{{url("admin/clientes/$album->client_id/galerias")}}">
        <button class="ui mini button yellow">Ver Galerias del Cliente</button>
    </a>

    <h5>Añada sus imágenes</h5>

    <div class="opciones"> 
        <button v-on:click="retryFiled" class="ui mini button purple">Reintentar Carga</button>
    </div>
    

    <form id="drop"
          method="POST"
          action="{{url("admin/galleryClient/$id/upload")}}"
          >
          <div  class="dropInputContainer">
            <input id="files" type="file" name="files" v-on:change="getFile" multiple>
            <img src="{{ url('images/aplication/uploadIcon.png')}}">
          </div>
          
        {{ csrf_field() }}

        <div class="filePreviewContainer" v-if="files.length > 0" >
            <div v-for="file in files" class="fileDiv" v-bind:class="{ activeDrop: file.status == 1, 'errorUpload': file.status < 0 }">
                <img :src=file.bits :id=file.id>
                
                <div v-if="file.status == 1" class="progress">
                    <div class="percent" id="percent"></div>
                </div>
                <div v-if="file.status == -1" class="alertDrop">
                    <p>Error en la carga</p>
                </div>
                <div v-if="file.status == -2" class="alertDrop">
                    <p>Nombre duplicada</p>
                </div>
            </div>
        </div>    
    </form>

    <br>

    <input type="hidden" value="{{$album->id}}" id="galleryId">
    <input type="hidden" value="{{url('/')}}" id="homePath">

    <div id="links" class="photoContainer">

    </div>

    <div id="blueimp-gallery" class="blueimp-gallery">
        <div class="slides"></div>
        <h3 class="title"></h3>
        <a class="prev">‹</a>
        <a class="next">›</a>
        <a class="close">×</a>
        <a class="play-pause"></a>
        <ol class="indicator"></ol>
    </div>

    <br>
</div>


@endsection