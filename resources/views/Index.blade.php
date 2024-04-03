@extends('Layouts.Layout')

@section('titulo')
    Inicio
@endsection


@section('contenido')
    <div class="w-100 d-flex flex-column justify-content-center align-items-center">
        @livewire('productos')
    </div>
@endsection
