@extends('layouts.app')

@section('headTitle')
    Editar Usuario
@endsection

@section('main')
    @section('mainTitle')
        Editar Usuario
    @endsection

    <form class="flex flex-col w-xl gap-4" action={{ route('usuarios.update', $usuario->id) }} method="post">
        @csrf
        @method('PUT')
        <div>
            <label class="block mb-4" for="nombre">Nombre</label>
            <input class="p-2 px-4 w-full border-1 border-black" id="nombre" name="nombre" type="text" value={{ $usuario->nombre }} required />
        </div>
        <div>
            <label class="block mb-4" for="password">Contraseña</label>
            <input class="p-2 px-4 w-full border-1 border-black" id="password" name="password" type="password" value={{ $usuario->password }} required />
        </div>
        <div>
            <label class="block mb-4" for="fechaAcceso">Fecha Acceso</label>
            <input class="p-2 px-4 w-full border-1 border-black" id="fechaAcceso" name="fechaAcceso" type="date" value={{ $usuario->fechaAcceso }} />
        </div>
        <button class="p-2 px-4 bg-sky-400">Editar</button>
    </form>
@endsection
