@extends('layouts.app')

@section('headTitle')
    Crear Usuario
@endsection

@section('main')
    @section('mainTitle')
        Crear Usuario
    @endsection

    <form class="flex flex-col w-xl gap-4" action={{ route('usuarios.store') }} method="post">
        @csrf
        <div>
            <label class="block mb-4" for="nombre">Nombre</label>
            <input class="p-2 px-4 w-full border-1 border-black" id="nombre" name="nombre" type="text" required />
        </div>
        <div>
            <label class="block mb-4" for="password">Contraseña</label>
            <input class="p-2 px-4 w-full border-1 border-black" id="password" name="password" type="password" required />
        </div>
        <div>
            <label class="block mb-4" for="fechaAcceso">Fecha Acceso</label>
            <input class="p-2 px-4 w-full border-1 border-black" id="fechaAcceso" name="fechaAcceso" type="date" />
        </div>
        <button class="p-2 px-4 bg-sky-400">Crear</button>
    </form>
@endsection
