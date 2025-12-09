@extends('layouts.app')

@section('headTitle')
    Inicio Proyecto
@endsection

@section('header')
    <a class="p-4 py-2 bg-slate-800 rounded-[10px] hover:bg-slate-900" href={{ route('proyectos.create') }}>Crear proyecto</a>
@endsection

@section('main')
    @section('mainTitle')
        Inicio Proyecto
    @endsection
    <section class="flex flex-wrap gap-4">
    @foreach ($proyectos as $proyecto)
        <article class="flex flex-col gap-4 p-8 px-16 bg-sky-400 rounded-[8px] w-80">
            <h2 class="text-2xl font-bold">{{ $proyecto->nombre }}</h2>
            @if ($proyecto->descripcion)
                <h3 class="text-md font-bold">{{ $proyecto->descripcion }}</h3>
            @endif
            @if ($proyecto->link)
                <a class="text-md text-slate-700 italic mb-4" href={{ $proyecto->link }}>Enlace del proyecto</a>
            @endif
            <div class="flex justify-between gap-4 text-center">
                <a class="flex-1 p-2 px-4 bg-yellow-400 rounded-[4px] hover:bg-yellow-500" href={{ route('proyectos.edit', $proyecto->id) }}>Editar</a>
                <form class="flex-1" action={{ route('proyectos.destroy', $proyecto->id) }} method="post">
                    @csrf
                    @method('DELETE')
                    <button class="p-2 px-4 bg-red-400 rounded-[4px] hover:bg-red-500" type="submit">Eliminar</button>
                </form>
            </div>
        </article>
    @endforeach
    </section>
@endsection
