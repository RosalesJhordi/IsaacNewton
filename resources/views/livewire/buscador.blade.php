<div>
    <form class="d-flex">
        <input wire:model='search' wire:keyup='searchProduct' class="form-control me-2" type="text"
            placeholder="Buscar..." aria-label="Search">
        <button class="btn fs-5 d-none d-md-flex" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
            <i class="fa-solid fa-user"></i>
        </button>
    </form>
    <div class="position-relative">
        @if ($lista)
            <div
                class="bg-dark-subtle mt-1 rounded-1 text-white shadow d-flex flex-column position-absolute z-50 w-100">
                @if (!empty($resultados))
                    @foreach ($resultados as $resultado)
                        <a href="#"
                            class="d-flex buscado justify-content-between w-100 px-2 py-1 bg-emerald-300 align-items-center">
                            <img src="{{ asset('ServidorImagenes') . '/' . $resultado->imagen }}"
                                alt="Imagen Producto {{ $resultado->nombre }}" class="rounded-circle"
                                style="width: 30px;">
                            <p>{{ $resultado->nombre }}</p>
                        </a>
                    @endforeach
                @endif
            </div>
        @endif
    </div>
</div>
