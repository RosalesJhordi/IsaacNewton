<form action="{{ route('AddCarrito') }}" method="POST" class="d-flex justify-content-center flex-column">
    @csrf
    <div class="w-100 d-flex justify-content-between align-items-center">
        <button type="button" wire:click.live="menor" class="w-25 btn btn-primary">
            <i class="fa-solid fa-angle-left"></i>
        </button>
        <input type="number" class="w-25 p-1 text-center border-0" name="cantidad" value="{{ $contador }}">
        <button type="button" wire:click.live="mayor" class="w-25 btn btn-primary">
            <i class="fa-solid fa-angle-right"></i>
        </button>
    </div>
    <div class="w-100 d-flex justify-content-center gap-2 align-items-center" id="optionsForm">
        @if ($tallas != "")
            <select class="custom-select border-1 mt-2  w-100 p-2" name="talla">
                <option value="Seleciona" selected disabled>--- Seleciona Talla ---</option>
                @foreach ($tallas as $talla)
                   <option value="{{ $talla }}">{{ $talla }}</option> 
                @endforeach
            </select>
        @endif
    </div>

    <input type="hidden" name="id" value="{{ $id }}">
    <button type="submit" class="mt-2 btn btn-primary">Añadir</button>
</form>
