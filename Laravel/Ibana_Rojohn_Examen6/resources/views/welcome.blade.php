@extends('layouts.app')

@section('headTitle')
    Inicio
@endsection

@section('header')
    <a class="p-4 py-2 bg-slate-800 rounded-[10px] hover:bg-slate-900" href={{ route('usuarios.create') }}>Crear usuario</a>
@endsection

@section('main')
    @section('mainTitle')
        Inicio
    @endsection
@endsection
