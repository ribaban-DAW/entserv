@extends('layouts.app')

@section('headTitle')
    Inicio Usuario
@endsection

@section('header')
    <a class="p-4 py-2 bg-slate-800 rounded-[10px] hover:bg-slate-900" href={{ route('usuarios.create') }}>Crear usuario</a>
@endsection

@section('main')
    @section('mainTitle')
        Inicio Usuario
    @endsection
    <section class="flex flex-wrap gap-4">
    @foreach ($usuarios as $usuario)
        <article class="flex flex-col gap-4 p-8 px-16 bg-sky-400 rounded-[8px] w-80">
            <h2 class="text-2xl font-bold">Nombre: {{ $usuario->nombre }}</h2>
            <p class="text-md text-slate-700 italic mb-4">Fecha Acceso: {{ date('d/m/o', strtotime($usuario->fechaAcceso)) }}</p>
            <div class="flex justify-between gap-4 text-center">
                <a class="flex-1 p-2 px-4 bg-yellow-400 rounded-[4px] hover:bg-yellow-500" href={{ route('usuarios.edit', $usuario->id) }}>Editar</a>
                <form class="flex-1" action={{ route('usuarios.destroy', $usuario->id) }} method="post">
                    @csrf
                    @method('DELETE')
                    <button class="p-2 px-4 bg-red-400 rounded-[4px] hover:bg-red-500" type="submit">Eliminar</button>
                </form>
            </div>
        </article>
    @endforeach
    </section>
@endsection
