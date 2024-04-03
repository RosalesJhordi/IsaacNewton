<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Panel - @yield('titulo')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/a22afade38.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
    <!-- Incluye la hoja de estilos de Toastify -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <!-- Incluye la librería Toastify -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <link rel="stylesheet" href="{{ asset('css/Panel.css') }}">
    @livewireStyles
    <link rel="stylesheet" href="{{ asset('css/adminMedia.css') }}">
</head>

<body class="d-flex flex-column flex-md-row justify-content-between">
    <button class="btn fs-5 d-flex d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
        aria-controls="offcanvasRight">
        <i class="fa-solid fa-bars"></i>
    </button>
    <aside class="d-none d-md-flex flex-column opspanel">
        <div class="d-flex text-white py-5 w-100 justify-content-center logo align-items-center py-1">
            <img src="{{ asset('img/escudo.png') }}" class="py-2 px-2" alt=""
                style="width: 50px; height: 55px;">
            <div class="me-5 border-start border-2 px-1 border-white">
                <span class="text-center fs-5 text-uppercase">Isaac Newton</span> <br>
                <p class="text-uppercase mb-0" style="font-size: 10px;">Educando para el futuro</p>
            </div>
        </div>
        <ul class="nav flex-column mt-4 py-4 fs-6 gap-2 ">
            <li class="nav-item w-100">
                <a href="{{ route('AdminPanel') }}" class="nav-link d-flex justify-content-between align-items-center">
                    Inicio
                    <i class="fa-solid fa-house"></i>
                </a>
            </li>
            <li class="nav-item w-100">
                <a href="{{ route('PedidosAdmin') }}" wire:navigate
                    class="nav-link d-flex justify-content-between align-items-center">
                    Pedidos
                    <i class="fa-solid fa-shirt"></i>
                </a>
            </li>
            <li class="nav-item w-100">
                <a href="{{ route('Add') }}" class="nav-link d-flex justify-content-between align-items-center">
                    Añadir uniforme
                    <i class="fa-solid fa-chart-column"></i>
                </a>
            </li>
        </ul>
        <div
            class="py-2 text-white fs-5 px-3 text-white position-absolute bottom-0 w-100 d-flex justify-content-between align-items-center">
            <a href="/" class="btn nav-link">
                <i class="fa-solid fa-chevron-left"></i>
            </a>
        </div>
    </aside>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <button type="button" class="btn-close text-reset w-100 d-flex justify-content-end" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        <div class="d-flex py-5 offcanvas-header w-100 justify-content-center logo align-items-center py-1">
            <img src="{{ asset('img/escudo.png') }}" class="py-2 px-2" alt=""
                style="width: 50px; height: 55px;">
            <div class="me-5 border-start border-2 px-1 border-white">
                <span class="text-center fs-5 text-uppercase">Isaac Newton</span> <br>
                <p class="text-uppercase mb-0" style="font-size: 10px;">Educando para el futuro</p>
            </div>
        </div>
        <ul class="nav flex-column offcanvas-body  text-dark mt-4 py-4 fs-6 gap-2 ">
            <li class="nav-item w-100">
                <a href="{{ route('AdminPanel') }}" class="nav-link text-dark d-flex justify-content-between align-items-center">
                    Inicio
                    <i class="fa-solid fa-house"></i>
                </a>
            </li>
            <li class="nav-item w-100">
                <a href="{{ route('PedidosAdmin') }}" wire:navigate
                    class="nav-link d-flex justify-content-between text-dark  align-items-center">
                    Pedidos
                    <i class="fa-solid fa-shirt"></i>
                </a>
            </li>
            <li class="nav-item w-100">
                <a href="{{ route('Add') }}" class="nav-link text-dark  d-flex justify-content-between align-items-center">
                    Añadir uniforme
                    <i class="fa-solid fa-chart-column"></i>
                </a>
            </li>
        </ul>
        <div
            class="py-2 offcanvas-footer  fs-5 px-3  w-100 d-flex justify-content-between align-items-center">
            <a href="/" class="btn nav-link text-dark ">
                <i class="fa-solid fa-chevron-left"></i>
            </a>
        </div>
    </div>
    <main>
        <div class="w-100 d-flex flex-wrap py-2 px-2 px-md-4 gap-1 gap-md-4 opspanel bg-white">
            <div class="dvs1 bg-primary rounded shadow d-flex flex-column justify-content-center align-items-center">
                Uniformes vendidos:
                <span class="fs-2">
                    @livewire('vendidos-admin')
                </span>
            </div>
            <div class="dvs2 rounded shadow d-flex flex-column justify-content-center align-items-center">
                Total de Ingreso:
                <span class="fs-2">
                    S/. @livewire('ganancia-admin')
                </span>
            </div>
            <div class="dvs3 bg-danger rounded shadow d-flex flex-column justify-content-center align-items-center">
                Pedidos:
                <span class="fs-2">
                    {{ $pedidos->count() }}
                </span>
            </div>
            <a href="{{ route('Add') }}"
                class="dvs4 nav-link rounded shadow d-flex flex-column justify-content-center align-items-center">
                Añadir Uniforme
                <span
                    class="fs-2 bg-white text-black rounded-circle p-1 d-flex justify-content-center align-items-center"
                    style="height: 40px; width: 40px;">
                    <i class="fa-solid fa-plus"></i>
                </span>
            </a>
            {{-- @livewire('modal-add') --}}
        </div>
        @yield('contenido')
    </main>
    @livewireScripts
</body>

</html>
