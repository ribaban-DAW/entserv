@extends('layouts.app')

@section('headTitle')
    Editar Mago
@endsection

@section('main')
    @section('mainTitle')
        Crear Mago
    @endsection

    <form class="flex flex-col w-xl gap-4" action={{ route('magos.update', $mago->id) }} method="post">
        @csrf
        @method('PUT')
        <div>
            <label class="block mb-4" for="nombre">Nombre</label>
            <input class="p-2 px-4 w-full border-1 border-black" id="nombre" name="nombre" type="text" value={{ $mago->nombre }} required />
        </div>
        <div>
            <label class="block mb-4" for="nivel">Nivel</label>
            <input class="p-2 px-4 w-full border-1 border-black" id="nivel" name="nivel" type="number" value={{ $mago->nivel }} required/>
        </div>
        <div>
            <label class="block mb-4" for="escuela">Escuela</label>
            <input class="p-2 px-4 w-full border-1 border-black" id="escuela" name="escuela" type="text" value={{ $mago->escuela }} required/>
        </div>
        <div>
            <label class="block mb-4" for="varita">Varita</label>
            <input class="p-2 px-4 w-full border-1 border-black" id="varita" name="varita" type="text" value={{ $mago->varita }} required/>
        </div>
        <div>
            <label class="block mb-4" for="mascota">Mascota</label>
            <input class="p-2 px-4 w-full border-1 border-black" id="mascota" name="mascota" type="text" value={{ $mago->mascota }} required/>
        </div>
        <button class="p-2 px-4 bg-sky-400">Editar</button>
    </form>
@endsection
