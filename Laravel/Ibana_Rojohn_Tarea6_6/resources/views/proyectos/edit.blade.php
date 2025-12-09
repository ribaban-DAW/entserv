@extends('layouts.app')

@section('headTitle')
    Editar Proyecto
@endsection

@section('main')
    @section('mainTitle')
        Editar Proyecto
    @endsection

    <form class="flex flex-col w-xl gap-4" action={{ route('proyectos.update', $proyecto->id) }} method="post">
        @csrf
        @method('PUT')
        <div>
            <label class="block mb-4" for="nombre">Nombre</label>
            <input class="p-2 px-4 w-full border-1 border-black" id="nombre" name="nombre" type="text" value={{ $proyecto->nombre }} required />
        </div>
        <div>
            <label class="block mb-4" for="descripcion">Descripción</label>
            <textarea rows="10" class="p-2 px-4 w-full border-1 border-black" id="descripcion" name="descripcion">{{ $proyecto->descripcion }}</textarea>
        </div>
        <div>
            <label class="block mb-4" for="link">Enlace del proyecto</label>
            <input class="p-2 px-4 w-full border-1 border-black" id="link" name="link" type="text" value={{ $proyecto->link }}/>
        </div>
        <button class="p-2 px-4 bg-sky-400">Editar</button>
    </form>
@endsection
