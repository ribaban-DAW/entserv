@extends('layouts.app')

@section('headTitle')
    Inicio Categoría
@endsection

@section('header')
    <a class="p-4 py-2 bg-slate-800 rounded-[10px] hover:bg-slate-900" href={{ route('categorias.create') }}>Crear categoría</a>
@endsection

@section('main')
    @section('mainTitle')
        Inicio Categoría
    @endsection
    <section class="flex flex-wrap gap-4">
    @foreach ($categorias as $categoria)
        <article class="flex flex-col gap-4 p-8 px-16 bg-sky-400 rounded-[8px] w-80">
            <h2 class="text-2xl font-bold">Nombre: {{ $categoria->nombre }}</h2>
        </article>
    @endforeach
    </section>
@endsection
