<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/a22afade38.js" crossorigin="anonymous"></script>
    @vite('resources/css/Login.css')
</head>

<body class="d-flex">
    <main class="d-flex w-100 justify-content-center  align-items-center">
        <form action="{{ route('Login.store') }}" method="POST" novalidate
            class="card d-flex flex-column gap-3 justify-content-center align-items-center py-5 shadow needs-validation">
            @csrf
            <h1 class="py-5 text-uppercase">Bienvenido</h1>
            @if (session('mensaje'))
                <p class="col-md-10 p-1 rounded-1 text-white fw-bold text-center" style="background: red;">{{ session('mensaje') }}</p>
            @endif
            <div
                class="col-md-10 d-flex border-1  rounded-1 bg-primary justify-content-between align-items-center border text-white">
                <input type="email" name="email" class="form-control border-0 shadow-none rounded-0" id="correo"
                    placeholder="Email" required>
                <label for="correo" class="px-3" style="cursor: pointer;">
                    <i class="fa-solid fa-at"></i>
                </label>
            </div>
            @error('email')
                <p class="bg-red-500 text-white my-2 rounded-sm text-sm p-2 text-center">{{ $message }}</p>
            @enderror
            <div
                class="col-md-10 d-flex border-1  rounded-1 bg-primary justify-content-between align-items-center border text-white">
                <input type="password" class="form-control border-0 shadow-none rounded-0 " id="password"
                    placeholder="Contraseña" name="password" required>
                <label for="password" class="px-3" style="cursor: pointer;">
                    <i class="fa-solid fa-unlock-keyhole"></i>
                </label>
            </div>
            @error('password')
                <p class="bg-red-500 text-white my-2 rounded-sm text-sm p-2 text-center">{{ $message }}</p>
            @enderror

            <button class="btn bg-primary text-white px-5 mt-5 ">
                Iniciar sesion
            </button>

            <a href="{{ route('Registro') }}">Crear cuenta</a>
        </form>
    </main>

    <script>
        (function() {
            'use strict'

            var forms = document.querySelectorAll('.needs-validation')

            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
</body>

</html>
