@extends('layouts.app')

@section('headTitle')
    Crear Publicaciones
@endsection

@section('main')
    @section('mainTitle')
        Crear Publicaciones
    @endsection


    @if (session('failure'))
        <p class="text-xl text-red-700 mb-4">{{ session('failure') }}</p>
    @endif
    <form class="flex flex-col w-xl gap-4" action={{ route('publicaciones.store') }} method="post">
        @csrf
        <div>
            <label class="block mb-4" for="titulo">Título</label>
            <input class="p-2 px-4 w-full border-1 border-black" id="titulo" name="titulo" type="text" required />
        </div>
        <div>
            <label class="block mb-4" for="texto">Texto</label>
            <textarea class="p-2 px-4 w-full border-1 border-black" id="texto" name="texto" required></textarea>
        </div>
        <div>
            <label class="block mb-4" for="fechaCreacion">Está publicado</label>
            <select class="p-2 px-4 w-full border-1 border-black" id="publicado" name="publicado" required>
                <option value="0">No</option>
                <option value="1">Sí</option>
            </select>
        </div>
        <div>
            <label class="block mb-4" for="fechaPublicacion">Fecha Publicación</label>
            <input class="p-2 px-4 w-full border-1 border-black" id="fechaPublicacion" name="fechaPublicacion" type="date" />
        </div>
        <div>
            <label class="block mb-4" for="idCategoria">ID Categoría</label>
            <input class="p-2 px-4 w-full border-1 border-black" id="idCategoria" name="idCategoria" type="text" required />
        </div>
        <button class="p-2 px-4 bg-sky-400">Crear</button>
    </form>
@endsection
