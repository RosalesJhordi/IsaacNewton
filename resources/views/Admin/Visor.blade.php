@extends('Admin.Layout.Layout')

@section('titulo')
    Visor
@endsection

@section('contenido')
@php
    $totalfn = 0;
@endphp
    <form action="{{ route('Confirmarr') }}" method="POST">
        @csrf
        <div class="w-100 mt-4 px-2 px-md-4 carddd d-flex flex-row justify-content-start  gap-2  align-items-center flex-wrap ">
            @foreach ($datos as $data)
                <div class="card w-25">
                    <div class="card-header d-flex justify-content-between align-items-center ">
                        {{ $data->updated_at->diffForHumans() }}
                    </div>
                    <div class="card-body p-0">
                        <div class="w-100 d-flex flex-column justify-content-center align-items-center">
                            <img src="{{ asset('ServidorImagenes') . '/' . $data->producto->imagen }}"
                                alt="Imagen Producto {{ $data->producto->nombre }}" class="w-75"
                                style=" height:50vh; object-fit: cover; " />
                        </div>
                        <div
                            class="w-100 card-if px-2 bg-primary-subtle  py-2 card d-flex flex-column justify-content-center align-items-center">
                            <h3 class="fs-4 d-flex justify-content-between align-items-center w-100">Tallas:
                                <span>{{ $data->talla }}</span>
                            </h3>
                            <h3 class="fs-4 d-flex justify-content-between align-items-center w-100">Precio U:
                                <span>
                                    {{ $data->producto->precio }}
                                </span>
                            </h3>
                            <h3 class="fs-4 d-flex justify-content-between align-items-center w-100">Cantidad:
                                <span>
                                    {{ $data->cantidad }}
                                </span>
                            </h3>
                            <h2 class="fs-4 d-flex justify-content-between align-items-center w-100">Total:
                                <span>
                                    {{ $data->total}}
                                </span>
                            </h2>
                            <a href="{{ route('Cancelar',$data->id) }}" class="btn btn-warning  w-100">
                                Cancelar productos
                            </a>
                        </div>
                    </div>
                </div>
                @php
                $totalfn += $data->total;
                @endphp
                <input class="d-none form-check-input form-check-lg" type="checkbox" checked name="ids_pedidos[]" value="{{ $data->id }}">
            @endforeach

        </div>
        <div class="w-100 mt-2 d-flex justify-content-end align-items-center px-2 px-md-4 gap-2">
            <h class="text-uppercase fw-bold text-dark-emphasis fs-3 px-2 mr-4 px-md-4">total: S/. {{ $totalfn }}</h1>
            <button type="submit" class="btn btn-primary ">
                Confirmar pagado y entregado
            </button>
        </div>
    </form>
@endsection
