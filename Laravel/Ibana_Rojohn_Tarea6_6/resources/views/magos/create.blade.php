@extends('layouts.app')

@section('headTitle')
    Crear Mago
@endsection

@section('main')
    @section('mainTitle')
        Crear Mago
    @endsection

    <form class="flex flex-col w-xl gap-4" action={{ route('magos.store') }} method="post">
        @csrf
        <div>
            <label class="block mb-4" for="nombre">Nombre</label>
            <input class="p-2 px-4 w-full border-1 border-black" id="nombre" name="nombre" type="text" required />
        </div>
        <div>
            <label class="block mb-4" for="nivel">Nivel</label>
            <input class="p-2 px-4 w-full border-1 border-black" id="nivel" name="nivel" type="number" required/>
        </div>
        <div>
            <label class="block mb-4" for="escuela">Escuela</label>
            <input class="p-2 px-4 w-full border-1 border-black" id="escuela" name="escuela" type="text" required/>
        </div>
        <div>
            <label class="block mb-4" for="varita">Varita</label>
            <input class="p-2 px-4 w-full border-1 border-black" id="varita" name="varita" type="text" required/>
        </div>
        <div>
            <label class="block mb-4" for="mascota">Mascota</label>
            <input class="p-2 px-4 w-full border-1 border-black" id="mascota" name="mascota" type="text" required/>
        </div>
        <button class="p-2 px-4 bg-sky-400">Crear</button>
    </form>
@endsection
