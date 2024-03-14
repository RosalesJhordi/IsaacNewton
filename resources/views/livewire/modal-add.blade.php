<style>
    input,
    select {
        outline: none;
    }

    span {
        width: 50px;
        height: 100%;
        font-size: 15px;
        justify-content: center;
        align-items: ceenter;
    }
</style>
<div class="w-100 px-2 py-4">
    @if (session('mensaje'))
    <script>
        Toastify({
            text: "Producto agregado exitosamnete",
            duration: 3000,
            close: true,
            gravity: "top",
            position: "right", // Alineación del toast
            backgroundColor: "#28a745", // Color de fondo del toast
            stopOnFocus: true,
        }).showToast();
    </script>
    @endif
    <h1 class="text-uppercase text-dark-emphasis fw-bold" style="font-size: 20px;">Añadir Nuevo Producto</h1>
    <div class="w-100 d-flex justify-content-center mt-3 justify-content-center gap-3">
        <div class="card w-75 d-flex flex-row justify-content-center align-items-center px-4 gap-4" style="height: 60vh;">
            <form action="{{ route('Imagen') }}" method="POST" enctype="multipart/form-data" id="dropzone"
                class="dropzone w-50 h-75 d-flex justify-content-center  align-items-center">
                @csrf
            </form>
            <form action="{{ route('addUniforme') }}" method="POST" class="w-50 px-4 d-flex flex-column gap-2">
                @csrf
                <h1 class="text-center text-dark-emphasis py-4 fs-4">----- Datos -----</h1>
                <div class="w-100 border rounded-2 d-flex">
                    <span class="px-3 bg-primary text-white p-2">
                        <i class="fa-solid fa-clipboard-check"></i>
                    </span>
                    <select class="custom-select border-0 w-100 p-2" name="nombre">
                        <option value="Seleciona" selected disabled>--- Seleciona ---</option>
                        <option value="Pantalon">Pantalón</option>
                        <option value="Polo con cuello V">Polo con cuello V</option>
                        <option value="Gorra plomo">Gorra plomo</option>
                        <option value="Polera">Polera</option>
                        <option value="Medias">Medias</option>
                        <option value="Sniker">Sniker</option>
                        <option value="Buzo">Buzo completo</option>
                        <option value="Short">Short</option>
                        <option value="Gorra azul">Gorra azul</option>
                        <option value="Mochila">Mochila deportiva</option>
                        <option value="Toalla">Toalla</option>
                    </select>
                </div>

                <div class="w-100 border rounded-2 d-flex align-items-center h-auto">
                    <span class="px-3 bg-primary text-white p-2">
                        <i class="fa-solid fa-list-ol"></i>
                    </span>
                    <input type="number" name="cantidad" class="w-100 border-0 px-2" placeholder="Cantidad">
                </div>

                <div class="w-100 border rounded-2 d-flex">
                    <span class="px-3 bg-primary text-white p-2">
                        <i class="fa-solid fa-shirt"></i>
                    </span>
                    <input type="text" name="tallas" class="w-100 border-0 px-2" placeholder="Tallas (XS,S,M,L)">
                </div>

                <div class="w-100 border rounded-2 d-flex">
                    <span class="px-3 bg-primary text-white p-2">
                        <i class="fa-solid fa-money-bill-1-wave"></i>
                    </span>
                    <input type="number" name="precio" class="w-100 border-0 px-2" placeholder="Precio">
                </div>
                <div class="w-100 border rounded-2 d-flex">
                    <span class="px-3 bg-primary text-white p-2">
                        <i class="fa-solid fa-money-bill-1-wave"></i>
                    </span>
                    <input type="number" name="descuento" class="w-100 border-0 px-2" placeholder="Desscuento">
                </div>
                <input type="hidden" name="imagen" value="{{ old('imagen') }}">

                <button type="submit" class="btn  bg-primary text-white mt-4 ">Guardar</button>
            </form>
        </div>
    </div>
    {{-- <input type="text" wire:model.live.debounce.50ms="message" name="message">
    <p class="text-black">You typed: {{ $message }}</p> --}}
</div>
{{-- <script>
    setInterval(function() {
        @this.call('imgupdate');
        console.log('gaaa')
    }, 6000);
</script> --}}

{{-- <script>
    console.log("{{ $path }}")
</script> --}}
