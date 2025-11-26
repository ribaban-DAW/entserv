@extends('layouts.app')

@section('html')
    @section('headTitle')
        Calculadora
    @endsection

    @section('main')
    @section('mainTitle')
        Calculadora
    @endsection
    <ul>
        <li><a class="underline text-purple-700 hover:text-purple-400" href="/calculadora/suma">Suma</a></li>
        <li><a class="underline text-purple-700 hover:text-purple-400" href="/calculadora/resta">Resta</a></li>
        <li><a class="underline text-purple-700 hover:text-purple-400" href="/calculadora/mult">Multiplicación</a></li>
        <li><a class="underline text-purple-700 hover:text-purple-400" href="/calculadora/div">División</a></li>
    </ul>
    @endsection
@endsection
