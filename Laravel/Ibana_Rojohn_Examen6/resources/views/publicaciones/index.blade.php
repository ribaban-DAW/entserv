@extends('layouts.app')

@section('headTitle')
    Inicio Publicaciones
@endsection

@section('header')
    <a class="p-4 py-2 bg-slate-800 rounded-[10px] hover:bg-slate-900" href={{ route('publicaciones.create') }}>Crear Publicación</a>
@endsection

@section('main')
    @section('mainTitle')
        Inicio Publicaciones
    @endsection
    <section class="flex flex-wrap gap-4">
    @foreach ($publicaciones as $publicacion)
        <article class="flex flex-col gap-4 p-8 px-16 bg-sky-400 rounded-[8px] w-80">
            <h2 class="text-2xl font-bold">Título: {{ $publicacion->titulo }}</h2>
            <p class="text-2xl font-bold">Texto: {{ $publicacion->texto }}</p>
            <p class="text-md italic">{{ $publicacion->publicado ? "Está publicado" : "No está publicado" }}</p>
            <p class="text-md text-slate-700 italic mb-4">Fecha Creación: {{ date('d/m/o', strtotime($publicacion->fechaCreacion)) }}</p>
            @if (isset($publicacion->fechaPublicacion))
                <p class="text-md text-slate-700 italic mb-4">Fecha Publicación: {{ date('d/m/o', strtotime($publicacion->fechaPublicacion)) }}</p>
            @endif
            <div class="flex justify-between gap-4 text-center">
                <a class="flex-1 p-2 px-4 bg-yellow-400 rounded-[4px] hover:bg-yellow-500" href={{ route('publicaciones.edit', $publicacion->id) }}>Editar</a>
                <form class="flex-1" action={{ route('publicaciones.destroy', $publicacion->id) }} method="post">
                    @csrf
                    @method('DELETE')
                    <button class="p-2 px-4 bg-red-400 rounded-[4px] hover:bg-red-500" type="submit">Eliminar</button>
                </form>
            </div>
        </article>
    @endforeach
    </section>
@endsection
