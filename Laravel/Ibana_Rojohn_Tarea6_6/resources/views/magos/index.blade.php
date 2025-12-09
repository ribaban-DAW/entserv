@extends('layouts.app')

@section('headTitle')
    Inicio Mago
@endsection

@section('header')
    <a class="p-4 py-2 bg-slate-800 rounded-[10px] hover:bg-slate-900" href={{ route('magos.create') }}>Crear mago</a>
@endsection

@section('main')
    @section('mainTitle')
        Inicio Mago
    @endsection
    <section class="flex flex-wrap gap-4">
    @foreach ($magos as $mago)
        <article class="flex flex-col gap-4 p-8 px-16 bg-sky-400 rounded-[8px] w-80">
            <h2 class="text-2xl font-bold">{{ $mago->nombre }} Nv {{ $mago->nivel }}</h2>
            <p class="text-md text-slate-700 italic mb-4">{{ $mago->escuela }}</p>
            <p class="text-md text-slate-700 italic mb-4">{{ $mago->varita }}</p>
            <p class="text-md text-slate-700 italic mb-4">{{ $mago->mascota }}</p>
            <div class="flex justify-between gap-4 text-center">
                <a class="flex-1 p-2 px-4 bg-yellow-400 rounded-[4px] hover:bg-yellow-500" href={{ route('magos.edit', $mago->id) }}>Editar</a>
                <form class="flex-1" action={{ route('magos.destroy', $mago->id) }} method="post">
                    @csrf
                    @method('DELETE')
                    <button class="p-2 px-4 bg-red-400 rounded-[4px] hover:bg-red-500" type="submit">Eliminar</button>
                </form>
            </div>
        </article>
    @endforeach
    </section>
@endsection
