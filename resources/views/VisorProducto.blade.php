@extends('Layouts.Layout')

@section('titulo')
    Carrito
@endsection

@section('contenido')
    <div class="w-100 showw d-flex justify-content-center align-items-center " style="height: 90vh;">
        @foreach ($uniformes as $data)
            <div class="card position-relative flex-column  flex-md-row justify-content-between  card-uniforme" style="height: 50vh; width:60%;">
                <img src="{{ asset('ServidorImagenes') . '/' . $data->imagen }}"alt="Imagen Producto {{ $data->talla }}"
                    class="w-full" style=" height:100%; object-fit: cover; " />
                <div class="w-50 info-showw" style="height: 100%;">
                    <div class="w-100 px-2 py-2 mt-md-4 mb-md-4  d-flex justify-content-between align-items-center">
                        <h3 class="fs-4">{{ $data->nombre }}</h3>
                        <h3 class="fs-4">{{ $data->tipo }}</h3>
                    </div>
                    <div class="w-100 d-flex mt-md-4 mb-md-4 gap-2 px-2 py-1 align-items-center ">
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
                    <div class="px-2 mt-md-4 mb-md-4">
                        <h4 class="fs-6">Tallas disponibles: {{ $data->tallas }}</h4>
                    </div>
                    <div class="px-2 w-100 py-2 mt-md-4 mb-md-4">
                        @auth
                            <button class="btn px-2 w-100 p-2 bg-primary text-white" type="button" class="btn btn-primary"
                                data-bs-toggle="modal" data-bs-target="#exampleModal{{ $data->id }}">Añadir a
                                carrito</button>
                        @else
                            <a href="{{ route('Login') }}" class="btn px-2 w-100 p-2 bg-primary text-white">Añadir a
                                carrito</a>
                        @endauth
                    </div>
                </div>

                <div class="modal fade" id="exampleModal{{ $data->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel{{ $data->id }}" aria-hidden="true"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Cantidad a comprar</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body d-flex flex-column justify-content-center align-items-center">
                                <div class="w-100 d-flex justify-content-center align-items-center gap-1">
                                    @livewire('contador', ['id' => $data->id])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
