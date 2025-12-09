@extends('layouts.app')

@section('headTitle')
    Crear animal
@endsection

@section('main')
    @section('mainTitle')
        Crear animal
    @endsection

    <form class="flex flex-col w-xl gap-4" action={{ route('animals.store') }} method="post">
        @csrf
        <div>
            <label class="block mb-4" for="nombre">Nombre</label>
            <input class="p-2 px-4 w-full border-1 border-black" id="nombre" name="nombre" type="text" required />
        </div>
        <div>
            <label class="block mb-4" for="raza">Raza</label>
            <input class="p-2 px-4 w-full border-1 border-black" id="raza" name="raza" type="text" required/>
        </div>
        <div>
            <label class="block mb-4" for="mamifero">Es mamífero</label>
            <select class="p-2 px-4 w-full border-1 border-black" id="mamifero" name="mamifero" required>
                <option value="0">No</option>
                <option value="1">Sí</option>
            </select>
        </div>
        <div>
            <label class="block mb-4" for="fechaRegistro">Fecha Registro</label>
            <input class="p-2 px-4 w-full border-1 border-black" id="fechaRegistro" name="fechaRegistro" type="date" required />
        </div>
        <div>
            <label class="block mb-4" for="observaciones">Observaciones</label>
            <textarea rows="10" class="p-2 px-4 w-full border-1 border-black" id="observaciones" name="observaciones"></textarea>
        </div>
        <button class="p-2 px-4 bg-sky-400">Crear</button>
    </form>
@endsection
