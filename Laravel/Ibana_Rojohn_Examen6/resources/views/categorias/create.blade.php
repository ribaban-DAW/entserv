@extends('layouts.app')

@section('headTitle')
    Crear Categoría
@endsection

@section('main')
    @section('mainTitle')
        Crear Categoría
    @endsection

    <form class="flex flex-col w-xl gap-4" action={{ route('categorias.store') }} method="post">
        @csrf
        <div>
            <label class="block mb-4" for="nombre">Nombre</label>
            <input class="p-2 px-4 w-full border-1 border-black" id="nombre" name="nombre" type="text" required />
        </div>
        <button class="p-2 px-4 bg-sky-400">Crear</button>
    </form>
@endsection
