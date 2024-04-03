<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IsaacNewton - @yield('titulo')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/a22afade38.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/inicioMedia.css') }}">
    <script src="{{ asset('js/Contador.js') }}"></script>
</head>

<body class="position-relative w-100 h-100">
    <nav class="navbar sticky-element py-2 py-md-0 navbar-expand-lg shadow-sm navbar-light bg-light py-0 px-2 px-md-5">
        <div class="container-fluid">

            <div class="d-flex justify-content-center logo align-items-center py-1">
                <img src="{{ asset('img/escudo.png') }}" class="py-2 px-2" alt=""
                    style="width: 50px; height: 55px;">
                <div class="me-5 border-start border-2 px-1 border-black">
                    <span class="text-center fs-5 text-uppercase">Isaac Newton</span> <br>
                    <p class="text-uppercase mb-0" style="font-size: 10px;">Educando para el futuro</p>
                </div>
            </div>

            <div class="d-flex">
                <button class="navbar-toggler border-0 shadow-none btn-collapse px-0 py-0" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="d-flex d-md-none">
                    @livewire('carrito')
                </div>
                <button class="btn fs-5 d-flex d-md-none" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                    <i class="fa-solid fa-user"></i>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item position-sticky">
                        <a class="nav-link active" aria-current="page" href="/">Inicio</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Categorias
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('Categorias', 'Formal') }}">Formales</a></li>
                            <li><a class="dropdown-item" href="{{ route('Categorias', 'Deportivo') }}">Deportivos</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('Categorias', 'Descuento') }}">Descuentos</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('Contacto') }}" tabindex="-1"
                            aria-disabled="true">Contacto</a>
                    </li>
                </ul>
                @auth
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="w-100">
                            @livewire('buscador')
                        </div>
                        <div class="d-none d-md-flex">
                            @livewire('carrito')
                        </div>
                        <button class="btn fs-5 d-none d-md-flex" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                            <i class="fa-solid fa-user"></i>
                        </button>
                    </div>
                @else
                    <div class="d-flex justify-content-evenly justify-content-md-center align-items-center gap-2">
                        <a href="{{ route('Login') }}" class="nav-link">Iniciar sesion</a>
                        |
                        <a href="{{ route('Registro') }}" class="btn bg-primary text-white fw-bold">Registrarse</a>
                    </div>
                @endauth
            </div>
        </div>
    </nav>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            @auth
                <h5 id="offcanvasRightLabel">Hola: {{ auth()->user()->nombres }} {{ auth()->user()->apellidos }}</h5>
            @else
                <h1>
                    I<span class="text-primary ">N</span>
                </h1>
            @endauth
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            @auth
            <img src="{{ asset('img/escudo.png') }}" alt="" class="w-100" style="height: 40vh;">
                <h1 class="fs-4 mt-4 text-dark-emphasis">{{ auth()->user()->nombres }}</h1>
                <h1 class="fs-4 text-dark-emphasis">{{ auth()->user()->apellidos }}</h1>
                <h1 class="fs-4 text-dark-emphasis">{{ auth()->user()->telefono }}</h1>
                <a href="{{ route('LogOut') }}" class="btn mt-5 w-100 bg-primary text-white fw-bold">Cerrar sesion</a>
            @else
                <div class="d-flex justify-content-center align-items-center gap-2">
                    <a href="{{ route('Login') }}" class="nav-link">Iniciar sesion</a>
                    |
                    <a href="{{ route('Registro') }}" class="nav-link">Registrarse</a>
                </div>
            @endauth
        </div>
    </div>
    @if (trim($__env->yieldContent('titulo')) != 'Carrito')
    <section class="curved w-100 d-flex justify-content-center align-items-center px-6">
        <div class="text-white w-50 px-5 divs">
            <h1 class="display-1 fw-bold text-uppercase text-center">Isaac Newton</h1>
            <p class="text-uppercase text-info fs-6 fw-semibold text-center">''Educando para el futuro''</p>
        </div>
    </section>
    <main class="px-2 px-md-5 d-flex justify-content-center align-items-center flex-column">
            <h1 class="text-center mt-2 py-2 fs-2 text-uppercase">Vistiendo la excelencia... <br> un uniforme, una
                identidad.
            </h1>
            <div class="w-75 div-container d-flex flex-column flex-md-row justify-content-center gap-3 py-2 py-md-4 ">
                <div class="w-50 div-envio rounded-2 px-5 py-2 bg-primary shadow d-flex justify-content-center info-envio align-items-center gap-4"
                    style="height: 20vh;">
                    <div class="p-3 bg-white rounded-circle">
                        <i class="fa-solid fa-truck fs-4"></i>
                    </div>
                    <div class="text-white">
                        <span class="fs-4 fw-bold">Envio Gratis</span>
                        <p class="fs-6 fw-semibold">Gratis en pedidos superiores a S/. 50</p>
                    </div>
                </div>
                <div class="w-50 div-horas rounded-2 px-5 py-2 bg-warning shadow d-flex mt-2 mt-md-0 justify-content-center info-envio align-items-center gap-4"
                    style="height: 20vh;">
                    <div class="p-3 bg-white rounded-circle">
                        <i class="fs-4 fa-solid fa-clock"></i>
                    </div>
                    <div class="text-white">
                        <span class="fs-4 fw-bold">Tiempo de Entrega</span>
                        <p class="fs-6 fw-semibold">Tiempo estimado de entrega 24 Horas</p>
                    </div>
                </div>
            </div>
        @endif
        @yield('contenido')
    </main>
    @auth
        @if (auth()->user()->id == 1)
            <a href="{{ route('AdminPanel') }}"
                class="position-fixed bottom-0 m-1 z-50 px-5 p-2 py-4 paneladmin card d-flex fw-bold flex-row gap-1">
                Ir a panel
                <i class="fa-solid fa-chart-simple"></i>
            </a>
        @endif
    @endauth
    @if (trim($__env->yieldContent('titulo')) != 'Carrito')
        
    
    <footer class="w-100 mt-5 bg-dark-subtle gap-4 d-flex flex-column justify-content-center align-items-center">
        <div class="d-flex justify-content-center logo align-items-center py-1">
            <img src="{{ asset('img/escudo.png') }}" class="py-2 px-2" alt=""
                style="width: 50px; height: 55px;">
            <div class="me-5 border-start border-2 px-1 border-black">
                <span class="text-center fs-5 text-uppercase">Isaac Newton</span> <br>
                <p class="text-uppercase mb-0" style="font-size: 10px;">Educando para el futuro</p>
            </div>
        </div>
        <p class="fw-bold text-dark-emphasis">created by prince of darkness</p>
    </footer>
    @endif
</body>
</body>

</html>
