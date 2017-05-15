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
                <td class="right aligned">
                    <a href="{{url('admin/clientes/modificar/' . $n->id)}}">
                        <button class="ui mini button">Modificar</button>
                    </a>

                    <a href="{{url("admin/clientes/$n->id/galerias ")}}">
                        <button class="ui mini button">Galerias</button>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>




@endsection

