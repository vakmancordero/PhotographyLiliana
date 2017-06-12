@extends('layouts.app')

@section('script')



@endsection

@section('content')

    <table class="ui selectable inverted table">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Tel</th>
            <th>Acciones</th>

        </tr>
        </thead>
        <tbody>
        @foreach($usuarios as $n)
            <tr>
                <td>{{$n->name}}</td>
                <td>{{$n->email}}</td>
                <td>{{$n->phone}}</td>
                <td class="">
                    <a href="{{url('admin/clientes/modificar/' . $n->id)}}">
                        <button class="ui blue mini button">Modificar</button>
                    </a>

                    <a href="{{url("admin/clientes/$n->id/galerias ")}}">
                        <button class="ui green mini button">Galerias</button>
                    </a>
                    <a href="{{url('admin/clientes/eliminar/' . $n->id)}}">
                        <button class="ui red mini button">Eliminar</button>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <center>


        <div class="ui demo buttons">
            <!-- Previous Page Link -->
            @if ($usuarios->onFirstPage())
                <div class="ui button disabled"><a href="#!"> < </a></div>
            @else
                <div class="ui button"><a href="{{ $usuarios->previousPageUrl() }}"> < </a></div>

            @endif

        <!-- Pagination Elements -->
            @for($i=1; $i <= $usuarios->lastPage(); $i++)
                @if($i == $usuarios->currentPage())
                    <div class="ui button disabled"><a href="#!" class=" white-text">{{$i}}</a></div>
                @else
                    <div class="ui button"><a href="{{url('admin/blog?page=' .  $i) }}">{{$i}}</a></div>
                @endif
            @endfor

        <!-- Next Page Link -->
            @if ($usuarios->hasMorePages())
                <div class="ui button"><a href="{{ $usuarios->nextPageUrl() }}"> > </a></>
            @else
                <li class="ui button disabled"><a href="#!"> > </a></li>
            @endif
        </div>

    </center>




@endsection

