@extends('Admin.Layout.Layout')

@section('titulo')
    Editar
@endsection

@section('contenido')
    <div class="w-100 px-2 px-md-5 d-flex flex-column justify-content-center align-items-center">
        @if (session('mensaje'))
            <div class="alert w-75 mt-4 text-center alert-success">
                {{ session('mensaje') }}
            </div>
        @endif

        <div class="w-75 d-flex flex-row justify-content-between mt-4 card" style="height: 60vh;">
            <img src="{{ asset('ServidorImagenes') . '/' . $datos->imagen }}" class="h-100 w-50" alt="">
            <div class="w-50 card h-100 d-flex align-items-center justify-content-center">
                <h1 class="text-dark-emphasis fs-2">Editar datos</h1>
                <form action="{{ route('edit.store') }}" method="POST"
                    class="w-100 px-2 py-2 d-flex justify-content-center align-items-center flex-column">
                    @csrf
                    <span class="w-75 fw-bold text-dark-emphasis">
                        Nombres
                    </span>
                    <input type="hidden" name="id" value="{{ $datos->id }}">
                    <div class="input-group w-75 mb-3">
                        <input type="text" class="form-control" placeholder="Nombre" aria-label="nombre"
                            aria-describedby="basic-addon1" name='nombre' value="{{ $datos->nombre }}">
                    </div>
                    <span class="w-75 fw-bold text-dark-emphasis">
                        Cantidad
                    </span>
                    <div class="input-group w-75 mb-3">
                        <input type="number" class="form-control" placeholder="Cantidad" aria-label="cantidad"
                            aria-describedby="basic-addon1" name='cantidad' value="{{ $datos->cantidad }}">
                    </div>

                    <span class="w-75 fw-bold text-dark-emphasis">
                        Precio
                    </span>
                    <div class="input-group w-75 mb-3">
                        <input type="number" class="form-control" placeholder="Precio" aria-label="precio"
                            aria-describedby="basic-addon1" name='precio' value="{{ $datos->precio }}">
                    </div>
                    <span class="w-75 fw-bold text-dark-emphasis">
                        Descuento
                    </span>
                    <div class="input-group w-75 mb-3">
                        <input type="number" class="form-control" placeholder="Descuento" aria-label="descuento"
                            aria-describedby="basic-addon1" name='descuento' value="{{ $datos->descuento }}">
                    </div>

                    <div class="w-75">
                        <button type="submit" class="btn px-2 w-50 text-white"
                            style="background: rgb(26, 212, 20);">Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
