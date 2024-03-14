@extends('Layouts.Layout')

@section('titulo')
    Inicio
@endsection


@section('contenido')
    @auth
        <h1 class="fs-5 py-3 ">Bienvenido {{ auth()->user()->nombres }}</h1>
    @endauth
    <div class="w-100 d-flex flex-column justify-content-center align-items-center">
        @livewire('productos')
    </div>
@endsection
