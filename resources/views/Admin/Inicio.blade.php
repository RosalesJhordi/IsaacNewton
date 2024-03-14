@extends('Admin.Layout.Layout')

@section('titulo')
    Inicio
@endsection

@section('contenido')
    <h1 class="px-2 py-3 fs-3 fw-bold">Productos mas vendidos:</h1>
    <div class="w-100 d-flex flex-column">
        <div class="w-100 d-flex px-2 flex-wrap gap-2">
            @foreach ($datos as $data)
                <div class="card position-relative card-uniforme" style="width: 24%;">
                    <img src="{{ asset('ServidorImagenes') . '/' . $data->imagen }}"alt="Imagen Producto {{ $data->talla }}"
                        class="w-full" style=" height:40vh;" />
                    <div class="w-100 px-2 py-2 d-flex justify-content-between align-items-center">
                        <h3 class="fs-4">{{ $data->nombre }}</h3>
                        <h3 class="fs-4">{{ $data->tipo }}</h3>
                    </div>
                    <div class="w-100 d-flex gap-2 px-2 py-1 align-items-center ">
                        @if ($data->descuento != 0 or $data->descuento != null)
                            <h3 class="rounded-4 text-center precio2 py-1 "><s><span>Antes</span> S/
                                    {{ $data->precio }} </s></h3>
                            <h3 class="rounded-4 text-center precio py-1">
                                <span>Ahora</span>
                                S/{{ $data->precio - ($data->precio * $data->descuento) / 100 }}
                            </h3>
                        @else
                            <h3 class="rounded-4 text-center precio py-1">

                                S/{{ $data->precio }}
                            </h3>
                        @endif
                    </div>

                    @if ($data->descuento != 0 or $data->descuento != null)
                        <div
                            class="descuento position-absolute text-center d-flex justify-content-center align-items-center text-white">
                            -{{ $data->descuento }}%
                        </div>
                    @endif
                    <div class="px-2">
                        <h4 class="fs-6">Tallas disponibles: {{ $data->tallas }}</h4>
                    </div>
                    <div class="px-2 w-100 py-2">
                        <button class="btn px-2 w-100 bg-warning text-white">Editar producto</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
