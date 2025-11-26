@extends('layouts.app')
@section('html')
    @section('main')
    <form class="flex flex-col w-64 gap-4" action=@yield('operationEndpoint') method="POST">
        <!-- Importante poner @csrf, porque de lo contrario la página expira (419) -->
        @csrf
        <label class="font-bold text-purple-500" for="num1">Número 1</label>
        <input class="bg-pink-300 rounded px-2 border-2 border-black" id="num1" name="num1" type="number" required>
        <label class="font-bold text-purple-500" for="num2">Número 2</label>
        <input class="bg-pink-300 rounded px-2 border-2 border-black" id="num2" name="num2" type="number" required>
        <button class="bg-sky-600 hover:bg-sky-700 text-slate-200 px-4 py-2 my-2 rounded-full" type="submit">@yield('operationSubmit')</button>
    </form>

    @if (isset($resultado))
        <p>El resultado es {{ $resultado }}</p>
    @endif

    <a class="inline-block bg-sky-600 hover:bg-sky-700 text-slate-200 px-4 py-2 my-4 rounded" href="/calculadora">Volver</a>
    @endsection
@endsection
