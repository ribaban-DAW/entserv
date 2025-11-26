@extends('layouts.app')
@section('html')
    @section('headTitle')
        Productos
    @endsection

    @section('main')
        @section('mainTitle')
            Productos
        @endsection
        <table>
            <thead>
                <tr class="bg-pink-300 [&>th]:p-4">
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                <tr class="odd:bg-pink-200 even:bg-pink-300 [&>td]:p-4">
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->precio }}</td>
                    <td>{{ $producto->descripcion }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endsection
@endsection
