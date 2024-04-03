@extends('Layouts.Layout')

@section('titulo')
    Carrito
@endsection

@section('contenido')
    <div class="w-100 car-info px-2 px-md-4 d-flex flex-column justify-content-center align-items-center"
        style="height: auto;">
        <h1 class="w-75 mt-2 fs-4 py-2">Productos en el carrito:</h1>
        @if (!$pedidos->isEmpty())
            <form method="POST" action="{{ route('Confirmar') }}"
                class="w-100 card d-flex justify-content-center align-items-center ">
                @csrf
                <div class="mt-4 d-flex flex-column flex-md-row gap-2 px-2 flex-wrap justify-content-center align-items-center"
                    style="width: 80%;">
                    @foreach ($pedidos as $pedido)
                        <div class="card d-flex flex-row justify-content-between align-items-center "
                            style="height: 30vh;width: 49%;">
                            <img src="{{ asset('ServidorImagenes') . '/' . $pedido->producto->imagen }}"alt="Imagen Producto {{ $pedido->producto->nombre }}"
                                style="width:45%; height: 100%;" />
                            <div class="w-75 card px-2 py-2" style="height: 100%;">
                                <h2>{{ $pedido->producto->nombre }}</h2>
                                <p class="d-flex fs-4 ">talla:<span>{{ $pedido->talla }}</span></p>
                                <p>Precio Unit: <span>{{ $pedido->producto->precio }}</span></p>
                                <p>Cantidad: {{ $pedido->cantidad }}</p>
                                <p>Total: {{ $pedido->total }}</p>
                                <div class="w-100 d-flex justify-content-center align-items-center mt-4 gap-2">
                                    <a wire:navigate href="{{ route('DeleteCar', $pedido->id) }}"
                                        class="w-75 btn btn-danger">Eliminar</a>
                                    <input class="form-check-input form-check-lg" type="checkbox" checked
                                        name="ids_pedidos[]" value="{{ $pedido->id }}">
                                </div>
                            </div>

                        </div>
                        {{-- <div>
                    <img src="{{ $google_qr_url }}" alt="Código QR para Yape">
                </div> --}}
                    @endforeach
                </div>
                <div class=" btn-conf py-4 d-flex justify-content-end align-items-center" style="width: 80%;">
                    <button type="submit" class="btn btn-primary">
                        Confirmar pedido
                    </button>
                </div>
            </form>
        @else
            <div class="w-100 sin-producto p-2 d-flex justify-content-center align-items-center  flex-column  ">
                <img src="{{ asset('img/undraw_shopping_app_flsj.png') }}" alt="addproducto" class="w-25">
                <h1 class="text-uppercase text-dark-emphasis fs-1">Aun no hay productos en el carrito</h1>
                <a href="/" class="btn btn-primary p-3 w-25">AGREGAR PRODUCTOS</a>
            </div>
        @endif
    </div>
@endsection
