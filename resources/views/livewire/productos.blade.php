<div class="w-75 pro px-1 px-md-5 d-flex productos flex-wrap gap-2 gap-md-4 mt-3">
    {{-- <h1 class="fs-4 text-dark-emphasis">Categorias</h1>
    <div class="w-100 categorias d-flex justify-content-start gap-5 fw-bold text-danger-emphasis align-items-center">
        <div class="d-flex justify-content-center align-items-center flex-column">
            <img src="{{ asset('img/pantalones.png') }}" alt="" class="rounded-circle p-2"
                style="width: 80px; height: 80px; background: rgba(173, 173, 173, 0.637); cursor: pointer;">
            <span>Pantalones</span>
        </div>
        <div class="d-flex justify-content-center align-items-center flex-column">
            <img src="{{ asset('img/polo.png') }}" alt="" class="rounded-circle p-2"
                style="width: 80px; height: 80px; background: rgb(255, 145, 0); cursor: pointer;">
            <span>Polos</span>
        </div>
        <div class="d-flex justify-content-center align-items-center flex-column">
            <img src="{{ asset('img/gorra.png') }}" alt="" class="rounded-circle p-2"
                style="width: 80px; height: 80px; background: rgb(34, 255, 5); cursor: pointer;">
            <span>Gorras</span>
        </div>
        <div class="d-flex justify-content-center align-items-center flex-column">
            <img src="{{ asset('img/polera.png') }}" alt="" class="rounded-circle p-2"
                style="width: 80px; height: 80px; background: rgb(5, 255, 255); cursor: pointer;">
            <span>Poleras</span>
        </div>
        <div class="d-flex justify-content-center align-items-center flex-column">
            <img src="{{ asset('img/medias.png') }}" alt="" class="rounded-circle p-2"
                style="width: 80px; height: 80px; background: rgb(30, 5, 255); cursor: pointer;">
            <span>Medias</span>
        </div>

        <div class="d-flex justify-content-center align-items-center flex-column">
            <img src="{{ asset('img/sniker.png') }}" alt="" class="rounded-circle p-2"
                style="width: 80px; height: 80px; background: rgb(247, 5, 255); cursor: pointer;">
            <span>Sniker </span>
        </div>
        <div class="d-flex justify-content-center align-items-center flex-column">
            <img src="{{ asset('img/complto.png') }}" alt="" class="rounded-circle p-2"
                style="width: 80px; height: 80px; background: rgb(255, 97, 5); cursor: pointer;">
            <span>Completo</span>
        </div>
        <div class="d-flex justify-content-center align-items-center flex-column">
            <img src="{{ asset('img/short.png') }}" alt="" class="rounded-circle p-2"
                style="width: 80px; height: 80px; background: rgb(55, 255, 5); cursor: pointer;">
            <span>Short</span>
        </div>
        <div class="d-flex justify-content-center align-items-center flex-column">
            <img src="{{ asset('img/mochila.png') }}" alt="" class="rounded-circle p-2"
                style="width: 80px; height: 80px; background: rgb(255, 238, 0); cursor: pointer;">
            <span>Mochila</span>
        </div>
        <div class="d-flex justify-content-center align-items-center flex-column">
            <img src="{{ asset('img/toalla.png') }}" alt="" class="rounded-circle p-2"
                style="width: 80px; height: 80px; background: rgb(255, 51, 0); cursor: pointer;">
            <span>Toalla</span>
        </div>
    </div> --}}
    <div class="w-100 infor py-4">
        <div class="w-100 div-btn-cate d-flex gap-4 justify-content-center mt-5 align-items-center">
            <a wire:navigate href="{{ route('Categorias', 'Formal') }}"
                class="rounded-2 text-white fs-4 d-flex justify-content-center align-items-center shadow-sm text-center nav-link enlase1 w-25">
                <span>
                    Formales
                </span>
            </a>
            <a wire:navigate href="{{ route('Categorias', 'Deportivo') }}"
                class="rounded-2 enlase2 fs-4 d-flex justify-content-center align-items-center shadow-sm text-white text-center nav-link w-25">
                <span>
                    Deportivos
                </span>
            </a>
            <a wire:navigate href="{{ route('Categorias', 'Descuento') }}"
                class="rounded-2 enlase3 w-25 fs-4 d-flex justify-content-center align-items-center shadow-sm text-white text-center nav-link w-25">
                <span>
                    Descuento
                </span>
            </a>
        </div>
    </div>
    <div class="w-100 d-flex flex-column">
        <div wire:loading class="w-100 h-100 justify-content-center align-items-center ">
            <div class="spinner-border" role="status">
                <span class="sr-only">Cargando...</span>
            </div>
        </div>
        <div class="w-100 d-flex px-2 flex-wrap gap-2">
            @foreach ($uniformes as $data)
                <div class="card position-relative card-uniforme" style="width: 32.8%;">
                    <img src="{{ asset('ServidorImagenes') . '/' . $data->imagen }}"alt="Imagen Producto {{ $data->talla }}"
                        class="w-full" style=" height:40vh; object-fit: cover; " />
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
            @endforeach
        </div>
        @if ($uniformes->count() > 9)
            <nav aria-label="Page navigation example" class="d-flex justify-content-end mt-4">
                <ul class="pagination">
                    {{-- Anterior --}}
                    <li class="page-item {{ $uniformes->previousPageUrl() ? '' : 'disabled' }}">
                        <a class="page-link" href="{{ $uniformes->previousPageUrl() }}">Anterior</a>
                    </li>

                    {{-- Páginas --}}
                    @for ($i = 1; $i <= $uniformes->lastPage(); $i++)
                        <li class="page-item {{ $uniformes->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ $uniformes->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor

                    {{-- Siguiente --}}
                    <li class="page-item {{ $uniformes->nextPageUrl() ? '' : 'disabled' }}">
                        <a class="page-link" href="{{ $uniformes->nextPageUrl() }}">Siguiente</a>
                    </li>
                </ul>
            </nav>
        @endif

    </div>
</div>
