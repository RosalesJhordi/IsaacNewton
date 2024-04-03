<div>
    <form class="d-flex">
        <input wire:model='search' wire:keyup='searchProduct' class="form-control me-2" type="text"
            placeholder="Buscar..." aria-label="Search">
    </form>
    <div class="position-relative z-50">
        @if ($lista)
            <div
                class="bg-dark-subtle mt-1 rounded-1 text-white shadow d-flex flex-column position-absolute z-50 w-100" style="z-index: 9999;">
                @if (!empty($resultados))
                    @foreach ($resultados as $resultado)
                        <a href="{{ route('Visor',$resultado->id) }}" class="d-flex nav-link border-1 border-dark-subtle buscado justify-content-between w-100 px-2 py-1 bg-emerald-300 align-items-center">
                            <img src="{{ asset('ServidorImagenes') . '/' . $resultado->imagen }}" alt="Imagen Producto {{ $resultado->nombre }}" class="rounded-circle" style="width: 30px; height: 30px;"                            >
                            <p>{{ $resultado->nombre }}</p>
                        </a>
                    @endforeach
                @endif
            </div>
        @endif
    </div>
</div>
