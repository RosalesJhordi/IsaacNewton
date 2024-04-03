@extends('Admin.Layout.Layout')

@section('titulo')
    Pedidos
@endsection

@section('contenido')
    <div class="w-100 px-2 px-md-4 d-flex flex-column ">
        <div class="w-100 d-flex justify-content-between  align-items-center ">
            <h1 class="px-2 py-3 fs-3 fw-bold">Pedidos:</h1>
        </div>
        <div class="w-100 d-flex gap-2 pedidos-card">
            @foreach ($datos as $producto)
                <a href="{{ route('Visorr',$producto->usuario->id ) }}" class="nav-link text-dark ">
                    <div class="card">
                        <div
                            class="card-hedaer bg-primary text-white d-flex justify-content-start align-items-center px-2 py-1">
                            <h2 class="fs-4">{{ $producto->usuario->nombres . ' ' . $producto->usuario->apellidos }}</h2>
                        </div>
                        <div class="card-body">
                            <p class="fs-5 fw-bold text-dark-emphasis ">{{ $producto->usuario->ciudad }} <br>
                                {{ $producto->usuario->direccion }}</p>
                            <p class="card-text">Productos: {{ $producto->total }}</p>
                            <p>Total: {{ $producto->total_suma }}</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center ">
                            <div>Tel. {{ $producto->usuario->telefono }}</div>
                            <div class="d-flex justify-content-center align-items-center gap-2 w-25 h-100">
                                <a href="tel:+51{{ $producto->usuario->telefono }}"
                                    class="nav-link w-50 py-1 btn bg-primary text-white">
                                    <i class="fa-solid fa-phone"></i>
                                </a>
                                <a href="https://wa.me/+51{{ $producto->usuario->telefono }}" class="nav-link w-50 py-1 btn"
                                    style="background: rgb(0, 216, 36);">
                                    <i class="fa-brands fa-whatsapp"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
