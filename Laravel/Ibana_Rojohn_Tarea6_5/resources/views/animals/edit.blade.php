@extends('layouts.app')

@section('headTitle')
    Editar animal
@endsection

@section('main')
    @section('mainTitle')
        Editar animal
    @endsection

    <form class="flex flex-col w-xl gap-4" action={{ route('animals.update', $animal->id) }} method="post">
        @csrf
        @method('PUT')
        <div>
            <label class="block mb-4" for="nombre">Nombre</label>
            <input class="p-2 px-4 w-full border-1 border-black" id="nombre" name="nombre" type="text" value={{ $animal->nombre }} required />
        </div>
        <div>
            <label class="block mb-4" for="raza">Raza</label>
            <input class="p-2 px-4 w-full border-1 border-black" id="raza" name="raza" type="text" value={{ $animal->raza }} required/>
        </div>
        <div>
            <label class="block mb-4" for="mamifero">Es mamífero</label>
            <select class="p-2 px-4 w-full border-1 border-black" id="mamifero" name="mamifero" required>
                <option value="0"
                    @if ( !$animal->mamifero )
                        selected
                    @endif
                >No</option>
                <option value="1"
                    @if ( $animal->mamifero )
                        selected
                    @endif
                >Sí</option>
            </select>
        </div>
        <div>
            <label class="block mb-4" for="fechaRegistro">Fecha Registro</label>
            <input class="p-2 px-4 w-full border-1 border-black" id="fechaRegistro" name="fechaRegistro" type="date" value={{ $animal->fechaRegistro }} required />
        </div>
        <div>
            <label class="block mb-4" for="observaciones">Observaciones</label>
            <textarea rows="10" class="p-2 px-4 w-full border-1 border-black" id="observaciones" name="observaciones">{{ $animal->observaciones }}</textarea>
        </div>
        <button class="p-2 px-4 bg-sky-400">Editar</button>
    </form>
@endsection
