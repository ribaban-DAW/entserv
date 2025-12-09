@extends('layouts.app')

@section('headTitle')
Inicio
@endsection

@section('main')
    @section('mainTitle')
    Inicio
    @endsection
    <section class="flex flex-wrap gap-4">
    @foreach ($animals as $animal)
        <article class="flex flex-col gap-4 p-8 px-16 bg-sky-400 rounded-[8px] w-80">
            <header>
            <h2 class="text-2xl font-bold">{{ $animal->nombre }}</h2>
            <h3 class="text-xl font-bold">{{ $animal->raza }}</h3>
            </header>
            <div class="flex-1">
                <p class="text-md italic">{{ $animal->mamifero ? "Es mamífero" : "No es mamífero" }}</p>
                <p class="text-md">{{ $animal->observaciones }}</p>
            </div>
            <footer>
                <p class="text-md text-slate-700 italic mb-4">{{ $animal->fechaRegistro }}</p>
                <div class="flex justify-between gap-4 text-center">
                    <a class="flex-1 p-2 px-4 bg-yellow-400 rounded-[4px] hover:bg-yellow-500" href={{ route('animals.edit', $animal->id) }}>Editar</a>
                    <form class="flex-1" action={{ route('animals.destroy', $animal->id) }} method="post">
                        @csrf
                        @method('DELETE')
                        <button class="p-2 px-4 bg-red-400 rounded-[4px] hover:bg-red-500" type="submit">Eliminar</button>
                    </form>
                </div>
            </footer>
        </article>
    @endforeach
    </section>
@endsection
