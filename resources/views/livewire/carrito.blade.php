<a href="{{ route('Carrito') }}" wire:navigate class="nav-link d-flex px-3 fs-5 bg-primary py-1 text-white rounded-2">
    <span>
        <i class="fa-solid fa-cart-shopping"></i>
    </span>
    @if ($car)
        {{ $car }}
    @else
        0
    @endif
</a>
