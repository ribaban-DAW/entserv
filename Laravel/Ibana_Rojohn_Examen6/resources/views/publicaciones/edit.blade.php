@extends('layouts.app')

@section('headTitle')
    Editar Publicaciones
@endsection

@section('main')
    @section('mainTitle')
        Editar Publicaciones
    @endsection

    @if (session('failure'))
        <p class="text-xl text-red-700 mb-4">{{ session('failure') }}</p>
    @endif
    <form class="flex flex-col w-xl gap-4" action={{ route('publicaciones.update', $publicacion->id) }} method="post">
        @csrf
        @method('PUT')
        <div>
            <label class="block mb-4" for="titulo">Título</label>
            <input class="p-2 px-4 w-full border-1 border-black" id="titulo" name="titulo" type="text" value={{ $publicacion->titulo }} required />
        </div>
        <div>
            <label class="block mb-4" for="texto">Texto</label>
            <textarea class="p-2 px-4 w-full border-1 border-black" id="texto" name="texto" type="text" required>{{ $publicacion->texto }}</textarea>
        </div>
        <div>
            <label class="block mb-4" for="publicado">Está publicado</label>
            <select class="p-2 px-4 w-full border-1 border-black" id="publicado" name="publicado" required>
                <option value="0"
                    @if ( !$publicacion->publicado )
                        selected
                    @endif
                >No</option>
                <option value="1"
                    @if ( $publicacion->publicado )
                        selected
                    @endif
                >Sí</option>
            </select>
        </div>
        <div>
            <label class="block mb-4" for="fechaPublicacion">Fecha Publicación</label>
            <input class="p-2 px-4 w-full border-1 border-black" id="fechaPublicacion" name="fechaPublicacion" type="date" value={{ $publicacion->fechaPublicacion }} />
        </div>
        <div>
            <label class="block mb-4" for="idCategoria">ID Categoría</label>
            <input class="p-2 px-4 w-full border-1 border-black" id="idCategoria" name="idCategoria" type="text" value={{ $publicacion->idCategoria }} required />
        </div>
        <button class="p-2 px-4 bg-sky-400">Editar</button>
    </form>
@endsection
