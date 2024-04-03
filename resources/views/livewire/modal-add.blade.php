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
        <div class="card card-add w-75 d-flex flex-row justify-content-center align-items-center px-4 gap-4" style="height: 60vh;">
            <form action="{{ route('addUniforme') }}" enctype="multipart/form-data" method="POST"
                class="w-50 px-4 d-flex flex-column gap-2">
                @csrf

                <h1 class="text-center text-dark-emphasis py-4 fs-4">----- Datos -----</h1>
                <div class="input-group w-100">
                    <input class="form-control" id="formFileSm" type="file" name="imagen">
                </div>
                <div class="w-100 border rounded-2 d-flex">
                    <span class="px-3 bg-primary text-white p-2">
                        <i class="fa-solid fa-clipboard-check"></i>
                    </span>
                    <select class="custom-select border-0 w-100 p-2" name="nombre">
                        <option value="Seleciona" selected disabled>--- Seleciona ---</option>
                        <option value="Camisa">Camisa</option>
                        <option value="Polo">Polo</option>
                        <option value="Polo con cuello V">Polo con cuello V</option>
                        <option value="Pollover">Pollover</option>
                        <option value="Pantalón">Pantalón</option>
                        <option value="Polera">Polera</option>
                        <option value="Sniker">Sniker</option>
                        <option value="Short">Short</option>
                        <option value="Buzo Completo">Buzo Completo</option>
                        <option value="Gorra Azul">Gorra azul</option>
                        <option value="Gorra Plomo">Gorra Plomo</option>
                        <option value="Chompa">Chompa</option>
                        <option value="Blusa">Blusa</option>
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
                        <i class="fa-solid fa-money-bill-1-wave"></i>
                    </span>
                    <input type="number" name="precio" class="w-100 border-0 px-2" placeholder="Precio">
                </div>
                <div class="w-100 border rounded-2 d-flex">
                    <span class="px-3 bg-primary text-white p-2">
                        <i class="fa-solid fa-money-bill-1-wave"></i>
                    </span>
                    <input type="number" name="descuento" class="w-100 border-0 px-2" placeholder="Descuento">
                </div>
                <div class="w-100 border rounded-2 d-flex flex-column ">
                    <span class="px-2 py-2 w-25">Tallas:</span>
                    <div class="w-100 d-flex justify-content-center align-items-center flex-wrap">
                        <div class="form-check d-flex gap-2 ">
                            <input class="border-0 px-2" type="checkbox" name="tallas[]"
                                value="6">
                            <label class="form-check-label">6</label>
                        </div>
                        <div class="form-check d-flex gap-2 ">
                            <input class="border-0 px-2" type="checkbox" name="tallas[]"
                                value="8">
                            <label class="form-check-label">8</label>
                        </div>
                        <div class="form-check d-flex gap-2 ">
                            <input class="border-0 px-2" type="checkbox" name="tallas[]"
                                value="10">
                            <label class="form-check-label">10</label>
                        </div>
                        <div class="form-check d-slex gap-2">
                            <input class="border-0 px-2" type="checkbox" name="tallas[]"
                                value="12">
                            <label class="form-check-label">12</label>
                        </div>
                        <div class="form-check d-flex gap-2 ">
                            <input class="border-0 px-2" type="checkbox" name="tallas[]"
                                value="14">
                            <label class="form-check-label">14</label>
                        </div>
                        <div class="form-check d-flex gap-2 ">
                            <input class="border-0 px-2" type="checkbox" name="tallas[]"
                                value="16">
                            <label class="form-check-label">16</label>
                        </div>
                        <div class="form-check d-flex gap-2 ">
                            <input class="border-0 px-2" type="checkbox" name="tallas[]"
                                value="S">
                            <label class="form-check-label">S</label>
                        </div>
                        <div class="form-check d-flex gap-2">
                            <input class="border-0 px-2" type="checkbox" name="tallas[]"
                                value="M">
                            <label class="form-check-label">M</label>
                        </div>
                        <div class="form-check d-flex gap-2">
                            <input class="border-0 px-2" type="checkbox" name="tallas[]"
                                value="L">
                            <label class="form-check-label">L</label>
                        </div>
                        <div class="form-check d-flex gap-2">
                            <input class="border-0 px-2" type="checkbox" name="tallas[]"
                                value="XL">
                            <label class="form-check-label">XL</label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn  bg-primary text-white mt-4 ">Guardar</button>
            </form>
        </div>
    </div>
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
